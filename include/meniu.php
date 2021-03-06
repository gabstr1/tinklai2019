<?php
//Formuojamas meniu.

if (isset($session) && $session->logged_in) {
    $path = "";
    if (isset($_SESSION['path'])) {
        $path = $_SESSION['path'];
        unset($_SESSION['path']);
    }
}
?>

<nav class="navbar navbar-light navbar-expand-lg">
    <?php  if ($session->logged_in) { ?>
        <a class="navbar-brand" href="index.php">
    <?php } ?>
        <a class="navbar-brand" href="guest_page.php">
            <img src="../pictures/news_icon.svg" width="30" height="30" class="d-inline-block align-top" alt="">
            Žurnalo redakcijos sistema
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="operacija1.php">Skaityti straipsnius</a>
                </li>
                <li class="nav-item active">
                    <?php  if ($session->logged_in) { ?>
                    <a class="nav-link" href="my_articles.php">Mano straipsniai</a>
                    <?php } ?>
                </li>
                <li class="nav-item active">
                    <?php  if ($session->logged_in) { ?>
                    <a class="nav-link" href="upload_article.php">Įkelti naują</a>
                    <?php } ?>
                </li>
                <li class="nav-item active">
                    <?php  if ($session->logged_in && ($session->isAdmin() || $session->isManager())) { ?>
                    <a class="nav-link" href="operacija3.php">Straipsnių sąrašas</a>
                    <?php } ?>
                </li>
                <li class="nav-item active">
                    <?php  if ($session->logged_in && ($session->isAdmin() || $session->isManager())) { ?>
                    <a class="nav-link" href="requests.php">Straipsnių užklausos</a>
                    <?php } ?>
                </li>
            </ul>
            <span class="navbar-text">
                Dabar lankotės puslapyje kaip: <?php echo $_SESSION['username'] ?>
            </span> &nbsp;&nbsp;
            <form class="form-inline my-2 my-lg-0">

                <?php  if ($session->logged_in) { ?>
                <a href="logout.php" class="btn btn-dark my-2 my-sm-0 logout_btn"> Atsijungti </a>
                <?php } else {?>
                <a href="index.php" class="btn btn-dark my-2 my-sm-0 logout_btn">Prisijungti</a>
                <?php } ?>
            </form>
            </form>
        </div>
</nav>