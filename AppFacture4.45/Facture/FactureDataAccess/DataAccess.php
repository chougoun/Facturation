<?php		

function factureListerInit() {
	//:s: d_ListerInit
	$conn = connexion(); 
	$query = "select * from facture";
	$resultat = mysqli_query($conn, $query );

	$factures = array();  
	$i = 0;
	while ( $i < $resultat->num_rows ) {
		//:s: factures
		$row=mysqli_fetch_assoc($resultat);
		/*
		echo $row['id_facture'];
		echo $row['Numero_facture'];
		echo $row['Date_paiment'];
		echo $row['Date_facture'];
		echo $row['Id_client'];
		echo $row['Montant_euro'];
		echo $row['Montant_devise'];
		*/
		$factures[$i] = $row;
		$i++;
	}
	return $factures;	
	//:s: f_ListerInit
}
function findByIdFacture($idfacture){
	//:s: d_findByIdFacture
	$query = "select * from facture where id_facture ='" . $idfacture . "'";
	$conn = connexion(); 
	$resultat = mysqli_query($conn, $query );
	
	if ( $resultat->num_rows > 0 ) {
		// :s: recuperer
		$row=mysqli_fetch_assoc($resultat);
	
		echo $row['id_facture'];
		echo $row['fac_numero_facture'];
		echo $row['fac_date_paiement'];
		echo $row['fac_date_facture'];
		echo $row['fac_id_client'];
		echo $row['fac_montant_euro'];
		echo $row['fac_montant_devise'];
	
	}
	$_SESSION['id'] = $row['id_facture'];
	$_SESSION['num'] = $row['fac_numero_facture'];
	$_SESSION['dPaiement'] = $row['fac_date_paiement'];
	$_SESSION['dFacture'] = $row['fac_date_facture'];
	$_SESSION['idClient'] = $row['fac_id_client'];
	$_SESSION['euro'] = $row['fac_montant_euro'];
	$_SESSION['devise'] = $row['fac_montant_devise'];
	//:s: f_findByIdFacture
}
function findByIdLigneFacture($lfaIdLigneFacture){
	//:s: d_findByIdLigneFacture
	$query = "select * from ligne_facture where id_ligne_facture='" . $lfaIdLigneFacture . "'";
	$conn = connexion(); 
	$resultat = mysqli_query($conn, $query );
	
	if ( $resultat->num_rows > 0 ) {
		// :s: recuperer
		$row=mysqli_fetch_assoc($resultat);
	
		// echo $row['lfa_id_ligne_facture'];
		// echo $row['lfa_quantite'];
		// echo $row['lfa_prix_unitaire_facture'];
		// echo $row['lfa_id_facture'];
		// echo $row['lfa_id_produit'];
	
	}
	$_SESSION['lfa_id_ligne_facture'] = $row['id_ligne_facture'];
	$_SESSION['lfa_quantite'] = $row['lfa_quantite'];
	$_SESSION['lfa_prix_unitaire_facture'] = $row['lfa_prix_unitaire_facture'];
	$_SESSION['lfa_id_facture'] = $row['fac_id_facture'];
	$_SESSION['lfa_id_produit'] = $row['pro_id_produit'];
	//:s: f_findByIdLigneFacture
}

function factureCreerAccept($idFacture,$numeroFacture,$datePaiement,$dateFacture,$idClient,$montantEuro,$montantDevise){
	$txtErreur = "";
	$conn = connexion();
	$query = "select * from facture where fac_id_facture ='" . $idFacture . "'";
	$resultat = mysqli_query($conn, $query );
	
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}	
		echo "connexion réussie";  
		$i = 0;
		$query = "insert into facture values ( '" . $idFacture . "', '" . $numeroFacture . "', '" . $datePaiement . "', '" . $dateFacture . "', '" . $idClient . "' , '" . $montantEuro . "' , '" . $montantDevise . "')";

		echo $query;
	if ($conn->query($query) === TRUE) {
			echo "successfully";
		} else {
			echo "Erreur d'enregistrement " . $conn->error;
	}
	$conn->close();
	}

