<?php
function mempty() {
    foreach (func_get_args() as $arg):
        if (empty($arg)) {
            continue;
        } else {
            return false;
        }
    endforeach;
    return true;
}
function getIp() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
function load($arg = "") {
    if ($arg === "script") {
        return <<<L
    <style id="sLoadPage">
*{
    padding: 0px;
    margin: 0px;
    user-select: none;
}
#loadPage{
    width: 100vw;
    height: 100vh;
    background: #fff;
    position: absolute;
    top: 0px;
    left: 0px;
    z-index: 99999;
    display: flex;
    justify-content: center;
    align-items: center;
}
    </style>
    <div id="loadPage">
        <img src="style/Icons/load.gif" id="load">
    </div>
    <script>
        window.onload = () => {
            setTimeout(() => {
                document.getElementById("loadPage").style.opacity = "0";
                document.getElementById("loadPage").style.transition = "all 0.4s ease";
                setTimeout(() => {
                    document.getElementById("loadPage").remove();
                    document.getElementById("sLoadPage").remove();
                }, 400);
            }, 1000);
        }
    </script>
L;
    } else {
        return <<<L
    <style id="sLoadPage">
*{
    padding: 0px;
    margin: 0px;
    user-select: none;
}
#loadPage{
    width: 100vw;
    height: 100vh;
    background: #fff;
    position: absolute;
    top: 0px;
    left: 0px;
    z-index: 99999;
    display: flex;
    justify-content: center;
    align-items: center;
}
    </style>
    <div id="loadPage">
        <img src="style/Icons/load.gif" id="load">
    </div>
L;
    }
};