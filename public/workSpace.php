<?php
session_start();
require "../elements/general.php";
echo load("script");
if (isset($_COOKIE["_uci"], $_COOKIE["_ip"], $_SESSION["_uci"], $_SESSION["_ip"]) AND !mempty($_COOKIE["_uci"], $_COOKIE["_ip"], $_SESSION["_uci"], $_SESSION["_ip"])) {

} else {
    header("Location:/error1/");
}