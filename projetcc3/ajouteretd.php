<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="description" content="learning php">
  <meta name="keywords" content="HTML, CSS, JavaScript">
 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Ajouter</title>
  <style>
    body {
      background-color: #f0f0f0;
      font-family: Arial, sans-serif;
    }
    .container {
      max-width: 500px;
      margin: auto;
      padding: 20px;
      background-color: #ffffff;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .form-group {
      margin-bottom: 20px;
    }
    input[type="text"],
    input[type="submit"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
    }
    input[type="submit"] {
      background-color: #63B4DA;
      color: white;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #4682B4;
    }
    .back-link {
      display: block;
      text-align: center;
      margin-top: 20px;
      color: #63B4DA;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="container">
    <form method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="etude">Étude :</label>
        <input type="text" id="etude" name="etude" required>
      </div>
      <div class="form-group">
        <label for="etab">Établissement :</label>
        <input type="text" id="etab" name="etab" required>
      </div>
      <input type="submit" name="ajouter" value="Ajouter">
    </form>
    <a class="back-link" href="profilep.php">&#8592; Retour au profil</a>
  </div>
</body>
</html>
