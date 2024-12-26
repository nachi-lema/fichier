<?php 

//Check si tous les champs existent et ne sont pas vides
if(!function_exists('not_empty')) {
  function not_empty($fields = []){
    if(count($fields) != 0) {
      foreach($fields as $field) {
        if(empty($_POST[$field]) || trim($_POST[$field]) == "") {
          return false;
        }
      }
      return true;
    }
  }
}
//Si le formulaire a été soumis
function login_user(){
  include("database.php");
  if(isset($_POST['login_admin'])) {

    //Si tous les champs ont été remplire
    if (not_empty(['identifiant', 'mod_pass'])) {

      extract($_POST);

      $q = $db->prepare("SELECT id, pseudo, code_admin, mot_pass AS hashed_password FROM admin_tb 
                         WHERE (pseudo = :identifiant) AND droit = '1'");

      $q->execute([
        'identifiant' => $identifiant
      ]);

      $user = $q->fetch(PDO::FETCH_OBJ);

      if($user && password_verify($mod_pass, $user->hashed_password)){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['pseudo'] = $user->pseudo;
        $_SESSION['code_admin'] = $user->code_admin;
  
        header("location:dashboard.php");
      }
      else{
        //echo "Combinaison identifiant/password incorrecte";
        echo '<div class="alert alert-danger alert-dismissible" role="alert" id="erreur">'."Nom d'utilisateur ou mot de passe invalide.".'<span aria-hidden="true" data-dismiss="alert" aria-label="close">'.'&times;'.'</span>'.'</div>';
        //save_input_data();
      }      
    }
    else {
      echo "connexion echoue";
    }
  }
}

// debut creation publication
function new_publier(){ 
  if (isset($_SESSION['pseudo'])) {
    if (isset($_POST['cmd_publier'])) {
      include("connexion.php");
      if ($bd -> connect_error) {
        die('Impossible de se connecter à la BD:'.$bd ->connect_error);
      }
      else{
        $d_id=date("d-m-y");
        $h_id=date("h:i:s");
        $dat=$d_id." ".$h_id;
        $conc_id=md5($dat);
        $code_user=substr($conc_id,0 ,8);
        $title = $bd->real_escape_string($_POST['title']);
        $fileupload = $_POST['fileupload'];
        $contenu = $bd->real_escape_string($_POST['contenu']);
        $avatar="assets/img/blog/$fileupload";
        $ip_user=$bd->real_escape_string($_SERVER['REMOTE_ADDR']);
        $params=1;
        $droit=0;
        $statut ="Actif";

        if (!filter_var($title)) {
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="erreur">'."le format e-mail non autorisé.".'</div>'; 
        }
        else{
          $requete = "SELECT * FROM admin_tb WHERE statut='$statut' AND pseudo='".$_SESSION['pseudo']."'";
          $resultats = $bd ->query($requete);

          if ($resultats ->num_rows < 0) {
            while($row = $resultats ->fetch_assoc()){
              echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="erreur">'.'Aucun droit d\'administration'.'</div>'; 
            }
          }
          else{// code admin
            $requete = "SELECT * FROM admin_tb WHERE id=0 AND params='$params'";
            $resultats = $bd ->query($requete);

            if ($resultats ->num_rows > 0) {
              while($row = $resultats ->fetch_assoc()){
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="erreur">'.'Cet administrateur existe déjà.'.'</div>'; 
              }
            }
            else{//verification nom user
              $sql="INSERT INTO post_tb(name, content, image, statut, customer) VALUES ('".$title."','".$contenu."','".$avatar."','".$statut."','".$_SESSION['pseudo']."')";
              $sav = $bd->query($sql);

              if ($sav == true) {
                $dir = "../assets/img/blog/";
                $nameFile = $_FILES['fileupload']['name'];
                $tmpFile = $_FILES['fileupload']['tmp_name'];
                $typeFile = explode(".", $nameFile)[1];
            
                $correct = array("png", 'jpg', "gif");
            
                if (in_array($typeFile, $correct)) {
                  if (move_uploaded_file($tmpFile, $dir . $nameFile)) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert" id="mess">'.'Publication à été publié avec succes.'.'</div>';
                  }
                }
                else{
                  echo "Not correct type file";
                }
              }
              else{
                  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="erreur">'.'Enregistrement echoué.'.'</div>'; 
              }
            }//verification nom user
          }// code admin
        }
      }//fin base de données
      $bd->close();
    }  
  }
  else{
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="erreur">'."connexion perdue.".'</div>'; 
  } 
} // fin creation participants
//fin creation admin master

