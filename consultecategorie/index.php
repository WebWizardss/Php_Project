<?php

require_once "../Dbconnect/index.php";


$res = $db->prepare("select * from categories");
$res->execute();
$categories = $res->fetchAll();

$page_titel = "List Categories";
$template = "consultecategorie";
include "../layout.phtml";

?>