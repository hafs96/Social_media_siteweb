<?php

session_start();
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
   header("location:Connexion.php");
   exit;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <titl .e>my profile</titl>
</head>
<html>
    <style>
     .navbar{
        background-image: linear-gradient(90deg, #007bff,#ffffff);
        border-radius: 100px;
      }
      li>  a {
        text-align: center;
            display: block;
            padding: 10px;
            border-radius: 6px;
            text-decoration: none;
            color: #003399;
           margin-left: 100px;
        }
      
        .upload input[type="file"] {
      position: absolute;
      left: -9999px;
    }
    .upload label {
      display: inline-block;
      background-color: #3498db;
      color: #fff;
      padding: 8px 15px;
      border-radius: 4px;
      cursor: pointer;
    }
    .upload label i {
      margin-right: 5px;
    }
    .upload label::before {
      content: "Modifier votre Photo de profil :";
    }
ul{
  list-style: none;
}
body {
  font-family: Arial, sans-serif;
  background-image: linear-gradient(90deg, #007bff,#ffffff);
  color: #333;
  margin: 0;
  padding: 0;
}

.profile {
  width: 80%;
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
  background-color: rgba(255, 255, 255, 0.8);
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  text-align: center;
}

.profile-title {

      text-align: center;
      color: #003399;
  
}

.profile-picture {
  width: 150px;
  height: 150px;
  border-radius: 50%;
  margin: 20px auto;
}

.profile-name {
  font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 10px;
}

.profile-email{
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}
.profile-linkedin {
  margin-bottom: 10px;
}

.profile-competences h3{
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;

}
.profile-etudes h3{
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}
.profile-experiences h{
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}
.profile-competences li{
        justify-content: center;
}
@media (max-width: 600px) {
    .left-section,
    .right-section {
      width: 100%;
      float: none;
      margin-right: 0;
    }

    .profile-picture {
      margin: 0 auto;
    }

    .information-content {
      flex-direction: column;
    }

    .buttons {
      text-align: center;
      margin-top: 10px;
    }

    .button {
      display: block;
      margin-bottom: 10px;
    }
}

  .section-icon {
      color: #3498db;
      font-size: 24px;
      margin-right: 10px;
    }

    </style>
  <title>Profil Utilisateur</title>
  <link rel="stylesheet" href="styles.css">

<body>
  
  <div class="profile">
    <h1 class="profile-title">GenuisGuideOFPPT</h1>
    <div class="navbar" >
            <ul style="list-style: none ;display: flex;text-align: center;">
               

                <li>
                    <a class="active d-flex align-center-items fs-14 c-black rad-6 p-10" href="accuiel.php">
                        <i class="fa-fw"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                        </svg></i>
                        <span>Accueil</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center-items fs-14 c-black rad-6 p-10" href="profilep.php">
                        <i class="fa-fw"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                        </svg></i>
                        <span>Profil</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center-items fs-14 c-black rad-6 p-10" href="index.html">
                        <i class="fa-fw">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-text-fill" viewBox="0 0 16 16">
                                <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM4.5 5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0 2.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4z" />
                            </svg>
                        </i>
                        <span>Chat</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center-items fs-14 c-black rad-6 p-10" href="logout.php">
                        <i class="fa-fw">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                            </svg>
                        </i>
                        <span>Déconnexion</span>
                    </a>
                </li>
            </ul>
        </div>
    <?php
 
    if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
       header("location:Connexion.php");
       exit;
    }else{
   require("connectbd.php");
  $reqsel= $con->prepare("SELECT * FROM utilisateur where Email=?");
  $reqsel->execute([$_SESSION['email']]);
  $tab=$reqsel->fetchAll();
  if(!empty($tab)){
   
  foreach($tab as $ex){
   echo "<div class='profile'>" ;
   echo "<div class='left-section'>" ;
   echo " <img class='profile-picture' src='$ex[photo]' >";
   echo " </div>";
   echo "<div class='form-group upload'>";
  
     echo "<i class='far fa-image'></i>";
    
     echo " <a href='modifier.php'>modifier votre photo de profile</a>";
   
  echo "</div>";
   echo "<div class='profile-name'>$ex[Nom] $ex[Prénom]</div>" ;
   
    echo "<div class='information'>";
      echo "<div class='information-title'><i class='fas fa-envelope'></i> Email : $ex[Email]</div>";
      echo "<div class='separator'> filière :$ex[filière]</div>";
      echo "<div class='information-title'><i class='fas fa-user-tag'></i> Statut : $ex[Statut]</div>";
      if($ex['Compte LinkedIn']!==null){
        echo "</div>";
         echo "<div class='information'>";
        echo "<div class='profile-linkedin'><i class='fab fa-linkedin'></i> Compte LinkedIn : $ex[5]</div>";
    }
       else{
             echo "<div class='information-content'>";
       
            echo "<div class='buttons'>" ;
            echo "<a href='ajouter.php' class='button'><i class='fab fa-linkedin'></i> Ajouter votre compte LinkedIn</a>";
           
         echo "</div>";
        echo "</div>";}
          
         }
       }
       }
   
  $reqsel= $con->prepare("SELECT * FROM competences where email=? ");
  $reqsel->execute([$_SESSION['email']]);
  $tab_com=$reqsel->fetchAll();
  echo "<div class='profile-competences'>" ;
  echo "<h3><i class='section-icon fas fa-tasks'></i> Compétences</h3>" ;
if(!empty($tab_com)){
 
  echo "<ul>";
  foreach($tab_com as $grn){
    echo "<li>$grn[1]</li>";
   
   
}
echo "<li><i class='fas fa-plus'><a href='ajoutercmp.php'>Ajouter</a></i> </li>";
  echo "</ul>";
 echo "</div>";
   
}else{
  echo "<i class='fas fa-plus'><a href='ajoutercmp.php'>Ajouter</a></i> ";
}
?>

<?php 
  require("connectbd.php");
  $reqsel= $con->prepare("SELECT * FROM etude where mail=?");
  $reqsel->execute([$_SESSION['email']]);
  $tab_et=$reqsel->fetchAll();
  echo "<div class='profile-etudes'>" ;
  echo "<h3><i class='section-icon fas fa-graduation-cap'></i> Études</h3>";
if(!empty($tab_et)){
  
 
   echo "<ul>";
    foreach($tab_et as $grn){
      echo "<li>$grn[3] _ $grn[1]</li>";
   
   
    }
    echo "<li><i class='fas fa-plus'><a href='ajouteretd.php'>Ajouter</a></i> </li>";
  echo "</ul>";
 echo "</div>";
   
}else{
  echo "<i class='fas fa-plus'><a href='ajouteretd.php'>Ajouter</a></i> ";
}
?>
<?php 
  require("connectbd.php");
  $reqsel= $con->prepare("SELECT * FROM experience where email=?");
  $reqsel->execute([$_SESSION['email']]);
  $tab_ex=$reqsel->fetchAll();
  echo "<div class='profile-experiences'>";
      echo "<h3><i class='section-icon fas fa-briefcase'></i> Expériences</h3>";
if(!empty($tab_ex)){
  echo "<ul>";
    foreach($tab_ex as $grn){
     echo "<li>Poste occupé: $grn[poste]</li>" ;
     echo " <li>Entreprise: $grn[entreprise]</li>";
      echo "<li>Durée:$grn[datedebut]___$grn[datefin] </li>";
    }
    echo "<li><i class='fas fa-plus'><a href='ajouterexp.php'>Ajouter</a></i> </li>";
    echo "</ul>";
   echo "</div>";
    
}else{
  echo "<i class='fas fa-plus'><a href='ajouterexp.php'>Ajouter</a></i> ";
}
?>
<style>
   
</style>

</body>
</html>