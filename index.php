<?php
session_start();

if (!isset($_SESSION["counter"])) {
    $_SESSION["counter"] = 0;
}
if (!isset($_SESSION["score"])) {
    $_SESSION["score"] = 0;
}

if (!isset($_SESSION["playerName"])) {
    $_SESSION["playerName"] = "";
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
          <link rel="stylesheet" href="/styles.css">
    <title>QCM FT11 FPE</title>
</head>
<body>
    <?php

    
    require __DIR__ . "/page-assets/header.php";

    require __DIR__ . "/page-assets/main.php";

    require __DIR__ . "/page-assets/footer.php";

    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
</body>
</html>



<?php 

