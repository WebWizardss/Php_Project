<?php

session_start();// taadi des variables fi koll page
require "./DbConnect/index.php";
$page_titel = "page d'acceill";

// if(!isset($_SESSION['lang'])){
//     $_SESSION['lang']='en';
// }

if(!isset($_SESSION['carte'])){
    $_SESSION['carte']=array();
}else{
    $_SESSION['carte']=$_SESSION['carte'];
}


// require_once "./languages/".$_SESSION['lang'].".php";

$res = $db->prepare("select * from categories");
$res->execute();
$categories = $res->fetchAll();

$template = "";
include "./layout.phtml";


?>