<?php 
require "../DbConnect/index.php";
$errors=[];
$nom="";
$prenom="";
$email="";
$password="";
$tlf_num="";
$photo="";

if(isset($_POST['submit'])){
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $tlf_num=$_POST['tlf_num'];

    if(empty($nom)){
        $errors['nom']="name Required";
   }else if(empty($prenom)){
        $errors['prenom']="family name Required";
   }else if(empty($email)){
        $errors['email']="email Required";
    }else if(empty($password)){
        $errors['password']="password Required";
    }else if(empty($tlf_num)){
        $errors['tlf_num']="phone number Required";
   }else if(empty($errors)){
        $res=$db->prepare("INSERT INTO users (`nom`, `prenom`,`email`, `password`, `num_tlf`, `password_token`, `email_verified`, `photo`, `IsAdmin`) VALUES (:nom,:prenom,:email,:password,:tlf_num, :password_token, :email_verified, :photo, :IsAdmin);");
        $res->execute([
             "nom"=>$nom,
             "prenom"=>$prenom,
             "email"=>$email,
             "password"=>password_hash($password,PASSWORD_DEFAULT),
             "tlf_num"=>$tlf_num,
             "password_token"=>null,
              "email_verified"=>0,
               "photo"=>"image", 
               "IsAdmin"=>0
        ]);
        header("location:../login?message= sign up successfully &type=success");
    }

}


$page_titel = "page d'inscri";
$template = "signUp";
include "../layout.phtml";
?>