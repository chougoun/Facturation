<?php
require ('../produitmodel/model.php');

$proId = $_POST['id'];
$proPrix = $_POST['prix'];
$proNom = $_POST['nom'];
$proIdSFA = $_POST['idSFA'];



//----------------------------------//Contrôle de Saisie//------------------------------------//


//-------------------------> Si les champs des Variables sont vide <-------------------------------- //
$proIdErr = $proPrixErr = $proNomErr = $proIdSFAErr = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {

//--------------------------------------------------------//
	
//vérifie si le champ Nom est vide et si il est bien formé	
  if (empty($_POST["nom"])) {
    $proNomErr = "Le champs Nom Produit est obligatoire";
  } else {
    $proNom = test_input($_POST["nom"]);
//vérifie si l'activite ne contient que des lettres
    if (!preg_match("/^[a-zA-Z ]*$/",$proNom)) {
      $proNomErr = "Le Nom ne peut étre composé que de lettres sans espaces blancs"; 
    }
  }

//------------------------------------------------------//  
  
// //vérifie si l'id est présent et si il est bien formé
// if (empty($_POST["id"])) {
//     $proIdErr = "Le champs ID Produit est obligatoire";
// }else{
// 	$proId = test_input($_POST["id"]);	
// }
// if (!empty($_POST["id"])) {
// 	if(!is_numeric($_POST['id'])){
// 		$proIdErr = "L'id ne peut être composé que de chiffres";
// 	}
// }

//---------------------------------------------------------//

//vérifie si le prix est présent et si il est bien formé
if (empty($_POST["prix"])) {
    $proPrixErr = "Le champs du Prix est obligatoire";
}else{
	$proPrix = test_input($_POST["prix"]);	
}
if (!empty($_POST["prix"])) {
	if(!is_numeric($_POST['prix'])){
		$proPrixErr = "Le prix ne peut être composé que de chiffre";
	}
}

//-----------------------------------------------------------//

 //vérifie si l'id SFA est présent 
  // if (empty($_POST["idSFA"])) {
    // $proIdSFAErr = "Le champs id sous famille est obligatoire";
  // }else{
    // $proIdSFA = test_input($_POST["idSFA"]);
   // }
// if (!empty($_POST["idSFA"])) {
	// if(!is_numeric($_POST['idSFA'])){
		// $proIdSFAErr = "L'id sous famille ne peut être composé que de chiffres";
	// }
// }
}

//------------------------------------------------------------//

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }


if($proIdErr or $proPrixErr or $proNomErr or $proIdSFAErr != "") {
	$_SESSION['idErr'] = $proIdErr;
	$_SESSION['prixErr'] = $proPrixErr;
	$_SESSION['nomErr'] = $proNomErr;
	$_SESSION['idSFAErr'] = $proIdSFAErr;

    header("Location: ../vue/ProduitCreer.php" );	
}else{
   creerAccept($proId,$proPrix,$proNom,$proIdSFA);

    header("Location: ../controller/ProduitListerInit.php" );

}
   
?>
