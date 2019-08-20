<?php		

function produitListerInit() {
	$conn = connexion(); 
	$query = "select * from produit";
	$resultat = mysqli_query($conn, $query );

	$produits = array();  
	$i = 0;
	while ( $i < $resultat->num_rows ) {
		$row=mysqli_fetch_assoc($resultat);

		echo $row['pro_id_produit'];
		echo $row['pro_prix_unitaire_initial'];
		echo $row['pro_nom_produit'];
		echo $row['pro_id_sous_famille'];

		$produits[$i] = $row;
		$i++;
	}
	return $produits;	
}
 function produitVoirInit($proId){
	$query = "select * from produit where pro_id_produit ='" . $proId . "'";
	$conn = connexion(); 
	$resultat = mysqli_query($conn, $query );
	
	if ( $resultat->num_rows > 0 ) {
		$row=mysqli_fetch_assoc($resultat);
	
	
		echo $row['pro_id_produit'];
		echo $row['pro_prix_unitaire_initial'];
		echo $row['pro_nom_produit'];
		echo $row['pro_id_sous_famille'];
		
	
	}
	$_SESSION['id'] = $row['pro_id_produit'];
	$_SESSION['prix'] = $row['pro_prix_unitaire_initial'];
	$_SESSION['nom'] = $row['pro_nom_produit'];
	$_SESSION['idSFA'] = $row['pro_id_sous_famille'];

	}
function produitCreerAccept($proId,$proPrix,$proNom,$proIdSFA){
	$txtErreur = "";
	$conn = connexion();
	$query = "insert into produit values ( '" . $proId . "', '" . $proPrix. "', '" . $proNom . "', '" . $proIdSFA . "')";
	$resultat = mysqli_query($conn, $query );
	
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}	
		echo "connexion réussie";  
		$i = 0;
		$query = "insert into produit values ( '" . $devId . "', '" . $nom. "', '" . $taux . "')";

		echo $query;
	if ($conn->query($query) === TRUE) {
			echo "successfully";
		} else {
			echo "Erreur d'enregistrement " . $conn->error;
	}
	$conn->close();
	}
function produitModifierInit($proId){
	$conn = connexion();
	$query = "select * from produit where pro_id_produit ='" . $proId . "'";
	$resultat = mysqli_query($conn, $query );
	$i = 0;
		if ( $resultat->num_rows > 0 ) {
		$row=mysqli_fetch_assoc($resultat);
	
		echo $row['pro_id_produit'];
		echo $row['pro_prix_unitaire_initial'];
		echo $row['pro_nom_produit'];
		echo $row['pro_id_sous_famille'];
			
		}

	$_SESSION['id'] = $row['pro_id_produit'];
	$_SESSION['prix'] = $row['pro_prix_unitaire_initial'];
	$_SESSION['nom'] = $row['pro_nom_produit'];
	$_SESSION['idSFA'] = $row['pro_id_sous_famille'];
	
}
function produitModifierAccept($proId,$prix,$nom,$idSFA){
	$conn = connexion();
	$query = "update produit set pro_prix_unitaire_initial = '" . $prix . "', pro_nom_produit = '" . $nom . "', pro_id_sous_famille = '" . $idSFA . "' where pro_id_produit = '" . $proId . "'";
	$resultat = mysqli_query($conn, $query );

	if ($conn->query($query) === TRUE) {
		echo "successfully";
	} else {
		echo "Erreur d'enregistrement: " . $conn->error;
	}

}
function produitSupprimerInit($proId){
	$conn = connexion();
	$query = "select * from produit where pro_id_produit ='" . $proId . "'";
	$resultat = mysqli_query($conn, $query );
	
	$i = 0;
	if ( $resultat->num_rows > 0 ) {
		$row=mysqli_fetch_assoc($resultat);
	
		echo $row['pro_id_produit'];
		echo $row['pro_prix_unitaire_initial'];
		echo $row['pro_nom_produit'];
		echo $row['pro_id_sous_famille'];
	
	}
	$_SESSION['id'] = $row['pro_id_produit'];
	$_SESSION['prix'] = $row['pro_prix_unitaire_initial'];
	$_SESSION['nom'] = $row['pro_nom_produit'];
	$_SESSION['idSFA'] = $row['pro_id_sous_famille'];
}
function produitSupprimerAccept($proId){	
	$conn = connexion();
	$query = "delete from produit where pro_id_produit = '" . $proId . "'"; 
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
function regroupByIdProduit($idProduit) {
	$conn = connexion(); 
	$query = "select * from ligne_facture where pro_id_produit = '" . $idProduit . "'";
	// echo $query;
	$resultat = mysqli_query($conn, $query );
	$lignesFactures = array();  
	$i = 0;
	while ( $i < $resultat->num_rows ) {
		$row=mysqli_fetch_assoc($resultat);
	
	// echo $row['lfa_id_ligne_facture'];
	// echo $row['lfa_quantite'];
	// echo $row['lfa_prix_unitaire_facture'];
	// echo $row['lfa_id_facture'];
	// echo $row['lfa_id_produit'];
	

		$lignesFactures[$i] = $row;
		$i++;
	}
	return $lignesFactures;	
}

?>