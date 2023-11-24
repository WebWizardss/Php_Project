<?php

require "../DbConnect/index.php";
$errors = [];
$nom = "";
$prix = "";
$description = "";
$photo = "";

// $nom = $_POST['nom'];
// var_dump($nom);
if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $description = $_POST['description'];
    $NameFile = $_FILES['photo']['name']; 
    $type_extention = pathinfo($NameFile, PATHINFO_EXTENSION); 
    $name_file = md5(rand()) . "." . $type_extention;

    if (empty($nom)) {
        $errors['nom'] = "name Required";

    } else if (empty($prix)) {
        $errors['prix'] = "price required";

    } else if (empty($description)) {
        $errors['description'] = "description required";

    }else if (!move_uploaded_file($_FILES['photo']['tmp_name'], '../user_photo/' . $name_file)) {
        $errors['file'] = "upload failed";
    } 
     else if (empty($errors)) {
        $photo = '../user_photo/' . $name_file;
        $res = $db->prepare("INSERT INTO produits (`nom`, `prix`, `description`, `PhotoProduct`,`idCategory`) VALUES (:nom,:prix,:description,:photo,:idc)");
        $res->execute([
            "nom"=>$nom,
            "prix"=>$prix,
            "description"=>$description,
            "photo"=>$photo,
            "idc"=>1

        ]);
        header("location:../produit/?message= sign up successfully &type=success");
    }

        

    }



$page_titel = "page d'ajout un produit'";
$template = "add";
include "../layout.phtml";


?>