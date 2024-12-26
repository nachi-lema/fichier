<?php 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if ( !(isset($_SESSION['pseudo']) && $_SESSION['code_admin'] != '' )) {
  header("location:index.php");
  exit;
}

  include("functions/functions.php");
  include("functions/affichages.php");
  
  $page = $_SERVER['PHP_SELF'];
  $sec = "60";
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>bakumba-expertfirm -Admin</title>
    <!-- base:css -->
    <link rel="stylesheet" href="assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex justify-content-center">
          <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
            <a class="navbar-brand brand-logo" href="index.php"><img src="assets/images/logo.svg" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="index.php"><img src="assets/images/logo-mini.svg" alt="logo"/></a>
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="typcn typcn-th-menu"></span>
            </button>
          </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <ul class="navbar-nav me-lg-2">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                <strong><?php affiche_profil(); ?></strong>
              </a>
            </li>
            <li class="nav-item nav-user-status dropdown">
                <p class="mb-0"style="font-size:16px"> : Bienvenue à l’espace admin </p>
            </li>
          </ul>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-date dropdown">
              <a class="nav-link d-flex justify-content-center align-items-center" href="javascript:;">
                <h6 class="date mb-0">Today : Mar 23</h6>
                <i class="typcn typcn-calendar"></i>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="typcn typcn-th-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      
      <div class="container-fluid page-body-wrapper">      
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="dashboard.php">
                <i class="typcn typcn-device-desktop menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pub.php" aria-controls="ui-basic">
                <i class="typcn typcn-document-text menu-icon"></i>
                <span class="menu-title">Publications</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="offres.php" aria-controls="form-elements">
                <i class="typcn typcn-film menu-icon"></i>
                <span class="menu-title">OFFRE D'EMPLOI</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" aria-controls="charts">
                <i class="typcn typcn-chart-pie-outline menu-icon"></i>
                <span class="menu-title">Réalisations</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="notre-equipe.php" aria-controls="charts">
                <i class="typcn typcn-user-outline menu-icon"></i>
                <span class="menu-title">Notre équipe</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" aria-controls="charts">
                <i class="typcn typcn-chart-pie-outline menu-icon"></i>
                <span class="menu-title">Déconnexion</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <?php new_membre();editmembre();desactivermembre(); ?>
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card-body">
                        <h4 class="card-title">Notre équipes</h4>
                        <p class="card-description"> <code></code></p>
                        <div class="template-demo">
                          <a href="notre-equipe.php" class="btn btn-secondary btn-rounded btn-fw">Actualiser</a>
                          <a href="javascript:void(0)" onclick="openOffre()" class="btn btn-info btn-rounded btn-fw">Ajouter</a>
                          <a href="javascript:void(0)" onclick="openmembreEdit()" class="btn btn-success btn-rounded btn-fw">Modifier</a>
                          <a href="javascript:void(0)" onclick="openmembreEnable()" class="btn btn-warning btn-rounded btn-fw">Desactiver</a>
                          <!--
                          <button type="button" class="btn btn-primary btn-rounded btn-fw">Primary</button>
                          <button type="button" class="btn btn-secondary btn-rounded btn-fw">Secondary</button>
                          <button type="button" class="btn btn-danger btn-rounded btn-fw">Danger</button>
                          <button type="button" class="btn btn-warning btn-rounded btn-fw">Warning</button>
                          <button type="button" class="btn btn-info btn-rounded btn-fw">Info</button>
                        ---->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Liste des membres de l'équipe </h4>
                    <p class="card-description">
                      <code></code>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Noms</th>
                            <th>Qualité</th>
                            <th>E-mail</th>
                            <th>Téléphone</th>
                            <th>Sexe</th>
                            <th>Status</th>
                            <th>Date_creat</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php Afficher_membreequipe(); ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

            </div>

          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <div class="modal" id="form_offre" tabindex="-1" role="dialog" aria-hidden="true" style="width: 60%;margin-left: 400px;height: auto!important;overflow:auto!important;margin-top: 30px;box-shadow: 0px 2px 8px 0px black">
      <div class="" >
        <div class="modal-content" style=" margin-bottom: 10px!important;background-color: #e7eaeb">
          <div class="modal-header" style="border-bottom: 1px solid #ccc">
            <div class="title-box">
              <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i>&nbsp;Nouveau membre</h5>
            </div>
          </div>
          <div class="modal-body" style="overflow:auto!important;">
            <div class="inner-box">
              <div class="content-box">

              </div>
            </div>
            <!--Formulaires des acces admin-->
            <div class="col-12 grid-margin stretch-card">
              <div class="card" style="background-color: #e7eaeb">
                <div class="card-body">
                  <h4 class="card-title"></h4>
                  <form method="POST" class="forms-sample" enctype="multipart/form-data">
                    <div class="row">
                      <div class="form-group col-xs-6 col-md-4">
                        <label for="nomcomplet">Nom complet</label>
                        <input type="text" name="nomcomplet" class="form-control" id="nomcomplet" placeholder="Nom complet">
                      </div>
                      <div class="form-group col-xs-6 col-md-4">
                        <label for="adresse_email">E-mail</label>
                        <input type="text" name="adresse_email" class="form-control" id="adresse_email" placeholder="Adresse-email">
                      </div>

                      <div class="form-group col-xs-6 col-md-4">
                        <label for="telephone">Téléphone</label>
                        <input type="text" name="telephone" class="form-control" id="telephone" placeholder="Téléphone">
                      </div>
                      <div class="form-group col-xs-6 col-md-4">
                        <label for="fonction">Fonction</label>
                        <input type="text" name="fonction" class="form-control" id="fonction" placeholder="Fonction">
                      </div>
                      <div class="form-group col-xs-6 col-md-4">
                        <label for="sexe">Sexe</label>
                        <select name="sexe" id="sexe" class="form-control">
                          <option value="Masculin">Masculin</option>
                          <option value="Feminin">Feminin</option>
                        </select>
                      </div>
                      <div class="form-group col-xs-6 col-md-4">
                        <label for="categorie">Catégorie</label>
                        <select name="categorie" id="categorie" class="form-control">
                          <option value="Expert">EXPERTS</option>
                          <option value="Administration">ADMINISTRATIVE</option>
                          <option value="Avocats">AVOCATS</option>
                        </select>
                      </div>

                      <div class="form-group col-xs-12 col-md-12">
                        <label>Télécharge un fichier</label>
                        <input type="file" name="fileImage" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" name="fileImage" class="form-control file-upload-info" placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Télécharger</button>
                          </span>
                        </div>
                      </div>

                      <div class="form-group col-xs-12 col-md-12">
                        <label for="bio">Biographie</label>
                        <textarea name="bio" class="form-control" id="exampleTextarea1" rows="20"></textarea>
                      </div>
                    </div>
                    
                    <button type="submit" name="cmd_membre" class="btn btn-primary me-2">Enregistrer</button>
                    <button type="reset" class="btn btn-light">Annuler</button>
                    <a href="" class="btn btn-danger">Quitter</a>
                  </form>
                </div>
              </div>
            </div>
            <!--Formulaires des acces admin-->
          </div>
          <div class="modal-footer" style="border-top: 1px solid #ccc">
            <a href="javascript:void(0)" class="btn btn-danger" onclick="closeOffre()">Quitter</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Publication -->

    <!-- Modal Modification Membre -->
    <div class="modal" id="form_membreEdit" tabindex="-1" role="dialog" aria-hidden="true" style="width: 60%;margin-left: 400px;height: auto!important;overflow:auto!important;margin-top: 30px;box-shadow: 0px 2px 8px 0px black">
      <div class="" >
        <div class="modal-content" style=" margin-bottom: 10px!important;background-color: #e7eaeb">
          <div class="modal-header" style="border-bottom: 1px solid #ccc">
            <div class="title-box">
              <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i>&nbsp;Modification Membre</h5>
            </div>
          </div>
          <div class="modal-body" style="overflow:auto!important;">
            <div class="inner-box">
              <div class="content-box">

              </div>
            </div>
            <!--Formulaires des acces admin-->
            <div class="col-12 grid-margin stretch-card">
              <div class="card" style="background-color: #e7eaeb">
                <div class="card-body">
                  <h4 class="card-title"></h4>
                  <form method="POST" class="forms-sample" enctype="multipart/form-data">
                    <?php updatemembre(); ?>
                  </form>
                </div>
              </div>
            </div>
            <!--Formulaires des acces admin-->
          </div>
          <div class="modal-footer" style="border-top: 1px solid #ccc">
            <a href="javascript:void(0)" class="btn btn-danger" onclick="closemembreEdit()">Quitter</a>
          </div>
        </div>
      </div>
    </div>
    <!-- END Modal Modification Membre -->

    <!-- Modal Modification Membre -->
    <div class="modal" id="form_membreEnable" tabindex="-1" role="dialog" aria-hidden="true" style="width: 30%;margin-left: 400px;height: auto!important;overflow:auto!important;margin-top: 30px;box-shadow: 0px 2px 8px 0px black">
      <div class="" >
        <div class="modal-content" style=" margin-bottom: 10px!important;background-color: #e7eaeb">
          <div class="modal-header" style="border-bottom: 1px solid #ccc">
            <div class="title-box">
              <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i>&nbsp;Désactiver le Membre de l'équipe</h5>
            </div>
          </div>
          <div class="modal-body" style="overflow:auto!important;">
            <div class="inner-box">
              <div class="content-box">

              </div>
            </div>
            <!--Formulaires des acces admin-->
            <div class="col-12 grid-margin stretch-card">
              <div class="card" style="background-color: #e7eaeb">
                <div class="card-body">
                  <h4 class="card-title"></h4>
                  <form method="POST" class="forms-sample" enctype="multipart/form-data">
                    <div class="row">
                      <div class="form-group">
                        <h3 class="modal-title">Voulez-vous supprimer cette personne?</h3><br>
                        <button type="submit" name="cmd_delMembre" class="btn btn-primary col-lg-4 col-md-4" style="background-color: #304c79">OUI</button>&nbsp;
                        <button type="button" class="btn btn-danger col-lg-4 col-md-4" onclick="closeSupEleve()" style="background-color: red">NON</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!--Formulaires des acces admin-->
          </div>
          <div class="modal-footer" style="border-top: 1px solid #ccc">
            <a href="javascript:void(0)" class="btn btn-danger" onclick="closemembreEnable()">Quitter</a>
          </div>
        </div>
      </div>
    </div>
    <!-- END Modal Modification Membre -->

    <!-- base:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="assets/vendors/chart.js/chart.umd.js"></script>
    <script src="assets/js/jquery.cookie.js"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/template.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page-->
     <!-- plugin js for this page -->
    <script src="assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <script src="assets/vendors/select2/select2.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="assets/js/file-upload.js"></script>
    <script src="assets/js/typeahead.js"></script>
    <script src="assets/js/select2.js"></script>
    <!-- End custom js for this page-->

    <script type="text/javascript">
      function openOffre() {
        document.getElementById('form_offre').style.display = "block";
      }

      function closeOffre() {
        document.getElementById('form_offre').style.display = "none";
      }

      function openmembreEdit() {
        document.getElementById('form_membreEdit').style.display = "block";
      }

      function closemembreEdit() {
        document.getElementById('form_membreEdit').style.display = "none";
      }

      function openmembreEnable() {
        document.getElementById('form_membreEnable').style.display = "block";
      }

      function closemembreEnable() {
        document.getElementById('form_membreEnable').style.display = "none";
      }
    </script>

  </body>
</html>