<?php

function insertResa ($iduser, $date, $nbcouvert) {
    //requete d'insertion à bdd réservation
        $bdd= bd_connect();
        $query=$bdd->prepare('INSERT INTO `RESERVATION`(`id_user`, `date`, `nb_couverts`) VALUES (?,?,?)');
        $reservation=$query->execute(array($iduser, $date, $nbcouvert));
        var_dump($query->errorInfo());
        return $reservation;
}

function getResa (){
        $bdd= bd_connect();
        $query=$bdd->prepare('SELECT * FROM `RESERVATION` INNER JOIN `USER` ON RESERVATION.id_user = USER.id');
        $query->execute();
        $bookinglist=$query->fetchAll();
        return $bookinglist;
}