function factureModifierAccept($idFacture,$numeroFacture,$datePaiement,$dateFacture,$idClient,$montantEuro,$montantDevise){
	$conn = connexion();
	$query = "update facture set fac_numero_facture = '" . $numeroFacture . "', fac_date_paiement = '" . $datePaiement . "', fac_date_facture = '" . $dateFacture . "', fac_id_client = '" . $idClient . "', fac_montant_euro = '" . $montantEuro . "', fac_montant_devise = '" . $montantDevise . "' where id_facture = '" . $idFacture . "'";
	$resultat = mysqli_query($conn, $query );

	if ($conn->query($query) === TRUE) {
		echo "successfully";
	} else {
		echo "Erreur d'enregistrement: " . $conn->error;
	}

}

function factureSupprimerAccept($idFacture){	
	$conn = connexion();
	suprimAllLigneFacture($idFacture);
	$query = "delete from facture where id_facture = '" . $idFacture . "'"; 
	$resultat = mysqli_query($conn, $query );

	if ($conn->query($query) === TRUE) {
		echo "successfully";
	} else {
		echo "Erreur d'enregistrement: " . $conn->error;
	}
}
function suprimAllLignefacture($idFacture){
	$conn = connexion();
	$query = "delete from ligne_facture where fac_id_facture = '" . $idFacture . "'"; 
	echo $query;
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
function regroupByIdFacture($idFacture) {
	$conn = connexion(); 
	$query = "select * from ligne_facture where fac_id_facture = '" . $idFacture . "'";
	$resultat = mysqli_query($conn, $query );

	$ligneFactures = array();  
	$i = 0;
	while ( $i < $resultat->num_rows ) {
		$row=mysqli_fetch_assoc($resultat);
	
	// echo $row['lfa_id_ligne_facture'];
	// echo $row['lfa_quantite'];
	// echo $row['lfa_prix_unitaire_facture'];
	// echo $row['lfa_id_facture'];
	// echo $row['lfa_id_produit'];
	

		$ligneFactures[$i] = $row;
		$i++;
	}
	return $ligneFactures;	
}

function ligneFactureCreerAccept($lfaIdLigneFacture,$lfaQuantite,$lfaPrixUnitaireFacture,$lfaIdFacture,$lfaIdProduit){
	$txtErreur = "";
	$conn = connexion();
	$query = "select * from ligne_facture where id_ligne_facture ='" . $lfaIdLigneFacture . "'";
	$resultat = mysqli_query($conn, $query );
	
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}	
		echo "connexion réussie";  
		$i = 0;
		$query = "insert into ligne_facture values ( '" . $lfaIdLigneFacture . "', '" . $lfaQuantite . "', '" . $lfaPrixUnitaireFacture . "', '" . $lfaIdFacture . "', '" . $lfaIdProduit . "')";

		echo $query;
	if ($conn->query($query) === TRUE) {
			echo "successfully";
		} else {
			echo "Erreur d'enregistrement " . $conn->error;
	}
	$conn->close();
	}

function ligneFactureModifierAccept($lfaIdLigneFacture,$lfaQuantite,$lfaPrixUnitaireFacture,$lfaIdFacture,$lfaIdProduit){
	$conn = connexion();
	$query = "update ligne_facture set lfa_quantite = '" . $lfaQuantite . "', lfa_prix_unitaire_facture = '" . $lfaPrixUnitaireFacture . "', fac_id_facture = '" . $lfaIdFacture . "' where id_ligne_facture = '" . $lfaIdLigneFacture . "'";
	$resultat = mysqli_query($conn, $query );

	if ($conn->query($query) === TRUE) {
		echo "successfully";
	} else {
		echo "Erreur d'enregistrement: " . $conn->error;
	}

}

