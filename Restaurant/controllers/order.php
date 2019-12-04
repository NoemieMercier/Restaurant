<?php

require ('models/order.php');

function listOrder() {
    $getmeals = getMeals();
    $template = 'order/order.phtml';
    require ('www/layout.phtml');
}

function cmdAjax () {

    if(isset ($_GET['id'])){ 
        
    $getmealbyid=getMealById ($_GET['id']);
    echo json_encode($getmealbyid);
    }
    elseif (isset($_GET['commande'])){
    
    //récupérer infos de commande
    $iduser=$_SESSION['user']['id'];
    $date=date('Y-m-d');
    $commande=json_decode($_GET['commande']);
    $total=$_GET['total']; 

    $id_cmd=addOrder ($iduser,$date,$total);//on met dans variable que si return dans fonction
   addDetailsOrder ($id_cmd,$commande);
    
    }
    }
    
    
    function affCmd(){

    if (isset($_GET['id'])){ 
        $idurl = $_GET['id'];
        $getDetails=getDetailsOrderById($idurl);
        $getidcmd=getIdUserOnCmd ($idurl);
        $getuserid=getUserById ($getidcmd['id_user']);
        
        $template = 'admin/cmddetails.phtml';
        require ('www/layout.phtml'); 
    }
    
    else {
        
        $cmdlist = getOrder();
        $template = 'admin/commande.phtml';
        require ('www/layout.phtml');   
    }

}

    
    
    
    //soit il récupère le meal par id
    //soit fait insertion d'une nouvelle commande
    //objectif: rendre dynamique menu select;






