<?php 
  //Affichage de liste publication --Bakumba
  function liste_publications(){
    include("connexion.php");
    $statut = "Actif";
    $req = "SELECT * FROM post_tb WHERE statut='$statut'";
    $res = $bd ->query($req);
  
    if ($res ->num_rows > 0) {
      $requete = "SELECT * FROM post_tb WHERE statut ='$statut' ORDER BY created_at DESC";
      $resultats = $bd ->query($requete);
  
      if ($resultats ->num_rows > 0) {
        while($row = $resultats ->fetch_assoc()){
          $content = $row['content']; 
          $contents = substr($content,0 ,287); 
          echo'<div class="blog-item blog-standard mb-xs-30 mb-sm-35 mb-md-40 mb-50">
                <div class="blog-featured-thumb mb-xs-30 mb-sm-30 mb-md-35 mb-lg-40 mb-40">
                  <div class="media overflow-hidden">
                    <img src="'.$row['image'].'" class="img-fluid" alt="">
                  </div>
                </div>

                <div class="content pr-sm-25 pr-xs-15 pl-xs-15 pl-sm-25 pr-xs-15 pr-30 pl-30 pb-xs-25 pb-sm-30 pb-40">
                  <div class="post-meta mb-10">
                    <a href="#"><i class="icon-category"></i>BAKUMBA EFC</a>
                    <a href="#"><i class="fal fa-clock"></i>'.$row['created_at'].'</a>
                    <a href="#"><img src="assets/img/icon/messages-1.svg" alt="">0 Commentaires</a>
                  </div>
                  <h3><a href="news-details.php?id='.$row['id'].'">'.$row['name'].' </a></h3>

                  <p>'.$contents.'</p>

                  <div class="btn-link-share mt-xs-10 mt-sm-10 mt-md-15 mt-25">
                    <a href="news-details.php?id='.$row['id'].'" class="theme-btn btn-border btn-fill">En savoir plus <i class="fas fa-long-arrow-alt-right"></i></a>
                  </div>
                </div>
              </div>'; 
        }
      }
      else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="erreur">'.'Aucune information trouvée'.'</div>';
      }
    }
    else{
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="erreur">'.'violation d\'accès administratif.'.'</div>';
    }
 
  }

  //Afficher le detail d'un article
  function liste_publications_detail(){
    if (empty($_GET['id'])) {
      echo'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="erreur">'.
            '<strong>'.'Desolé!'.'</strong>'.'&nbsp;'.'Aucun parametre trouvé'.
            '<span aria-hidden="true" data-dismiss="alert" aria-label="close">'.'&times;'.'</span>'.                            
          '</div>';
    }
    else{
      $IDpub= $_GET['id'];
      include("connexion.php");
      if ($bd -> connect_error) {
        die('Impossible de se connecter à la BD:'.$bd ->connect_error);
      }
      else{
        $req ="SELECT * FROM post_tb WHERE id ='$IDpub'";
        $resul = $bd ->query($req);

        if ($resul ->num_rows > 0) {
          while ($row = $resul ->fetch_assoc()) {
            $content = $row['content'];
            $Textcontent= nl2br($content);
            echo'<div class="blog-item blog-standard blog-post-details">
                  <div class="blog-featured-thumb mb-xs-30 mb-sm-30 mb-md-35 mb-lg-40 mb-40">
                    <div class="media overflow-hidden">
                      <img src="'.$row['image'].'" class="img-fluid" alt="">
                    </div>
                  </div>

                  <div class="content pr-sm-25 pr-xs-15 pl-xs-15 pl-sm-25 pr-xs-15 pr-30 pl-30 pb-xs-25 pb-sm-30 pb-40">
                    <div class="post-meta mb-10">
                      <a href="#"><i class="icon-user"></i>Par '.$row['customer'].'</a>
                      <a href="#"><i class="icon-category"></i>BAKUMBA EFC</a>
                      <a href="#"><i class="fal fa-clock"></i>'.$row['created_at'].'</a>
                      <a href="#"><img src="assets/img/icon/messages-1.svg" alt="">0 Commentaires</a>
                    </div>

                    <h3>'.$row['name'].'</h3>

                    <p>
                      '.$Textcontent.'
                    </p>


                    ';
          }
        }
        else{
          echo'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="erreur">'.
                '<strong>'.'Desolé!'.'</strong>'.'&nbsp;'.'Aucune information trouvée.'.
                '<span aria-hidden="true" data-dismiss="alert" aria-label="close">'.'&times;'.'</span>'.
              '</div>';
        }
      }
      $bd->close(); 
    } 
  }
  //FIN Mise à jour 


  //profil Utilisateur
