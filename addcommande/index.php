<?php 
require "../DbConnect/index.php";
$errors=[];
$nom="";
$prenom="";
$Email="";
$ville="";
$codepostale="";
$tlf_num="";

if(isset($_POST['submit'])){
    $nom=$_POST['nom'];
    $prenom=$_POST['nom'];
    $Email=$_POST['nom'];
    $ville=$_POST['nom'];
    $codepostale=$_POST['nom'];
    $tlf_num=$_POST['nom'];

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
   }else if(empty($codepostale)){
    $errors['codepostale']="code postale Required";
    }else if(empty($tlf_num)){
       $errors['tlf_num']="phone number Required";
    }
   else if(empty($errors)){
        
        $res=$db->prepare("INSERT INTO commandes (`nom`, `prenom`,'adresse_email','ville','codepostale','tlf_num') VALUES (:nom, :prenom , :Email , :ville , :codepostale , :tlf_num);");
        $res->execute([
             "nom"=>$nom,
             "prenom"=>$prenom,
             "Email"=>$Email,
             "ville"=>$ville,
             "codepostale"=>$codepostale,
             "tlf_num"=>$tlf_num,
             "status"=>0, 
        ]);
        header("location:../confiremcomande?message= commande successfully &type=success");
    }

}



$page_titel = "page de commande";
$template = "addcomande";
include "../layout.phtml";
?>