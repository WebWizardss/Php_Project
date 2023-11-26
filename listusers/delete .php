<?php 
require_once "../DbConnect/index.php";
var_dump("done");

$res = $db->prepare("DELETE from users where id=:id");
$res->execute([
    'id'=>$_GET["id"]

]);
header("location:index.php?message= successfully deleted &type=success");

$page_titel = "interface admin";
$template = "listusers";
include "../layout.phtml";
?>