<?php
include("include/session.php");
//Jei prisijunges Redaktorius ar Valdytojas vykdomas operacija3 kodas
if ($session->logged_in && ($session->isAdmin() || $session->isManager())) {
    ?>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8" />
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Straipnsių užklausos</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="bootstrap-checkbox.min.js" defer></script>
    <link href="include/styles.css" rel="stylesheet" type="text/css" />

</head>

<body>
    <?php
            include("include/meniu.php");
            global $database;
            $results = $database->getNaujuStraipsniuSarasas();
            ?>
    <h1 class="my-5">Straipsnių užklausos</h1>
    <div class="row row_sarasas my-5">
        <div class="table-responsive table-straipsniai table-hover">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Pavadinimas</th>
                        <th scope="col">Autorius</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php  for($i=0; $i<count($results); $i++){  ?>
                    <tr>
                        <td>
                            <a href="straipsnis.php?id=<?php  echo $results[$i]['id'];  ?>">
                                <?php  echo $results[$i]['pavadinimas'] ?>
                            </a>
                        </td>
                        <td><?php  echo $results[$i]['autorius'] ?></td>
                        <form action='process.php' method="post">
                            <td>
                                <button class="btn btn-check" type="submit">Patvirtinti</button>
                                <input type="hidden" name="id" value="<?php echo $results[$i]['id']; ?>">
                                <input type="hidden" name="aparticle" value="1">
                            </td>
                        </form>
                        <form action='process.php' method="post">
                            <td>
                                <button class="btn btn-check" type="submit">Atmesti</button>
                                <input type="hidden" name="id" value="<?php echo $results[$i]['id']; ?>">
                                <input type="hidden" name="disarticle" value="1">
                            </td>
                        </form>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
<?php   } ?>