function affiche_profil(){
  if (isset($_SESSION['pseudo'])) {
    include("connexion.php");
    if ($bd -> connect_error) {
      die('Impossible de se connecter à la BD:'.$bd ->connect_error);
    }
    else{
      $compte = $_SESSION['pseudo'];
      $check = "SELECT * FROM admin_tb WHERE pseudo ='$compte'";
      $res = $bd ->query($check);

      if ($res ->num_rows > 0) {
        while($row = $res ->fetch_assoc()){
          $compte_valide = $row['pseudo'];
        }
        //Affichage des contenus 
        $check2 = "SELECT * FROM admin_tb WHERE pseudo ='$compte_valide'";
        $res2 = $bd ->query($check2);

        if ($res2 ->num_rows > 0) {
          while($row2 = $res2 ->fetch_assoc()){
            echo'<span class="nav-profile-name">'.$row2['pseudo'].'</span>';
          }
        }
        else{
        }
        //fin affichage des contenus
      }
      else{
        echo '<h2 class="title-suspens">'.'?'.'</h2>'.'<strong>'.'Compte invalide'.'</strong>';
      }
    }
  }
  else{
    echo '<div class="alert alert-warning alert-dismissible" role="alert" id="erreur">'."connexion perdue".'</div>';
  }
}
//profil

//Affichage de liste publication --Bakumba
function liste_pub(){
  include("connexion.php");
  $statut = "Actif";
  $req = "SELECT * FROM post_tb WHERE statut='$statut'";
  $res = $bd ->query($req);

  if ($res ->num_rows > 0) {
    $requete = "SELECT * FROM post_tb WHERE statut ='$statut' ORDER BY id DESC";
    $resultats = $bd ->query($requete);

    if ($resultats ->num_rows > 0) {
      while($row = $resultats ->fetch_assoc()){
        $content = $row['content']; 
        $contents = substr($content,0 ,287); 
        echo'<tr>
              <td class="py-1">'.$row['id'].'</td>
              <td>'.$row['name'].'</td> 
              <td>'.$row['statut'].'</td> 
              <td>'.$row['customer'].'</td>
              <td>'.$row['created_at'].'</td>
              <td>
                <div class="d-flex align-items-center">
                  <a href="pub.php?id='.$row['id'].'" class="btn btn-success btn-sm btn-icon-text me-3">
                    Modifier
                    <i class="typcn typcn-edit btn-icon-append"></i>
                  </a>
                  <button type="button" class="btn btn-danger btn-sm btn-icon-text">
                    Delete
                    <i class="typcn typcn-delete-outline btn-icon-append"></i> 
                  </button>
                </div>
              </td>
            </tr>'; 
      }
    }
    else{
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="erreur">'.'Aucune information trouvée'.'</div>';
    }
  }
  else{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="erreur">'.'violation d\'accès administratif.'.'</div>';
  }

}

