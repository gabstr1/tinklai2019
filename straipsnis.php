<?php
include("include/session.php");

// if ($session->logged_in) {
//Jei vartotojas neprisijungęs, užkraunamas  puslapis tik su trumpais straipsnių aprašais 
?>

<html>

    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8" />
        <title>Operacija1</title>

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

    <body>

        <?php
            include("include/meniu.php");
            global $database;
            // $results = $database->getStraipsniai(); 
        ?>

        <div class="container container-bg">

            <div class="row justify-content-center py-4 ">          
            </div>

            <div>
                <h6 class="text-center pb-5 ">Autorius: Autorius Pirmas</h6>
            </div>

            <div class="d-flex justify-content-center pb-4 mx-5">
                <p class="text-justify">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum arcu ante, posuere eu turpis et,
                    aliquam malesuada nibh. Donec tincidunt tortor sed sodales viverra. Nam venenatis eros sed ligula
                    sollicitudin laoreet. Quisque consequat nulla eu pretium viverra. Sed tristique in ex sed pretium. Sed
                    semper est ligula, sit amet bibendum ante mollis et. Nulla elementum felis non ultrices convallis. Nunc
                    convallis venenatis purus eu eleifend. Integer tincidunt leo a sem dignissim tristique. Nam euismod
                    iaculis venenatis. Maecenas tempus ac nisi at dignissim.

                    Pellentesque vitae condimentum dolor, blandit egestas tortor. Nulla sagittis urna non volutpat
                    pellentesque. Ut blandit venenatis pharetra. Fusce commodo risus nisi, eu varius neque accumsan et. Duis
                    urna dui, dapibus non commodo eget, tincidunt a sem. Ut dapibus neque id lorem ultrices feugiat. In
                    vehicula leo eget nisl porttitor, vitae tempor lorem faucibus. Vivamus sed nisl massa. Maecenas
                    suscipit, urna pellentesque aliquet gravida, ex neque placerat nulla, vel pharetra lacus augue vitae
                    dolor. Praesent faucibus condimentum augue, eget pellentesque diam consectetur dignissim. Integer in
                    auctor nulla. Sed id nulla ultrices, tempor felis in, rutrum mi. Pellentesque luctus nibh vitae
                    scelerisque facilisis.`

                    Quisque non pellentesque lorem. Etiam porttitor libero nisl, sed eleifend ipsum efficitur id. Aliquam
                    erat volutpat. Proin tempor neque eget molestie imperdiet. Cras ut nibh vel mauris facilisis blandit ut
                    faucibus ante. Suspendisse efficitur gravida pulvinar. Quisque quis tempor felis. Fusce ornare fringilla
                    nisi, non fringilla turpis mollis vitae. Cras gravida ac leo eget tincidunt. Proin accumsan vel magna
                    vel cursus. Phasellus euismod pharetra diam quis laoreet. Etiam vulputate mauris vitae velit aliquet, eu
                    mattis urna interdum. Pellentesque quis sem eget erat mollis eleifend.

                    Cras in risus id dui accumsan molestie sed vitae turpis. Morbi id ipsum laoreet, accumsan urna ac,
                    interdum mi. Morbi sit amet ipsum molestie, tincidunt nulla at, sodales odio. Cras ut hendrerit tortor.
                    Suspendisse massa lorem, pulvinar in tincidunt in, pharetra eu augue. Fusce interdum mattis ullamcorper.
                    Praesent iaculis pellentesque sapien, nec vulputate nisl fringilla dignissim. Phasellus auctor, neque id
                    porttitor rutrum, nunc augue volutpat turpis, ac aliquet risus risus nec eros. Nunc vestibulum neque ut
                    auctor vehicula. Interdum et malesuada fames ac ante ipsum primis in faucibus. In sed faucibus lectus.

                    Donec mattis sapien nunc, vel scelerisque dolor interdum vitae. Nullam mollis convallis urna ac finibus.
                    Nunc ullamcorper iaculis malesuada. Mauris sollicitudin aliquam sem, eu efficitur augue rhoncus eu.
                    Nulla sagittis laoreet lacus eu elementum. Quisque pretium malesuada varius. Vivamus molestie commodo
                    metus in vulputate. Cras scelerisque ultrices pharetra.
                </p>
            </div>

            <div class="d-flex justify-content-start pb-2 mx-5">
                <h4>Parašykite komentarą:</h4>
            </div>

            <div class="d-flex justify-content-start mx-5">
                <textarea class="form-control" id="exampleFormControlTextarea1"></textarea>
            </div>

            <div class="d-flex justify-content-end pb-3 pt-2 mx-5">
                <a class="btn btn-submit" href="#" role="button">Pateikti</a>
            </div>

            <div class="d-flex justify-content-start pb-2 mx-5">
                <h6>Autorius Antras</h6>
            </div>

            <div class="d-flex justify-content-start mx-5">
                <p class="text-justify">Cras ut nibh vel mauris facilisis blandit ut faucibus ante. Suspendisse efficitur
                    gravida pulvinar. Quisque quis tempor felis. Fusce ornare fringilla nisi, non fringilla turpis mollis
                    vitae. Cras gravida ac leo eget tincidunt. Proin accumsan vel magna vel cursus. Phasellus euismod
                    pharetra diam quis laoreet.</p>
            </div>

            <div class="d-flex justify-content-end pt-1 pb-3 mx-5">
                <a class="btn btn-answer" href="#" role="button">Atsakyti</a>
            </div>


        </div>

    </body>

</html>