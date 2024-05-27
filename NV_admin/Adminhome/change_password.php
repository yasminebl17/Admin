<?php
session_start();

// Assurez-vous que l'utilisateur est connecté
if (!isset($_SESSION['id'])) {
    header("Location:../index.php"); // Redirigez vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}

include("config.php"); // Incluez votre fichier de configuration de la base de données

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $old_password = mysqli_real_escape_string($con, $_POST['old_password']);
    $new_password = mysqli_real_escape_string($con, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);
    $user_id = $_SESSION['id'];

    // Vérifiez si l'ancien mot de passe est correct
    $result = mysqli_query($con, "SELECT mot_de_passe FROM userss WHERE id='$user_id'");
    $row = mysqli_fetch_assoc($result);

    if ($row['mot_de_passe'] == $old_password) {
        // Vérifiez si les nouveaux mots de passe correspondent
        if ($new_password == $confirm_password) {
            // Mettre à jour le mot de passe
            mysqli_query($con, "UPDATE userss SET mot_de_passe='$new_password' WHERE id='$user_id'");
            echo "<p>Le mot de passe a été changé avec succès.</p>";
        } else {
            echo "<p>Les nouveaux mots de passe ne correspondent pas.</p>";
        }
    } else {
        echo "<p>L'ancien mot de passe est incorrect.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changer le mot de passe</title>
    <link rel="stylesheet" href="../css/styleadmin.css">
</head>
<body>
    <div class="password-change-container">
        <h1>Changer le mot de passe</h1>
        <form action="change_password.php" method="post">
            <label for="old_password">Ancien mot de passe:</label>
            <input type="password" id="old_password" name="old_password" required><br>

            <label for="new_password">Nouveau mot de passe:</label>
            <input type="password" id="new_password" name="new_password" required><br>

            <label for="confirm_password">Confirmer le nouveau mot de passe:</label>
            <input type="password" id="confirm_password" name="confirm_password" required><br>

            <input type="submit" value="Changer le mot de passe">
        </form>
        <a href="adminhome.php">Retour</a>
    </div>
</body>
</html>
