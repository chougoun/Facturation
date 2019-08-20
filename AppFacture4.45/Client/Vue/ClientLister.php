<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Gestion des clients</title>

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

        <h1 class="text-light">Liste des clients</h1>
        <div class="col-lg-12">
                <table class="table table-responsive">
                    <thead>
                        <tr class="text-light">
                            <th scope="col" class="styletable">ID Client</th>
                            <th scope="col" class="styletable">Nom </th>
                            <th scope="col" class="styletable">Prenom</th>
                            <th scope="col" class="styletable">Telephone </th>
                            <th scope="col" class="styletable">Courriel </th>
                            <th scope="col" class="styletable">Societe </th>
                            <th scope="col" class="styletable">Adresse </th>
                            <th scope="col" class="styletable">Ville </th>
                            <th scope="col" class="styletable">Code Postal</th>
                            <th scope="col" class="styletable">Pays </th>
                            <th scope="col" class="styletable">ID Type Client </th>
                            <th scope="col" class="styletable">ID Devise </th>
                        </tr>
                    </thead>

                    <?php 
                    $clients = $_SESSION['clients'];
                    ?>
                    <?php for ($i = 0 ; $i < sizeof( $clients ) ; $i++ ) { ?>
                        <thead>
                            <tr class="text-light">
                                <td><?php echo $clients[$i]['cli_id_client']; ?> </td>
                                <td><?php echo $clients[$i]['cli_nom']; ?> </td>
                                <td><?php echo $clients[$i]['cli_prenom']; ?> </td>
                                <td><?php echo $clients[$i]['cli_telephone']; ?> </td>
                                <td><?php echo $clients[$i]['cli_courriel']; ?> </td>
                                <td><?php echo $clients[$i]['cli_societe']; ?> </td>
                                <td><?php echo $clients[$i]['cli_adresse']; ?> </td>
                                <td><?php echo $clients[$i]['cli_ville']; ?> </td>
                                <td><?php echo $clients[$i]['cli_code_postal']; ?> </td>
                                <td><?php echo $clients[$i]['cli_pays']; ?> </td>
                                <td><?php echo $clients[$i]['cli_id_type_client']; ?> </td>
                                <td><?php echo $clients[$i]['cli_id_devise']; ?> </td>
                                <td><a href="../controller/ClientVoirInit.php?id=<?php echo $clients[$i]['cli_id_client']; ?>"> <button class="btn btn-light">Voir</button></a></td>
                                <td><a href="../controller/ClientModifierInit.php?id=<?php echo $clients[$i]['cli_id_client']; ?>"> <button class="btn btn-white">Modifier</button></a></td>
                                <?php
                                $factures = array();
                                $factures = regroupBy($clients[$i]['cli_id_client']);
                                if(!empty($factures)){
                                    ?>
                                    <td><a href="../controller/ClientSupprimerInit.php?id=<?php echo $clients[$i]['cli_id_client']; ?>"> <button class="btn btn-dark" disabled>Supprimer</button></a></td>
                                    <?php
                                }else{
                                    ?>
                                <td><a href="../controller/ClientSupprimerInit.php?id=<?php echo $clients[$i]['cli_id_client']; ?>"> <button class="btn btn-dark">Supprimer</button></a></td>
                                <?php
                                }
                                ?>
                            </tr>
                        </thead>
                    <?php } ?>
                </table>
                <a href="ClientCreer.php"><button class="btn btn-dark">Créer</button></a>
                <a href="../../Index.php"><button class="btn btn-light">Retour à l'Accueil</button></a>
            
        </div>
    </div>
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
