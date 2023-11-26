<?php

session_start();// taadi des variables fi koll page
session_destroy();
require "./DbConnect/index.php";
unset($_SESSION['id']);
$page_titel = "page d'acceill";
$template = "";
// $_SESSION['id']="hello";// remplit $session key id par value hello ( cappble de transfre data pour les pages)
include "./layout.phtml";


?>