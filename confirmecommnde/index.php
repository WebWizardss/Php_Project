<?php 
require "../DbConnect/index.php";


if(isset($_POST['confirmer'])){
   

    // var_dump($_FILES['photo']);
    // $NameFile=$_FILES['photo']['name'];//afficher valeur key name //
    // $type_extention=pathinfo($NameFile,PATHINFO_EXTENSION);//par example png :type//
    // $name_file=md5(rand()).".".$type_extention; //changer nom image//
    

    
        
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
        header("location:../felicitations?message= confirme successfully &type=success");
    }

}



$page_titel = "page de confirme";
$template = "confirmecmmande";
include "../layout.phtml";
?>