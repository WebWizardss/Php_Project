<?php
require "../DbConnect/index.php";
session_start();
$errors = [];
$nom = "";
$prenom = "";
$email = "";
$tlf_num = "";
$photo = "";

if(!isset($_SESSION['carte'])){
    $_SESSION['carte']=array();
}else{
    $_SESSION['carte']=$_SESSION['carte'];
}


if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $tlf_num = $_POST['tlf_num'];

    $photoUpload=false;
    $photo="";
    if(strlen($_FILES['photo']['name'])>1){
        $photoUpload=true;
        $NameFile = $_FILES['photo']['name']; //afficher valeur key name //
        $type_extention = pathinfo($NameFile, PATHINFO_EXTENSION); //par example png :type//
        $name_file = md5(rand()) . "." . $type_extention; //changer nom image//
        if (!move_uploaded_file($_FILES['photo']['tmp_name'], '../user_photo/' . $name_file)) {
            $errors['file'] = "upload failed";
        } 
        $photo = '../user_photo/' . $name_file;
    }



    if($photoUpload){
        $userUpdate=$db->prepare("UPDATE users SET nom=:nom,prenom=:prenom,email=:email,num_tlf=:num,photo=:photo where id=:id");
        $userUpdate->execute([
            "nom"=>$nom,
            "prenom"=>$prenom,
            "email"=>$email,
            "num"=>$tlf_num,
            "photo"=>$photo,
            "id"=>$_SESSION['idClient']
        ]);
        $_SESSION['nom']=$nom;
        $_SESSION['prenom']=$prenom;
        $_SESSION['email']=$email;
        $_SESSION['photo']=$photo;
        $_SESSION['num_tlf']=$tlf_num;

    }else{
        $userUpdate=$db->prepare("UPDATE users SET nom=:nom,prenom=:prenom,email=:email,num_tlf=:num where id=:id");
        $userUpdate->execute([
            "nom"=>$nom,
            "prenom"=>$prenom,
            "email"=>$email,
            "num"=> $tlf_num,
            "id"=>$_SESSION['idClient']

        ]);
        $_SESSION['nom']=$nom;
        $_SESSION['prenom']=$prenom;
        $_SESSION['email']=$email;
        $_SESSION['num_tlf']= $tlf_num;

    }

   
}



$page_titel = "EditProfile";
$template = "EditProfile";
include "../layout.phtml";
?>