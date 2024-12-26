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
              <br><br><br><br><br>
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
            
            <?php liste_publications_detail(); ?>

                <figure>

                </figure>

                <div class="tag-share_wrapper d-flex align-center justify-content-between flex-wrap mb-sm-40 mb-xs-30 mb-60">
                  <div class="social-profile">
                    <ul>
                      <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                      <li>
                        <a href="#">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                            <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
                          </svg>
                        </a>
                      </li>
                      <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                      <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                  </div>
                </div>

                <!-- comments section wrap start 
                <div class="comments-section-wrap overflow-hidden">
                  <h4>01 <span>Commentaires</span></h4>

                  <ul class="comments-item-list">
                    <li>
                      <div class="author-img">
                        <img src="assets/img/blog-details/auhor-1.jpg" alt="">
                      </div>

                      <div class="author-info-comment">
                        <div class="info mb-10">
                          <h5><a href="#">Md Ashikul Islam</a></h5>
                          <span>Avril 29, 2024 at 7:30pm</span>
                        </div>

                        <div class="comment-text">
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                ex ea commodo consequat Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                          <a href="#">Reply</a>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>-->

                <div class="comment-form-wrap">
                  <h4>Laisser un Commentaires</h4>

                  <form action="#" class="comment-form">
                    <div class="single-form-input">
                      <textarea placeholder="Votre commentaire"></textarea>
                    </div>
                    <div class="input__wrapper w-100 d-flex flex-column flex-sm-row">
                      <div class="single-form-input">
                        <input type="text" placeholder="Ton nom">
                      </div>
                      <div class="single-form-input">
                        <input type="email" placeholder="Votre e-mail">
                      </div>
                    </div>

                    <button class="theme-btn submit-btn" type="submit">Publier un commentaire</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4">
            <div class="main-sidebar" data-sticky_column>
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
              
              <div class="single-sidebar-widget widget__tags mb-40 pt-30 pr-30 pb-40 pl-30 pl-xs-20 pr-xs-20">
                <h4 class="wid-title mb-30 mb-xs-20 color-d_black text-capitalize">OFFRE D'EMPLOI </h4>

                <div class="download-service-doc">
                  <?php liste_Offres2(); ?>
                  <a href="#" class="theme-btn d-flex align-content-center flex-wrap justify-content-between btn-fdf" target="_blank">
                    <div class="text">
                      <img src="assets/img/icon/fdf-1.svg" alt=""> Documentation
                    </div>
                    <i class="icon-download-1"></i>
                  </a>
                </div>
              </div>

              <div class="single-sidebar-widget mb-40 pt-30 pr-30 pb-40 pl-30 pl-xs-20 pr-xs-20">
                <h4 class="wid-title mb-30 mb-xs-20 color-d_black text-capitalize">Resent Post</h4>

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
                      <h6><a href="#">Manuel de procédures sur la protection de l'environnement...</a></h6>
                    </div>
                  </div>

                  <a href="#" class="theme-btn d-block"><i class="far fa-sync-alt"></i>More Post</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- team-area end -->



  <?php include_once('partial/footer.php'); ?>