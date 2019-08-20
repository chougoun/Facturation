<?php
session_start();

	$_SESSION['erreur'] = $txtErreur; 
	$_SESSION['idErr'] = $proIdErr ;
	$_SESSION['prixErr'] = $proPrixErr ;
	$_SESSION['nomErr'] = $proNomErr ;
	$_SESSION['idSFAErr'] = $proIdSFAErr ;
	

function txtErreur($proIdErr,$proPrixErr ,$proNomErr,$proIdSFAErr){	
   if(isset($_SESSION['erreur']))unset($_SESSION['erreur']);

return txtErreur ;
}

 header('Refresh:0; url= ProduitCreerAccept.php');
 
 ?>