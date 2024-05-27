<?php
session_start();

// Assurez-vous que l'utilisateur est connecté
if (!isset($_SESSION['id'])) {
    header("Location: ../index.php"); // Redirigez vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}

// Récupérer les informations de l'utilisateur connecté
$nom = htmlspecialchars($_SESSION['nom']);
$prenom = htmlspecialchars($_SESSION['prenom']);
$email = htmlspecialchars($_SESSION['email']);
$type_de_compte = htmlspecialchars($_SESSION['type_de_compte']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="profile-container">
        <h1>Profile de l'utilisateur</h1>
        <p><strong>Nom:</strong> <?php echo $nom; ?></p>
        <p><strong>Prénom:</strong> <?php echo $prenom; ?></p>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
        <p><strong>Type de compte:</strong> <?php echo $type_de_compte; ?></p>
        <a href="adminhome.php">Retour</a>
    </div>
</body>
</html>
