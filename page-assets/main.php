<main>
    <p>Bonjour.</p>


    <?php 
    
    require_once __DIR__ ."/functions.php";
    $scan = scandir(__DIR__."/../quizz-assets");
    foreach ($scan as $file) {
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

    }

    ?>
    

</main>