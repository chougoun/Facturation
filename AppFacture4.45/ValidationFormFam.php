<?php
session_start();

	$_SESSION['erreur'] = $txtErreur; 
	$_SESSION['famIdFamilleErr'] = $famIdFamilleErr ;
	$_SESSION['famNomFamilleErr'] = $famNomFamilleErr ;

	

function txtErreur($famIdFamilleErr,$famNomFamilleErr){	
  if(isset($_SESSION['erreur']))unset($_SESSION['erreur']);

  return txtErreur ;
 }

 header('Refresh:0; url= FamilleCreerAccept.php');
 
 ?>