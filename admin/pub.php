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

    <link rel="stylesheet" href="assets/quill.core.css">
    <link rel="stylesheet" href="assets/quill.snow.css">
    <script src="assets/image-resize.min.js"></script>
    <script src="assets/quill.js"></script>
    
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
              <?php new_publier();editpublier(); ?>
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card-body">
                        <h4 class="card-title">PUBLICATIONS</h4>
                        <p class="card-description"> <code></code></p>
                        <div class="template-demo">
                          <a href="pub.php" class="btn btn-secondary btn-rounded btn-fw">Actualiser</a>
                          <a href="javascript:void(0)" onclick="openpublication()" class="btn btn-info btn-rounded btn-fw">Ajouter</a>
                          <a href="javascript:void(0)" onclick="openpublicEdit()" class="btn btn-success btn-rounded btn-fw">Modifier</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Liste de publication</h4>
                    <p class="card-description">
                       <code></code>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Titre</th>
                            <th>Status</th>
                            <th>User</th>
                            <th>Date_creat</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php liste_pub(); ?>
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

    <div class="modal" id="form_pub" tabindex="-1" role="dialog" aria-hidden="true" style="width: 60%;margin-left: 400px;height: auto!important;overflow:auto!important;margin-top: 30px;box-shadow: 0px 2px 8px 0px black">
      <div class="" >
        <div class="modal-content" style=" margin-bottom: 10px!important;background-color: #e7eaeb">
          <div class="modal-header" style="border-bottom: 1px solid #ccc">
            <div class="title-box">
              <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i>&nbsp;Nouveau Publication</h5>
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
                    <div class="form-group">
                      <label for="exampleInputName1">Titre</label>
                      <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label>Télécharge image</label>
                      <input type="file" name="fileupload" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" name="fileupload" class="form-control file-upload-info" placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Télécharger</button>
                        </span>
                      </div>
                    </div>
                    <div class="form-group" id="editor">
                      <label for="exampleTextarea1">Contenu</label>
                      <textarea name="contenu" class="form-control" id="exampleTextarea1" rows="49"></textarea>
                    </div>
                    <button type="submit" name="cmd_publier" class="btn btn-primary me-2">Publier</button>
                    <button type="reset" class="btn btn-light">Annuler</button>
                  </form>
                </div>
              </div>
            </div>
            <!--Formulaires des acces admin-->
          </div>
          <div class="modal-footer" style="border-top: 1px solid #ccc">
            <a href="javascript:void(0)" class="btn btn-danger" onclick="closepublication()">Quitter</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Publication -->

    <div class="modal" id="form_pubEdit" tabindex="-1" role="dialog" aria-hidden="true" style="width: 60%;margin-left: 400px;height: auto!important;overflow:auto!important;margin-top: 30px;box-shadow: 0px 2px 8px 0px black">
      <div class="" >
        <div class="modal-content" style=" margin-bottom: 10px!important;background-color: #e7eaeb">
          <div class="modal-header" style="border-bottom: 1px solid #ccc">
            <div class="title-box">
              <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i>&nbsp;Modification de Publication</h5>
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
                    <?php updatepublier(); ?>
                  </form>
                </div>
              </div>
            </div>
            <!--Formulaires des acces admin-->
          </div>
          <div class="modal-footer" style="border-top: 1px solid #ccc">
            <a href="javascript:void(0)" class="btn btn-danger" onclick="closepublicEdit()">Quitter</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Compte Eleve -->

    <script src="assets/index.js"></script>
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
      function openpublication() {
        document.getElementById('form_pub').style.display = "block";
      }

      function closepublication() {
        document.getElementById('form_pub').style.display = "none";
      }

      function openpublicEdit() {
        document.getElementById('form_pubEdit').style.display = "block";
      }

      function closepublicEdit() {
        document.getElementById('form_pubEdit').style.display = "none";
      }
    </script>

  </body>
</html>

