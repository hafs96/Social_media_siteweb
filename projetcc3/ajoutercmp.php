<?php
session_start();
if (!isset($_SESSION) || empty([$_SESSION])) {
    header("Location: Connexion.php");
} else {
    require("connectbd.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        extract($_POST);
        if (isset($competence) && !empty($competence)) {
            try {
                $ri = $con->prepare("INSERT INTO competences (nomcom, email) VALUES (?, ?)");
                $r = $ri->execute([$competence, $_SESSION['email']]);
                if ($r == true) header("Location: profilep.php");
            } catch (PDOException $e) {
                die("Erreur à l'insertion" . $e->getMessage());
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="description" content="learning php">
  <meta name="keywords" content="HTML, CSS, JavaScript">
 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Ajouter</title>
  <style>
    /* Vos styles CSS personnalisés peuvent être ajoutés ici */
    /* Par exemple : */
    
    .container {
      max-width: 500px;
      margin: auto;
      padding: 20px;
    
    }
    .form-group {
      margin-bottom: 20px;
    }
    input[type="submit"] {
      background-color: #63B4DA;
      color: white;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #4682B4;
    }
  </style>
</head>
<body>
  <div class="container">
    <form method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="competence">Compétence:</label>
        <input type="text" id="competence" name="competence" class="form-control" required>
      </div>
      <input type="submit" name="ajouter" value="Ajouter" class="btn btn-primary">
    </form>
  </div>
</body>
</html>
