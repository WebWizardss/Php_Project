<?php 
require "../DbConnect/index.php";
$res = $db->prepare("DELETE from  where id=:id");
$res->execute([
    'id'=>$_GET["id"]
    
]);
header("location:admin.php?message=todo deleted&type=success");
exit;


$page_titel = "interface admin";
$template = "admin";
include "../layout.phtml";
?>