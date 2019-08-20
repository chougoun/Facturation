<?php
require ('../famillemodel/model.php');

$famIdFamille = $_POST['fam_id_famille'];
$famNomFamille = $_POST['fam_nom_famille'];


//----------------------------------------// Contrôle de Saisie //-----------------------------------------//

//-------------------------> Si les champs des Variables sont vide <-------------------------------- //
$famIdFamilleErr = $famNomFamilleErr = "";



//-----------------------// Contrôle de saisie champ nom famille //----------------------//

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fam_nom_famille"])) {
    $famNomFamilleErr = "Le champs Nom Famille est obligatoire";
}else{
    $famNomFamille = test_input($_POST["fam_nom_famille"]);
//-------------------//Saisie incorrect nom famille//----------------------//
    if (!preg_match("/^[\p{L}\s]+$/ui",$famNomFamille)) {
      $famNomFamilleErr = "Le champs Nom famille ne peut être composé que de lettres"; 
    }
 }
  
  
// //-------------------//Contrôle de saisie champs ID famille //-------------------// 
// if (empty($_POST["fam_id_famille"])) {
//     $famIdFamilleErr = "Le champs ID famille est obligatoire";
// }else{
//     $famIdFamille = test_input($_POST["fam_id_famille"]);	
//  }
// //-------------------//Saisie incorrect ID famille//----------------------//
//   if (!empty($_POST["fam_id_famille"])) {
//      if (!is_numeric($_POST["fam_id_famille"]))  {
//        $famIdFamilleErr = "Le champs ID famille ne peut étre composé que de chiffres";
//      }  
//   } 
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if($famIdFamilleErr or $famNomFamilleErr != "") {

	$_SESSION['famIdFamilleErr'] = $famIdFamilleErr;
	$_SESSION['famNomFamilleErr'] = $famNomFamilleErr;

    header("Location: ../vue/FamilleCreer.php" );	
}else{
		creer($famIdFamille,$famNomFamille);

		Header("Location: FamilleListerInit.php" );

} 
 
?>
