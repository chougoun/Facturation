<?php
require ('../clientmodel/model.php');

$idClient = $_POST['cli_id_client'];
$nom = $_POST['cli_nom'];
$prenom = $_POST['cli_prenom'];
$telephone = $_POST['cli_telephone'];
$courriel = $_POST['cli_courriel'];
$societe = $_POST['cli_societe'];
$adresse = $_POST['cli_adresse'];
$ville = $_POST['cli_ville'];
$codePostal = $_POST['cli_code_postal'];
$pays = $_POST['cli_pays'];
$idTypeClient = $_POST['cli_id_type_client'];
$idDevise = $_POST['cli_id_devise'];

//----------------------------------------// Contrôle de Saisie //-----------------------------------------//

//-------------------------> Si les champs des Variables sont vide <-------------------------------- //
$idClientErr = $nomErr = $prenomErr = $telephoneErr = $courrielErr = $societeErr = $adresseErr = $villeErr = $codePostalErr = $paysErr = $idTypeClientErr = $idDeviseErr = "";


//-----------------------// Contrôle de saisie champ nom //----------------------//
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["cli_nom"])) {
    $nomErr = "Le champs nom est obligatoire";
}else{
    $nom = test_input($_POST["cli_nom"]);
//---------------------// Saisie incorrect nom //-----------------------//
    if (!preg_match("/^\p{L}+$/ui",$nom)) {
      $nomErr = "Le champs Nom ne peut être composé que de lettres"; 
    }
 }
 
 
//------------------//Contrôle de saisie champs prenom //------------------//
if (empty($_POST["cli_prenom"])) {
    $prenomErr = "Le champs Prenom est obligatoire";
}else{
    $prenom = test_input($_POST["cli_prenom"]);
//-----------------//Saisie incorrect prénom //-------------------//
    if (!preg_match("/^\p{L}+$/ui",$prenom)) {
     $prenomErr = "Le champs Prenom ne peut étre composé que de lettres"; 
    }
  }
  
  
//---------------//Contrôle de saisie champs téléphone//------------------//
if (empty($_POST["cli_telephone"])) {
    $telephoneErr = "Le champs Téléphone est obligatoire";
}else{
    $telephone = test_input($_POST["cli_telephone"]);
 }
//----------------//vérifier le format de champ téléphone //------------------//
   if (!empty ($_POST['cli_telephone']) && !preg_match("/^[\d\s]{10,}$/",trim($_POST['cli_telephone']))) {
     $telephoneErr .= "Merci de vérifier le format du champ Téléphone";
   } 
  
  
//--------------------//vérifier le format de champ courriel //-------------------//
if (!empty($_POST["cli_courriel"])) {
    if (!filter_var($courriel, FILTER_VALIDATE_EMAIL)) {
      $courrielErr = "Format de courriel non valide"; 
    }
}

//----------------//Contrôle de saisie champs adresse//--------------------//
if (empty($_POST["cli_adresse"])) {
    $adresseErr = "Le champs Adresse est obligatoire";
}else{
    $adresse = test_input($_POST["cli_adresse"]);
 }
  
  
//---------------//Contrôle de saisie champs ville//--------------------//
if (empty($_POST["cli_ville"])) {
    $villeErr = "Le champs Ville est obligatoire";
}else{
    $ville = test_input($_POST["cli_ville"]);
 }
//-----------------//Saisie incorrect Ville //-------------------//
    if (!preg_match("/^\p{L}+$/ui",$ville)) {
     $villeErr = "Le champs ville ne peut étre composé que de lettres"; 
    } 
  
  
//----------------//Contrôle de saisie champs code postal//-----------------//
if (empty($_POST["cli_code_postal"])) {
    $codePostalErr = "Le champs code postal est obligatoire";
}else{
    $codePostal = test_input($_POST["cli_code_postal"]);
 }
 //-------------------//Saisie incorrect code postal//----------------------//
 if (!empty($_POST["cli_code_postal"])) {
    if (!is_numeric($_POST["cli_code_postal"]))  {
  $codePostalErr = "Code postal ne peut étre composé que de chiffres";
    }  
 }
 
//-------------------//Contrôle de saisie champs Pays//--------------------/
if (empty($_POST["cli_pays"])) {
    $paysErr = "Le champs Pays est obligatoire";
}else{
    $pays = test_input($_POST["cli_pays"]);
 }
 //-----------------//Saisie incorrect pays //-------------------//
    if (!preg_match("/^\p{L}+$/ui",$pays)) {
     $paysErr = "Le champs Pays ne peut étre composé que de lettres"; 
    }
  
//-------------------//Contrôle de saisie champs ID client //-------------------// 
// if (empty($_POST["cli_id_client"])) {
//     $idClientErr = "Le champs ID Client est obligatoire";
// }else{
//     $idClient = test_input($_POST["cli_id_client"]);
//  }
// //-------------------vérifier le format de champ ID client //-------------------// 
//   if (!empty ($_POST['cli_id_client'])) {
//     if (!is_numeric($_POST["cli_id_client"]))  {
//     $idClientErr = "Merci de vérifier le format du champ ID Client";
//     }
//   }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }
  
if($idClientErr or $nomErr or $prenomErr or $telephoneErr or $courrielErr or $societeErr or $adresseErr or $villeErr or $codePostalErr or $paysErr or $idTypeClientErr or $idDeviseErr != ""){
	$_SESSION['idClientErr'] = $idClientErr;
	$_SESSION['nomErr'] = $nomErr;
	$_SESSION['prenomErr'] = $prenomErr;
	$_SESSION['telephoneErr'] =$telephoneErr;
	$_SESSION['courrielErr'] = $courrielErr;
	$_SESSION['societeErr'] = $societeErr;
	$_SESSION['adresseErr'] = $adresseErr;
	$_SESSION['villeErr'] = $villeErr;
	$_SESSION['codePostalErr'] = $codePostalErr;
	$_SESSION['paysErr'] = $paysErr;
	$_SESSION['idTypeClientErr'] = $idTypeClientErr;
	$_SESSION['idDeviseErr'] = $idDeviseErr;

	
    Header("Location: ../vue/ClientCreer.php" );
}else{
  
   creerAccept($idClient,$nom,$prenom,$telephone,$courriel,$societe,$adresse,$ville,$codePostal,$pays,$idTypeClient,$idDevise);

   Header("Location: ClientListerInit.php" );

}

?>
