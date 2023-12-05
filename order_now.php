<?php

session_start();// taadi des variables fi koll page
require "./DbConnect/index.php";
$page_titel = "page d'acceill";

if(!isset($_SESSION['carte'])){
    $_SESSION['carte']=array();
}else{
    
    $_SESSION['carte']=$_SESSION['carte'];
}

//var_dump($_SESSION['carte']);

if(isset($_GET['id'])){
    $res = $db->prepare("select * from produits where id=?");
    $res->execute([$_GET['id']]);
    $produit = $res->fetch();

    $idProduit=$_GET['id'];
    $Quantity=1;
    $trouve=-1;

    for($i=0;$i<=count($_SESSION['carte']);$i++){
        if(isset($_SESSION['carte'][$i])){
            if($_SESSION['carte'][$i][0]==$idProduit){
                $trouve=$i;
            }
        }
    }
    if($trouve!=-1){
        for($i=0;$i<=count($_SESSION['carte']);$i++){
            if(isset($_SESSION['carte'][$i])){
                if($_SESSION['carte'][$i][0]==$idProduit){
                    $_SESSION['carte'][$i][1]++;
                }
            }
        }
        $trouve=-1;
    }else{
        array_push($_SESSION['carte'],[$idProduit,$Quantity,$produit['prix'],$produit['nom'],$produit['PhotoProduit']]);
    }
}

if(isset($_GET['DeleteProd'])){
    $trouve=-1;
    for($i=0;$i<count($_SESSION['carte']);$i++){
        if(isset($_SESSION['carte'][$i])){
            if($_SESSION['carte'][$i][0]==$_GET['DeleteProd']){
                $trouve=$i;
            }
        }
    }
    if(count($_SESSION['carte'])==1){
        unset($_SESSION['carte']);
        $_SESSION['carte']=array();
    }else{
        unset($_SESSION['carte'][$trouve]);
    }
}

$res = $db->prepare("select * from categories");
$res->execute();
$categories = $res->fetchAll();

$template = "";
include "./layout.phtml";


?>