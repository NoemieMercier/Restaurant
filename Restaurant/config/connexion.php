<?php

function bd_connect(){
try{
    $bdd= new PDO ('mysql:host=localhost;dbname=pa-143_noemiemercier_Restaurant;charset=utf8','noemiemercier','b1d2797bMWJiYzZhZGIxNTRkNjNmYTNhM2NlMDVi770fe9dc');
}

catch(Exception $e) {
    die('Erreur:'.$e->getMessage());
}

return $bdd;

}


?>