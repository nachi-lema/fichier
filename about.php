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
    <!-- preloader start -
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
          <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="page-banner__media mt-xs-30 mt-sm-40">
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- page-banner end -->

    <!-- our-company start -->
    <section class="our-company  pt-xs-80 pb-xs-80 pt-sm-100 pb-sm-100 pt-md-100 pb-md-100 pt-120 pb-120 overflow-hidden">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-sm-6">
            <div class="our-company__meida wow fadeInUp" data-wow-delay=".3s">
              <img src="assets/img/about/our-company-1.png" alt="" class="img-fluid">

              <div class="years-experience overflow-hidden mt-20 mt-sm-10 mt-xs-10 text-center">
                <div class="number mb-5 color-white">
                  <span class="counter">18</span><sup>ans</sup>
                </div>

                <h5 class="title color-white">de carrière</h5>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-sm-6">
            <div class="our-company__meida border-radius wow fadeInUp" data-wow-delay=".5s">
              <img src="assets/img/about/our-company-2.png" alt="" class="img-fluid">

              <div class="horizental-bar"></div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="our-company__content mt-md-50 mt-sm-40 mt-xs-35 wow fadeInUp" data-wow-delay=".3s">
              <span class="sub-title fw-500 color-primary text-uppercase mb-sm-10 mb-xs-5 mb-20 d-block">
                <img src="assets/img/team-details/badge-line.svg" class="img-fluid mr-10" alt=""> Qui sommes nous
              </span>
              <h2 class="title color-d_black mb-20 mb-sm-15 mb-xs-10">BAKUMBA EXPERT FIRM & CONSULTING</h2>

              <div class="descriiption font-la mb-30 mb-md-25 mb-sm-20 mb-xs-15">
                <p>Bienvenue dans nos locaux ; qui sont d’une identité singulière… avec un design qui favorise la créativité, le bien-être et surtout pour vous recevoir dans les 
                  conditions que vous méritez parce que vous êtes précieux pour nous. </p>
              </div>
              <div class="descriiption font-la mb-30 mb-md-25 mb-sm-20 mb-xs-15">
                <p>Bakumba Family est le maître mot qui caractérise le professionnalisme combiné à l’esprit famille de l’ensemble du personnel. </p>
              </div>
              <div class="descriiption font-la mb-30 mb-md-25 mb-sm-20 mb-xs-15">
                <p>Chez nous, chaque client est unique, chaque dossier est particulier… Et le traitement spécial rattaché à ces valeurs est la clé de notre succès. </p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- our-company end -->

    <!-- our-project-details start -->
    <section class="our-project-details overflow-hidden">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="our-project-details__content">
              <h2>Vous êtes reçus par une équipe d’experts entièrement dévoués et passionnés. </h2>
              <!-- Recerve aux image de chaque agants --->

              <!-- team-details-area start -->
              <section class="team-details overflow-hidden">
                <div class="container">
                  <?= Afficher_infos_DG(); ?>
                  <div class="row">
                    <div class="col-12">
                      <hr class="mt-100 mt-lg-80 mt-md-60 mt-sm-50 mt-xs-40 mb-40">
                    </div>
                  </div>
                </div>
              </section>
              <!-- team-details-area end -->

              <h2 style="text-decoration-line: underline overline;">⁠ÉQUIPE D’EXPERTS </h2>
              <!-- team-area start -->
              <section class="team overflow-hidden">
                <div class="container">
                  <div class="row mb-minus-30">

                    <?= Afficher_infos_experts(); ?>
                    <!-- team-item -->

                  </div>
                </div>
              </section>
              <!-- team-area end -->

              <div class="row">
                <div class="col-12">
                  <hr class="mt-100 mt-lg-80 mt-md-60 mt-sm-50 mt-xs-40 mb-40">
                </div>
              </div>
              <h2 style="text-decoration-line: underline overline;">⁠ÉQUIPE ADMINISTRATIVE </h2>
              <!-- team-area start -->
              <section class="team overflow-hidden">
                <div class="container">
                  <div class="row mb-minus-30">

                    <?= Afficher_infos_administration() ?>
                    <!-- team-item -->

                    <div class="row">
                      <div class="col-12">
                        <hr class="mt-100 mt-lg-80 mt-md-60 mt-sm-50 mt-xs-40 mb-40">
                      </div>
                    </div>

                    <h2 style="text-decoration-line: underline overline;">ÉQUIPE D’AVOCATS </h2>
                    <!-- team-area start -->
                    <section class="team overflow-hidden">
                      <div class="container">
                        <div class="row mb-minus-30">

                          <?= Afficher_infos_avocat() ?>
                          <!-- team-item -->

                        </div>
                      </div>
                    </section>
                    <!-- team-area end -->

                    <div class="row">
                      <div class="col-12">
                        <hr class="mt-100 mt-lg-80 mt-md-60 mt-sm-50 mt-xs-40 mb-40">
                      </div>
                    </div>

                  </div>

                </div>
              </section>
              <!-- team-area end -->

              <h6></h6>
              <h2></h2>

              <!--- Fin recervation des images de l'equipe --->
              <p>Pour y arriver, nous avons mis en place ⁠des politiques intérieures basées sur une gestion globalement informatisée par un progiciel adapté regroupant 5 logiciels dont 
                finances, comptabilité, gestion administrative, gestion des ressources humaines et gestion de stocks</p>

              <p>Notre culture d’entreprise est basée sur le respect des objectifs de développement durable. </p>

              <blockquote>
                <p>
                  “Et nous disposons, outre les procédures administratives, financières, comptable et reporting, d’autres des Manuels notamment :”
                </p>
              </blockquote>
              <ul>
                <li>De lutte contre la corruption et blanchiment des capitaux </li>
                <li>De lutte contre le réchauffement climatique et promotion de protection de l’environnement ainsi que la conservation de la nature </li>
                <li>De promotion de l’égalité de chance dans l’exercice professionnel, tolérance des cultures diverses et acceptation de l’autre </li>
              </ul>
              <h2>Nous sommes votre partenaire de confiance… « vous servir est notre priorité » </h2>

              <hr>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- our-project-details end -->

    <!-- our-porfolio start -->
    <section class="our-team our-porfolio pb-xs-80 pt-xs-80 pt-sm-100 pb-sm-100 pt-md-100 pb-md-100 pt-135 pb-120 overflow-hidden">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <div class="our-team__content mb-65 mb-md-50 mb-sm-40 mb-xs-30 text-center mx-auto wow fadeInUp" data-wow-delay=".3s">
                      <span class="sub-title fw-500 color-red text-uppercase mb-sm-10 mb-xs-5 mb-15 d-block"><img src="assets/img/team-details/badge-line-yellow.svg" class="img-fluid mr-10" alt=""> Portfolio</span>
                      <h2 class="title color-d_black">Vitrine de travail incroyable</h2>
                  </div>
              </div>
          </div>
      </div>

      <div class="our-porfolio__slider wow fadeInUp" data-wow-delay=".5s">
          <div class="slider-item">
              <div class="our-project__item overflow-hidden">
                  <img src="assets/img/portfolio/portfolio-1.png" alt="">

                  <div class="content d-flex align-items-center justify-content-between">
                      <div class="text">
                          <span class="fw-500 color-red d-block mb-10 text-uppercase">La facilitation des investissements </span>
                          <h5 class="title color-secondary">La facilitation des investissements </h5>
                      </div>

                      <a href="#" class="theme-btn"><i class="icon-arrow-right-2"></i></a>
                  </div>
              </div>
          </div>

          <div class="slider-item">
              <div class="our-project__item overflow-hidden">
                  <img src="assets/img/portfolio/portfolio-2.png" alt="">

                  <div class="content d-flex align-items-center justify-content-between">
                      <div class="text">
                          <span class="fw-500 color-red d-block mb-10 text-uppercase">Sous-traitance</span>
                          <h5 class="title color-secondary">Sous-traitance</h5>
                      </div>

                      <a href="#" class="theme-btn"><i class="icon-arrow-right-2"></i></a>
                  </div>
              </div>
          </div>

          <div class="slider-item">
              <div class="our-project__item overflow-hidden">
                  <img src="assets/img/portfolio/portfolio-3.png" alt="">

                  <div class="content d-flex align-items-center justify-content-between">
                      <div class="text">
                          <span class="fw-500 color-red d-block mb-10 text-uppercase">Facilitation financière </span>
                          <h5 class="title color-secondary">Facilitation financière</h5>
                      </div>

                      <a href="#" class="theme-btn"><i class="icon-arrow-right-2"></i></a>
                  </div>
              </div>
          </div>

          <div class="slider-item">
              <div class="our-project__item overflow-hidden">
                  <img src="assets/img/portfolio/portfolio-4.png" alt="">

                  <div class="content d-flex align-items-center justify-content-between">
                      <div class="text">
                          <span class="fw-500 color-red d-block mb-10 text-uppercase">Fiscalité et Douane</span>
                          <h5 class="title color-secondary">Fiscalité et Douane</h5>
                      </div>

                      <a href="#" class="theme-btn"><i class="icon-arrow-right-2"></i></a>
                  </div>
              </div>
          </div>

          <div class="slider-item">
              <div class="our-project__item overflow-hidden">
                  <img src="assets/img/portfolio/portfolio-2.png" alt="">

                  <div class="content d-flex align-items-center justify-content-between">
                      <div class="text">
                          <span class="fw-500 color-red d-block mb-10 text-uppercase">Audit juridique, Administratif et Comptable</span>
                          <h5 class="title color-secondary">Audit juridique, Administratif et Comptable</h5>
                      </div>

                      <a href="#" class="theme-btn"><i class="icon-arrow-right-2"></i></a>
                  </div>
              </div>
          </div>

          <div class="slider-item">
              <div class="our-project__item overflow-hidden">
                  <img src="assets/img/portfolio/portfolio-3.png" alt="">

                  <div class="content d-flex align-items-center justify-content-between">
                      <div class="text">
                          <span class="fw-500 color-red d-block mb-10 text-uppercase">Conseil :  </span>
                          <h5 class="title color-secondary">- Economie bleue <br> - Economie verte </h5>
                      </div>

                      <a href="#" class="theme-btn"><i class="icon-arrow-right-2"></i></a>
                  </div>
              </div>
          </div>

          <div class="slider-item">
              <div class="our-project__item overflow-hidden">
                  <img src="assets/img/portfolio/portfolio-7.png" alt="">

                  <div class="content d-flex align-items-center justify-content-between">
                      <div class="text">
                          <span class="fw-500 color-red d-block mb-10 text-uppercase">Placement Ressources Humaines </span>
                          <h5 class="title color-secondary">Placement Ressources Humaines </h5>
                      </div>

                      <a href="#" class="theme-btn"><i class="icon-arrow-right-2"></i></a>
                  </div>
              </div>
          </div>

          <div class="slider-item">
              <div class="our-project__item overflow-hidden">
                  <img src="assets/img/portfolio/portfolio-8.png" alt="">

                  <div class="content d-flex align-items-center justify-content-between">
                      <div class="text">
                          <span class="fw-500 color-red d-block mb-10 text-uppercase">Pilotage Ressources Humaines </span>
                          <h5 class="title color-secondary">Pilotage Ressources Humaines </h5>
                      </div>

                      <a href="#" class="theme-btn"><i class="icon-arrow-right-2"></i></a>
                  </div>
              </div>
          </div>
      </div>
    </section>
    <!-- our-porfolio end -->



<?php include_once('partial/footer.php'); ?>