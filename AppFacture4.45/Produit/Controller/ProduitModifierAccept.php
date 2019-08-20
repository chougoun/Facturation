<?php
require ('../ProduitModel/Model.php');

$proId = $_POST['id'];
$prix = $_POST['prix'];
$nom = $_POST['nom'];
$idSFA = $_POST['idSFA'];


//----------------------------------//Contrôle de Saisie//------------------------------------//


//-------------------------> Si les champs des Variables sont vide <-------------------------------- //
$prixErr = $nomErr =  "";

//-----------------------// Contrôle de saisie champ nom famille //----------------------//

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["nom"])) {
    $nomErr = "Le champs Nom Produit est obligatoire";
  } else {
    $nom = test_input($_POST["nom"]);
//----------------//vérifie si l'activite ne contient que des lettres//--------------//
    if (!preg_match("/^[a-zA-Z ]*$/",$nom)) {
      $nomErr = "Le Champs Nom ne peut étre composé que de lettres sans espaces blancs"; 
    }
  }
//----------------//vérifie si le prix est présent et si il est bien formé//--------------//
if (empty($_POST["prix"])) {
	 $prixErr = "Le champs du Prix est obligatoire";
}else{
	 $prix = test_input($_POST["prix"]);	
}
 if (!empty($_POST["prix"])) {
	 if(!is_numeric($_POST['prix'])){
		$prixErr = "Le prix ne peut être composé que de chiffre";
	 }
 }
}

//------------------------------------------------------------//

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }


if($prixErr or $nomErr != "") {
        
		$_SESSION['prixErr'] = $prixErr;
		$_SESSION['nomErr'] = $nomErr;


		header("Location: ../vue/ProduitModifier.php" );	
}else{

   modifierAccept($proId,$prix,$nom,$idSFA);


   header("Location: ProduitListerInit.php" );
 }
?>