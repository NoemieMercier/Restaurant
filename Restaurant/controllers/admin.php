<?php 

require ('models/admin.php'); 

function homeAdmin(){
    
   if(isset ($_POST['email'])){
      $email=$_POST['email'];
      $savedemail=getAdminByEmail($email);       
      
      if(!$savedemail){
          $message="L'adresse mail que vous avez saisie n'existe pas.";
          }else{
              $login=password_verify($_POST['password'],$savedemail['mdp']);
              if ($login){
                  $_SESSION['admin']['nom']=$savedemail['nom']; // 
                  $_SESSION['admin']['prenom']=$savedemail['prenom'];
                  $_SESSION['admin']['id']=$savedemail['id'];
                 // header('Location:index.php');
                }else{
                   echo"Le mot de passe saisi est incorrect";
                }
           }
       }
       
    $template ="admin/home.phtml"; 
    require ('www/layout.phtml');
   
}


function isAdmin(){
    if(isset ($_SESSION['admin'])){
        return true;
    }
    else{
        return false;
    }
}




