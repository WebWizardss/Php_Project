<?php

session_start();
require_once "../Dbconnect/index.php";

$res = $db->prepare("select * from produits");
$res->execute();
$produits = $res->fetchAll();

function GetNomCategory($id,$db){
    $res=$db->prepare("select * from categories where id=?");
    $res->execute([
        $id
    ]);
    return $res->fetch()['nom'];
}

$page_titel = "List produit";
$template = "produit";
include "../layout.phtml";

?>