<?php
require "../DbConnect/index.php";
$errors = [];
$Email = "";



if (isset($_POST["suivant"])) {
    $Email = $_POST["Email"];
    if (empty($Email)) {
        $errors["Email"] = "required email";
        
    } else {

        // $template = "modifier";
        // include "../layout.phtml";


    }


}


$page_titel = "page forget password";
$template = "forget";
include "../layout.phtml";
?>