<?php

include("include/session.php");

class Process {
    /* Class constructor */

    function Process() {
        global $session;
        /* User submitted login form */
        if (isset($_POST['sublogin'])) {
            $this->procLogin();
        }
        /* User submitted registration form */ else if (isset($_POST['subjoin'])) {
            $this->procRegister();
        }
        
        /* User submitted forgot password form */ else if (isset($_POST['subforgot'])) {
            $this->procForgotPass();
        }
        /* User submitted edit account form */ else if (isset($_POST['subedit'])) {
            $this->procEditAccount();
        }
        /* User submitted article form */ else if (isset($_POST['inarticle'])) {
            $this->procInsertArticle();
        }
        /* User submitted article form */ else if (isset($_POST['incomment'])) {
            $this->procInsertComment();
        }
         /* User submitted article form */ else if (isset($_POST['inanswer'])) {
            $this->procInsertAnswer();
        }
        /* Redactor aprooved article  */ else if (isset($_POST['aparticle'])) {
            $this->procApproveArticle();
        }
        /* Redactor discarded the article  */ else if (isset($_POST['disarticle'])) {
            $this->procDiscardArticle();
        }       
        /**
         * The only other reason user should be directed here
         * is if he wants to logout, which means user is
         * logged in currently.
         */ else if ($session->logged_in) {
            $this->procLogout();
        }
        /**
         * Should not get here, which means user is viewing this page
         * by mistake and therefore is redirected.
         */ else {
            header("Location: index.php");
        }
    }

    /**
     * procLogin - Processes the user submitted login form, if errors
     * are found, the user is redirected to correct the information,
     * if not, the user is effectively logged in to the system.
     */
    function procLogin() {
        global $session, $form;
        /* Login attempt */
        $retval = $session->login($_POST['user'], $_POST['pass'], isset($_POST['remember']));

        /* Login successful */
        if ($retval) {
            $session->logged_in = 1;
            header("Location: " . $session->referrer);
        }
        /* Login failed */ else {
            $session->logged_in = null;
            $_SESSION['value_array'] = $_POST;
            $_SESSION['error_array'] = $form->getErrorArray();
            header("Location: " . $session->referrer);
        }
    }

    /**
     * procLogout - Simply attempts to log the user out of the system
     * given that there is no logout form to process.
     */
    function procLogout() {
        global $session;
        $retval = $session->logout();
        header("Location: index.php");
    }
 
    /**
     * procRegister - Processes the user submitted registration form,
     * if errors are found, the user is redirected to correct the
     * information, if not, the user is effectively registered with
     * the system and an email is (optionally) sent to the newly
     * created user.
     */
    function procRegister() {
        global $session, $form;
        /* Convert username to all lowercase (by option) */
        if (ALL_LOWERCASE) {
            $_POST['user'] = strtolower($_POST['user']);
        }
        /* Registration attempt */
        $retval = $session->register($_POST['user'], $_POST['pass'], $_POST['email']);

        /* Registration Successful */
        if ($retval == 0) {
            $_SESSION['reguname'] = $_POST['user'];
            $_SESSION['regsuccess'] = true;
            header("Location: " . $session->referrer);
        }
        /* Error found with form */ else if ($retval == 1) {
            $_SESSION['value_array'] = $_POST;
            $_SESSION['error_array'] = $form->getErrorArray();
            header("Location: " . $session->referrer);
        }
        /* Registration attempt failed */ else if ($retval == 2) {
            $_SESSION['reguname'] = $_POST['user'];
            $_SESSION['regsuccess'] = false;
            header("Location: " . $session->referrer);
        }
    }

    /**
     * procForgotPass - Validates the given username then if
     * everything is fine, a new password is generated and
     * emailed to the address the user gave on sign up.
     */
    function procForgotPass() {
        global $database, $session, $mailer, $form;
        /* Username error checking */
        $subuser = $_POST['user'];
        $field = "user";  //Use field name for username
        if (!$subuser || strlen($subuser = trim($subuser)) == 0) {
            $form->setError($field, "* Neįvestas vartotojo vardas<br>");
        } else {
            /* Make sure username is in database */
            $subuser = stripslashes($subuser);
            if (strlen($subuser) < 5 || strlen($subuser) > 30 ||
                    !eregi("^([0-9a-z])+$", $subuser) ||
                    (!$database->usernameTaken($subuser))) {
                $form->setError($field, "* Vartotojas neegzistuoja<br>");
            }
        }

        /* Errors exist, have user correct them */
        if ($form->num_errors > 0) {
            $_SESSION['value_array'] = $_POST;
            $_SESSION['error_array'] = $form->getErrorArray();
        }
        /* Generate new password and email it to user */ else {
            /* Generate new password */
            $newpass = $session->generateRandStr(8);

            /* Get email of user */
            $usrinf = $database->getUserInfo($subuser);
            $email = $usrinf['email'];

            /* Attempt to send the email with new password */
            if ($mailer->sendNewPass($subuser, $email, $newpass)) {
                /* Email sent, update database */
                $database->updateUserField($subuser, "password", md5($newpass));
                $_SESSION['forgotpass'] = true;
            }
            /* Email failure, do not change password */ else {
                $_SESSION['forgotpass'] = false;
            }
        }

        header("Location: " . $session->referrer);
    }

