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
  $idClient = $_SESSION['Id_client'];
  $nom = $_SESSION['Nom'];
  $prenom = $_SESSION['Prenom'];
  $telephone = $_SESSION['Telephone'];
  $courriel = $_SESSION['Courriel'];
  $adresse = $_SESSION['Adresse'];
  $societe = $_SESSION['Societe'];
  $ville = $_SESSION['Ville'];
  $codePostal = $_SESSION['Code_postal'];
  $pays = $_SESSION['Pays'];
  $idTypeClient = $_SESSION['Id_type_client'];
  $idDevise = $_SESSION['Id_devise'];
?>

<h1 class="text-light">Client Voir</h1>

<div class="form-group">
<p>ID Client : </p><input class="form-control" type="text" name="Id_client" value="<?php echo $idClient ; ?>" size="20" maxlength="20" readonly><BR>
<p>Nom : </p><input class="form-control" type="text" name="Nom" value="<?php echo $nom ; ?>" size="20" maxlength="30" readonly><BR>
<P>Prenom : </P><input class="form-control" type="text" name="Prenom" value="<?php echo $prenom ; ?>" size="20" maxlength="30" readonly><BR>
<p>Telephone : </p><input class="form-control" type="text" name="Telephone" value="<?php echo $telephone; ?>" size="20" maxlength="20" readonly><BR>
<p>Courriel : </p><input class="form-control" type="text" name="Courriel" value="<?php echo $courriel; ?>" size="20" maxlength="60" readonly><BR>
<p>Societe : </p><input class="form-control" type="text" name="Societe" value="<?php echo $societe; ?>" size="20" maxlength="50" readonly><BR>
<p>Adresse : </p><input class="form-control" type="text" name="Adresse" value="<?php echo $adresse; ?>" size="20" maxlength="50" readonly><BR>
<p>Ville : </p><input class="form-control" type="text" name="Ville" value="<?php echo $ville; ?>" size="20" maxlength="30" readonly><BR>
<p>Code Postal: </p><input class="form-control" type="text" name="Code_postal" value="<?php echo $codePostal; ?>" size="20" maxlength="5" readonly><BR>
<p>Pays : </p><input class="form-control" type="text" name="Pays" value="<?php echo $pays; ?>" size="20" maxlength="25" readonly><BR>
<p>Id Type Client: </p><input class="form-control" type="text" name="Id_type_client" value="<?php echo $idTypeClient; ?>" size="20" maxlength="3" readonly><BR>
<p>Id Devise : </p><input class="form-control" type="text" name="Id_devise" value="<?php echo $idDevise; ?>" size="20" maxlength="3" readonly><BR>
<a href="../controller/ClientListerInit.php"><button class="btn btn-dark">Retour</button></a>
<div class="form-group">

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