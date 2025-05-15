<main>
    <div class="container-fluid py-5">

    <?php 
    
    require_once __DIR__ ."/functions.php";
    $scan = scandirButBetter(__DIR__."/../quizz-assets");
    shuffle($scan);
    if (!isset($_SESSION["scan"])) {
        
        $_SESSION["scan"] = $scan;
    }

    if (isset($_POST["destroy"])) {
        session_destroy();
        header("Location: /");
        exit();
    }

    if (isset($_POST["start"])) {
        $_SESSION["playerName"] = $_POST["start"];
    }
    
    if (isset($_POST["choice"]) || !empty($_POST["start"])) {
        if (isset($_POST["choice"]) && $_POST["choice"]) {
            $_SESSION["score"]++;
        }
        $_SESSION["counter"]++;
    }

    if ($_SESSION["counter"] == 0) {
        quizzBegin();
    }
    elseif ($_SESSION["counter"] == count($_SESSION["scan"]) + 1) {
        quizzEnd($_SESSION["playerName"], $_SESSION["score"]);
    }
    else {
       quizzDisplay($_SESSION["counter"]-1, $_SESSION["scan"]);
    }

    

    ?>
    
    </div>

</main>