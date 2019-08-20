<?php		

function clientListerInit() {
	$conn = connexion(); 
	$query = "select * from client";
	$resultat = mysqli_query($conn, $query );

	$clients = array();  
	$i = 0;
	while ( $i < $resultat->num_rows ) {
		$row=mysqli_fetch_assoc($resultat);
	
	echo $row['cli_id_client'];
	echo $row['cli_nom'];
	echo $row['cli_prenom'];
	echo $row['cli_telephone'];
	echo $row['cli_courriel'];
	echo $row['cli_societe'];
	echo $row['cli_adresse'];
	echo $row['cli_ville'];
	echo $row['cli_code_postal'];
	echo $row['cli_pays'];
	echo $row['cli_id_type_client'];
	echo $row['cli_id_devise'];

		$clients[$i] = $row;
		$i++;
	}
	return $clients;	
}
 function clientVoirInit($idClient){
	$query = "select * from client where cli_id_client ='" . $idClient . "'";
	$conn = connexion(); 
	$resultat = mysqli_query($conn, $query );
	
	if ( $resultat->num_rows > 0 ) {
		$row=mysqli_fetch_assoc($resultat);
		echo $row['cli_id_client'];
		echo $row['cli_nom'];
		echo $row['cli_prenom'];
		echo $row['cli_telephone'];
		echo $row['cli_courriel'];
		echo $row['cli_societe'];
		echo $row['cli_adresse'];
		echo $row['cli_ville'];
		echo $row['cli_code_postal'];
		echo $row['cli_pays'];
		echo $row['cli_id_type_client'];
		echo $row['cli_id_devise'];
	
	}
	
	$_SESSION['Id_client'] = $row['cli_id_client'];
	$_SESSION['Nom'] = $row['cli_nom'];
	$_SESSION['Prenom'] = $row['cli_prenom'];
	$_SESSION['Telephone'] = $row['cli_telephone'];
	$_SESSION['Courriel'] = $row['cli_courriel'];
	$_SESSION['Societe'] = $row['cli_societe'];
	$_SESSION['Adresse'] = $row['cli_adresse'];
	$_SESSION['Ville'] = $row['cli_ville'];
	$_SESSION['Code_postal'] = $row['cli_code_postal'];
	$_SESSION['Pays'] = $row['cli_pays'];
	$_SESSION['Id_type_client'] = $row['cli_id_type_client'];
	$_SESSION['Id_devise'] = $row['cli_id_devise'];
	}
function clientCreerAccept($idClient,$nom,$prenom,$telephone,$courriel,$societe,$adresse,$ville,$codePostal,$pays,$idTypeClient,$idDevise){
	$txtErreur = "";
	$conn = connexion();
	$query = "insert into client values ( '" . $idClient . "', '" . $nom . "', '" . $prenom . "', '" . $telephone . "' , '" . $courriel . "', '" . $societe . "', '" . $adresse. "', '" . $ville . "', '" . $codePostal . "', '" . $pays . "', '" . $idTypeClient . "', '" . $idDevise . "')";
	echo $query;
	// $resultat = mysqli_query($conn, $query );
	
	if ($conn->query($query) === TRUE) {
		echo "successfully";
	} else {
		echo "Erreur d'enregistrement " . $conn->error;
	}
	$conn->close();
	}

	
