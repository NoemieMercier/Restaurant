<?php

require('models/user.php');

function create_account(){
    $template = 'user/createUser.phtml';
    
    if (isset ($_POST['nom'])){
    
    //vérifie si existe déjà
    $email=htmlspecialchars($_POST['email']);
    var_dump($email);
    $test=getUserByMail($email); //toujours mettre dans variable pour récupérer 
    
        if (!$test) {
            echo "je suis le if de test";
            
        $nom=$_POST['nom'];
        var_dump($nom);
        $prenom=$_POST['prenom'];
        var_dump($prenom);
        $naissance=$_POST['annee'].'-'.$_POST['mois'].'-'.$_POST['jour'];
        var_dump($naissance);
        $adresse=$_POST['adresse'];
        var_dump($adresse);
        $code_postal=$_POST['code_postal'];
        var_dump($code_postal);
        $ville=$_POST['ville'];
        var_dump($ville);
        $tel=$_POST['phone'];
        var_dump($tel);
        $email=$_POST['email'];
        var_dump($email);
        $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
        var_dump($password);
        $result=addUser($nom, $prenom, $naissance, $adresse, $code_postal, $ville, $tel, $email,$password);
        var_dump($result);
       
            if($result){
                $message="Votre compte a bien été créé";
                $template="user/userConnect.phtml";
            }else{
        echo "Cette adresse a déjà été saisie.";
        }
}
}
require ('www/layout.phtml');
}

function connexion(){
   if(isset ($_POST['email'])){
      $email=$_POST['email'];
      $password=$_POST['password'];
      $savedemail=getUserByMail($email);       
      
      if(!$savedemail){
          $message="L'adresse mail que vous avez saisie est incorrecte";
          }else{
              $login=password_verify($_POST['password'],$savedemail['password']);
              if ($login){
                  $_SESSION['user']['nom']=$savedemail['nom']; // je déclare es étiquettes pour la clef user
                  $_SESSION['user']['prenom']=$savedemail['prenom'];
                  $_SESSION['user']['id']=$savedemail['id'];
                  header('Location:index.php');
               }else{
                   echo"Les identifiants saisis sont incorrects";
               }
           }
       }
    $template ="user/userConnect.phtml"; 
    require ('www/layout.phtml');

    
   }

function is_connect(){
    if(isset ($_SESSION['user'])){
        return true;
    }
    else{
        return false;
    }
}

function disconnect(){
    session_unset();
    session_destroy();
    header('Location:index.php');
}


//lien entre requete et template
//est-ce que user a transmis des infos
//on va vérifier que email transmis existe pas dejà
//si oui on envoie message erreur
//si non on déclenche fonction adduser