//Mise à jour Publication ou Actualité
function editpublier(){
  if (isset($_SESSION['pseudo'])) {
    if (isset($_POST['Edit_publier'])) {
      if (empty($_GET['id'])) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="erreur">'.'Aucun parametre trouvé'.'</div>';
      }
      else{
        $IDpublier= $_GET['id'];
        include("connexion.php");
        if ($bd -> connect_error) {
          die('Impossible de se connecter à la BD:'.$bd ->connect_error);
        }
        else{
          $d_id=date("d-m-y");
          $h_id=date("h:i:s");
          $dat=$d_id." ".$h_id;
          $conc_id=md5($dat);
          $code_user=substr($conc_id,0 ,5);
          $customer=$_SESSION['pseudo'];
          $title = $bd->real_escape_string($_POST['title']);
          $fileupload = $_POST['fileupload'];
          $contenu = $bd->real_escape_string($_POST['contenu']);
          $avatar="assets/img/blog/$fileupload";
          $params=1;
          $statut="Actif";

          if (!filter_var($title)) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="erreur">'."Le format e-mail non autorisé.".'</div>'; 
          }
          else{
              $requete = "SELECT * FROM admin_tb WHERE statut='$statut' AND pseudo='".$_SESSION['pseudo']."'";
              $resultats = $bd ->query($requete);

              if ($resultats ->num_rows < 0) {
                while($row = $resultats ->fetch_assoc()){
                  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="erreur">'.'Aucun droit d\'administration'.'</div>'; 
                }
              }
              else{// code admin
                $sql="UPDATE post_tb SET name ='$title', content ='$contenu', image ='$avatar', statut ='$statut', customer ='$customer' WHERE id ='$IDpublier'";
                $sav = $bd->query($sql);

                if ($sav == true) {
                  $dir = "../assets/img/blog/";
                  $nameFile = $_FILES['fileupload']['name'];
                  $tmpFile = $_FILES['fileupload']['tmp_name'];
                  $typeFile = explode(".", $nameFile)[1];
              
                  $correct = array("png", 'jpg', "gif");
              
                  if (in_array($typeFile, $correct)) {
                    if (move_uploaded_file($tmpFile, $dir . $nameFile)) {
                      echo '<div class="alert alert-success alert-dismissible fade show" role="alert" id="mess">'.'Publication modifié avec succès.'.'</div>';
                    }
                  }
                  else{
                    echo "Not correct type file";
                  }
                  //echo '<div class="alert alert-success alert-dismissible fade show" role="alert" id="mess">'.'Publication modifié avec succès.'.'</div>';
                }
                else{
                  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="erreur">'.'Modification echouée.'.'</div>'; 
                }
              }// code admin
          }//verification format mail
        }//fin base de données
        $bd->close();
      }
    }
  }
  else{
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="erreur">'."Connexion perdue.".'</div>'; 
  }    
} // fin fonction
//fin mise à jour

// debut creation publication
function new_Offres(){ 
  if (isset($_SESSION['pseudo'])) {
    if (isset($_POST['cmd_offre'])) {
      include("connexion.php");
      if ($bd -> connect_error) {
        die('Impossible de se connecter à la BD:'.$bd ->connect_error);
      }
      else{
        $d_id=date("d-m-y");
        $h_id=date("h:i:s");
        $dat=$d_id." ".$h_id;
        $conc_id=md5($dat);
        $code_user=substr($conc_id,0 ,8);
        $title = $bd->real_escape_string($_POST['title']);
        $fileImage = $_POST['fileImage'];
        $Uploades="pub_2024/$fileImage";
        $params=1;
        $statut ="Actif";

        if (!filter_var($title)) {
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="erreur">'."le format e-mail non autorisé.".'</div>'; 
        }
        else{
          $requete = "SELECT * FROM admin_tb WHERE statut='$statut' AND pseudo='".$_SESSION['pseudo']."'";
          $resultats = $bd ->query($requete);

          if ($resultats ->num_rows < 0) {
            while($row = $resultats ->fetch_assoc()){
              echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="erreur">'.'Aucun droit d\'administration'.'</div>'; 
            }
          }
          else{// code admin
            $requete = "SELECT * FROM admin_tb WHERE id=0 AND params='$params'";
            $resultats = $bd ->query($requete);

            if ($resultats ->num_rows > 0) {
              while($row = $resultats ->fetch_assoc()){
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="erreur">'.'Cet administrateur existe déjà.'.'</div>'; 
              }
            }
            else{//verification nom user
              $sql="INSERT INTO offres_tb(title, filedoc, status, customer) VALUES ('".$title."','".$Uploades."','".$statut."','".$_SESSION['pseudo']."')";
              $sav = $bd->query($sql);

              if ($sav == true) {
                $dir = "../pub_2024/";
                $nameFile = $_FILES['fileImage']['name'];
                $tmpFile = $_FILES['fileImage']['tmp_name'];
                $typeFile = explode(".", $nameFile)[1];
            
                $correct = array("pdf", 'word', "PDF");
            
                if (in_array($typeFile, $correct)) {
                  if (move_uploaded_file($tmpFile, $dir . $nameFile)) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert" id="mess">'.'Ofre d\emploi à été publié avec succes.'.'</div>';
                  }
                }
                else{
                  echo "Not correct type file";
                }
              }
              else{
                  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="erreur">'.'Enregistrement echoué.'.'</div>'; 
              }
            }//verification nom user
          }// code admin
        }
      }//fin base de données
      $bd->close();
    }  
  }
  else{
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="erreur">'."connexion perdue.".'</div>'; 
  } 
} // fin creation participants
//fin creation admin master

