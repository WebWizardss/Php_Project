<?php 
require "../DbConnect/index.php";
$errors=[];
$nom="";
$photo="";

if(isset($_POST['submit'])){
    $nom=$_POST['nom'];

    // var_dump($_FILES['photo']);
    $NameFile=$_FILES['photo']['name'];//afficher valeur key name //
    $type_extention=pathinfo($NameFile,PATHINFO_EXTENSION);//par example png :type//
    $name_file=md5(rand()).".".$type_extention; //changer nom image//
    

    if(empty($nom)){
        $errors['nom']="name Required";
   }else if(!move_uploaded_file($_FILES['photo']['tmp_name'],'../categorie_photo/'.$name_file)){
        $errors['file']="upload failed";
    }
   else if(empty($errors)){
        $photo='../categorie_photo/'.$name_file;
        $res=$db->prepare("INSERT INTO categories (`nom`, `photo`) VALUES (:nom, :photo);");
        $res->execute([
             "nom"=>$nom,
             "photo"=>$photo, 
        ]);
        header("location:../consultecategorie?message= add categorie successfully &type=success");
    }

}



$page_titel = "page de categories";
$template = "addcategory";
include "../layout.phtml";
?>