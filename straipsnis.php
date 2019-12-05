<?php
include("include/session.php");

if ($session->logged_in) {
//Jei vartotojas neprisijungęs, užkraunamas  puslapis tik su trumpais straipsnių aprašais 
?>

<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8" />
    <title>Straipsnis</title>

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
        function stoppedTyping(){
            var txt = document.getElementById("comment_text").value;
            if(txt.length > 0) { 
                document.getElementById('submit_comment').disabled = false; 
            } else { 
                document.getElementById('submit_comment').disabled = true;
            }
        }
    </script>
</head>

<body>

    <?php
            include("include/meniu.php");
            global $database;
            $queries = array(); 
            parse_str($_SERVER['QUERY_STRING'],$queries); 
            $results = $database->getStraipsnis($queries['id']); 
        ?>
    <div class="container container-bg">

        <div class="row justify-content-center py-4 ">
            <h1 class="text-center pb-2 "><?php echo $results[0]['pavadinimas'] ?></h1>
        </div>

        <div>
            <h6 class="text-center pb-5 ">Autorius: <?php echo $results[0]['autorius'] ?></h6>
        </div>

        <div class="d-flex justify-content-center pb-4 mx-5">
            <p class="text-justify">
                <?php echo $results[0]['tekstas'] ?>
            </p>
        </div>

        <div class="d-flex justify-content-start pb-2 mx-5">
            <h4>Parašykite komentarą:</h4>
        </div>
        <form action="process.php?id=<?php echo $queries['id']?>" method="post">

            <div class="d-flex justify-content-start mx-5">
                <textarea class="form-control" name="tekstas" id="comment_text" onkeyup="stoppedTyping()"></textarea>
            </div>

            <div class="d-flex justify-content-end pb-3 pt-2 mx-5">
                <input type="hidden" name="incomment" value="1">
                <button disabled class="btn btn-submit" id="submit_comment">Pateikti</button>
            </div>
        </form>

        <?php
        for($i = 0; $i < count($results); $i++)
        {
        ?>

        <div class="d-flex justify-content-start pb-2 mx-5">
            <h6>
                <?php
                    echo $results[$i]['komentaro_autorius'];
                 ?>
            </h6>
        </div>

        <div class="d-flex justify-content-start mx-5">
            <p class="text-justify">
                <?php
                    echo $results[$i]['komentaras'];
                ?>
            </p>
        </div>


        <div class="d-flex justify-content-end pt-1 pb-3 mx-5">
            <button class="btn btn-submit" type="button" data-toggle="collapse" data-target="#collapse<?php echo $i ?>"
                        aria-expanded="false" aria-controls="collapse<?php echo $i ?>">                Atsakyti
            </button>
        </div>
        

        <div class="row pt-1 pb-3 mx-5">

            <div class="collapse" id="collapse<?php echo $i ?>">
                <div class="card card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                </div>
            </div>
        </div>
        <?php } ?>

    </div>

</body>

</html>
<?php } ?>