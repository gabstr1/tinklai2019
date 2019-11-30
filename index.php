<?php
include("include/session.php");
?>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8"/>
        <title>Žurnalo redakcijos sistema</title>        
        <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8"/> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link href="include/styles.css" rel="stylesheet" type="text/css" />
    </head>

    <body>                   
            <?php
            //Jei vartotojas prisijungęs
            if ($session->logged_in) {
                include("include/meniu.php");
            ?>

            <div class="jumbotron">
                <h1 class="display-4">Sveiki!</h1>
                <p class="lead">Jūs lankotės žurnalo redakcijos sistemos pradžios puslapyje</p>
            </div>
                
            <?php
                //Jei vartotojas neprisijungęs, rodoma prisijungimo forma
                //Jei atsiranda klaidų, rodomi pranešimai.
            } else {
                echo "<div align=\"center\">";
                if ($form->num_errors > 0) {
                    echo "<font size=\"3\" color=\"#ff0000\">Klaidų: " . $form->num_errors . "</font>";
                }
               // echo "<table class=\"center\"><tr><td>";
                include("include/loginForm.php");
                //echo "</td></tr></table></div><br></td></tr>";
            }
            echo "<tr><td>";
            echo "</td></tr>";
            ?>
        </td></tr>
        <div id="footer"><?php if ($session) { include("include/footer.php"); } ?>
        </div>

    </body>
</html>