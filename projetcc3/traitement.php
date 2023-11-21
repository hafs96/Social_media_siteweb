<?php
$erreur="";
require("connectbd.php");
$email = $_POST['email'];

// Requête SQL pour vérifier si l'e-mail existe dans la table
$query = "SELECT COUNT(*) AS count FROM utilisateur WHERE Email = :email";
$statement = $con->prepare($query);
$statement->bindParam(':email', $email);
$statement->execute();
$result = $statement->fetch(PDO::FETCH_ASSOC);
if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(isset($_POST["env"])){
    if(!isset($_POST["nom"]) || empty($_POST["nom"])) $erreur.="<div >Nom est vide </div>";
    if(isset($_POST["nom"]) && !empty($_POST["nom"]) && !preg_match('/^[A-Za-z]+$/',$_POST["nom"] ))  $erreur.="<div >Nom invalide </div>";
    if(!isset($_POST["filière"]) || empty($_POST["filière"])) $erreur.="<div >filière est vide </div>";
    if(isset($_POST["filière"]) && !empty($_POST["filière"]) && !preg_match('/^[A-Za-z]+$/',$_POST["filière"] ))  $erreur.="<div >filière invalide </div>";
    if(isset($_POST["prenom"]) && !empty($_POST["prenom"]) && !preg_match('/^[A-Za-z]+$/',$_POST["prenom"] ))  $erreur.="<div >prenom invalide </div>";
    if(!isset($_POST["prenom"]) || empty($_POST["prenom"])) $erreur.="<div>prenom est vide </div>";
    if(!isset($_POST["email"]) || empty($_POST["email"])) $erreur.="<div>mail est vide</div>";
    if(!isset($_POST["password"]) || empty($_POST["password"])) $erreur.="<div>Mot de passe  est vide</div>";
    if(!isset($_POST["confirmPassword"]) || empty($_POST["confirmPassword"])) $erreur.="<div>Confirmation du mot de passe  est vide</div>";
    if(isset($_POST["password"]) && isset($_POST["confirmPassword"]) && $_POST["confirmPassword"]!=$_POST["password"])  $erreur.="<div>Confirmation du mot de passe  est différent de mot de passe </div>";
    if(isset($_POST["password"]) && !empty($_POST["password"]) && strlen($_POST["password"])<8 ) $erreur.="<div>le mot de passe doit contenir au moins 8 caractères</div>";
   
    if ($result['count'] > 0) $erreur.="<div>L'e-mail existe déjà</div>";
    if (empty($erreur)) {
      extract($_POST);
      if(isset($_FILES) && $_FILES["photo"]["error"]==0){
        $type=$_FILES["photo"]["type"];
        $exts=["image/png","image/jpg","image/jpeg","image/gif","image/jfif","image/swf"];
        if(in_array($type,$exts)){
          if($_FILES["photo"]["size"]<40000000){
              move_uploaded_file($_FILES["photo"]["tmp_name"],"./files/".$_FILES["photo"]["name"]);
           try {
                if ( !isset($_POST["linkedin"]) || empty($_POST["linkedin"])) {
                     $requisins = $con->prepare("INSERT INTO utilisateur(Nom, Prénom, Statut, Email, `Mot de passe`, filière, photo) VALUES (?, ?, ?, ?, ?, ?, ?)");
                     $requisins->execute([$nom, $prenom, $statut, $email, $password, $filière, ".\\files\\".$_FILES["photo"]["name"]]);
                     header("Location: Connexion.php");
                     exit;
                }
         
         
                if ( isset($_POST["linkedin"])) {
                   $requisins = $con->prepare("INSERT INTO utilisateur(Nom, Prénom, Statut, Email, `Mot de passe`, filière, photo,  `Compte LinkedIn`) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)");
                   $requisins->execute([$nom, $prenom, $statut, $email, $password, $filière, ".\\files\\".$_FILES["photo"]["name"], $linkedin]);
                   header("Location: Connexion.php");
                   exit;
                }
          
        }
       catch (PDOException $ex) {
          die("Erreur insertion donnée : " . $ex->getMessage());
        }
 
     
  }
  
    else {
      header("Location: inscription.php?msgerr=$erreur&nom=".$_POST["nom"]. "&photo=".$_POST["photo"]. "&filière=".$_POST["filière"]."&statut=".$_POST["statut"]."&linkedin=".$_POST["linkedin"]."&email=".$_POST["email"] ."&prenom=".$_POST["prenom"]."&password=".$_POST["password"]."&confirmPassword=".$_POST["confirmPassword"]);
      
    }
    
}
}
}
}
}

?>