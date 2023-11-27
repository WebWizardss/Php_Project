<?php 
session_start();
require_once "../Dbconnect/index.php";

$res = $db->prepare("select * from users");
$res->execute();
$users = $res->fetchAll();

$page_titel = "interface admin";
$template = "listusers";
include "../layout.phtml";
?>