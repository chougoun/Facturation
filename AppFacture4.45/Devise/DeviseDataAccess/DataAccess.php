<?php		

function deviseListerInit() {
	$conn = connexion(); 
	$query = "select * from devise";
	$resultat = mysqli_query($conn, $query );

	$devises = array();  
	$i = 0;
	while ( $i < $resultat->num_rows ) {
		$row=mysqli_fetch_assoc($resultat);
		/*
		echo $row['id'];
		echo $row['nom'];
		echo $row['prenom'];
		echo $row['telephone'];
		*/
		$devises[$i] = $row;
		$i++;
	}
	return $devises;	
}
 function deviseVoirInit($devId){
	$query = "select * from devise where dev_id_devise ='" . $devId . "'";
	$conn = connexion(); 
	$resultat = mysqli_query($conn, $query );
	
	if ( $resultat->num_rows > 0 ) {
		$row=mysqli_fetch_assoc($resultat);
	
		echo $row['dev_id_devise'];
		echo $row['dev_nom_devise'];
		echo $row['dev_taux_change'];
	
	}
	$_SESSION['id'] = $row['dev_id_devise'];
	$_SESSION['nom'] = $row['dev_nom_devise'];
	$_SESSION['taux'] = $row['dev_taux_change'];
	}
function deviseCreerAccept($devId,$nom,$taux){
	$txtErreur = "";
	$conn = connexion();
	$query = "select * from devise where dev_id_devise ='" . $devId . "'";
	$resultat = mysqli_query($conn, $query );
	
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}	
		echo "connexion réussie";  
		$i = 0;
		$query = "insert into devise values ( '" . $devId . "', '" . $nom. "', '" . $taux . "')";

		echo $query;
	if ($conn->query($query) === TRUE) {
			echo "successfully";
		} else {
			echo "Erreur d'enregistrement " . $conn->error;
	}
	$conn->close();
	}
function deviseModifierInit($devId){
	$conn = connexion();
	$query = "select * from devise where dev_id_devise ='" . $devId . "'";
	$resultat = mysqli_query($conn, $query );
	$i = 0;
		if ( $resultat->num_rows > 0 ) {
		$row=mysqli_fetch_assoc($resultat);
	
		echo $row['dev_id_devise'];
		echo $row['dev_nom_devise'];
		echo $row['dev_taux_change'];
	
		}
	$_SESSION['id'] = $row['dev_id_devise'];
	$_SESSION['nom'] = $row['dev_nom_devise'];
	$_SESSION['taux'] = $row['dev_taux_change'];
	
}
function deviseModifierAccept($devId,$nom,$taux){
	$conn = connexion();
	$query = "update devise set dev_nom_devise = '" . $nom . "', dev_taux_change = '" . $taux . "' where dev_id_devise = '" . $devId . "'";
	$resultat = mysqli_query($conn, $query );

	if ($conn->query($query) === TRUE) {
		echo "successfully";
	} else {
		echo "Erreur d'enregistrement: " . $conn->error;
	}

}
function deviseSupprimerInit($devId){
	$conn = connexion();
	$query = "select * from devise where dev_id_devise ='" . $devId . "'";
	$resultat = mysqli_query($conn, $query );
	
	$i = 0;
	if ( $resultat->num_rows > 0 ) {
		$row=mysqli_fetch_assoc($resultat);
	
		echo $row['dev_id_devise'];
		echo $row['dev_nom_devise'];
		echo $row['dev_taux_change'];
	
	}
	$_SESSION['id'] = $row['dev_id_devise'];
	$_SESSION['nom'] = $row['dev_nom_devise'];
	$_SESSION['taux'] = $row['dev_taux_change'];
}
function deviseSupprimerAccept($devId){	
	$conn = connexion();
	$query =  "delete from devise where dev_id_devise = '" . $devId . "'"; 
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

function regroupByIdDevise($idDevise) {
	$conn = connexion(); 
	$query = "select * from client where cli_id_devise = '" . $idDevise . "'";
	// echo $query;
	$resultat = mysqli_query($conn, $query );
	$clients = array();  
	$i = 0;
	while ( $i < $resultat->num_rows ) {
		$row=mysqli_fetch_assoc($resultat);
	
	// echo $row['lfa_id_ligne_facture'];
	// echo $row['lfa_quantite'];
	// echo $row['lfa_prix_unitaire_facture'];
	// echo $row['lfa_id_facture'];
	// echo $row['lfa_id_produit'];
	

		$clients[$i] = $row;
		$i++;
	}
	return $clients;	
}	
?>