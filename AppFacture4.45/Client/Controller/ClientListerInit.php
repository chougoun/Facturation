<?php

require_once ('../ClientModel/Model.php');
require ('../../ValidationFormat.php');

$clients = array();  
$clients = findAll();

$_SESSION['clients'] = $clients;
$_SESSION['erreur'] = "";

Header("Location: ../vue/ClientLister.php" );

?>