//Mise en jour publication...
function updatepublier(){
  if (isset($_SESSION['pseudo'])) {
    if (empty($_GET['id'])) {
      echo'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="erreur">'.
            '<strong>'.'Desolé!'.'</strong>'.'&nbsp;'.'Aucun parametre trouvé'.
            '<span aria-hidden="true" data-dismiss="alert" aria-label="close">'.'&times;'.'</span>'.                            
          '</div>';
    }
    else{
      $Idpublier= $_GET['id'];
      include("connexion.php");
      if ($bd -> connect_error) {
        die('Impossible de se connecter à la BD:'.$bd ->connect_error);
      }
      else{
        $req = "SELECT * FROM post_tb WHERE id ='$Idpublier'";
        $resul = $bd ->query($req);

        if ($resul ->num_rows > 0) {
          while ($row = $resul ->fetch_assoc()) {
            echo'<div class="form-group">
                  <label for="exampleInputName1">Titre</label>
                  <input type="text" name="title" class="form-control" id="exampleInputName1" value="'.$row['name'].'">
                </div>
                <div class="form-group">
                  <label>Télécharge image</label>
                  <input type="file" name="fileupload" class="file-upload-default">
                  <div class="input-group col-xs-12">
                    <input type="text" name="fileupload" value="'.$row['image'].'" class="form-control file-upload-info" placeholder="Upload Image">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleTextarea1">Contenu</label>
                  <textarea name="contenu" class="form-control" id="exampleTextarea1" rows="9">'.$row['content'].'</textarea>
                </div>
                <button type="submit" name="Edit_publier" class="btn btn-primary me-2">Publier</button>
                <button type="reset" class="btn btn-light">Annuler</button>';
          }
        }
        else{
          echo'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="erreur">'.
                '<strong>'.'Desolé!'.'</strong>'.'&nbsp;'.'Aucune information trouvée.'.
                '<span aria-hidden="true" data-dismiss="alert" aria-label="close">'.'&times;'.'</span>'.
              '</div>';
        }
      }
      $bd->close(); 
    } 
  }
}

//Afficher la liste des Offres emplois
function liste_Offres(){
  include("connexion.php");
  $statut = "Actif";
  $req = "SELECT * FROM post_tb WHERE statut='$statut'";
  $res = $bd ->query($req);
  
  if ($res ->num_rows > 0) {
    $requete = "SELECT * FROM offres_tb WHERE status ='$statut' ORDER BY created_at DESC LIMIT 2";
    $resultats = $bd ->query($requete);
  
    if ($resultats ->num_rows > 0) {
      while($row = $resultats ->fetch_assoc()){
        echo' <div class="left">
                <h6 class="title text-capitalize color-red mb-10 mb-xs-5">OFFRE D\'EMPLOI</h6>
                <div class="description font-la color-red">
                  <p>'.$row['title'].'</p>
                </div>
              </div>

              <div class="arrow-right d-flex justify-content-between flex-row align-items-end">
                <a href="'.$row['filedoc'].'" class="btn btn-default" target="_blank"><span>Accéder à la page </span></a>
                <a href="'.$row['filedoc'].'" target="_blank"><i class="icon-play"></i></a>
              </div>'; 
      }
    }
    else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="erreur">'.'Aucune information trouvée'.'</div>';
    }
  }
  else{
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="erreur">'.'violation d\'accès administratif.'.'</div>';
  }
}

//Afficher la liste des Offres emplois
function liste_Offres2(){
  include("connexion.php");
  $statut = "Actif";
  $req = "SELECT * FROM post_tb WHERE statut='$statut'";
  $res = $bd ->query($req);
  
  if ($res ->num_rows > 0) {
    $requete = "SELECT * FROM offres_tb WHERE status ='$statut' ORDER BY created_at DESC";
    $resultats = $bd ->query($requete);
  
    if ($resultats ->num_rows > 0) {
      while($row = $resultats ->fetch_assoc()){
        echo'<a href="'.$row['filedoc'].'" class="theme-btn d-flex align-content-center flex-wrap justify-content-between" target="_blank">
              <div class="text">
                <img src="assets/img/icon/fdf-4.svg" alt="">'.$row['title'].'
              </div>
              <i class="icon-download-1"></i>
            </a>'; 
      }
    }
    else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="erreur">'.'Aucune information trouvée'.'</div>';
    }
  }
  else{
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="erreur">'.'violation d\'accès administratif.'.'</div>';
  }
}

//Affichage de liste publication --Bakumba
function Afficher_Offres(){
  include("connexion.php");
  $statut = "Actif";
  $req = "SELECT * FROM post_tb WHERE statut='$statut'";
  $res = $bd ->query($req);

  if ($res ->num_rows > 0) {
    $requete = "SELECT * FROM offres_tb WHERE status ='$statut' ORDER BY id DESC";
    $resultats = $bd ->query($requete);

    if ($resultats ->num_rows > 0) {
      while($row = $resultats ->fetch_assoc()){
        echo'<tr>
              <td class="py-1">'.$row['id'].'</td>
              <td>'.$row['title'].'</td> 
              <td>'.$row['filedoc'].'</td> 
              <td>'.$row['status'].'</td>
              <td>'.$row['created_at'].'</td>
              <td>
                <div class="d-flex align-items-center">
                  <a href="offres.php?id='.$row['id'].'" class="btn btn-success btn-sm btn-icon-text me-3">
                    Selectionner
                    <i class="typcn typcn-edit btn-icon-append"></i>
                  </a>
                </div>
              </td>
            </tr>'; 
      }
    }
    else{
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="erreur">'.'Aucune information trouvée'.'</div>';
    }
  }
  else{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="erreur">'.'violation d\'accès administratif.'.'</div>';
  }
}

