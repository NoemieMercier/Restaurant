<?php

function addOrder ($idUser,$date,$prixtotal) {

        $bdd= bd_connect();
        $query=$bdd->prepare('INSERT INTO `COMMANDES`(`id_user`, `date`, `prix_total`) VALUES (?,?,?)');
        $orderIn=$query->execute(array($idUser,$date,$prixtotal));
        $id_cmd=$bdd->lastInsertId();
        return $id_cmd;
}

function addDetailsOrder ($idcmd,$commande) {
            $bdd= bd_connect();
        $query=$bdd->prepare('INSERT INTO `LIGNES_CMD`(`id_cmd`, `id_meal`, `quantite`, `prix_unite`) VALUES (?,?,?,?)');
        foreach($commande as $ligne) {
        $query->execute([$idcmd,$ligne[0]->id,$ligne[1],$ligne[0]->prix]);
}
}

function getOrder (){
        $bdd= bd_connect();
        $query=$bdd->prepare('SELECT * FROM `USER` INNER JOIN `COMMANDES` ON USER.id_user = COMMANDES.id_user');
        $query->execute();
        $cmdlist=$query->fetchAll();
        return $cmdlist;
}

function getDetailsOrderById ($id){
        $bdd= bd_connect();
        $query=$bdd->prepare('SELECT * FROM `LIGNES_CMD` INNER JOIN MEAL ON LIGNES_CMD.id_meal= MEAL.id WHERE id_cmd=?');
        $query->execute(array ($id));
        $orderdetails=$query->fetchAll();
        return $orderdetails;
}

// lignes commandes
//meal

function getIdUserOnCmd ($id){
        $bdd= bd_connect();
        $query=$bdd->prepare('SELECT id_user FROM `COMMANDES` WHERE id=?');
        $query->execute(array ($id));
        $id_client=$query->fetch();
        return $id_client;
}
//commandes

