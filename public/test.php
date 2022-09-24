<?php
require "../elements/general.php";
?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <style>
*{
    padding: 0px;
    margin: 0px;
    user-select: none;
}
#loadPage{
    width: 100vw;
    height: 100vh;
    background: #00000000;
    position: absolute;
    top: 0px;
    left: 0px;
    z-index: 99999;
    display: flex;
    justify-content: center;
    align-items: center;
}
    </style>
</head>
<body>
    <div id="loadPage">
        <img src="style/Icons/load.gif" id="load">
    </div>
</body>
</html>