//Affichage de liste Information DG --Bakumba
function Afficher_infos_DG(){
  include("connexion.php");
  $statut = "Actif";
  $req = "SELECT * FROM equipe_tb WHERE statut='$statut'";
  $res = $bd ->query($req);

  if ($res ->num_rows > 0) {
    $requete = "SELECT * FROM equipe_tb WHERE statut ='$statut' AND categorie='Directeur Général'";
    $resultats = $bd ->query($requete);

    if ($resultats ->num_rows > 0) {
      while($row = $resultats ->fetch_assoc()){
        echo'<div class="row align-items-center">
              <div class="col-lg-6">
                <div class="team-details__media overflow-hidden mb-md-40 mb-sm-35 mb-xs-30 wow fadeInUp" data-wow-delay=".3s">
                  <div class="social-profile d-flex flex-column">
                    <span></span>
                  </div>
                  <img src="'.$row['photo'].'" class="img-fluid" alt="">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="team-details__content wow fadeInUp" data-wow-delay=".5s">
                  <h6><img src="assets/img/team-details/badge-line.svg" alt=""> information</h6>
                  <h2>Maitre Chris-Ciceron Bakumba Bofaya <span> </span></h2>

                  <p>'.$row['contexte'].'</p>

                  <div class="contact-info">
                    <ul>
                      <li><span>Téléphone:</span> <a href="tel:+25632542654">'.$row['telephone'].'</a></li>
                      <li><span>Sexe:</span> '.$row['sexe'].'</li>
                      <li><span>E-mail:</span> <a href="mailto:contact@bakumba-expertfirm.cd">'.$row['email'].'</a></li>
                      <li><span>Nationalité:</span> <a>Congolaise</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>'; 
      }
    }
    else{
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="erreur">'.'Aucune information trouvée'.'</div>';
    }
  }
  else{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="erreur">'.'violation d\'accès administratif.'.'</div>';
  }

}

//Affichage de liste Information de membre de l'equipe experts
function Afficher_infos_experts(){
  include("connexion.php");
  $statut = "Actif";
  $req = "SELECT * FROM equipe_tb WHERE statut='$statut'";
  $res = $bd ->query($req);

  if ($res ->num_rows > 0) {
    $requete = "SELECT * FROM equipe_tb WHERE statut ='$statut' AND categorie='Expert'";
    $resultats = $bd ->query($requete);

    if ($resultats ->num_rows > 0) {
      while($row = $resultats ->fetch_assoc()){
        echo'<div class="col-xxl-3 col-lg-4 col-md-6">
              <div class="team-item text-center mb-30 d-block overflow-hidden wow fadeInUp" data-wow-delay=".3s">
                <div class="media">
                  <img src="'.$row['photo'].'" class="img-fluid" alt="">
                </div>
                <div class="text d-flex align-items-center justify-content-center">
                  <div class="left">
                    <h5 class="title color-white">'.$row['noms'].'</h5>
                    <span class="position color-white font-la fw-500">'.$row['qualite'].'</span>
                  </div>
                </div>

                <a href="#" class="theme-btn">Afficher les détails <i class="fas fa-long-arrow-alt-right"></i></a>
              </div>
            </div>'; 
      }
    }
    else{
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="erreur">'.'Aucune information trouvée'.'</div>';
    }
  }
  else{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="erreur">'.'violation d\'accès administratif.'.'</div>';
  }

}

