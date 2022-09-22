<?php
// Include du router
require "../Altorouter/AltoRouter.php";

// Création du router
$rooter = new AltoRouter();

// Création des chemins
$rooter->map("GET", "/", function() {
    require "home.php";
}, "home");
$rooter->map("GET", "/connect", function() {
    require "connect.php";
}, "connect");
$rooter->map("POST", "/connect", function() {
    require "connect.php";
}, "connectReq");

// Application des routes
$matches = $rooter->match();

if (is_array($matches) AND is_callable($matches["target"])) {
    call_user_func_array($matches["target"], $matches["params"]);
} else {
    echo "Internal Server Error 500";
}
?>