<?php
// Lancement des vars de sessions
session_start();

// Includes des funcs general
require "../elements/general.php";

// Vérification et traitement des variables _POST
if (isset($_POST["https_CONNECTSubmit"]) && isset($_POST["https_CONNECTId"]) && isset($_POST["https_CONNECTMdp"])) {
    $id = htmlspecialchars($_POST["https_CONNECTId"]);
    $mdp = sha1(htmlspecialchars($_POST["https_CONNECTMdp"]));
    if (!mempty($id, $mdp)) {
        $req = $bdd->prepare("SELECT * FROM members WHERE identif = '".$id."' AND mdp = '".$mdp."'");
        $req->execute();
        if (count($req->fetchAll()) > 0) {
            echo load();
            $req->execute();
            $info = $req->fetch();
            $_uci = "";
            foreach ($info as $key => $value) {
                if ($_uci === "") {
                    $_uci = $key . "~" . $value;
                } else {
                    $_uci.="&".$key."~".$value;
                }
            }
            setcookie("_uci", $_uci, time() + 60*24*365, "/");
            setcookie("_ip", getIp(), time() + 60*24*365, "/");
            $_SESSION["_uci"] = $_uci;
            $_SESSION["_ip"] = getIp();
            sleep(1);
            header("Location:/" . str_replace(".", "-", $info["identif"]) . "/" . $info["id"]);
        } else {
            header("Location:/error3/");
        }
    } else {
        header("Location:/error2/");
    }
} else {
    header("Location:/error1/");
}
?>