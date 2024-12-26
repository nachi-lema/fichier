<?php 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if ( !(isset($_SESSION['pseudo']) && $_SESSION['code_admin'] != '' )) {
  header("location:index.php");
  exit;
}

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
            <a class="navbar-brand brand-logo" href="index.html"><img src="assets/images/logo.svg" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo"/></a>
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
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                      <div>
                        <p class="mb-2 text-md-center text-lg-left">Total Publication</p>
                        <h1 class="mb-0">0</h1>
                      </div>
                      <i class="typcn typcn-briefcase icon-xl text-secondary"></i>
                    </div>
                    <canvas id="expense-chart" height="80"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                      <div>
                        <p class="mb-2 text-md-center text-lg-left">Total Ofrres</p>
                        <h1 class="mb-0">0</h1>
                      </div>
                      <i class="typcn typcn-chart-pie icon-xl text-secondary"></i>
                    </div>
                    <canvas id="budget-chart" height="80"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                      <div>
                        <p class="mb-2 text-md-center text-lg-left">Total Réalisation</p>
                        <h1 class="mb-0">0</h1>
                      </div>
                      <i class="typcn typcn-clipboard icon-xl text-secondary"></i>
                    </div>
                    <canvas id="balance-chart" height="80"></canvas>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

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
  </body>

</html>