// debut creation membre
function new_membre(){ 
  if (isset($_SESSION['pseudo'])) {
    if (isset($_POST['cmd_membre'])) {
      include("connexion.php");
      if ($bd -> connect_error) {
        die('Impossible de se connecter à la BD:'.$bd ->connect_error);
      }
      else{
        $d_id=date("d-m-y");
        $h_id=date("h:i:s");
        $dat=$d_id." ".$h_id;
        $conc_id=md5($dat);
        $code_user=substr($conc_id,0 ,8);
        $nomcomplet = $bd->real_escape_string($_POST['nomcomplet']);
        $adresse_email = $bd->real_escape_string($_POST['adresse_email']);
        $telephone = $bd->real_escape_string($_POST['telephone']);
        $fonction = $bd->real_escape_string($_POST['fonction']);
        $sexe = $bd->real_escape_string($_POST['sexe']);
        $categorie = $bd->real_escape_string($_POST['categorie']);
        $contexte = $bd->real_escape_string($_POST['bio']);
        $fileImage = $_POST['fileImage'];
        $Uploades="assets/img/team/$fileImage";
        $params=1;
        $statut ="Actif";

        if (!filter_var($adresse_email)) {
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="erreur">'."le format e-mail non autorisé.".'</div>'; 
        }
        else{
          $requete = "SELECT * FROM admin_tb WHERE statut='$statut' AND pseudo='".$_SESSION['pseudo']."'";
          $resultats = $bd ->query($requete);

          if ($resultats ->num_rows < 0) {
            while($row = $resultats ->fetch_assoc()){
              echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="erreur">'.'Aucun droit d\'administration'.'</div>'; 
            }
          }
          else{// code admin
            $requete = "SELECT * FROM admin_tb WHERE id=0 AND params='$params'";
            $resultats = $bd ->query($requete);

            if ($resultats ->num_rows > 0) {
              while($row = $resultats ->fetch_assoc()){
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="erreur">'.'Cet administrateur existe déjà.'.'</div>'; 
              }
            }
            else{//verification nom user
              $sql="INSERT INTO equipe_tb(noms, email, telephone, qualite, sexe, categorie, contexte, photo, statut, customer)
                                     VALUES ('".$nomcomplet."','".$adresse_email."','".$telephone."','".$fonction."','".$sexe."','".$categorie."','".$contexte."','".$Uploades."','".$statut."','".$_SESSION['pseudo']."')";
              $sav = $bd->query($sql);

              if ($sav == true) {
                $dir = "../assets/img/team/";
                $nameFile = $_FILES['fileImage']['name'];
                $tmpFile = $_FILES['fileImage']['tmp_name'];
                $typeFile = explode(".", $nameFile)[1];
            
                $correct = array("png", 'jpg', "gif");
            
                if (in_array($typeFile, $correct)) {
                  if (move_uploaded_file($tmpFile, $dir . $nameFile)) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert" id="mess">'.'Nouveau membre pris en charge.'.'</div>';
                  }
                }
                else{
                  echo "Not correct type file";
                }
              }
              else{
                  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="erreur">'.'Enregistrement echoué.'.'</div>'; 
              }
            }//verification nom user
          }// code admin
        }
      }//fin base de données
      $bd->close();
    }  
  }
  else{
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="erreur">'."connexion perdue.".'</div>'; 
  } 
} // fin creation participants
//fin creation membre

