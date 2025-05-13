<?php


/**
 * Summary of welcomePlayer
 * 
 * fonction chargée d'afficher un formulaire pour entrer le nom du joueur
 * @return void
 */
function welcomePlayer() {
    $name = "";
    ?> 
    <h2>Bienvenue</h2>
    <form method="post">
        <label for="nameSelect">Entrez votre nom</label>
        <input type="text" name="choice" >
        <button>Sub-mite</button>
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