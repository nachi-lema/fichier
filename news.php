<?php
  include_once('admin/functions/affichages.php');
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
      <!-- ========== Meta Tags ========== -->
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="author" content="Nachi Lema Pata">
      <!-- ======== Page title ============ -->
      <title>BAKUMBA EXPERT FIRM & CONSULTING</title>
      <!-- ========== Favicon Icon ========== -->
      <link rel="shortcut icon" href="assets/img/favicon.png">
      <!-- ===========  All Stylesheet ================= -->
      <link rel="stylesheet" href="assets/css/icons.css">
      <link rel="stylesheet" href="assets/css/magnific-popup.css">
      <link rel="stylesheet" href="assets/css/slick.min.css">
      <link rel="stylesheet" href="assets/css/animate.min.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="style.css">

  </head>

  <body class="body-wrapper">
    <!-- preloader start 
    <div id="preloader">
      <div class="preloader-close">x</div>
      <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
      </div>
    </div>
     preloader start -->

    <?php include_once('partial/header.php'); ?>

    <div class="offcanvas-overlay"></div>
    <!-- offcanvas-overlay -->
    <!-- header end -->

    <div class="header-gutter"></div>
    <!-- header end -->

    <!-- page-banner start -->
    <section class="page-banner pt-xs-60 pt-sm-80 overflow-hidden">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="page-banner__content mb-xs-10 mb-sm-15 mb-md-15 mb-20">
              <div class="transparent-text">Actualités</div>
              <div class="page-title">
              </div>
            </div>

          </div>

          <div class="col-md-6 col-sm-6">
            <div class="page-banner__media mt-xs-30 mt-sm-40">
              <br><br><br><br><br><br><br>
            </div>
          </div>

        </div>
      </div>
    </section>
    <!-- page-banner end -->

    <!-- team-area start -->
    <section class="blog pb-xs-80 pt-xs-80 pt-sm-100 pb-sm-100 pt-md-100 pb-md-100 pt-120 pb-120 overflow-hidden">
      <div class="container">
        <div class="row" data-sticky_parent>
          <div class="col-xl-8" data-sticky_column>

            <?php liste_publications(); ?>

            <div class="page-nav-wrap text-center">
              <ul>
                <!-- <li class="arrow left"><a href="#"><i class="far fa-chevron-double-left"></i></a></li> -->
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li class="arrow right"><a href="#"><i class="far fa-chevron-double-right"></i></a></li>
              </ul>
            </div>
            <!-- /page-nav-wrap -->
          </div>

          <div class="col-xl-4">
            <div class="main-sidebar" data-sticky_column>

              <div class="single-sidebar-widget widget__tags mb-40 pt-30 pr-30 pb-40 pl-30 pl-xs-20 pr-xs-20">
                <h4 class="wid-title mb-30 mb-xs-20 color-d_black text-capitalize">OFFRE D'EMPLOI </h4>

                <div class="download-service-doc">
                  <?php liste_Offres2(); ?>
                  <a href="#" class="theme-btn d-flex align-content-center flex-wrap justify-content-between btn-fdf">
                    <div class="text">
                      <img src="assets/img/icon/fdf-1.svg" alt=""> Documentation
                    </div>
                    <i class="icon-download-1"></i>
                  </a>
                </div>
              </div>

              <div class="single-sidebar-widget widget__tags mb-40 pt-30 pr-30 pb-40 pl-30 pl-xs-20 pr-xs-20">
                <h4 class="wid-title mb-30 mb-xs-20 color-d_black text-capitalize">OFFRE DE SERVICES </h4>

                <div class="download-service-doc">
                  <a href="#" class="theme-btn d-flex align-content-center flex-wrap justify-content-between btn-fdf" target="_blank">
                    <div class="text">
                      <img src="assets/img/icon/fdf-1.svg" alt=""> Documentation
                    </div>
                    <i class="icon-download-1"></i>
                  </a>
                </div>
              </div>

              <div class="single-sidebar-widget mb-40 pt-30 pr-30 pb-40 pl-30 pl-xs-20 pr-xs-20">
                <h4 class="wid-title mb-30 mb-xs-20 color-d_black text-capitalize">Renvoyer le message </h4>

                <div class="resent-posts">
                  <div class="single-post-item mb-20">
                    <div class="thumb overflow-hidden">
                      <img src="assets/img/blog/blog-2.jpg" class="img-fluid" alt="">
                    </div>

                    <div class="post-content">
                      <a href="#" class="post-date d-block mb-10 text-uppercase">
                        <i class="far fa-clock"></i>27 Avril, 2024
                      </a>
                      <h6><a href="#">Manuel de procédures de lutte contre la corruption et blanchiment des capitaux </a></h6>
                    </div>
                  </div>

                  <div class="single-post-item mb-20">
                    <div class="thumb overflow-hidden">
                      <img src="assets/img/blog/blog-7.jpg" class="img-fluid" alt="">
                    </div>

                    <div class="post-content">
                      <a href="#" class="post-date d-block mb-10 text-uppercase">
                        <i class="far fa-clock"></i>07 Mai, 2024
                      </a>
                      <h6><a href="#">Manuel de procédures sur la protection de l'environnement... </a></h6>
                    </div>
                  </div>

                  <a href="#" class="theme-btn d-block"><i class="far fa-sync-alt"></i>Plus d'article</a>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- team-area end -->


  <?php include_once('partial/footer.php'); ?>