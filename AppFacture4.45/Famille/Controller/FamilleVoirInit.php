<?php
require ('../FamilleModel/Model.php');

$famIdFamille = $_GET['fam_id_famille'];

voir($famIdFamille);

 Header("Location: ../Vue/FamilleVoir.php" );
?>