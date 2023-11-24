<?php

session_start();// taadi des variables fi koll page
require "./DbConnect/index.php";

$page_titel = "page d'acceill";
$template = "";
$_SESSION['id']="hello";// remplit $session key id par value hello ( cappble de transfre data pour les pages)
include "./layout.phtml";


?>