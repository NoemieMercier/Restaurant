<?php

function getAdminByEmail($email){
    
    $bdd= bd_connect();
    $query=$bdd->prepare('SELECT * FROM `ADMIN` WHERE `email`=?');
    $query->execute(array($email));
    $emailadmin=$query->fetch();//affectation que dans fetch
    var_dump($emailadmin);
    return $emailadmin;


}


