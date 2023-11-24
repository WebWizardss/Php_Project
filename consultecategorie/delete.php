<?php

require "../DbConnect/index.php";
$res = $db->prepare("DELETE from categories where id=:id");
$res->execute([
    'id'=>$_GET["id"]
    
]);
header("location:index.php?message=todo deleted&type=success");
exit;
?>
