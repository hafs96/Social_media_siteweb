<?php
// Connexion à la base de données
$servername = "localhost";
$username = "votre_nom_d_utilisateur";
$password = "votre_mot_de_passe";
$dbname = "projet";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données: " . $conn->connect_error);
}

// Récupération des données du formulaire
$message = $_POST['message'];
$mail=$_SESSION['email'];
$expediteur = "votre_identifiant"; // Remplacez par l'identifiant de l'expéditeur (stagiaire ou lauréat)
$dateEnvoi = date('Y-m-d H:i:s');

// Insertion du message dans la base de données
$sql = "INSERT INTO message (contenu, expediteur, date_envoi) VALUES ('$message', '$expediteur', '$dateEnvoi') where mail=$mail";

if ($conn->query($sql) === TRUE) {
    // Redirection vers la page du chat
    header("Location: chat.php");
    exit();
} else {
    echo "Erreur lors de l'envoi du message: " . $conn->error;
}

$conn->close();
?>
