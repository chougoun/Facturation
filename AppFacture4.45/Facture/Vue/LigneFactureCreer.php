<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Création d'une ligne de facture</title>

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
     <?php  //require('../FactureModel/Model.php'); ?>
     <?php session_start(); ?>
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
                        <li class="active">
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
                        <li>
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

        <div class="container">
          <div id="Creation">
            <h1 class="text-light" style="text-align: center;">En-tête de facture</h1>
            &nbsp;
              <div class="form-inline">
                <label class="control-label col-sm-2 text-light" for="nom"><b>Nom:</b></label>
                <div class="col-sm-2">
                  <input class="text-light" style="background-color: #6C757D; border: none;" type="text" class="form-control" name="nom" value="<?php echo $_SESSION['Nom'] ?>" readonly>
              </div>
              <div class="col-sm-4"></div>
              <label class="control-label col-sm-2 text-light" for="idFacture"><b>Identifiant de facture:</b></label>
              <div class="col-sm-1">
                  <input class="text-light" style="background-color: #6C757D; border: none;" type="text" class="form-control" name="Id_facture" value="<?php echo $_SESSION['id'] ?>" readonly>
              </div>
          </div>
          <div class="form-inline">
             <label class="control-label col-sm-2 text-light" for="prenom"><b>Prénom:</b></label>
             <div class="col-sm-2">
                <input class="text-light" style="background-color: #6C757D; border: none;" type="text" class="form-control" name="prenom" value="<?php echo $_SESSION['Prenom'] ?>" readonly>
            </div>
            <div class="col-sm-4"></div>
            <label class="control-label col-sm-2 text-light" for="numeroFacture"><b>Numéro de facture:</b></label>
            <div class="col-sm-1">
                <input class="text-light" style="background-color: #6C757D; border: none;" type="text" class="form-control" name="Numero_facture" value="<?php echo $_SESSION['num'] ?>" readonly>
            </div>
        </div>
        <div class="form-inline">
           <label class="control-label col-sm-2 text-light" for="telephone"><b>Téléphone:</b></label>
           <div class="col-sm-2">
              <input class="text-light" style="background-color: #6C757D; border: none;" type="text" class="form-control" name="telephone" value="<?php echo $_SESSION['Telephone'] ?>" readonly>
          </div>
          <div class="col-sm-4"></div>
          <label class="control-label col-sm-2 text-light" for="idClient"><b>Identifiant du client:</b></label>
          <div class="col-sm-1">
              <input class="text-light" style="background-color: #6C757D; border: none;" type="text" class="form-control" name="Id_client" value="<?php echo $_SESSION['idC'] ?>" readonly>
          </div>
      </div>
      <div class="form-inline">
         <label class="control-label col-sm-2 text-light" for="adresse"><b>Adresse:</b></label>
         <div class="col-sm-3">
            <input class="text-light" style="background-color: #6C757D; border: none;" type="text" class="form-control" name="adresse" value="<?php echo $_SESSION['Adresse'] ?>" readonly>
        </div>
    </div>
    <div class="form-inline">
       <label class="control-label col-sm-2 text-light" for="codePostal"><b>Code Postal:</b></label>
       <div class="col-sm-3">
          <input class="text-light" style="background-color: #6C757D; border: none;" type="text" class="form-control" name="codePostal" value="<?php echo $_SESSION['Code_postal'] ?>" readonly>
      </div>
  </div>
  <div class="form-inline">
     <label class="control-label col-sm-2 text-light" for="ville"><b>Ville:</b></label>
     <div class="col-sm-3">
        <input class="text-light" style="background-color: #6C757D; border: none;" type="text" class="form-control" name="ville" value="<?php echo $_SESSION['Ville'] ?>" readonly>
    </div>
</div>
&nbsp;
<div class="form-inline">
   <label class="control-label col-sm-2 text-light" for="dateFacturation"><b>Date de facturation:</b></label>
   <div class="col-sm-3">
      <input class="text-light" style="background-color: #6C757D; border: none;" type="text" class="form-control" name="Date_facture" value="<?php echo $_SESSION['dateF'] ?>" readonly>
  </div>