//Affichage de liste Information de membre de l'equipe ADMINISTRATIVE
function Afficher_infos_administration(){
  include("connexion.php");
  $statut = "Actif";
  $req = "SELECT * FROM equipe_tb WHERE statut='$statut'";
  $res = $bd ->query($req);

  if ($res ->num_rows > 0) {
    $requete = "SELECT * FROM equipe_tb WHERE statut ='$statut' AND categorie='Administration'";
    $resultats = $bd ->query($requete);

    if ($resultats ->num_rows > 0) {
      while($row = $resultats ->fetch_assoc()){
        echo'<div class="col-xxl-3 col-lg-4 col-md-6">
              <div class="team-item text-center mb-30 d-block overflow-hidden wow fadeInUp" data-wow-delay=".3s">
                <div class="media">
                  <img src="'.$row['photo'].'" class="img-fluid" alt="">
                </div>
                <div class="text d-flex align-items-center justify-content-center">
                  <div class="left">
                    <h5 class="title color-white">'.$row['noms'].'</h5>
                    <span class="position color-white font-la fw-500">'.$row['qualite'].'</span>
                  </div>
                </div>

                <a href="#" class="theme-btn">Afficher les détails <i class="fas fa-long-arrow-alt-right"></i></a>
              </div>
            </div>'; 
      }
    }
    else{
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="erreur">'.'Aucune information trouvée'.'</div>';
    }
  }
  else{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="erreur">'.'violation d\'accès administratif.'.'</div>';
  }
}

//Affichage de liste Information de membre de l'equipe AVOCATS
function Afficher_infos_avocat(){
  include("connexion.php");
  $statut = "Actif";
  $req = "SELECT * FROM equipe_tb WHERE statut='$statut'";
  $res = $bd ->query($req);

  if ($res ->num_rows > 0) {
    $requete = "SELECT * FROM equipe_tb WHERE statut ='$statut' AND categorie='Avocats'";
    $resultats = $bd ->query($requete);

    if ($resultats ->num_rows > 0) {
      while($row = $resultats ->fetch_assoc()){
        echo'<div class="col-xxl-3 col-lg-4 col-md-6">
              <div class="team-item text-center mb-30 d-block overflow-hidden wow fadeInUp" data-wow-delay=".3s">
                <div class="media">
                  <img src="'.$row['photo'].'" class="img-fluid" alt="">
                </div>
                <div class="text d-flex align-items-center justify-content-center">
                  <div class="left">
                    <h5 class="title color-white">'.$row['noms'].'</h5>
                    <span class="position color-white font-la fw-500">'.$row['qualite'].'</span>
                  </div>
                </div>

                <a href="#" class="theme-btn">Afficher les détails <i class="fas fa-long-arrow-alt-right"></i></a>
              </div>
            </div>'; 
      }
    }
    else{
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="erreur">'.'Aucune information trouvée'.'</div>';
    }
  }
  else{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="erreur">'.'violation d\'accès administratif.'.'</div>';
  }

}

//Affichage de liste de membre de l'equipe --Bakumba
function Afficher_membreequipe(){
  include("connexion.php");
  $statut = "Actif";
  $req = "SELECT * FROM equipe_tb WHERE statut='$statut'";
  $res = $bd ->query($req);

  if ($res ->num_rows > 0) {
    $requete = "SELECT * FROM equipe_tb WHERE statut ='$statut' ORDER BY id ASC";
    $resultats = $bd ->query($requete);

    if ($resultats ->num_rows > 0) {
      while($row = $resultats ->fetch_assoc()){
        echo'<tr>
              <td class="py-1">'.$row['id'].'</td>
              <td>'.$row['noms'].'</td> 
              <td>'.$row['qualite'].'</td> 
              <td>'.$row['email'].'</td> 
              <td>'.$row['telephone'].'</td> 
              <td>'.$row['sexe'].'</td> 
              <td>'.$row['statut'].'</td>
              <td>'.$row['date_creat'].'</td>
              <td>
                <div class="d-flex align-items-center">
                  <a href="notre-equipe.php?id='.$row['id'].'" class="btn btn-success btn-sm btn-icon-text me-3">
                    Modifier
                    <i class="typcn typcn-edit btn-icon-append"></i>
                  </a>
                  <a href="notre-equipe.php?id='.$row['id'].'" class="btn btn-warning btn-sm btn-icon-text">
                    Desactiver
                    <i class="typcn typcn-delete-outline btn-icon-append"></i> 
                  </a>
                </div>
              </td>
            </tr>'; 
      }
    }
    else{
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="erreur">'.'Aucune information trouvée'.'</div>';
    }
  }
  else{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="erreur">'.'violation d\'accès administratif.'.'</div>';
  }
}

