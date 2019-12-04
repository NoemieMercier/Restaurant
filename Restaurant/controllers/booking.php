<?php

require ('models/booking.php'); // il faut appeler le model avant de créer la fonction 

function booking() {
   
   if(isset($_POST['couverts'])){ 
    $iduser=$_SESSION['user']['id'];
    $date=$_POST['date'].' '.$_POST['heure'].':'.$_POST['minutes'].':00';
    $nbcouvert=$_POST['couverts'];
    $result=insertResa ($iduser, $date, $nbcouvert);
    if ($result){
        $message="Votre reservation a bien été prise en compte";
    }
       else {
    $message= "Votre formulaire rencontre une erreur.";
    echo $iduser;
    echo $date;
    echo $nbcouvert;
    echo $result;
       }
   }
   
   if(is_connect()){
$template = 'booking/booking.phtml';
require ('www/layout.phtml');
}

}

function affResa(){
    
if (isAdmin()){ //on sécurise template
    
$resalist = getResa();
$template = 'admin/resa.phtml';
require ('www/layout.phtml');
}

}






//Notes
    //récupère infos de form
    //appelle a insertResa
    //redirige dans le template
