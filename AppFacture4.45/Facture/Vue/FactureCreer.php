<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Typologie des clients</title>

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
    <?php require('../FactureModel/Model.php'); ?>
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

        <h1 class="text-light">Création d'une Facture</h1>
        <?php
        $txt_erreur = $_SESSION['erreur'];
        if ( $txt_erreur == "" ) {
         $Id_facture = "";
         $Numero_facture = "";
         $Date_paiement = "";
         $Date_facture = "";
         $Id_client = "";
         $Montant_euro= "";
         $Montant_devise="";
         $idClientErr = "";
     }else{ 
         $txt_erreur = $_SESSION['erreur'];
         $Id_client = $_SESSION['Id_client'];	  		  
     }
     $idClientErr = $_SESSION['Id_clientErr'];
     ?>
     <div class="erreur"><?php echo $txt_erreur; ?></div>
     <div class="erreur"><?php echo $idClientErr; ?></div>
     <form action="../Controller/FactureCreerAccept.php" method="POST">
        <div class="form-group">
            <p>ID Facture : </p><input class="form-control" type="text" name="Id_facture" value="" size="20" maxlength="3"readonly><BR>
            <p>Numéro Facture : </p><input class="form-control" type="text" name="Numero_facture" value="" size="20" maxlength="6" readonly><BR>
            <p>Date Facture : </p><input class="form-control" type="date" name="Date_facture" value="" size="20" maxlength="30"><BR>
            <p>Date Paiement : </p><input class="form-control" type="text" name="Date_paiement" value="" size="20" maxlength="20"readonly><BR>
            <p>ID Client : </p>
            <select class="form-control" name="Id_client"> 
                <?php
                $conn = connexionDB();
                $query = "SELECT * FROM client";
                $resultat = mysqli_query($conn, $query );
                $i = 0;
                while ( $i < $resultat->num_rows ) {
                    $row = mysqli_fetch_assoc($resultat);
                    $res = $row['cli_id_client'];
                    $nom = $row['cli_nom'];
                    $prenom = $row['cli_prenom'];
                    echo '<option value="'.$res.'">'.$res.' '.$nom.' '. $prenom .'</option>';
                    $i++;
                }
                ?>
            </select><br><br>
            <p>Montant Euro : </p><input class="form-control" type="text" name="Montant_euro" value="" size="20" maxlength="6"readonly><BR>
            <p>Montant Devise : </p><input class="form-control" type="text" name="Montant_devise" value="" size="20" maxlength="6" readonly><BR>
            <button class="btn btn-dark" type="submit" name="Valider" value="Enregistrer temporairement">Enregistrer temporairement</button>
            <a href="FactureLister.php?base=0&err=non"><button class="btn btn-light" type="button" value="Annuler">Annuler</button></a>
        </div>
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