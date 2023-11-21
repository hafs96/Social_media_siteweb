<?php 
session_start();
if (isset($_SESSION)&& !empty($_SESSION)){
    if (session_unset() || session_destroy()){
        session_gc();//
        header("Location: Connexion.php");
    }

}
?>