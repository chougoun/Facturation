<?php 
require ('../ClientDataAccess/DataAccess.php');

session_start();

function findAll(){		
	return clientListerInit();
	
}
function voirInit($idClient){
	return clientVoirInit($idClient);
	
}
	
function creerAccept($idClient,$nom,$prenom,$telephone,$courriel,$societe,$adresse,$ville,$codePostal,$pays,$idTypeClient,$idDevise){
	return clientCreerAccept($idClient,$nom,$prenom,$telephone,$courriel,$societe,$adresse,$ville,$codePostal,$pays,$idTypeClient,$idDevise);
}	

function modifierInit($idClient){
	return clientModifierInit($idClient);
	
}

function modifierAccept($idClient,$nom,$prenom,$telephone,$courriel,$societe,$adresse,$ville,$codePostal,$pays,$idTypeClient,$idDevise){
	return clientModifierAccept($idClient,$nom,$prenom,$telephone,$courriel,$societe,$adresse,$ville,$codePostal,$pays,$idTypeClient,$idDevise);
	
}
function supprimerAccept($idClient){
	return clientSupprimerAccept($idClient);
}
function supprimerInit($idClient){
	return clientSupprimerInit($idClient);
}

function connexionDB(){
	return connexion();
}

function regroupBy($idClient){
	return regroupByIdClient($idClient);
}

?>