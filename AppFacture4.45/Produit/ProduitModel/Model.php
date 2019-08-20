<?php 
require ('../ProduitDataAccess/DataAccess.php');


session_start();
$produits = array(); 


function findAll(){		
	return produitListerInit();
	
}
function voirInit($proId){
	return produitVoirInit($proId);
	
}
function creerAccept($proId,$proPrix,$proNom,$proIdSFA){
	return produitCreerAccept($proId,$proPrix,$proNom,$proIdSFA);
}	

function modifierInit($proId){
	return produitModifierInit($proId);
	
}
function modifierAccept($proId,$prix,$nom,$idSFA){
	return produitModifierAccept($proId,$prix,$nom,$idSFA);
	
}
function supprimerAccept($proId){
	return produitSupprimerAccept($proId);
}
function supprimerInit($proId){
	return produitSupprimerInit($proId);
}
function connexionDB(){
	return connexion();
}
function regroupBy($idProduit){
		return regroupByIdProduit($idProduit);
}
?>