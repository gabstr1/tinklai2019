<?php
include("include/session.php");
 if ($session->logged_in) {
//Jei vartotojas neprisijungęs, užkraunamas  puslapis tik su trumpais straipsnių aprašais 
?>

<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8" />
    <title>Straipsnio įkėlimas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link href="include/styles.css" rel="stylesheet" type="text/css" />
    <script>
        function stoppedTyping() {
            var txt = document.getElementById("insert_article").value;
            if (txt.length > 0) {
                document.getElementById('submit_article').disabled = false;
            } 
            else {
                document.getElementById('submit_article').disabled = true;
            }
    }
    </script>
</head>

    <body>

        <?php
                include("include/meniu.php");
            ?>

        <div class="container container-bg">
            <form action='process.php' method="post">
                <div class="row justify-content-center pt-3 pb-5 mx-5">
                    <h1>Straipsnio įkėlimas</h1>
                </div>          

                <div class="row">
                    <div class="col justify-content-start pt-3 mx-5">
                        <h5>Įrašykite pavadinimą:</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col justify-content-start pt- mx-5 align-middle">
                        <input type="text" class="form-control" name="pavadinimas" placeholder="Straipsnio pavadinimas">
                    </div>
                </div>

                <div class="row justify-content-center pt-3 pb-2 mx-5">
                    <textarea class="form-control" name="tekstas" placeholder="Įkelkite straipsnio tekstą čia..."
                        rows="30"></textarea>
                </div>

                <div class="row justify-content-end pt-3 pb-5 mx-5">
                    <button class="btn btn-submit" >Pateikti</button>
                    <input type="hidden" name="inarticle" value="1">
                </div>
            </form>
    </body>
</html>
<?php }?>
