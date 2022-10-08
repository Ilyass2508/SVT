<?php
session_start();
require "../elements/general.php";
if (isset($_COOKIE["_uci"], $_COOKIE["_ip"], $_SESSION["_uci"], $_SESSION["_ip"]) AND !mempty($_COOKIE["_uci"], $_COOKIE["_ip"], $_SESSION["_uci"], $_SESSION["_ip"])) {
    $info = [];
    $infoNoTrait = explode("&", $_COOKIE["_uci"]);
    foreach ($infoNoTrait as $value) {
        $infoTrait = explode("~", $value);
        $info[$infoTrait[0]] = $infoTrait[1];
    }
    $paramsReq = array($info["identif"], $info["mdp"]);
    $searchAccount = $bdd->prepare("SELECT * FROM members WHERE identif = ? AND mdp = ?");
    $searchAccount->execute($paramsReq);
    if ($searchAccount->fetch() != false) {?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Souche - <?= $info["nom"] . " " . $info["prenom"] ?> SVT</title>
    <base href="/">
    <link rel="stylesheet" type="text/css" href="style/CSS/workSpace.css">
</head>
<body>
    <?= load("script") ?>
    <div id="top_bar">
        <img src="style/Icons/logo.png" height="100px" id="logo">
        <button id="addFile">+</button>
        <button id="logout" onclick="window.location.href = 'logout/';">Déconnexion</button>
    </div>
    <div id="filesTitle">
        <p class="titleSub">Nom</p>
        <p class="titleSub">Type de fichier</p>
        <p class="titleSub">Date d'importation</p>
        <p class="titleSub">Action</p>
    </div>
    <div id="files">
        <p id="NoFile">Aucun fichier !</p>
    </div>
</body>
</html>
<?php
    } else {
        header("Location:/logout/");
    }
} else {
    header("Location:/error1/");
}