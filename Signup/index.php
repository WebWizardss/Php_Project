<?php
require "../DbConnect/index.php";
$errors = [];
$nom = "";
$prenom = "";
$email = "";
$password = "";
$tlf_num = "";
$photo = "";

if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $tlf_num = $_POST['tlf_num'];

    // var_dump($_FILES['photo']);
    $NameFile = $_FILES['photo']['name']; //afficher valeur key name //
    $type_extention = pathinfo($NameFile, PATHINFO_EXTENSION); //par example png :type//
    $name_file = md5(rand()) . "." . $type_extention; //changer nom image//


    if (empty($nom)) {
        $errors['nom'] = "name Required";
    } else if (empty($prenom)) {
        $errors['prenom'] = "family name Required";
    } else if (empty($email)) {
        $errors['email'] = "email Required";
    } else if (empty($password)) {
        $errors['password'] = "password Required";
    } else if (empty($tlf_num)) {
        $errors['tlf_num'] = "phone number Required";
    } else if (!move_uploaded_file($_FILES['photo']['tmp_name'], '../user_photo/' . $name_file)) {
        $errors['file'] = "upload failed";
    } else if (empty($errors)) {
        $photo = '../user_photo/' . $name_file;
        $res = $db->prepare("INSERT INTO users (`nom`, `prenom`,`email`, `password`, `num_tlf`, `password_token`, `email_verified`, `photo`, `IsAdmin`) VALUES (:nom,:prenom,:email,:password,:tlf_num, :password_token, :email_verified, :photo, :IsAdmin);");
        $res->execute([
            "nom" => $nom,
            "prenom" => $prenom,
            "email" => $email,
            "password" => password_hash($password, PASSWORD_DEFAULT),
            "tlf_num" => $tlf_num,
            "password_token" => null,
            "email_verified" => 0,
            "photo" => $photo,
            "IsAdmin" => 0
        ]);
        header("location:../login?message= sign up successfully &type=success");
    }

}



$page_titel = "page d'inscri";
$template = "signUp";
include "../layout.phtml";
?>