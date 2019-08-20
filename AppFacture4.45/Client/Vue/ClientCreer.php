<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Création d'un nouveau client</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../../style.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <?php require('../ClientModel/Model.php'); ?> 
</head>

<body class="bg-secondary">
    <div class="wrapper">
        <nav id="sidebar">
            <div id="dismiss">
                <i class="fas fa-arrow-left"></i>
            </div>
            <div class="sidebar-header">
                <h3>Facturation</h3>
            </div>
            <ul class="list-unstyled components">
                <hr />
                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-cogs"></i>&nbsp;Gérer</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="../../Facture/controller/FactureListerInit.php"><i class="fa fa-receipt"></i>&nbsp;Gérer les factures</a>
                        </li>
                    </ul>
                </li>
                <hr />
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-desktop"></i>&nbsp;Administrer</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="../../TypeClient/controller/TypeClientListerInit.php"><i class="fa fa-address-card"></i>&nbsp;Les types de clients</a>
                        </li>
                        <li class="active">
                            <a href="../../Client/controller/ClientListerInit.php"><i class="fa fa-users"></i>&nbsp;Les clients</a>
                        </li>
                        <li>
                            <a href="../../Devise/controller/DeviseListerInit.php"><i class="fa fa-credit-card"></i>&nbsp;Les devises</a>
                        </li>
                        <li>
                            <a href="../../Famille/controller/FamilleListerInit.php"><i class="fa fa-truck-moving"></i>&nbsp;Les familles</a>
                        </li>
                        <li>
                            <a href="../../SousFamille/controller/SousFamilleListerInit.php"><i class="fa fa-truck-loading"></i>&nbsp;Les sous-familles</a>
                        </li>
                        <li>
                            <a href="../../Produit/controller/ProduitListerInit.php"><i class="fa fa-shopping-basket"></i>&nbsp;Les produits</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="list-unstyled CTAs">
                <li>
                    <a href="../../index.php"><i class="fa fa-home fa-fw" aria-hidden="true"></i>&nbsp;Accueil</a>
                </li>
            </ul>
        </nav>

    <!-- Page Content  -->
    <div id="content">
       <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-dark">
                <i class="fas fa-align-left"></i>
                <span>Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
            </button>
        </div>
       </nav>


    <?php
    $txtErreur = $_SESSION['erreur'];
    if ( $txtErreur == "" ) {
       $idClient = "";
       $nom = "";
       $prenom = "";
       $telephone = "";
       $courriel = "";
       $societe = "";
       $adresse = "";
       $ville = "";
       $codePostal = "";
       $pays = "";
       $idTypeClient = "";
       $idDevise = "";

       $idClientErr ="";
       $nomErr ="";
       $prenomErr ="";
       $telephoneErr  ="";
       $courrielErr ="";
       $societeErr ="";
       $adresseErr ="";
       $villeErr ="";
       $codePostalErr ="";
       $paysErr ="";
       $idTypeClientErr ="";
       $idDeviseErr ="";

   }else{ 
       $txtErreur = $_SESSION['erreur'];
       $idClient = $_SESSION['cli_id_client'];
       $nom = $_SESSION['cli_nom'];
       $prenom = $_SESSION['cli_prenom'];
       $telephone = $_SESSION['cli_telephone'];
       $courriel = $_SESSION['cli_courriel'];
       $societe = $_SESSION['cli_societe'];
       $adresse = $_SESSION['cli_adresse'];
       $ville = $_SESSION['cli_ville'];
       $codePostal = $_SESSION['cli_code_postal'];
       $pays = $_SESSION['cli_pays'];
       $idTypeClient = $_SESSION['cli_id_type_client'];
       $idDevise = $_SESSION['cli_id_devise'];
   }
   $idClientErr = $_SESSION['idClientErr'];
   $nomErr = $_SESSION['nomErr'];
   $prenomErr = $_SESSION['prenomErr'];
   $telephoneErr = $_SESSION['telephoneErr'];
   $courrielErr = $_SESSION['courrielErr'];
   $societeErr = $_SESSION['societeErr'];
   $adresseErr = $_SESSION['adresseErr'];
   $villeErr = $_SESSION['villeErr'];
   $codePostalErr = $_SESSION['codePostalErr'];
   $paysErr = $_SESSION['paysErr'];
   $idTypeClientErr = $_SESSION['idTypeClientErr'];
   $idDeviseErr = $_SESSION['idDeviseErr'];
   ?>
   <div class="erreur"><?php echo $idClientErr; ?></div>
   <div class="erreur"><?php echo $nomErr; ?></div>
   <div class="erreur"><?php echo $prenomErr; ?></div>
   <div class="erreur"><?php echo $telephoneErr; ?></div>
   <div class="erreur"><?php echo $courrielErr; ?></div>
   <div class="erreur"><?php echo $societeErr; ?></div>
   <div class="erreur"><?php echo $adresseErr; ?></div>
   <div class="erreur"><?php echo $villeErr; ?></div>
   <div class="erreur"><?php echo $codePostalErr; ?></div>
   <div class="erreur"><?php echo $paysErr; ?></div>
   <div class="erreur"><?php echo $idTypeClientErr; ?></div>
   <div class="erreur"><?php echo $idDeviseErr; ?></div>

   <h1 class="text-light">Création d'un Client</h1>
   <div class="form-group">
    <form action="../controller/ClientCreerAccept.php" method="POST">
        <p>ID Client : </p><input class="form-control" type="text" name="cli_id_client" value="" size="20" maxlength="20" readonly><BR>
        <p>Nom : </p><input class="form-control" type="text" name="cli_nom" value="" size="20" maxlength="30"><BR>
        <p>Prénom : </p><input class="form-control" type="text" name="cli_prenom" value="" size="20" maxlength="30"><BR>
        <p>Téléphone : </p><input class="form-control" type="text" name="cli_telephone" value="" size="20" maxlength="20"><BR>
        <p>Courriel : </p><input class="form-control" type="text" name="cli_courriel" value="" size="20" maxlength="60"><BR>
        <p>Societé : </p><input class="form-control" type="text" name="cli_societe" value="" size="20" maxlength="50"><BR>
        <p>Adresse : </p><input class="form-control" type="text" name="cli_adresse" value="" size="20" maxlength="50"><BR>
        <p>Ville : </p><input class="form-control" type="text" name="cli_ville" value="" size="20" maxlength="30"><BR>
        <p>Code Postal: </p><input class="form-control" type="text" name="cli_code_postal" value="" size="20" maxlength="5"><BR>
        <p>Pays : </p><input class="form-control" type="text" name="cli_pays" value="" size="20" maxlength="25"><BR>
        <p>ID Type Client: </p>
  <select class="form-control" name="cli_id_type_client"> 
