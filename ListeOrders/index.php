<?php 
session_start();
require_once "../Dbconnect/index.php";

$res = $db->prepare("select * from commandes where status=0");
$res->execute();
$commandes = $res->fetchAll();
if (isset($_GET["idAaccepte"]) )
{
    $commandes_accept=$db->prepare("UPDATE `commandes` SET `status`=:status WHERE id=:id");
    $commandes_accept->execute([
        "id"=>$_GET["idAaccepte"],
        "status"=>1
    ]);
}
if (isset($_GET["idRefuse"]) )
{
    $commandes_refuse=$db->prepare("UPDATE `commandes` SET `status`=:status WHERE id=:id");
    $commandes_refuse->execute([
        "id"=>$_GET["idRefuse"],
        "status"=>2
    ]);
}


$page_titel = "interface admin";
$template = "ListeOrders";
include "../layout.phtml";
?>