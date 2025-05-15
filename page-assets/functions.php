<?php


/**
 * Summary of welcomePlayer
 * 
 * fonction chargée d'afficher le début du quizz où on appuie sur un bon gros bouton pour commencer après avoir entré son nom
 * @return void pas de return
 */
function quizzBegin() {
    ?> 
    <h2>Bienvenue</h2>
    <form method="post" class="w-50 m-auto">
        <label class ="d-block mb-3" for="nameSelect">Entrez votre nom</label>
        <input class="d-block mb-3" type="text" name="start" >
        <button class="btn btn-warning ">Commencer</button>
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
function quizzDisplay(int $tabValue, array $tabBloup) {
    ?> <form method="post" class="w-50 m-auto "> <?php
            echo file_get_contents(__DIR__."/../quizz-assets/".$tabBloup[$tabValue]."/question.php");
            $tabAff = json_decode(file_get_contents(__DIR__."/../quizz-assets/".$tabBloup[$tabValue]."/answers.json"), true);
            echo "<ul>";
            foreach ($tabAff as $tab) {
                echo"<li><input type='radio' name='choice' value='".$tab["value"]."'>".$tab["name"]."</input></li>";
            }
            ?> </ul><button class="btn next">Suivant</button></form><?php

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
    ?><div class="container-fluid container-quizz-end">
    <h2>Vous avez terminé ce quizz, <?=$name?> !</h2>
    <h3>Votre score est de <?=$score?>/10</h3>
    <?php 
        if ($score == 10) {
            echo "<p class='perfect'>Félicitations ! C'est un sans faute, vous êtes prêt pour Polytechnique ! Ou plus ! Le ciel est votre limite !</p>";
        }
        elseif ($score > 6) {
            echo "<p class='good'>Bravo ! C'est un score honorable, vous y étiez presque ! Malheuresement l'histoire ne se souvient
            que de ceux qui ont gagné, jamais de ceux qui ont 'presque' réussi.</p>";
        }
        elseif ($score > 3) {
            echo "<p class='decent'>Un résultat à retravailler. Peut-être pourriez-vous prendre inspiration sur un forum ?</p>";
        }
        elseif ($score > 0) {
            echo "<p class='bad'>Ma foi, ça manque de sérieux tout ça. Il va vraiment falloir revoir les fondamentaux,
            je vous enverrai un lien vers l'achat de mon essai en 8 volumes sur la réussite d'un QCM.</p>";
        }
        else echo "<p class='verybad'>Alors. C'est pas fou. C'est pas fou du tout. Mais voyons le bon côté des choses, vous ne pouvez pas faire pire !</p>";
    ?>
    <form method='post' class="w-25 m-auto">
        <button name='destroy' class="btn end">Terminer</button>
    </form>
    </div>

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