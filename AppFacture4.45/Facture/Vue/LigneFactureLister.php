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
  <?php session_start(); 
  $choix = $_SESSION['choix'];
  $tauxChange = $_SESSION['tauxChange'];
  if($choix == 'V'){
    ?>
    <style>
    .remove {
      display:none;
    }
    .removeButton{
      display:none;
    }
  </style>
  <?php
}else{
	?>
  <style>
  .remove {
    display:none;
  }
</style>
<?php
}
?>
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
      <?php 
      $ligneFactures = $_SESSION['ligneFactures'];
      $resTotal = 0;
      $resDeviseTotal = 0;
      for ($i = 0 ; $i < sizeof( $ligneFactures ) ; $i++ ) { 
        $res = 0;
        $res = $res + $ligneFactures[$i]['lfa_prix_unitaire_facture'];
        $res = $res * $ligneFactures[$i]['lfa_quantite'];
        $resTotal = $resTotal + $res;
      }
      $resDeviseTotal = $resTotal * $tauxChange;
      ?>
      <div id="Creation">
        <h1 class="text-light" style="text-align: center;">En-tête de facture</h1>
        &nbsp;
        <form class="form-horizontal" action="../Controller/factureModifierAccept.php?choix=<?php echo 'L' ?>" method="POST">
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
<div class="form-inline">
 <label class="control-label col-sm-2 text-light" for="montantDevise"><b>Montant en devises:</b></label>
 <div class="col-sm-3">
  <input class="text-light" style="background-color: #6C757D; border: none;" type="text" class="form-control" name="Montant_devise" value="<?php echo $resDeviseTotal ?>" readonly>
</div>
</div>
<div class="form-inline">
 <label class="control-label col-sm-2 text-light" for="montantEuros"><b>Montant en euros:</b></label>
 <div class="col-sm-3">
  <input class="text-light" style="background-color: #6C757D; border: none;" type="text" class="form-control" name="Montant_euro" value="<?php echo $resTotal; ?>" readonly>
</div>
</div>
&nbsp;
<button style="float: right;" class="btn btn-dark removeButton" type="submit" name="Valider" value="Enregistrez temporairement la facture">Enregistrer temporairement</button>
</div>

<div class="remove">
</form>
<form action="../Controller/factureCreerAccept.php" method="POST">
  <input type="text" name="Id_facture" value="<?php echo $_SESSION['id'] ?>" size="20" maxlength="3" readonly><BR>
  <input type="text" name="Numero_facture" value="<?php echo $_SESSION['num'] ?>" size="20" maxlength="6"readonly><BR>
  <input type="text" name="Date_facture" value="<?php echo $_SESSION['dateF'] ?>" size="20" maxlength="30"readonly><BR>
  <input type="text" name="Date_paiement" value="<?php echo $_SESSION['mDevise'] ?>" size="20" maxlength="20"readonly><BR>
  <input type="text" name="Id_client" value="<?php echo $_SESSION['idC'] ?>" maxlength="3"readonly><BR>
  <input type="text" name="Montant_euro" value="<?php echo $res; ?>" size="20" maxlength="6"readonly><BR>
  <input type="text" name="Montant_devise" value="<?php echo '0000-00-00'; ?>" size="20" maxlength="6"readonly><BR>
  <input type="submit" name="Valider" value="Modifier de Facture">
</div>
</form>
</div>
&nbsp;
<hr/>
&nbsp;

<h1 class="text-light">Détail de la Facture</h1>
<table class="table table-striped">
  <tr class="text-light">
    <th class="styletable">ID Ligne Facture</th>
    <th class="styletable">Quantité</th>
    <th class="styletable">Prix Unitaire</th>
    <th class="styletable">ID Facture</th>
    <th class="styletable">ID Produit</th>
  </tr>
  <?php 
  for ($i = 0 ; $i < sizeof( $ligneFactures ) ; $i++ ) { 
    ?>
    <tr class="text-light">
      <td><?php echo $ligneFactures[$i]['id_ligne_facture']; ?> </td>
      <td><?php echo $ligneFactures[$i]['lfa_quantite']; ?> </td>
      <td><?php echo $ligneFactures[$i]['lfa_prix_unitaire_facture']; ?> </td>
      <td><?php echo $ligneFactures[$i]['fac_id_facture']; ?> </td>
      <td><?php echo $ligneFactures[$i]['pro_id_produit']; ?> </td>
      <td><a href="../controller/LigneFactureVoirInit.php?lfa_id_ligne_facture=<?php echo $ligneFactures[$i]['id_ligne_facture']; ?>"> <button class="btn btn-light">Voir</button></a></td>
      <td><a href="../controller/LigneFactureModifierInit.php?lfa_id_ligne_facture=<?php echo $ligneFactures[$i]['id_ligne_facture']; ?>"> <button class="btn btn-white removeButton">Modifier</button></a></td>
      <td><a href="../controller/LigneFactureSupprimerInit.php?lfa_id_ligne_facture=<?php echo $ligneFactures[$i]['id_ligne_facture']; ?>"> <button class="btn btn-dark removeButton">Supprimer</button></a></td>
    </tr>
  <?php } ?>
</table>
<?php 
if($_SESSION['nomDevise'] == "Euro"){
  ?>    
  <h4 style="text-align: center;"  class="text-light border border-light">Total = <?php echo $resTotal;?>€</h4><br/>
  <?php
}else{
  ?>    
  <h4 style="text-align: center;"  class="text-light border border-light">Total = <?php echo $resDeviseTotal ;echo" "; echo $_SESSION['nomDevise']; ;echo" "; echo 'Soit '; echo" ";  echo $resTotal;?>€</h4><br/>
  <?php
}
?>
<div class="removeButton">
  <a href="LigneFactureCreer.php?idFac=<?php echo $_SESSION['id'] ?>"><button class="btn btn-light">Créer Ligne Facture</button></a>
</div>
<br/>
<a href="../controller/facturelisterinit.php"><button  class="btn btn-dark">Retour au Factures</button></a>
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
</div>
</body>
</html>
