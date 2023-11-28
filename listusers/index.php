<?php 
session_start();
require_once "../Dbconnect/index.php";

$res = $db->prepare("select * from users where IsAdmin=0");
$res->execute();
$users = $res->fetchAll();

$page_titel = "interface admin";
$template = "listusers";
include "../layout.phtml";
?>