<?php
$conn = connexionDB();
$query = "SELECT * FROM type_client";
$resultat = mysqli_query($conn, $query );
$i = 0;
while ( $i < $resultat->num_rows ) {
		$row = mysqli_fetch_assoc($resultat);
		$res = $row['tcl_id_type_client'];
    $activite = $row['tcl_activite'];
		echo '<option value="'.$res.'">'.$res.' '. $activite.'</option>';
		$i++;
}
?>
   </select><br><br>
   <p>ID Devise: </p> 
  <select class="form-control" name="cli_id_devise"> 
<?php
$conn = connexionDB();
$query = "SELECT * FROM devise";
$resultat = mysqli_query($conn, $query );
$i = 0;
while ( $i < $resultat->num_rows ) {
		$row = mysqli_fetch_assoc($resultat);
		$res = $row['dev_id_devise'];
    $nom = $row['dev_nom_devise'];
		echo '<option value="'.$res.'">'.$res.' '. $nom .'</option>';
		$i++;
}
?>
   </select><br><br>
        <a><button class="btn btn-dark" type="submit" name="Valider" value="Valider">Valider</button></a>
        <a href="../controller/ClientListerInit.php"><button class="btn btn-light" type="button" value="Annuler">Annuler</button></a>
    </form>
   </div>
</div>

<div class="overlay"></div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });

        $('#dismiss, .overlay').on('click', function () {
            $('#sidebar').removeClass('active');
            $('.overlay').removeClass('active');
        });

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').addClass('active');
            $('.overlay').addClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    });
</script>

</body>
</html>