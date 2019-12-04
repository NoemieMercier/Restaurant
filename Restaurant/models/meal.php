<?php 

function getMeals (){

        $bdd= bd_connect();
        $query=$bdd->prepare('SELECT * FROM MEAL');
        $query->execute();
        $meals=$query->fetchAll();
        return $meals;

}

//sélectionner repas selon son id
function getMealById ($id) {
        
        $bdd= bd_connect();
        $query=$bdd->prepare("SELECT * FROM MEAL WHERE id=?");
        $query->execute(array($id));
        $dish=$query->fetch();
        return $dish;
}

function addMealinBdd ($nom,$description,$prix,$photo) {
        
        $bdd= bd_connect();
        $query=$bdd->prepare('INSERT INTO `MEAL`(`nom`, `description`, `prix`, `photo`) VALUES (?,?,?,?)');
        
        $newMeal=$query->execute(array($nom,$description,$prix,$photo['name']));
        return $newMeal;
}

function updateMeal () {
        $bdd= bd_connect();
        $query=$bdd->prepare('UPDATE `MEAL` SET `id`=?,`nom`=?,`description`=?,`prix`=?,`photo`=?');
        $editedMeal=$query->execute(array($_GET['id'], $_POST['nom'],$_POST['description'],$_POST['prix'],$_POST['photo']));
}


function updateMealinBdd ($nom,$description,$prix,$id) {
        $bdd= bd_connect();
        $query=$bdd->prepare('UPDATE `MEAL` SET `nom`=?,`description`=?,`prix`=? WHERE `id`=?');
        $editedMealinBdd=$query->execute(array($nom,$description,$prix,$id));
        var_dump($query -> errorInfo());
        return $editedMealinBdd;
}

function supressMeal($id){
        $bdd= bd_connect();
        $query=$bdd->prepare('DELETE * FROM `MEAL` WHERE `id`=?');
        $suppressedMeal=$query->execute(array($id));
        return $suppressedMeal;
}

?>

