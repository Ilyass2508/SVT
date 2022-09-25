<?php
session_start();
require "../elements/general.php";
if (isset($error) AND !empty($error)) {
    switch ($error) {
        case 1:
            $msg = "Une erreur est survenue !";
            break;
        
        case 2:
            $msg = "Tous les champs doivent êtres rempli !";
            break;

        case 3:
            $msg = "Identifiant ou mot de passe incorrect !";
            break;
    }
?>
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
    <?= load("script") ?>
    <div id="ErrorMessage">
        <p><?= $msg ?></p>
        <button id="returnHome" onclick="window.location.href = '/';">Retour à l'accueil &#8634;</button>
    </div>
</body>
</html>
<?php
} else {
    header("Location:/");
}