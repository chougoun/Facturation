<?php

$_SESSION['erreur'] = $txtErreur; 
$_SESSION['lfaQuantiteErr'] = $lfaQuantiteErr;
$_SESSION['lfaIdProduitErr'] = $lfaIdProduitErr;


function txtErreur($lfaQuantiteErr,$lfaIdProduitErr){
  if(isset($_SESSION['erreur']))unset($_SESSION['erreur']);
return txtErreur;
}

 header('Refresh:0; url= LigneFactureCreerAccept.php');


?>