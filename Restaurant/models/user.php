<?php 

//une fonction qui insert un client (et ses infos)
function addUser($nom, $prenom, $naissance, $adresse, $code_postal, $ville, $tel, $email,$password){
                    
    
        $bdd= bd_connect();
        $query=$bdd->prepare('INSERT INTO USER(nom, prenom, naissance, adresse, code_postal, ville, tel,email, password) VALUES (?,?,?,?,?,?,?,?,?)');
        $datauser=$query->execute(array($nom, $prenom, $naissance, $adresse, $code_postal, $ville, $tel, $email,$password));
        var_dump($query->errorInfo());
        var_dump($datauser);
        return $datauser;
}

//une fonction qui récupère un client précis
function getUserByMail($email){
    
        $bdd= bd_connect();
        $query=$bdd->prepare('SELECT * FROM `USER` WHERE `email`= ?');
        $query->execute(array($email));
        $emailUser=$query->fetch();
        var_dump($emailUser);
        return $emailUser;
}

function getUserById ($id_client){
        $bdd= bd_connect();
        $query=$bdd->prepare('SELECT * FROM `USER` WHERE id_user=?');
        $query->execute(array($id_client));
        $user=$query->fetch();
        return $user;
}

    //on se connecte avec l'appelle à la fonction qui fait connexion
    //on affecte des variables en arguments
    //elles correspondants aux champs de la requete
    //préparer requête d'insertion (ps : pas de fetch!)
    //execute avec array qui reprend nom des variables
    //retourner le résultat d'exécution

/// c'est le controller qui va faire le lien entre les variables de model et les $_POST qui récupère les vraies valeurs du champs
