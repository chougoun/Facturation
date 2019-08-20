<?php
require ('../devisemodel/model.php');

$devId = $_POST['devId'];
$nom = $_POST['nom'];
$taux = $_POST['taux'];

//----------------------------------------// Contrôle de Saisie //-----------------------------------------//

//-------------------------> Si les champs des Variables sont vide <-------------------------------- //
$devIdErr = $nomErr = $tauxErr = "";


//------------------------//Contôle de saisie du champ nom//----------------------------------//
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nom"])) {
    $nomErr = "Le champs nom est obligatoire";
  } else {
    $nom = test_input($_POST["nom"]);
//---------------------// Saisie incorrect nom //-----------------------//
    if (!preg_match("/^[\p{L}\s]+$/ui",$nom)) {
      $nomErr = "Le champs Nom ne peut être composé que de lettres"; 
    }
  }
//---------------------// Contrôle de saisie champ Taux de change //----------------------//
  if (empty($_POST["taux"])) {
    $tauxErr = "Le champs du taux de change est obligatoire";
  }else{
    $taux = test_input($_POST["taux"]);
  }
//-------------------//Saisie incorrect Taux de change//----------------------//
  if (!empty($_POST["taux"])) {
    if (!is_numeric($_POST["taux"]))  {
      $tauxErr = "Le champs du taux de change ne peut étre composé que de chiffres";
    }  
  }
//------------------------//Contôle de saisie du champ Id//----------------------------------//

  if (empty($_POST["devId"])) {
    $devIdErr = "Le champs id est obligatoire";
  } else {
    $devId = test_input($_POST["devId"]);
//---------------------// Saisie incorrect devId //-----------------------//
    
    if (!preg_match("/^[\p{L}\s]+$/ui",$devId)) {
      $devIdErr = "Le champs id ne peut être composé que de lettres"; 
    }
  }
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

echo $devIdErr.$nomErr.$tauxErr;


if($devIdErr or $nomErr or $tauxErr != "") {
	$_SESSION['devIdErr'] = $devIdErr;
	$_SESSION['nomErr'] = $nomErr;
	$_SESSION['tauxErr'] = $tauxErr;
  header("Location: ../vue/DeviseCreer.php" );	
}else{
  creer($devId,$nom, $taux);
  Header("Location: DeviseListerInit.php" );

}

?>