function ligneFactureSupprimerAccept($lfaIdLigneFacture){	
	$conn = connexion();
	$query = "delete from ligne_facture where id_ligne_facture = '" . $lfaIdLigneFacture . "'"; 
	$resultat = mysqli_query($conn, $query );

	if ($conn->query($query) === TRUE) {
		echo "successfully";
	} else {
		echo "Erreur d'enregistrement: " . $conn->error;
	}
}
function factureValider($idFacture){
	$conn = connexion();
	$query = "select MAX(fac_numero_facture) no_max from facture";
	$resultat = mysqli_query($conn, $query );
	if ($resultat) {
		$rowB = mysqli_fetch_array($resultat);
		var_dump($rowB);
		print_r($rowB);
		echo "TEST 2 : ";
		// echo $rowB['no_max'];
		$no_max_str = $rowB['no_max'];
		echo $no_max_str;
		//feching a result in array format
		// echo $rowB[0]['max(fac_numero_facture)'];
		//accessing array by name of column with max() function of mysql
	} else {
		echo 'Bonjour professeur';
	}
	$numLigne = (int)$no_max_str;
	$numLigne++;
	$query = "update facture set fac_numero_facture = '" . $numLigne . "' where id_facture = '" . $idFacture . "'";
	$resultat = mysqli_query($conn, $query );
	if ($conn->query($query) === TRUE) {
		echo "successfully";
	} else {
		echo "Erreur d'enregistrement: " . $conn->error;
	}
	
	// $connect = mysqli_connect("localhost", "root", "", "carBid") or die("not connected");
	//connection to database
	// $sql2 = "SELECT max(mybid) FROM `bid`";
	//simle select statement with max function
	// $result_set2 = mysqli_query($connect,$sql2);
	//query a result fetch
			
	// $ligne = array();
	// $row = mysql_fetch_array($resultat);
	// echo $row["fac_numero_facture"];
	// $ligne = $resultat->fetch_assoc();
	// echo $ligne["fac_numero_facture"];
	// $row = mysqli_fetch_assoc($resultat);
	// $i = 0;
	// $res = array();
	// $resultat = mysqli_query($bdd, 'SELECT * FROM membres LIMIT 0, 10');
	// while($row = mysqli_fetch_assoc($resultat))
	// {
		// echo $row['fac_numero_facture'];
	// }
	// mysqli_free_result($resultat);
	// $res[$i] = $row;
	// echo $res ['fac_numero_facture'][0]; 	
	// printf ("%s (%s)\n", $row["Name"], $row["CountryCode"]);
	// $comma_separated = implode(",", $res);
	// $rep = implode ( "" , $res );
	// echo $rep;
	// $resultat++;
	// $query = "update facture set fac_id_facture = '" . $lfaIdFacture . "' where id_ligne_facture = '" . $lfaIdLigneFacture . "'";

}
function lfPayementFacture($idFacture){
	$conn = connexion();
	$dPaiement = date('Y-m-d');
	$query = "update facture set fac_date_paiement = '" . $dPaiement . "' where id_facture = '" . $idFacture . "'";
	$resultat = mysqli_query($conn, $query );
	if ($conn->query($query) === TRUE) {
		echo "successfully";
	} else {
		echo "Erreur d'enregistrement: " . $conn->error;
	}
}
function clientInfo($idClient){
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
	$_SESSION['Nom'] = $row['cli_nom'];
	$_SESSION['Prenom'] = $row['cli_prenom'];
	$_SESSION['Telephone'] = $row['cli_telephone'];
	$_SESSION['Adresse'] = $row['cli_adresse'];
	$_SESSION['Ville'] = $row['cli_ville'];
	$_SESSION['Code_postal'] = $row['cli_code_postal'];
	$tauxChange = deviseinfo($row['cli_id_devise']);
	$_SESSION['tauxChange'] = $tauxChange;
}
function deviseinfo($idDevise){
	$query =  "select * from devise where dev_id_devise ='" . $idDevise . "'";
	$conn = connexion(); 
	$resultat = mysqli_query($conn, $query );
	if ( $resultat->num_rows > 0 ) {
		$row=mysqli_fetch_assoc($resultat);
		echo $row['dev_id_devise'];
		echo $row['dev_nom_devise'];
		echo $row['dev_taux_change'];
	}
	$_SESSION['nomDevise'] = $row['dev_nom_devise'];
	return $row['dev_taux_change'];
}
function idDeviseFromIdClient($idClient){
	$query = "select cli_id_devise id from client where cli_id_client ='" . $idClient . "'";
	// echo $query;
	$conn = connexion(); 
	$resultat = mysqli_query($conn, $query );
	if ($resultat) {
		$row = mysqli_fetch_array($resultat);
		$idDevise = $row['id'];
	} else {
		echo 'Erreur';
	}
	return $idDevise;
}
?>




