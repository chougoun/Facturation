<?php
require ('../ClientModel/Model.php');
$idClient = $_GET['id'];

voirInit($idClient); 

Header("Location: ../vue/ClientVoir.php" );
?>