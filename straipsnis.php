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
    function stoppedTyping() {
        var txt = document.getElementById("comment_text").value;
        if (txt.length > 0) {
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
            $id = $queries['id']; 
            $q = "UPDATE straipsnis SET perziuru_kiekis = perziuru_kiekis + 1 WHERE id = '$id'"; 
            $database->query($q);
        ?>

    <div class="container container-bg mb-3 pb-2">

        <div class="row justify-content-center py-4 ">
            <h1 class="text-center pb-2 "><?php echo $results[0]['pavadinimas'] ?></h1>
        </div>

        <div>
            <h6 class="text-center pb-5 ">Autorius: <?php echo $results[0]['autorius'] ?></h6>
        </div>

        <div class="row justify-content-center pb-4 mx-5">
            <p class="text-justify">
                <?php echo $results[0]['tekstas'] ?>
            </p>
        </div>
        <?php if ($results[0]['ar_tinkamas'] != '3' || $results[0]['ar_tinkamas'] != '0') {?>

        <div class="row justify-content-start pb-2 mx-5">
            <h4>Parašykite komentarą:</h4>
        </div>
        <form action="process.php?id=<?php echo $queries['id']?>" method="post">

            <div class="row justify-content-start mx-5">
                <textarea class="form-control" name="tekstas" id="comment_text" onkeyup="stoppedTyping()"></textarea>
            </div>

            <div class="row justify-content-end pb-3 pt-2 mx-5">
                <input type="hidden" name="incomment" value="1">
                <button disabled class="btn btn-submit" id="submit_comment">Pateikti</button>
            </div>
        </form>

        <?php   }
        if ($results[0]['komentaro_id'] != null){
      
        $previous = $results[0]['komentaro_id'];
        for($i = 0; $i < count($results); $i++)
        {
            if($i == 0 || $previous != $results[$i]['komentaro_id']){         
                $previous = $results[$i]['komentaro_id'];
                ?>


        <div class="card card_comment mb-3 px-5 mx-5">
            <div class="card-body">
                <div class="row justify-content-start">
                    <h6>
                        <?php
                                    echo $results[$i]['komentaro_autorius'];
                                ?>
                    </h6>
                </div>

                <div class="row justify-content-start">
                    <p class="text-justify">
                        <?php
                                    echo $results[$i]['komentaras'];
                                ?>
                    </p>
                </div>

                <div class="row justify-content-end pt-1">

                    <?php if ($session->isAdmin()) { ?>
                    <form action='./admin/adminprocess.php' method="post">
                        <div class="btn-group" role="group">
                            <button class="btn btn-submit">Pašalinti</button>
                            <input type="hidden" name="id" value="<?php echo $results[$i]['komentaro_id']; ?>">
                            <input type="hidden" name="delcomment" value="1">
                    </form>
                    <button class="btn btn-submit" type="button" data-toggle="collapse"
                        data-target="#collapse<?php echo $i ?>" aria-expanded="false"
                        aria-controls="collapse<?php echo $i ?>">Atsakyti
                    </button>
                </div>
                <?php } else{?>

                <button class="btn btn-submit" type="button" data-toggle="collapse"
                    data-target="#collapse<?php echo $i ?>" aria-expanded="false"
                    aria-controls="collapse<?php echo $i ?>">Atsakyti
                </button>
                <?php } ?>
            </div>
        </div>
    </div>




    <div class="collapse pl-5 ml-5 pb-3 pt-3 mx-5" id="collapse<?php echo $i ?>">
        <div class="card card_comment">
            <div class="card-body">
                <form action="process.php" method="post">
                    <h6 class="card-title">Atsakykite į komentarą, kurį parašė
                        <?php echo $results[$i]['komentaro_autorius']; ?>
                    </h6>
                    <p>
                        <textarea name="ats_tekstas" class="form-control"></textarea>
                    </p>
                    <button class="btn btn-submit">Pateikti atsakymą</button>
                    <input type="hidden" name="id" value="<?php echo $results[$i]['komentaro_id']; ?>">
                    <input type="hidden" name="inanswer" value="1">
                </form>
            </div>
        </div>
    </div>


    <?php if($results[$i]['atsakymo_komentaro_id'] != null){  ?>
    <div class="card card_answer mb-3 mr-5">
        <div class="card-body">
            <h6><?php echo $results[$i]['atsakymo_autorius']; ?></h6>

            <p class="text-justify">
                <?php echo $results[$i]['atsakymo_tekstas']; ?>
            </p>
            <?php if ($session->isAdmin()) { ?>
            <div class="row justify-content-end mx-5">
                <form action='./admin/adminprocess.php' method="post">
                    <button class="btn btn-submit">Pašalinti</button>
                    <input type="hidden" name="id" value="<?php echo $results[$i]['atsakymo_komentaro_id']; ?>">
                    <input type="hidden" name="delcomment_answer" value="1">
                </form>
            </div>
            <?php } ?>

        </div>
    </div>
    <?php  } } } }?>
    </div>
</body>

</html>
<?php } ?>