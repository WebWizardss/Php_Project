<?php

require_once "../Dbconnect/index.php";

$res = $db->prepare("select * from produits");
$res->execute();
$produits = $res->fetchAll();

$page_titel = "List produit";
$template = "produit";
include "../layout.phtml";

?>