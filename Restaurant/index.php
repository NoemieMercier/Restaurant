<?php
session_start();


//appel à la db
require ('config/connexion.php');

//appel aux controllers
require ('controllers/meal.php');
//j'ai accès aux fonction qui sont à l'intérieur et aussi au model

require ('controllers/user.php');

require ('controllers/booking.php');

require ('controllers/order.php');

require ('controllers/admin.php');

if (isset($_GET['action']))
{
    
    switch($_GET['action']){
        case "create_account":
            create_account();
            break;
        case "connexion":
            connexion();
            break;
        case "disconnect":
            disconnect();
            break;
        case "booking":
            booking();
            break;
        case "commander"://user passe commande
            listOrder();
            break;
        case "cmdAjax"://logiciel traite commande
            cmdAjax();
            break;
        case "admin":
            homeAdmin();
            break;
        case "affResa":
            affResa();
            break;
        case "affCmd":
            affCmd();
            break;
        case "addMeal":
            addMeal();
            break;
        case "modifMeal":
            editMeal();
            break;
        case "cancelMeal":
            cancelMeal();
            break;
    }
}

else {
    listMeal();
}


//appel aux fonction du controller

