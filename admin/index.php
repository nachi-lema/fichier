<?php 
     if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
    include_once("functions/functions.php");
    login_user();
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
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-start py-5 px-4 px-sm-5">
                <div class="brand-logo">
                  
                </div>
                <h4>Connectez-vous pour continuer.</h4>
                <h6 class="fw-light"></h6>
                <form method="POST" class="pt-3">
                  <div class="form-group">
                    <input type="text" name="identifiant" class="form-control form-control-lg" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <input type="password" name="mod_pass" class="form-control form-control-lg" placeholder="Password">
                  </div>
                  <div class="mt-3 d-grid gap-2">
                    <button type="submit" name="login_admin" class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn">Se connecter</button>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <!--<a href="#" class="auth-link text-black">Forgot password?</a>-->
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/template.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>
