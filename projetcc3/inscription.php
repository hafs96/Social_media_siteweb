<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    body {
      background-image: linear-gradient(90deg, #007bff, #ffffff);
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
  
  
    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
    }

    h1 {
      text-align: center;
      color: #003399;
    }

    form {
      background-color: rgba(255, 255, 255, 0.8);
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: flex;
      align-items: center;
      color: #003399;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .form-group input
    {
      width: 97%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }
    .form-group select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }
    .form-group.upload input[type="file"] {
      display: none;
    }

    .form-group.upload label {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 10px;
      background-color: #003399;
      color: white;
      text-align: center;
      border-radius: 3px;
      cursor: pointer;
    }

    .form-group.upload label:hover {
      background-image:linear-gradient(90deg, #003399, #ffffff);
      color: #001f66;
    }

    .form-group.upload label i {
      margin-right: 5px;
    }

    button {
      background-color: #003399;
      color: white;
      border: none;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #001f66;
    }

    @media only screen and (max-width: 600px) {
      form {
        padding: 10px;
      }

      .form-group label {
        margin-bottom: 10px;
      }

      button {
        padding: 8px 16px;
        font-size: 14px;
      }
    }
    .form-group select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }
    
 


  </style>
</head>
<body>
  <div class="container">
  <div style=" text-align: center; " >
  <?php
if (isset($_GET["msgerr"])) {
  echo $_GET["msgerr"];
}
?>


  </div>
    <h1>  GenuisGuideOFPPT</h1>
    <form method="post" action="traitement.php  " enctype="multipart/form-data">
      <div class="form-group">
        <label><i class="fas fa-user"></i> Nom :</label>
        <input type="text" name="nom"  placeholder="Entrez votre nom" value="<?php 
  if(isset($_GET["nom"])) echo $_GET["nom"]?>" >
      </div>
      <div class="form-group">
        <label><i class="fas fa-user"></i> Prénom :</label>
        <input type="text" name="prenom"  placeholder="Entrez votre Prénom" value="<?php 
  if(isset($_GET["prenom"])) echo $_GET["prenom"]?>" >
      </div>
      <div class="form-group">
        <label><i class="fas fa-user-graduate"></i> Statut</label>
        <select name="statut">
  <option value="ancien stagiaire" <?php if(isset($_GET["statut"]) && $_GET["statut"] == "ancien stagiaire") echo "selected"; ?>>Ancien stagiaire</option>
  <option value="nouveau stagiaire" <?php if(isset($_GET["statut"]) && $_GET["statut"] == "nouveau stagiaire") echo "selected"; ?>>Nouvel stagiaire</option>
</select>

      </div>
      <div class="form-group">
        <label><i class="fas fa-envelope"></i> Email :</label>
        <input type="email" name="email"  placeholder="Entrez votre email" value="<?php 
  if(isset($_GET["email"])) echo $_GET["email"]?>" >
      </div>
      <div class="form-group">
        <label><i class="fas fa-lock"></i> Mot de passe :</label>
        <input type="password" name="password"  placeholder="Entrez votre mot de passe" value="<?php 
  if(isset($_GET["password"])) echo $_GET["password"]?>" >
      </div>
      <div class="form-group">
        <label><i class="fas fa-lock"></i> Confirmation du mot de passe :</label>
        <input type="password" name="confirmPassword"  placeholder="Entrez votre mot de passe pour la confirmation "  value="<?php 
  if(isset($_GET["confirmPassword"])) echo $_GET["confirmPassword"]?>"  >
      </div>
      <div class="form-group">
        <label><i class="fab fa-linkedin"></i> Compte LinkedIn :</label>
        <input type="url" name="linkedin" placeholder="Entrez le lien vers votre compte LinkedIn"  value="<?php 
  if(isset($_GET["linkedin"])) echo $_GET["linkedin"]?>">
      </div>
      
      <div class="form-group">
  <label for="field">
  <i class="fas fa-graduation-cap text-primary"></i>
    Votre filière:
  </label>
  <input type="text" class="form-control" id="field" name="filière" placeholder="Entrez votre filière" value="<?php 
  if(isset($_GET["filière"])) echo $_GET["filière"]?>">
</div>
<div class="form-group upload">
  <label>
    <i class="far fa-image"></i>
    Télécharger Photo de profil
    <input type="file" name="photo" accept="image/*">
  </label>
</div>
      
      <div id="previewContainer" class="photo-preview"></div>

      <button type="submit" name="env">Envoyer</button>
  
    </form>
  </div>
</body>
</html>
