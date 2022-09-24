<?php
session_start();
require "../elements/general.php";
?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion SVT Ste-Ursule</title>
    <base href="/">
    <link rel="stylesheet" type="text/css" href="style/CSS/home.css">
</head>
<body>
    <?= load("script") ?>
    <div id="connectSpace">
        <form action="connect" method="POST">
            <div class="input">
                <p class="label">Identifiant :</p>
                <input type="text" autocomplete="off" name="https_CONNECTId" class="inputText">
            </div>
            <div class="input">
                <p class="label">Mot de passe :</p>
                <input type="password" autocomplete="off" name="https_CONNECTMdp" class="inputText">
            </div>
            <button type="submit" name="https_CONNECTSubmit" id="submit">Connexion</button>
        </form>
    </div>
</body>
</html>