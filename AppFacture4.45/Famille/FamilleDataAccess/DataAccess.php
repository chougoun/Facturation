<?php		

function familleListerInit() {
	
	$conn = connexion(); 
	$query = "select * from famille";
	$resultat = mysqli_query($conn, $query );

	$familles = array();  
	$i = 0;
	while ( $i < $resultat->num_rows ) {
		$row=mysqli_fetch_assoc($resultat);
	
	
		$familles[$i] = $row;
		$i++;
	}
	return $familles;	
}
 function familleVoirInit($famIdFamille){
	$query = "select * from famille where fam_id_famille ='" . $famIdFamille . "'";
	$conn = connexion(); 
	$resultat = mysqli_query($conn, $query );
	
	if ( $resultat->num_rows > 0 ) {
		$row=mysqli_fetch_assoc($resultat);
	
		echo $row['fam_id_famille'];
		echo $row['fam_nom_famille'];
	
	
	}
	$_SESSION['fam_id_famille'] = $row['fam_id_famille'];
	$_SESSION['fam_nom_famille'] = $row['fam_nom_famille'];
	
	}
function familleCreerAccept($famIdFamille,$famNomFamille){
	$txtErreur = "";
	$conn = connexion();
	$query = "select * from famille where fam_id_famille ='" . $famIdFamille . "'";
	$resultat = mysqli_query($conn, $query );
	
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}	
		echo "connexion réussie";  
		$i = 0;
		$query = "insert into famille values ( '" . $famIdFamille . "', '" . $famNomFamille. "')";

		echo $query;
	if ($conn->query($query) === TRUE) {
			echo "successfully";
		} else {
			echo "Erreur d'enregistrement " . $conn->error;
	}
	$conn->close();
	}
function familleModifierInit($famIdFamille){
	$conn = connexion();
	$query = "select * from famille where fam_id_famille ='" . $famIdFamille . "'";
	$resultat = mysqli_query($conn, $query );
	$i = 0;
		if ( $resultat->num_rows > 0 ) {
		$row=mysqli_fetch_assoc($resultat);
	
		echo $row['fam_id_famille'];
		echo $row['fam_nom_famille'];
	
	
		}
	$_SESSION['fam_id_famille'] = $row['fam_id_famille'];
	$_SESSION['fam_nom_famille'] = $row['fam_nom_famille'];
	
}
function familleModifierAccept($famIdFamille,$famNomFamille){
	$conn = connexion();
	$query = "update famille set fam_nom_famille = '" . $famNomFamille . "' where fam_id_famille = '" . $famIdFamille . "'";
	$resultat = mysqli_query($conn, $query );

	if ($conn->query($query) === TRUE) {
		echo "successfully";
	} else {
		echo "Erreur d'enregistrement: " . $conn->error;
	}

}
function familleSupprimerInit($famIdFamille){
	$conn = connexion();
	$query = "select * from famille where fam_id_famille ='" . $famIdFamille . "'";
	$resultat = mysqli_query($conn, $query );
	
	$i = 0;
	if ( $resultat->num_rows > 0 ) {
		$row=mysqli_fetch_assoc($resultat);
	
		echo $row['fam_id_famille'];
		echo $row['fam_nom_famille'];

	
	}
	$_SESSION['fam_id_famille'] = $row['fam_id_famille'];
	$_SESSION['fam_nom_famille'] = $row['fam_nom_famille'];

}
function familleSupprimerAccept($famIdFamille){	
	$conn = connexion();
	$query =  "delete from famille where fam_id_famille = '" . $famIdFamille . "'"; 
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
function regroupByIdFamille($idFamille) {
	$conn = connexion(); 
	$query = "select * from sous_famille where sfa_id_famille = '" . $idFamille . "'";
	// echo $query;
	$resultat = mysqli_query($conn, $query );
	$sousFamilles = array();  
	$i = 0;
	while ( $i < $resultat->num_rows ) {
		$row=mysqli_fetch_assoc($resultat);
	
	// echo $row['lfa_id_ligne_facture'];
	// echo $row['lfa_quantite'];
	// echo $row['lfa_prix_unitaire_facture'];
	// echo $row['lfa_id_facture'];
	// echo $row['lfa_id_produit'];
	

		$sousFamilles[$i] = $row;
		$i++;
	}
	return $sousFamilles;	
}
?>