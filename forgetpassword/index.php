<?php
require "../DbConnect/index.php";
$errors = [];
$email = "";



if (isset($_POST["submit"])) {

    $email = $_POST["email"];
    if (empty($email)) {
        $errors["email"] = "required email";
    } else {
        $template = "modifier";
        include "../layout.phtml";


    }


}


$page_titel = "page forget password";
$template = "forget";
include "../layout.phtml";
?>