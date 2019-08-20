<?php
require ('../SousFamilleModel/Model.php');

$sfaIdSousFamille = $_POST['sfa_id_sous_famille'];
$sfaNomSousFamille = $_POST['sfa_nom_sous_famille'];
$sfaIdFamille = $_POST['sfa_id_famille'];
// echo $sfaNomSousFamille;

//----------------------------------//Contrôle de Saisie//------------------------------------//

//-------------------------> Si les champs des Variables sont vide <-------------------------------- //
$sfaNomSousFamilleErr = "";

//-----------------------// Contrôle de saisie champ nom sous famille //----------------------//

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["sfa_nom_sous_famille"])) {
    $sfaNomSousFamilleErr = "Le champs Nom sous Famille est obligatoire";
}else{
    $sfaNomSousFamille = test_input($_POST["sfa_nom_sous_famille"]);
//vérifie si le nom de sous famille ne contient que des lettres et des espaces
    if (!preg_match("/^[\p{L}\s]+$/ui",$sfaNomSousFamille))  {
      $sfaNomSousFamilleErr = "Le nom sous famille ne peut être composé que de lettres et d'espaces blanc"; 
    }
  }
} 
function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
}

if($sfaNomSousFamilleErr != "") {

	$_SESSION['sfaIdSousFamilleErr'] = $sfaIdSousFamilleErr;
	$_SESSION['sfaNomSousFamilleErr'] = $sfaNomSousFamilleErr;
	$_SESSION['sfaIdFamille'] = $sfaIdFamilleErr;
	
	header("Location: ../vue/SousFamilleModifier.php" );		
}else{

	modifierAccept($sfaIdSousFamille,$sfaNomSousFamille,$sfaIdFamille );

	 header("Location: SousFamilleListerInit.php" );	
}	
?>