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
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<script src="https://kit.fontawesome.com/8c4c819bf8.js" crossorigin="anonymous"></script>
    
    <title>Gestion Employés</title>
    <link rel="stylesheet" href="../css/styleadmin.css">

   
    
</head>

<body>
    
    <!-- SIDEBAR -->
	<div class="sidebar">
		<div class="logo_details">
		  <i class="bx bx-menu" id="btn"></i>
	</div>

	<ul class="nav-list">    

	    <li>
			<a href="dash.php">
            <i class="fa-solid fa-house-chimney"></i>
			  <span class="link_name">Dashboard</span>
			</a>
			<span class="tooltip">Dashboard</span>
		</li>
		<li>
			<a href="listedeconnection.php">
            <i class="fa-solid fa-user-gear"></i>
			  <span class="link_name">Historique de connection</span>
			</a>
			<span class="tooltip">Historique de connection</span>
		</li>
	</ul>
	  </div>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section class="content">
		<!-- NAVBAR -->
		<nav class="header">
			<div class="left">
			<div><img src="../img/logoo.svg" alt="" class="logo"></div>
			<div class="text">BILAN D'ACTIVITE MENSUEL</div>
		 </div>
		<div class="profile-dropdown">
            <div onclick="toggle()" class="profile-dropdown-btn">
              <div class="profile-img">
                <i class="fa-solid fa-circle"></i>
              </div>
    
              <span>
						<?php echo $nom . ' ' . $prenom; ?>
						<i class="fa-solid fa-angle-down"></i>
					</span>
		
    
            <ul class="profile-dropdown-list">
              <li class="profile-dropdown-list-item">
                <a href="profile.php">
                  <i class="fa-regular fa-user"></i>
                  Voir Profile
                </a>
              </li>
    
              <li class="profile-dropdown-list-item">
                <a href="change_password.php">
                  <i class="fa-regular fa-envelope"></i>
                Changer mot de passe .
                </a>
              </li>
              <hr />
    
              <li class="profile-dropdown-list-item">
                <a href="logout.php">
                  <i class="fa-solid fa-arrow-right-from-bracket"></i>
                  Log out
                </a>
              </li>
            </ul>
          </div>
		</nav>
		<!-- NAVBAR -->

       <!--Main-->
       <main class="main">
         <h4>
			Home / Liste utilisateurs
		</h4>
		<h1>Table d'utilisateurs</h1>

       <div class="container">
       <div class=" usr">
          <button class="Btn_add">
             <a href="ajouter.php"  > <img src="../images/plus.png"> Ajouter</a>
          </button>
          <!-- Add a form to your HTML code -->
          <form action="search.php" method="get">
             <input type="search" name="search" placeholder="Rechercher un utilisateur">
            <button type="submit"  class="Btn_add">Rechercher</button>
          </form>
       </div>
        <table>
            <tr id="items">
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Type de compte</th>
                <th>DOT</th>
                <th>Etat de compte</th>
                <th>Date de création</th>
                <th>Date de mise à jour</th>
                <th>Modifier</th>
            </tr>
            <?php
            // Inclure la page de connexion
        include("config.php");
             
            // Requête pour afficher la liste des utilisateurs
            $req = mysqli_query($con, "SELECT * FROM userss");

            

            ///////
            if (mysqli_num_rows($req) == 0) {
                // S'il n'existe pas d'utilisateurs dans la base de données, alors on affiche ce message :
                echo "Il n'y a pas encore d'utilisateurs ajoutés !";
            } else {
                // Si non, affichons la liste de tous les utilisateurs
                while ($row = mysqli_fetch_assoc($req)) {
                    ?>
                    <tr>
                        <td><?= $row['nom'] ?></td>
                        <td><?= $row['prenom'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['type_de_compte'] ?></td>
                        <td><?= $row['DOT'] ?></td>
                        <td><?= $row['Etat_de_compte'] ?></td>
                        <td><?= $row['date_de_creation'] ?></td>
                        <td><?= $row['date_de_mise_a_jour'] ?></td>

                        <!-- Nous allons mettre l'id de chaque utilisateur dans ce lien -->
                        <td><a href="modifier.php?id=<?= $row['id'] ?>"><img src="../images/pen.png" class="modif" w></a></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
    </div>

       </main>
    


    <script src="../js/scriptAdmin.js"></script>
</body>

</html>
