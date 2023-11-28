<?php 
session_start();
require "../DbConnect/index.php";
$errors=[];
$nom="";
$prenom="";
$Email="";
$ville="";
$codepostale="";
$tlf_num="";
if(isset($_POST["submit"])){


    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $Email=$_POST['Email'];
    $ville=$_POST['ville'];
    $tlf_num=$_POST['tlf_num'];

    // var_dump($_FILES['photo']);
    // $NameFile=$_FILES['photo']['name'];//afficher valeur key name //
    // $type_extention=pathinfo($NameFile,PATHINFO_EXTENSION);//par example png :type//
    // $name_file=md5(rand()).".".$type_extention; //changer nom image//
    

    if(empty($nom)){
        $errors['nom']="name Required";
   }else if(empty($prenom)){
    $errors['prenom']="prenom Required";
   }else if(empty($Email)){
         $errors['Email']="email Required";
   }else if(empty($ville)){
        $errors['ville']="ville Required";
   
   }else if(empty($tlf_num)){
       $errors['tlf_num']="phone number Required";
    }
   else if(empty($errors)){
    $_SESSION['nom']=$nom;
    $_SESSION['prenom']=$prenom;
    $_SESSION['Email']=$Email;
    $_SESSION['ville']=$ville;
    $_SESSION['tlf_num']=$tlf_num;
        
     //    $res=$db->prepare("INSERT INTO commandes (`nom`, `prenom`,'adresse_email','ville','codepostale','tlf_num') VALUES (:nom, :prenom , :Email , :ville , :codepostale , :tlf_num);");
     //    $res->execute([
     //         "nom"=>$nom,
     //         "prenom"=>$prenom,
     //         "Email"=>$Email,
     //         "ville"=>$ville,
     //         "codepostale"=>$codepostale,
     //         "tlf_num"=>$tlf_num,
     //         "status"=>0, 
     //    ]);
        header("location:../confirmecommnde/index.php?message= commande successfully &type=success");
    }
}





$page_titel = "page de commande";
$template = "addcomande";
include "../layout.phtml";
?>