<?php
session_start();
if (!isset($_SESSION) || empty($_SESSION)) {
    header("location: Connexion..php");
 }
try {
  $con = new PDO("mysql:host=localhost;dbname=projet", "root", "", [PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
  echo "error:" . $e->getMessage();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  extract($_POST);

  if (isset($des) and !empty($des)) {
    if (isset($_FILES) && $_FILES["phot"]["error"] === 0) {
      //2- la virfication que le fichier est une image
      $type = $_FILES['phot']['type'];
      $exts = ["image/png", "image/jpg", "image/jpeg", "image/gif", "image/jfif", "image/swf"];
      if (in_array($type, $exts)) {
        if ($_FILES["phot"]["size"] < 40000000) {
          //deplacer image de dossier tmp au dossier images 
          move_uploaded_file($_FILES['phot']["tmp_name"], "./files/" . $_FILES['phot']['name']);
          
          //reqete de insertion 
          $reqi = $con->prepare("INSERT INTO publication (email,`num`, `user`, `description`, `image`,`dateP`) VALUES (?,?, ?,?,?,?)");
          $reqi->execute([$_SESSION['email'],null, 1, $_POST['des'], ".\\files\\" . $_FILES["phot"]["name"], null]); // argement 2 $_SESSION['id']
        } else echo "taiile de l'mage ne doit depasser 40m";
      } else echo "le fichie n'est pas une image";
    } else echo "ne charge pas ";
  }
}
?>

<?php
// la partie de ssesion
//khas id user login wela nom wela id 
//le sinformaton de pages acc

if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
   

try {
  $con = new PDO("mysql:host=localhost;dbname=projet", "root", "", [PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
  echo "error:" . $e->getMessage();
}
$reqSelect = $con->prepare("SELECT * from  utilisateur where Email=?"); //  WHERE id=?
$reqSelect->execute([$_SESSION['email']]); //[$_SESSION['id']]
$tabInfo = $reqSelect->fetch();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="./framework.css" />
  <link rel="stylesheet" href="./styl.css" />
</head>
<style>
  html {
    scroll-behavior: smooth;
    text-transform: capitalize;
  }
</style>

<body>
  <div class="page d-flex">
    <div class="sidebar bg-white p-20 p-relative">
      <h3 class="p-relative txt-c mt-0">GeniusGuideOFPPT</h3>
      <ul>
        <li>
          <a class="active  d-flex align-center-items fs-14 c-black rad-6 p-10" href="index.html">
            <i class="fa-fw"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
              </svg></i>
            <span>accuile</span>
          </a>
        </li>
        <li>
          <a class="d-flex align-center-items fs-14 c-black rad-6 p-10" href="profilep.php">
            <i class="fa-fw"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
              </svg></i>
            <span>Profile </span>
          </a>
        </li>
        <li>
          <a class="d-flex align-center-items fs-14 c-black rad-6 p-10" href="index.html">
            <i class="fa-fw">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-text-fill" viewBox="0 0 16 16">
                <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM4.5 5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0 2.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4z" />
              </svg></i>
            <span>chat</span>
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
            <span>Logout</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="content w-full">
      <!-- start head -->
      <header class="head bg-white p-15 between-flex">
        <div class="search p-relative">
          <input class="p-10 rad-10 " type="search" placeholder=" Type a keyword">
        </div>
        <div class="icons d-flex align-center-items">
          <span class="notification p-relative ">
            <i>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
              </svg></i>
          </span>
          <img src="./598652f8-8356-43d4-afff-0aeefc0cc0db.jpg" alt="">
        </div>
      </header>
      <!-- end header -->
      <h1 class="p-relative">Accuile</h1>
      <div class="wrapper d-grid pag-20">
        <div class="welcome bg-white rad-10 .txt block-mobile">
          <div class="intro p-20 d-flex space-between  bg-eee">
            <div>
              <h3 class="m-0 "> welcome</h3>
              <p class="c-grey mt-5"> <?php if (!empty($tabInfo)) echo $tabInfo['Nom'] . " " . $tabInfo['Prénom'] ?> </p>
            </div>
            <img class="hide-mobile" src="./stock-vector-emotive-content-creation-empathy-as-a-publication-response-blog-promotion-guidance-how-to-2135460129.jpg" alt="">
          </div>

          <img  src=" <?php echo "$tabInfo[photo]"?>" alt="" class="pr"> <!-- tout image a lbase de donnes  -->
          <div class="body txt-c  d-flex p-20 mt-20 mb-20 block-mobile">
            <div><?php if (!empty($tabInfo)) echo $tabInfo['Nom'] . " " . $tabInfo['Prénom'] ?> <span class="d-block c-grey fs-14 mt-10"> <?php if (!empty($tabInfo)) echo $tabInfo['filière'] ?></span> </div>
            <div> <?php if (!empty($tabInfo)) echo $tabInfo['Nbprojct'] ?> <span class="d-block c-grey fs-14 mt-10">project </span></div>
          </div>
          <a href="profilep.php" class="visit  rad-6 fs-14 mt-10 bg-blue c-white btn-shape ">profile</a>
        </div>

        <div class="quick-draft p-20 bg-white rad-10">
          <h2 class="mt-0 mb-10">publication</h2>
          <?php

          ?>
          <form method="POST" enctype="multipart/form-data">
            <!-- <input class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" type="text" name="til" placeholder="Title" /> -->
            <input type="file" class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" name='phot'>
            <textarea class="d-block mb-20 w-full p-10 b-none bg-eee rad-6" name="des" placeholder="whats on your mind?"></textarea>
            <input class="save d-block fs-14 bg-blue c-white b-none w-fit btn-shape" type="submit" name="po" value="Post" />
          </form>
        </div>

        <?php
        if (isset($po)) {

          $reqS = $con->prepare("SELECT * FROM publication join utilisateur on publication.email=utilisateur.Email where utilisateur.Email=? order by num desc  ;");
          $reqS->execute([$_SESSION['email']]);
          $tab = $reqS->fetchAll();
        }
        if (!empty($tab)) {

          foreach ($tab as $info) {

            echo "        <div class='targets p-20 bg-white rad-10'>
  <img src=' $info[photo]'  style='width: 64px;
  height: 64px;
  border: 2px solid white;
  border-radius: 50%;
  padding: 2px;
  filter: drop-shadow(0 0 5px #ddd);
  margin-left: 20px;
  margin-top: -22px;'>
  <span class='d-block c-grey fs-14 pl-10 mt-10'>   " . $info['Nom'] . "  </span>
  <p class='mt-0 mb-20 pl-10 c-grey fs-15'> date Post  " . $info['dateP'] . " </p>
  <div class='body txt-c  d-flex p-20 mt-20 mb-20 block-mobile'>
    <img src='" . $info['image'] . "' style='
    height: 200px;
    border: 2px solid white;
    border-radius: 50%;
    padding: 2px;
    filter: drop-shadow(0 0 5px #ddd);
    margin-left: 20px;
    margin-top: -22px;'>
  </div>
  <div class='txt-c  d-flex   block-mobile'>
    <h2> " . $info['description'] . "  </h2>
  
  </div>
  </div>";
          }
        }

        ?>
    

</body>

</html>