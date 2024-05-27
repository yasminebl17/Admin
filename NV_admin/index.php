<?php
session_start(); // Démarrer la session

include("config.php");

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Requête pour récupérer l'utilisateur par email
    $result = mysqli_query($con, "SELECT * FROM userss WHERE email='$email'") or die("Erreur de sélection : " . mysqli_error($con));
    $row = mysqli_fetch_assoc($result);

    if (is_array($row) && !empty($row)) {
        // Vérifier l'état du compte
        if ($row['Etat_de_compte'] == 'Activer') {
            // Vérifier le mot de passe
            if ($password === $row['mot_de_passe']) {
                // Configurer les variables de session avec les détails de l'utilisateur
                $_SESSION['id'] = $row['id'];
                $_SESSION['nom'] = htmlspecialchars($row['nom']);
                $_SESSION['prenom'] = htmlspecialchars($row['prenom']);
                $_SESSION['email'] = htmlspecialchars($row['email']);
                $_SESSION['type_de_compte'] = $row['type_de_compte'];

                // Rediriger vers différentes pages en fonction du type de compte
                switch ($_SESSION['type_de_compte']) {
                    case 'admin':
                        header("Location: Adminhome/adminhome.php");
                        break;
                    case 'manager':
                        header("Location: Manager-Home/index.php");
                        break;
                    case 'chef_dot':
                        header("Location: dothome.php");
                        break;
                    case 'agent_CM':
                        header("Location: ../AGENT_COMMERCIALISATION/Agent_cm/Import_exel_cc_4G_lte_realisation/index.php");
                        break;
                    case 'agent_CH':
                        header("Location: ../AGENT CHIFFRE ELEMENTS/Import_chiff_aff_internet_4G_re_n_1/index.php");
                        break;
                    case 'agent_RB':
                        header("Location: ../index.php");
                        break;
                    case 'agent_RA':
                        header("Location: ../index.php");
                        break;
                    default:
                        echo "<div class='message'><p>Type de compte invalide</p></div><br>";
                        echo "<a href='index.php'><button class='btn'>Retour</button></a>";
                        break;
                }
                exit; // Terminer le script après la redirection
            } else {
                echo "<div class='message'><p>Mot de passe incorrect</p></div><br>";
                echo "<a href='index.php'><button class='btn'>Retour</button></a>";
            }
        } else {
            echo "<div class='message'><p>Votre compte est désactivé</p></div><br>";
            echo "<a href='index.php'><button class='btn'>Retour</button></a>";
        }
    } else {
        echo "<div class='message'><p>Email incorrect</p></div><br>";
        echo "<a href='index.php'><button class='btn'>Retour</button></a>";
    }
} else {
    // Afficher le formulaire de connexion s'il n'a pas été soumis.
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulaire de connexion animé</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <img class="wave" src="img/wave.png">
    <div class="container">
        <div class="img">
            <img src="img/l3.svg">
        </div>
        <div class="login-content">
            <form action="index.php" method="post">
                <img src="img/logo1.png">
                <h2 class="title">Algérie télécom</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="div">
                        <h5>Email</h5>
                        <input type="email" class="input" name="email" autocomplete="off" required>
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i"> 
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Mot de passe</h5>
                        <input type="password" class="input" name="password" autocomplete="off" required>
                    </div>
                </div>
                <a href="#">Mot de passe oublié?</a>
                <input type="submit" class="btn" name="submit" value="CONNECTER">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>

<?php
}
?>
