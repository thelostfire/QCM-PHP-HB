<main>

    <?php 
    
    require_once __DIR__ ."/functions.php";
    $scan = scandirButBetter(__DIR__."/../quizz-assets");

    if (isset($_POST["choice"])) {
        if ($_POST["choice"]==true) {
            $_SESSION["score"]++;
        }
        $_SESSION["counter"]++;
    }

    if ($_SESSION["counter"]!= 4) {
       questionDisplay($_SESSION["counter"], $scan);
    }
    else echo "<form method='post'><button name='destroy'>YOU SUCK</button></form>";
    if (isset($_POST["destroy"])) {
        session_destroy();
    }


    /*if ($_SESSION["counter"]==0) {

        welcomePlayer();

    }
    else if($_SESSION["counter"]!=0) {
        questionDisplay($_SESSION["counter"]-1, $scan);
    }*/

    echo $_SESSION["counter"];
    echo $_SESSION["score"];

    /*foreach ($scan as $file) {
        if ($file != "."&& $file != "..") {
            ?> <form method="post"> <?php
            echo file_get_contents(__DIR__."/../quizz-assets/".$file."/question.php");
            $tabAff = json_decode(file_get_contents(__DIR__."/../quizz-assets/".$file."/answers.json"), true);
            echo "<ul>";
            foreach ($tabAff as $tab) {
                echo"<li><input type='radio' name='choice' value='".$tab["value"]."'>".$tab["name"]."</input></li>";
            }
            echo "</ul><button>Submiiit</button>";
            echo "</form>";
        }

    }*/

    ?>
    

</main>