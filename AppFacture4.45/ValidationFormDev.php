<?php
session_start();

	$_SESSION['erreur'] = $txtErreur; 
	$_SESSION['devIdErr'] = $devIdErr ;
	$_SESSION['nomErr'] = $nomErr ;
	$_SESSION['tauxErr'] = $tauxErr ;
	

function txtErreur($devIdErr,$nomErr ,$tauxErr){	
  if(isset($_SESSION['erreur']))unset($_SESSION['erreur']);

  return txtErreur ;
}

 header('Refresh:0; url= DeviseCreerAccept.php');
 
 ?>