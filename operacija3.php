<?php
include("include/session.php");
//Jei prisijunges Administratorius ar Valdytojas vykdomas operacija3 kodas
if ($session->logged_in && ($session->isAdmin() || $session->isManager())) {
    ?>    
<html>  
    <head>  
        <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8"/> 
        <title>Straipnsių sąrašas</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="include/styles.css" rel="stylesheet" type="text/css" />

    </head>
        <body>       

            <?php
            include("include/meniu.php");
            ?>   
            
            <table>
                <thead>
                    <tr>
                    <th colspan="3">Straipsni sarašas</th>
                    </tr>
                    <tr>
                    <th>#</th>
                    <th colspan="2">Atividade</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                        <td>1</td>
                        <td>Atualizar página da equipe</td>
                        <td>
                            <i class="material-icons button edit">edit</i>
                            <i class="material-icons button delete">delete</i>
                        </td>
                        </tr>
                        <tr>
                        <td>2</td>
                        <td>Design da nova marca</td>
                        <td>
                            <i class="material-icons button edit">edit</i>
                            <i class="material-icons button delete">delete</i>
                        </td>
                        </tr>
                        <tr>
                        <td>3</td>
                        <td>Encontrar desenvolvedor front-end</td>
                        <td>
                            <i class="material-icons button edit">edit</i>
                            <i class="material-icons button delete">delete</i>
                        </td>
                        </tr>
                </tbody>
            </table>
                            
        </body>
</html>
    <?php
    //Jei vartotojas neprisijungęs arba prisijunges, bet ne Administratorius 
    //ar ne Valdytojas - užkraunamas pradinis puslapis   
} else {
    header("Location: index.php");
}
?>

