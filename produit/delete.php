<?php
require_once "../Dbconnect/index.php";
var_dump("done");

$res = $db->prepare("DELETE from produits where id=:id");
$res->execute([
    'id'=>$_GET["id"]
    
]);
header("location:index.php?message=todo deleted&type=success");

$page_titel = "List produit";
$template = "produit";
include "../layout.phtml";
?>