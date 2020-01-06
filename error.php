<?php
include("include/session.php");
//Formuojamas meniu.
if (isset($session)) {
    $path = "";
    if (isset($_SESSION['path'])) {
        $path = $_SESSION['path'];
        unset($_SESSION['path']);
    }
}
include("include/meniu.php");
?>   

<meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8"/> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link href="include/styles.css" rel="stylesheet" type="text/css" />

<div class="jumbotron jumbotron-error">
  <h1 class="display-4 text-danger">KLAIDA!</h1>
  <p class="lead">Jūs bandėte pateikti straipsnį, kurio turinys yra tuščias.</p>
  <hr class="my-4">
  <p>Jeigu norite įkelti straipsnį, turite užpildyti visus laukus.</p>
  <p class="lead">
    <a class="btn btn-guest" href="upload_article.php" role="button">Grįžti</a>
  </p>
</div>

