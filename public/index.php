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
$rooter->map("GET", "/[*:u]/[i:id]", function($u, $id) {
    require "workSpace.php";
});
$rooter->map("GET", "/error[i:error]/", function($error) {
    require "error.php";
});
$rooter->map("GET", "/logout/", function() {
require "../elements/general.php";
session_start();
    echo load();
    foreach ($_COOKIE as $k => $v) {
        setcookie($k, "", time(), "/");
    }
    session_destroy();
    header("Location:/");
}, "logout");

// Application des routes
$matches = $rooter->match();

if (is_array($matches) AND is_callable($matches["target"])) {
    call_user_func_array($matches["target"], $matches["params"]);
} else {
    echo "Internal Server Error 500";
}
?>