    /**
     * procEditAccount - Attempts to edit the user's account
     * information, including the password, which must be verified
     * before a change is made.
     */
    function procEditAccount() {
        global $session, $form;
        /* Account edit attempt */
        $retval = $session->editAccount($_POST['curpass'], $_POST['newpass'], $_POST['email']);

        /* Account edit successful */
        if ($retval) {
            $_SESSION['useredit'] = true;
            header("Location: " . $session->referrer);
        }
        /* Error found with form */ else {
            $_SESSION['value_array'] = $_POST;
            $_SESSION['error_array'] = $form->getErrorArray();
            header("Location: " . $session->referrer);
        }
    }
     /**
     * procInsertArticle - inserts article into database
     */
    function procInsertArticle()
    {        
        global $session, $database, $form;
        $url = "upload_article.php";
        $date = date('Y-m-d H:i:s');
        /* Errors exist, have user correct them */
        if ($form->num_errors > 0 && false) {
            $_SESSION['value_array'] = $_POST;
            $_SESSION['error_array'] = $form->getErrorArray();
            header("Location: " . $session->referrer);
        }
        else {           
            $name = $_POST['pavadinimas'];
            $text = $_POST['tekstas'];
            $userid= $_SESSION['userid'];
        }
        if (empty($name) || empty($text)) {
            header("Location: error.php");
            return false;
        }
        else {
            $q = "INSERT INTO straipsnis(pavadinimas,autoriaus_id,tekstas,ar_tinkamas,perziuru_kiekis, ikelimo_data) VALUES ('$name', '$userid', '$text', '3', '0', now())";
            $database->query($q);
            header("Location: insert_success.php");
        }
        
    }
    /**
     * procInsertComment - inserts comment into database after the article
     */
    function procInsertComment()
    {        
        global $session, $database, $form;
        /* Errors exist, have user correct them */
        if ($form->num_errors > 0 && false) {
            $_SESSION['value_array'] = $_POST;
            $_SESSION['error_array'] = $form->getErrorArray();
            header("Location: " . $session->referrer);
        }
        else {         
            $text = $_POST['tekstas'];
            $userid= $_SESSION['userid'];
            $id = $_GET['id'];
        }
        $q = "INSERT INTO komentaras(vartotojo_id, tekstas, straipsnio_id) 
        VALUES ('$userid', '$text', '$id')";
        $database->query($q);
        header("Location: " . $session->referrer);
    }
    /**
     * procApproveArticle - approves article to be seen by users
     */
    function procApproveArticle()
    {        
        global $session, $database, $form;
        /* Errors exist, have user correct them */
        if ($form->num_errors > 0 && false) {
            $_SESSION['value_array'] = $_POST;
            $_SESSION['error_array'] = $form->getErrorArray();
            header("Location: " . $session->referrer);
        }
        else {         
            $id = $_POST['id'];
        }
        $q = "UPDATE straipsnis SET ar_tinkamas = '1' WHERE id = '$id'";
        $database->query($q);
        header("Location: " . $session->referrer);
    }
    /**
     * procDiscardArticle - discards article set it nonvisile to users
     */
    function procDiscardArticle()
    {        
        global $session, $database, $form;
        /* Errors exist, have user correct them */
        if ($form->num_errors > 0 && false) {
            $_SESSION['value_array'] = $_POST;
            $_SESSION['error_array'] = $form->getErrorArray();
            header("Location: " . $session->referrer);
        }
        else {         
            $id = $_POST['id'];
        }
        $q = "UPDATE straipsnis SET ar_tinkamas = '0' WHERE id = '$id'";
        $database->query($q);
        header("Location: " . $session->referrer);
    }
    /**
     * procInsertAnswer - inserts answer to comment into database =
     */
    function procInsertAnswer()
    {        
        global $session, $database, $form;
        /* Errors exist, have user correct them */
        if ($form->num_errors > 0 && false) {
            $_SESSION['value_array'] = $_POST;
            $_SESSION['error_array'] = $form->getErrorArray();
            header("Location: " . $session->referrer);
        }
        else {     
            $text = $_POST['ats_tekstas'];    
            $id = $_POST['id'];
            $userid= $_SESSION['userid'];
        }
        $q = "INSERT INTO komentaru_ats(autoriaus_id, tekstas, komentaro_id) 
        VALUES ('$userid', '$text', '$id')";
        $database->query($q);
        header("Location: " . $session->referrer);
    }
}  

/* Initialize process */
$process = new Process;
?>
