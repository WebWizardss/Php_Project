<?php

require "../DbConnect/index.php";
session_start();
$page_titel = "page des menu";
$template = "menu";

$idCategorie = $_GET['idcategorie'];
$res  = $db->prepare("SELECT * FROM categories WHERE id =?");
$res->execute([$idCategorie]);
$category = $res->fetch();

$resprod= $db->prepare("SELECT * FROM produits WHERE idCategory =?");
$resprod->execute([$idCategorie]);
$produits = $resprod->fetchAll();

if(isset($_GET['btnsearch'])){
    $search=$_GET['search'];
    $name_search="%".$search."%";// All Chaine 
    $res=$db->prepare("SELECT * FROM produits WHERE nom LIKE ? and idCategory = ? ");
    $res->execute([$name_search,$idCategorie]);
    $produits = $res->fetchAll();
}



include "../layout.phtml";


?>