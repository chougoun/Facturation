<?php
require ('../SousFamilleModel/Model.php');

$sfaIdSousFamille = $_POST['sfa_id_sous_famille'];
$sfaNomSousFamille = $_POST['sfa_nom_sous_famille'];
$sfaIdFamille = $_POST['id'];


//----------------------------------//Contrôle de Saisie//------------------------------------//

// Si les champs des Variables sont vide 
$sfaIdSousFamilleErr = $sfaNomSousFamilleErr = $sfaIdFamilleErr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["sfa_nom_sous_famille"])) {
    $sfaNomSousFamilleErr = "Le champs nom sous famille est obligatoire";
}else{
    $sfaNomSousFamille = test_input($_POST["sfa_nom_sous_famille"]);
//vérifie si le nom de sous famille ne contient que des lettres et des espaces
    if (!preg_match("/^[\p{L}\s]+$/ui",$sfaNomSousFamille))  {
      $sfaNomSousFamilleErr = "Le nom sous famille ne peut être composé que de lettres et d'espaces blanc"; 

    }
  }

//vérifie si ID sous_famille est présent
// if (empty($_POST["sfa_id_sous_famille"])) {
    // $sfaIdSousFamilleErr = "ID Sous famille requis";
// }else{
    // $sfaIdSousFamille = test_input($_POST["sfa_id_sous_famille"]);	
// }
// if (!empty($_POST["sfa_id_sous_famille"])) {	
   // if (!is_numeric($_POST["sfa_id_sous_famille"]))  {
       // $sfaIdSousFamilleErr = "L'id sous famille ne doit être composé que de chiffres";
    // } 
// }
} 
function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
}



if($sfaIdSousFamilleErr or $sfaNomSousFamilleErr or $sfaIdFamilleErr != "") {
	
	$_SESSION['sfaIdSousFamilleErr'] = $sfaIdSousFamilleErr;
	$_SESSION['sfaNomSousFamilleErr'] = $sfaNomSousFamilleErr;
	$_SESSION['sfaIdFamilleErr'] = $sfaIdFamilleErr;
	
	header("Location: ../vue/SousFamilleCreer.php" );		

}else{
	creer($sfaIdSousFamille,$sfaNomSousFamille,$sfaIdFamille);

	header("Location: SousFamilleListerInit.php" );
} 
 
?>