function clientModifierInit($idClient){
	$conn = connexion();
	$query = "select * from client where cli_id_client ='" . $idClient . "'";
	$resultat = mysqli_query($conn, $query );
	$i = 0;
		if ( $resultat->num_rows > 0 ) {
		$row=mysqli_fetch_assoc($resultat);
		
		echo $row['cli_id_client'];
		echo $row['cli_nom'];
		echo $row['cli_prenom'];
		echo $row['cli_telephone'];
		echo $row['cli_courriel'];
		echo $row['cli_societe'];
		echo $row['cli_adresse'];
		echo $row['cli_ville'];
		echo $row['cli_code_postal'];
		echo $row['cli_pays'];
		echo $row['cli_id_type_client'];
		echo $row['cli_id_devise'];	
		
		}
	$_SESSION['Id_client'] = $row['cli_id_client'];
	$_SESSION['Nom'] = $row['cli_nom'];
	$_SESSION['Prenom'] = $row['cli_prenom'];
	$_SESSION['Telephone'] = $row['cli_telephone'];
	$_SESSION['Courriel'] = $row['cli_courriel'];
	$_SESSION['Societe'] = $row['cli_societe'];
	$_SESSION['Adresse'] = $row['cli_adresse'];
	$_SESSION['Ville'] = $row['cli_ville'];
	$_SESSION['Code_postal'] = $row['cli_code_postal'];
	$_SESSION['Pays'] = $row['cli_pays'];
	$_SESSION['Id_type_client'] = $row['cli_id_type_client'];
	$_SESSION['Id_devise'] = $row['cli_id_devise'];
}
function clientModifierAccept($idClient,$nom,$prenom,$telephone,$courriel,$societe,$adresse,$ville,$codePostal,$pays,$idTypeClient,$idDevise){
	$conn = connexion();
	$query = "update client set cli_nom = '" . $nom . "', cli_prenom = '" . $prenom . "', cli_telephone = '" . $telephone . "', cli_courriel = '" . $courriel . "', cli_societe = '" . $societe . "', cli_adresse = '" . $adresse . "', cli_ville = '" . $ville . "', cli_code_postal = '" . $codePostal . "', cli_pays = '" . $pays . "', cli_id_type_client = '" . $idTypeClient . "', cli_id_devise = '" . $idDevise . "' where cli_id_client = '" . $idClient . "'";
	$resultat = mysqli_query($conn, $query );

	if ($conn->query($query) === TRUE) {
		echo "successfully";
	} else {
		echo "Erreur d'enregistrement: " . $conn->error;
	}

}
function clientSupprimerInit($idClient){
	$conn = connexion();
	$query = "select * from client where cli_id_client ='" . $idClient . "'";
	$resultat = mysqli_query($conn, $query );
	
	$i = 0;
	if ( $resultat->num_rows > 0 ) {
		$row=mysqli_fetch_assoc($resultat);
	
		echo $row['cli_id_client'];
		echo $row['cli_nom'];
		echo $row['cli_prenom'];
		echo $row['cli_telephone'];
		echo $row['cli_courriel'];
		echo $row['cli_societe'];
		echo $row['cli_adresse'];
		echo $row['cli_ville'];
		echo $row['cli_code_postal'];
		echo $row['cli_pays'];
		echo $row['cli_id_type_client'];
		echo $row['cli_id_devise'];
	
	}
	$_SESSION['Id_client'] = $row['cli_id_client'];
	$_SESSION['Nom'] = $row['cli_nom'];
	$_SESSION['Prenom'] = $row['cli_prenom'];
	$_SESSION['Telephone'] = $row['cli_telephone'];
	$_SESSION['Courriel'] = $row['cli_courriel'];
	$_SESSION['Societe'] = $row['cli_societe'];
	$_SESSION['Adresse'] = $row['cli_adresse'];
	$_SESSION['Ville'] = $row['cli_ville'];
	$_SESSION['Code_postal'] = $row['cli_code_postal'];
	$_SESSION['Pays'] = $row['cli_pays'];
	$_SESSION['Id_type_client'] = $row['cli_id_type_client'];
	$_SESSION['Id_devise'] = $row['cli_id_devise'];
}
function clientSupprimerAccept($idClient){	
	$conn = connexion();
	$query = "delete from client where cli_id_client = '" . $idClient . "'"; 
	$resultat = mysqli_query($conn, $query );

	if ($conn->query($query) === TRUE) {
		echo "successfully";
	} else {
		echo "Erreur d'enregistrement: " . $conn->error;
	}
}
function connexion(){
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$base = "projetfacture";
	$conn = mysqli_connect($servername, $username, $password, $base );
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
		return $conn;
}

function regroupByIdClient($idClient) {
	$conn = connexion(); 
	$query = "select * from facture where fac_id_client = '" . $idClient . "'";
	// echo $query;
	$resultat = mysqli_query($conn, $query );
	$factures = array();  
	$i = 0;
	while ( $i < $resultat->num_rows ) {
		$row=mysqli_fetch_assoc($resultat);
	
	// echo $row['lfa_id_ligne_facture'];
	// echo $row['lfa_quantite'];
	// echo $row['lfa_prix_unitaire_facture'];
	// echo $row['lfa_id_facture'];
	// echo $row['lfa_id_produit'];
	

		$factures[$i] = $row;
		$i++;
	}
	return $factures;	
}	

?>