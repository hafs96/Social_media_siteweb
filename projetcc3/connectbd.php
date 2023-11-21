<?php
try{
    $con = new PDO("mysql:host=localhost;dbname=projet","root","",[PDO::ERRMODE_EXCEPTION]);
}
catch(PDOException $ex){
    die("Erreur connexion base des donnee:".$ex->getMessage());

}




?>