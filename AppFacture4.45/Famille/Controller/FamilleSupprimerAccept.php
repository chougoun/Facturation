<?php
require ('../FamilleModel/Model.php');

$famIdFamille = $_POST['fam_id_famille'];
$famNomFamille = $_POST['fam_nom_famille'];

supprimerAccept($famIdFamille,$famNomFamille);

Header("Location: FamilleListerInit.php" );
?>