//Mise à jour membre de l'equipe
function editmembre(){
  if (isset($_SESSION['pseudo'])) {
    if (isset($_POST['cmd_Editmembre'])) {
      if (empty($_GET['id'])) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="erreur">'.'Aucun parametre trouvé'.'</div>';
      }
      else{
        $IDmembre= $_GET['id'];
        include("connexion.php");
        if ($bd -> connect_error) {
          die('Impossible de se connecter à la BD:'.$bd ->connect_error);
        }
        else{
          $d_id=date("d-m-y");
          $h_id=date("h:i:s");
          $dat=$d_id." ".$h_id;
          $conc_id=md5($dat);
          $code_user=substr($conc_id,0 ,5);
          $customer=$_SESSION['pseudo'];
          $nomcomplet = $bd->real_escape_string($_POST['nomcomplet']);
          $adresse_email = $bd->real_escape_string($_POST['adresse_email']);
          $telephone = $bd->real_escape_string($_POST['telephone']);
          $fonction = $bd->real_escape_string($_POST['fonction']);
          $sexe = $bd->real_escape_string($_POST['sexe']);
          $categorie = $bd->real_escape_string($_POST['categorie']);
          $contexte = $bd->real_escape_string($_POST['bio']);
          $fileImage = $_POST['fileImage'];
          $Uploades="assets/img/team/$fileImage";
          $params=1;
          $statut="Actif";

          if (!filter_var($adresse_email)) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="erreur">'."Le format e-mail non autorisé.".'</div>'; 
          }
          else{
              $requete = "SELECT * FROM admin_tb WHERE statut='$statut' AND pseudo='".$_SESSION['pseudo']."'";
              $resultats = $bd ->query($requete);

              if ($resultats ->num_rows < 0) {
                while($row = $resultats ->fetch_assoc()){
                  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="erreur">'.'Aucun droit d\'administration'.'</div>'; 
                }
              }
              else{// code admin
                $sql="UPDATE equipe_tb SET noms='$nomcomplet',email='$adresse_email',telephone='$telephone',qualite='$fonction',sexe='$sexe',categorie='$categorie',contexte='$contexte',photo='$Uploades',date_edit='$dat',customer='$customer' WHERE id ='$IDmembre' AND statut='$statut'";
                $sav = $bd->query($sql);

                if ($sav == true) {
                  $dir = "../assets/img/team/";
                  $nameFile = $_FILES['fileImage']['name'];
                  $tmpFile = $_FILES['fileImage']['tmp_name'];
                  $typeFile = explode(".", $nameFile)[1];
              
                  $correct = array("png", 'jpg', "gif");
              
                  if (in_array($typeFile, $correct)) {
                    if (move_uploaded_file($tmpFile, $dir . $nameFile)) {
                      echo '<div class="alert alert-success alert-dismissible fade show" role="alert" id="mess">'.'Membre équipe modifié avec succès.'.'</div>';
                    }
                  }
                  else{
                    echo "Not correct type file";
                  }
                  //echo '<div class="alert alert-success alert-dismissible fade show" role="alert" id="mess">'.'Publication modifié avec succès.'.'</div>';
                }
                else{
                  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="erreur">'.'Modification echouée.'.'</div>'; 
                }
              }// code admin
          }//verification format mail
        }//fin base de données
        $bd->close();
      }
    }
  }
  else{
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="erreur">'."Connexion perdue.".'</div>'; 
  }    
} // fin fonction
//fin mise à jour membre de l'equipe

//Desactiver membre de l'equipe
function desactivermembre(){
  if (isset($_SESSION['pseudo'])) {
    if (isset($_POST['cmd_delMembre'])) {
      if (empty($_GET['id'])) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="erreur">'.'Aucun parametre trouvé'.'</div>';
      }
      else{
        $IDmembre= $_GET['id'];
        include("connexion.php");
        if ($bd -> connect_error) {
          die('Impossible de se connecter à la BD:'.$bd ->connect_error);
        }
        else{
          $d_id=date("d-m-y");
          $h_id=date("h:i:s");
          $dat=$d_id." ".$h_id;
          $conc_id=md5($dat);
          $code_user=substr($conc_id,0 ,5);
          $customer=$_SESSION['pseudo'];
          $params=1;
          $statut="Desactiver";

          $requete = "SELECT * FROM admin_tb WHERE statut='Actif' AND pseudo='".$_SESSION['pseudo']."'";
          $resultats = $bd ->query($requete);

          if ($resultats ->num_rows < 0) {
            while($row = $resultats ->fetch_assoc()){
              echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="erreur">'.'Aucun droit d\'administration'.'</div>'; 
            }
          }
          else{// code admin
                $sql="UPDATE equipe_tb SET statut='$statut',date_edit='$dat',customer='$customer' WHERE id ='$IDmembre'";
                $sav = $bd->query($sql);

                if ($sav == true) {
                  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="mess">'.'Membre est désactiver avec succès.'.'</div>';
                }
                else{
                  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="erreur">'.'Modification echouée.'.'</div>'; 
                }
              }// code admin
          
        }//fin base de données
        $bd->close();
      }
    }
  }
  else{
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="erreur">'."Connexion perdue.".'</div>'; 
  }    
} // fin fonction
//fin Desactiver membre de l'equipe

?>