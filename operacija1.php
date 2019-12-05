<?php
    //Jei vartotojas neprisijungęs, užkraunamas  puslapis tik su trumpais straipsnių aprašais 
?>
<?php
include("include/session.php");

?>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8" />
    <title>Straipsniai</title>
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
</head>

<body class="test">
    <?php
        include("include/meniu.php");
        global $database;
        $results = $database->getStraipsniai();     
        ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <h1 class="my-4">Straipsniai</h1>
        <?php for($i = 0; $i<count($results); $i++){ ?>
        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card-articles h-30">
                    <div class="card-body">
                        <h4 class="card-title">
                            <a><?php echo $results[$i]['pavadinimas']; ?></a>
                        </h4>
                        <p class="card-text"> <?php echo substr($results[$i]['tekstas'],0,250); ?>... </p>
                        
                            <form action="straipsnis.php?id=<?php  echo $results[$i]['id']; ?> method=" post>

                                <?php if($session->logged_in) { ?>
                                    <form action="process.php" method="post">
                                    <a href="straipsnis.php?id=<?php  echo $results[$i]['id']; ?>">Skaityti toliau</a>
                                    <input type="hidden" name="id" value="<?php echo $results[$i]['id']; ?>">
                                    <input type="hidden" name="inviews" value="1">
                                    </form>
                                
                                <?php } ?>

                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
</body>

</html>