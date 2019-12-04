//déclaration des variables
var artAff;
var artQte;
var artCmd=Array();
var total;


//déclaration des fonctions

function loadDetails(){
    $.getJSON("index.php","action=cmdAjax&id="+$('#products').val(),afficheDetails);
    // lance une méthode json pour récupérer des infos, elle fait appelle à index.php puis cmdAjax, puis un repas par id, puis fais appel à fonction afficheDetails
}

function afficheDetails(reponse){//va récuếrer les infos en accédant aux id de la div product-details
    $('#product-details img').attr("src","www/images/"+reponse.photo);
    $('#product-details p').html(reponse.description);
    $('#product-details strong').html("€"+reponse.prix);
    artAff=reponse;
    //récupérer réponses de Ajax et sauvegarder dans variable artAffiche.
}

function addPanier () {
    artQte= [artAff,$('#quantite').val()];
    console.log(artQte);
    
    artCmd.push(artQte);
    artCmd=JSON.stringify(artCmd);
    localStorage.setItem('panier',artCmd);
    //insérer quantité (à récupérer du input) et réponse du ajax dans le tableau articleQte
    //ajouter article comandé et sa quantité dans tableau des commandes
    //save dans localstorage
    affPanier();
}

function affPanier (){
    artCmd=localStorage.getItem('panier'); // récupérer info local storage
    $('#panier').html("<tr><th>Quantité</th><th>Produit</th><th>Sous-total</th><th>Total</th></tr><tr><td></td><td></td><td></td><td></td><td id='total'></td></tr>");
    
    if(artCmd==null){
     artCmd= []; 
    }
    else{
   
    //insérer balises html pour compléter le tableau
    artCmd=JSON.parse(artCmd);
    }
    total=0;
    for(var i=0;i<artCmd.length;i++){
        total+=artCmd[i][0].prix*artCmd[i][1];
        $("#panier tr:last-child").before("<tr><td>"+artCmd[i][1]+"</td>"+"<td>"+artCmd[i][0].nom+"</td>"+"<td>"+artCmd[i][0].prix+"</td>"+"<td>"+artCmd[i][1]*artCmd[i][0].prix+"</td></tr>");
        $('#total').html(total);
    }
   
}

function passerCommande(){
    artCmd=JSON.stringify(artCmd); // on stingify pour en faire un objet compréhensible par le php
    $.get("index.php","action=cmdAjax&commande="+artCmd+"&total="+total,viderCommande);// je vais envoyer ça depuis url et récupérer 
}

function viderCommande(reponse) {
    artCmd=[];//mettre tableau à zéro
    localStorage.clear();//vider le local storage
    $('#panier').html("");//vider html du tableau panier;
    
    console.log(reponse);
}

//gestionnaire d'évènements
$(function(){
    
$("#products").on("change",loadDetails);
$("#ajouter").on("click",addPanier);
$("#valider-commande").on("click",passerCommande);
$("#cancel").on("click",viderCommande);
loadDetails();
affPanier();
});


//un evnt sur le bouton valider
//nouvelle fonction passerCommande()
//fonction passerCommandeAjax
//communiquer i ndex.php?commande=??
//controller->commandeAjax

