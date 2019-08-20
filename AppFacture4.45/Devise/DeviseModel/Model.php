<?php 
require ('../DeviseDataAccess/DataAccess.php');

session_start();

function findAll(){		
	return deviseListerInit();
	
}
function voir($devId){
	return deviseVoirInit($devId);
	
}
	
function creer($devId,$nom,$taux){
	return deviseCreerAccept($devId,$nom,$taux);
}	

function modifierInit($devId){
	return deviseModifierInit($devId);
	
}

function modifierAccept($devId,$nom,$taux){
	return deviseModifierAccept($devId,$nom,$taux);
	
}
function supprimerAccept($devId,$nom,$taux){
	return deviseSupprimerAccept($devId,$nom,$taux);
}
function supprimerInit($devId){
	return deviseSupprimerInit($devId);
}
function regroupBy($devId){
		return regroupByIdDevise($devId);
}

?>