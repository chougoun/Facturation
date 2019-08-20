<?php
require ('../ClientModel/Model.php');

$idClient = $_POST['Id_client'];
$nom = $_POST['Nom'];
$prenom = $_POST['Prenom'];
$telephone = $_POST['Telephone'];
$courriel = $_POST['Courriel'];
$societe = $_POST['Societe'];
$adresse = $_POST['Adresse'];
$ville = $_POST['Ville'];
$codePostal = $_POST['Code_postal'];
$pays = $_POST['Pays'];
$idTypeClient = $_POST['Id_type_client'];
$idDevise = $_POST['Id_devise'];

modifierAccept($idClient,$nom,$prenom,$telephone,$courriel,$societe,$adresse,$ville,$codePostal,$pays,$idTypeClient,$idDevise);

Header("Location: ClientListerInit.php" );

?>