<?php

require('models/meal.php');


function listMeal(){
    //$bdd = bd_connect();
    $meals = getMeals();
    //return $meals;

$template = 'home.phtml';
require ('www/layout.phtml');
}


function addMeal(){

if(isset($_POST['nom'])) {// tester un champ
    
        $nom=$_POST['nom'];// je récupère infos
        $description=$_POST['description'];
        $prix=$_POST['prix'];
        $photo=$_FILES['photo'];


        $result=addMealinBdd($nom,$description,$prix,$photo);//j'appelle addmealinbdd    
        var_dump($result);

    if ($result){
        $uploads_dir="www/images";// télécharger l'image
        
        $tmp_name=$_FILES['photo']['tmp_name'];
        $name=$_FILES['photo']['name'];
        move_uploaded_file($tmp_name,"$uploads_dir/$name");
        $message = "Le nouvel élément a été bien inséré !";
        
        } else {
        $message = "Une erreur est survenue";
        }
    //header ('Location: admin.php');
}

$template = 'admin/ajout.phtml';//appel au template d'ajout 
require ('www/layout.phtml');
}

function editMeal(){
    
    if(isset($_POST['submit'])) { //les infos du form bien transmises
        $nom=$_POST['nom'];// je récupère infos
        $description=$_POST['description'];
        $prix=$_POST['prix'];
        $id=$_GET['id'];
        $updateinbdd=updateMealinBdd($nom,$description,$prix,$id);
        var_dump($updateinbdd);
        $template = 'admin/home.phtml';
        require ('www/layout.phtml');
    }
    
    else {
        
    if(isset($_GET['id'])){//fait condition pour tester si id a été envoyé
    $idmeal=getMealById($_GET['id']);
    }
    
    else {
    $meals=getMeals();
    } 
    
    $template = 'admin/modifier.phtml';
    require ('www/layout.phtml');
    }
} 

function cancelMeal() {
    
if(isset($_GET['id'])) {
    $test= supressMeal($_GET['id']);
    
    if($test){
        $message = "Bravoooooo!";}
    else {
        $message="Echec";
    }
    header ('Location:index.php?action=modifMeal');
}   
}


//inclure le model
//require indique que l'erreur vient du téléchargement du fichier, quand c'est include, on a un warning et le reste s'exécute. 