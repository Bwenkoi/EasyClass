<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!(isset($_SESSION['login']) && $_SESSION['login'] != '')){

    header("Location: login.php");

} else {
    header("Location: home.php");
}