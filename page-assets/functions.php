<?php


/**
 * Summary of welcomePlayer
 * 
 * fonction chargée d'afficher le début du quizz où on appuie sur un bon gros bouton pour commencer après avoir entré son nom
 * @return void pas de return
 */
function welcomePlayer() {
    ?> 
    <h2>Bienvenue</h2>
    <form method="post">
        <label for="nameSelect">Entrez votre nom</label>
        <input type="text" name="start" >
        <button>Commencer</button>
    </form>
    <?php
}



/**
 * Summary of questionDisplay
 * 
 * fonction qui permet d'afficher un questionnaire sous forme de QCM
 * @param int $tabValue indice du tableau où l'on va chercher les questions/réponses
 * @param array $tabBloup tableau dans lequel on va chercher les questions/réponses
 * @return void
 */
function questionDisplay(int $tabValue, array $tabBloup) {
    ?> <form method="post"> <?php
            echo file_get_contents(__DIR__."/../quizz-assets/".$tabBloup[$tabValue]."/question.php");
            $tabAff = json_decode(file_get_contents(__DIR__."/../quizz-assets/".$tabBloup[$tabValue]."/answers.json"), true);
            echo "<ul>";
            foreach ($tabAff as $tab) {
                echo"<li><input type='radio' name='choice' value='".$tab["value"]."'>".$tab["name"]."</input></li>";
            }
            ?> </ul><button>Validay</button></form><?php

}

/**
 * Summary of quizzEnd
 * Fonction qui s'occupe d'afficher la fin du quizz, avec le score, un petit message selon le score, et
 * la possibilité de recommencer le quizz en cliquant sur un bouton
 * @param string $name Nom du joueur / de la joueuse
 * @param int $score le score du quizz
 * @return void on retourne rien
 */
function quizzEnd(string $name, int $score) {
    ?>
    <h2>Vous avez terminé ce quizz !</h2>
    <h3>Votre score est de <?=$score?>/10</h3>
    <?php 
        if ($score == 10) {
            echo "Félicitations !";
        }
        elseif ($score > 6) {
            echo "Bravo !";
        }
        elseif ($score > 3) {
            echo "Acceptable";
        }
        elseif ($score > 0) {
            echo "Retravailler tout ça";
        }
        else echo "WTF";
    ?>
    <form method='post'>
        <button name='destroy'>END</button>
    </form>

    <?php
}


/**
 * Summary of scandirButBetter
 * 
 * fonction qui fait un scandir en virant les dossiers "." et ".."
 * @param string $path le chemin vers le dossier
 * @return array retourne un tableau scandir sans lesdits dossiers "." et ".."
 */
function scandirButBetter(string $path) {
    $tab = [];
    $scandaube = scandir($path);
    foreach( $scandaube as $file ) {
        if ($file != "."&& $file != "..") {
            $tab[]=$file;
        }
    }
    return $tab;
}