</div>
<div class="form-inline">
   <label class="control-label col-sm-2 text-light text-light" for="datePaiement"><b>Date de paiement:</b></label>
   <div class="col-sm-3">
      <input class="text-light" style="background-color: #6C757D; border: none;" type="text" class="form-control" name="Date_paiement" value="<?php echo $_SESSION['dateP']; ?>" readonly>
  </div>
</div>
&nbsp;
<hr/>
</div>
</div>

<?php
$txt_erreur = $_SESSION['erreur'];
if ( $txt_erreur == "" ) {
   $lfaIdLigneFacture = "";
   $lfaQuantite = "";
   $lfaPrixUnitaireFacture = "";
   $lfaIdFacture = "";
   $lfaIdProduit = "";
   $lfaQuantiteErr = "";
   $lfaIdProduitErr = "";	
}else{ 
  $txt_erreur = $_SESSION['erreur'];
  $lfaIdLigneFacture = $_SESSION['lfa_id_ligne_facture'];
  $lfaQuantite = $_SESSION['lfa_quantite'];
  $lfaPrixUnitaireFacture = $_SESSION['lfa_prix_unitaire_facture'];
  $lfaIdFacture = $_SESSION['lfa_id_facture'];
  $lfaIdProduit = $_SESSION['lfa_id_produit'];

}
$lfaQuantiteErr = $_SESSION['lfaQuantiteErr'];
$lfaIdProduitErr = $_SESSION['lfaIdProduitErr'];
$idFac = $_GET['idFac'];

?>
<h1 class="text-light">Création d'une Ligne Facture</h1>
<div class="erreur"><?php echo $txt_erreur; ?></div>
<div class="erreur"><?php echo $lfaQuantiteErr; ?></div>
<div class="erreur"><?php echo $lfaIdProduitErr; ?></div>
<form action="../controller/LigneFactureCreerAccept.php" method="POST">
    <div class="form-group">
        <p>ID Ligne Facture : </p><input class="form-control" type="text" name="lfa_id_ligne_facture" value="" size="20" maxlength="3"readonly><BR>
        <p>Quantité : </p><input class="form-control" type="text" name="lfa_quantite" value="" size="20" maxlength="6"><BR>
        <p>Prix Unitaire : </p><input id="prix" class="form-control" type="text" name="lfa_prix_unitaire_facture" value="" size="20" maxlength="30" readonly><BR>
        <p>ID Facture : </p><input class="form-control" type="text" name="lfa_id_facture"  value="<?php echo $idFac; ?>" size="20" maxlength="20"readonly><BR>
        <p>ID du Produit : </p>
        <select class="form-control" name="lfa_id_produit" onchange="check_status(this);"> 
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $base = "projetfacture";
            $conn = mysqli_connect($servername, $username, $password, $base);
            // $conn = connexionDB();
            $query = "SELECT * FROM produit";
            $resultat = mysqli_query($conn, $query );
            $i = 0;
            while ( $i < $resultat->num_rows ) {
                $row = mysqli_fetch_assoc($resultat);
                $res = $row['pro_id_produit'];
                $nom = $row['pro_nom_produit'];
                $prix = $row['pro_prix_unitaire_initial'];
                ?>
                <?php
                echo '<option id="ligne" data-prix-unitaire="'. $prix .'" value="'.$res.'">'.$res.' '.$nom.'</option>';
                $i++;
            }
            ?>
        </select><br>
      </div>
        <div class="form-group">
        <button class="btn btn-dark" type="submit" name="Valider" value="Valider">Valider</button>
        </div>
</form>
<a href="LigneFactureLister.php"><button class="btn btn-light" type="button" value="Annuler">Annuler</button></a>
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

    function check_status(obj) {
    var uid = obj.options[obj.selectedIndex].getAttribute('data-prix-unitaire');
    document.getElementById("prix").value = uid;
}
</script>

</body>
</html>