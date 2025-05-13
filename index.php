<?php
session_start();

if (!isset($_SESSION["counter"])) {
    $_SESSION["counter"] = 0;
}
if (!isset($_SESSION["score"])) {
    $_SESSION["score"] = 0;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QCM Système Solaire</title>
</head>
<body>
    <?php

    
    require __DIR__ . "/page-assets/header.php";

    require __DIR__ . "/page-assets/main.php";

    require __DIR__ . "/page-assets/footer.php";

    ?>
    
</body>
</html>



<?php 

if($_SESSION["counter"]==4) {
    session_destroy();
}