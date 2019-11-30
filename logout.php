<?php

include("include/session.php");
 /**
     * procLogout - Simply attempts to log the user out of the system
     * given that there is no logout form to process.
     */
        global $session;
        $retval = $session->logout();
        header("Location: index.php");
?>