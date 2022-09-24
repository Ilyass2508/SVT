<?php
// Lancement des vars de sessions
session_start();

// Includes des funcs general
require "../elements/general.php";

// Création de la page d'erreur
$errorHtml = function($msg = "Vous n'avez pas accès à cette page...") {
    $load = load("script");
    return <<<ERRORHTML
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SVT Accès Interdit Ste-Ursule</title>
    <base href="/">
    <link rel="stylesheet" type="text/css" href="style/CSS/NoAccessPage.css">
</head>
<body>
    $load()
    <div id="ErrorMessage">
        <p>$msg</p>
        <p>Error Forbiden Access</p>
        <button id="returnHome" onclick="window.location.href = '/';">Retour à l'accueil &#8634;</button>
    </div>
</body>
</html>
ERRORHTML;
};

// Vérification et traitement des variables _POST
if (isset($_POST["https_CONNECTSubmit"]) && isset($_POST["https_CONNECTId"]) && isset($_POST["https_CONNECTMdp"])) {
    $id = htmlspecialchars($_POST["https_CONNECTId"]);
    $mdp = sha1(htmlspecialchars($_POST["https_CONNECTMdp"]));
    $bdd = new PDO('sqlite:bdd.db');
    if (!mempty($id, $mdp)) {
        $req = $bdd->prepare("SELECT * FROM members WHERE identif = '".$id."' AND mdp = '".$mdp."'");
        $req->execute();
        if (count($req->fetchAll()) > 0) {
            echo load("script");
            $req->execute();
            $_uci = "";
            foreach ($req->fetch() as $key => $value) {
                if ($_uci === "") {
                    $_uci = $key . "~" . $value;
                } else {
                    $_uci.="&".$key."~".$value;
                }
            }
            setcookie("_uci", $_uci, time() + 60*24*365, "/");
            setcookie("_ip", getIp(), time() + 60*24*365, "/");
        } else {
            echo $errorHtml("Identifiant ou mot de passe incorrect !");
        }
    } else {
        echo $errorHtml("Tous les champs doivent êtres remplies !");
    }
} else {
    echo $errorHtml();
}
?>