//Mise en jour Membre de l'equipe...
function updatemembre(){
  if (isset($_SESSION['pseudo'])) {
    if (empty($_GET['id'])) {
      echo'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="erreur">'.
            '<strong>'.'Desolé!'.'</strong>'.'&nbsp;'.'Aucun parametre trouvé'.
            '<span aria-hidden="true" data-dismiss="alert" aria-label="close">'.'&times;'.'</span>'.                            
          '</div>';
    }
    else{
      $Idmembre= $_GET['id'];
      include("connexion.php");
      if ($bd -> connect_error) {
        die('Impossible de se connecter à la BD:'.$bd ->connect_error);
      }
      else{
        $req = "SELECT * FROM equipe_tb WHERE id ='$Idmembre'";
        $resul = $bd ->query($req);

        if ($resul ->num_rows > 0) {
          while ($row = $resul ->fetch_assoc()) {
            echo'<div class="row">
                  <div class="form-group col-xs-6 col-md-4">
                    <label for="nomcomplet">Nom complet</label>
                    <input type="text" name="nomcomplet" class="form-control" id="nomcomplet" value="'.$row['noms'].'">
                  </div>
                  <div class="form-group col-xs-6 col-md-4">
                    <label for="adresse_email">E-mail</label>
                    <input type="text" name="adresse_email" class="form-control" id="adresse_email" value="'.$row['email'].'">
                  </div>
                  <div class="form-group col-xs-6 col-md-4">
                    <label for="telephone">Téléphone</label>
                    <input type="text" name="telephone" class="form-control" id="telephone" value="'.$row['telephone'].'">
                  </div>
                  <div class="form-group col-xs-6 col-md-4">
                    <label for="fonction">Fonction</label>
                    <input type="text" name="fonction" class="form-control" id="fonction" value="'.$row['qualite'].'">
                  </div>
                  <div class="form-group col-xs-6 col-md-4">
                    <label for="sexe">Sexe</label>
                    <select name="sexe" id="sexe" class="form-control">
                      <option value="'.$row['sexe'].'">'.$row['sexe'].'</option>
                      <option value="Masculin">Masculin</option>
                      <option value="Feminin">Feminin</option>
                    </select>
                  </div>
                  <div class="form-group col-xs-6 col-md-4">
                    <label for="categorie">Catégorie</label>
                    <select name="categorie" id="categorie" class="form-control">
                      <option value="'.$row['categorie'].'">'.$row['categorie'].'</option>
                      <option value="Expert">EXPERTS</option>
                      <option value="Administration">ADMINISTRATIVE</option>
                      <option value="Avocats">AVOCATS</option>
                    </select>
                  </div>
                  <div class="form-group col-xs-12 col-md-12">
                    <label>Télécharge un fichier</label>
                    <input type="file" name="fileImage" class="file-upload-default">
                    <div class="input-group col-xs-12">
                      <input type="text" name="fileImage" value="'.$row['photo'].'" class="form-control file-upload-info" placeholder="Upload Image">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Télécharger</button>
                      </span>
                    </div>
                  </div>
                  <div class="form-group col-xs-12 col-md-12">
                    <label for="bio">Biographie</label>
                    <textarea name="bio" class="form-control" id="exampleTextarea1" rows="20">'.$row['contexte'].'</textarea>
                  </div>
                </div>
                    
                <button type="submit" name="cmd_Editmembre" class="btn btn-primary me-2">Modifier</button>
                <button type="reset" class="btn btn-light">Annuler</button>
                <a href="" class="btn btn-danger">Quitter</a>';
          }
        }
        else{
          echo'<div class="alert alert-warning alert-dismissible fade show" role="alert" id="erreur">'.
                '<strong>'.'Desolé!'.'</strong>'.'&nbsp;'.'Aucune information trouvée.'.
                '<span aria-hidden="true" data-dismiss="alert" aria-label="close">'.'&times;'.'</span>'.
              '</div>';
        }
      }
      $bd->close(); 
    } 
  }
}
//Fin Mise en jour Membre de l'equipe...

?>