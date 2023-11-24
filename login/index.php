<?php 
require_once "../Dbconnect/index.php";
 
    $errors=[];
     $Email="";
     $Password="";
     if(isset($_POST['submit'])){
        $Email=$_POST['email'];
        $Password=$_POST['password'];

        if(empty($Email)){
            $errors['Email']="Email Required";

        }
        else if(empty($Password)){
            $errors['Password']="password required";
            
        }
        else if(empty($errors)){

            $res=$db->prepare("SELECT * FROM users where email=:email ");
               $res->execute([
                    "email"=>$Email,
               ]);

               $user=$res->fetch(PDO::FETCH_ASSOC); //  
               if($user){
                if(!password_verify($Password,$user['password'])){  
                  header("location:index.php?message=password or email is incorrect&type=danger");
                }
                else{
                    var_dump($user);
                }
               }
               else{
                header("location:index.php?message=password or email is incorrect&type=danger");
               }
               //header("location:index.php?message=Login With Success&type=success");

        }
        



     }




$page_titel = "page login";
$template = "login";
include "../layout.phtml";
?>
