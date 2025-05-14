<main>

    <?php 
    
    require_once __DIR__ ."/functions.php";
    $scan = scandirButBetter(__DIR__."/../quizz-assets");
    echo count($scan);


    if (isset($_POST["destroy"])) {
        session_destroy();
        header("Location: /");
        exit();
    }
    
    if (isset($_POST["choice"]) || !empty($_POST["start"])) {
        if (isset($_POST["choice"]) && $_POST["choice"]) {
            $_SESSION["score"]++;
        }
        $_SESSION["counter"]++;
    }

    if ($_SESSION["counter"] == 0) {
        welcomePlayer();
    }
    elseif ($_SESSION["counter"] == count($scan) + 1) {
        quizzEnd("Chose", $_SESSION["score"]);
    }
    else {
       questionDisplay($_SESSION["counter"]-1, $scan);
    }

    echo $_SESSION["counter"];
    echo $_SESSION["score"];

    

    ?>
    

</main>