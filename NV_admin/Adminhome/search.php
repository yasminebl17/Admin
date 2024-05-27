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
			  <span class="link_name">Liste utilisateurs</span>
			</a>
			<span class="tooltip">Liste utilisateurs</span>
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
// Include your config.php file
include("config.php");

// Get the search query from the form
$search_query = $_GET['search'];

// Create a SQL query to search for the user
$query = "SELECT * FROM userss WHERE nom LIKE '%$search_query%' OR prenom LIKE '%$search_query%' OR email LIKE '%$search_query%'";

// Execute the query
$result = mysqli_query($con, $query);

// Check if there are any results
if (mysqli_num_rows($result) > 0) {
  // Display the search results
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>". $row['nom']. "</td>";
    echo "<td>". $row['prenom']. "</td>";
    echo "<td>". $row['email']. "</td>";
    echo "<td>". $row['type_de_compte']. "</td>";
    echo "<td>". $row['DOT']. "</td>";
    echo "<td>". $row['Etat_de_compte']. "</td>";
    echo "<td>". $row['date_de_creation']. "</td>";
    echo "<td>". $row['date_de_mise_a_jour']. "</td>";
    echo "<td><a href='modifier.php?id=". $row['id']. "'><img src='../images/pen.png' class='modif' w></a></td>";
    echo "</tr>";
  }
} else {
  echo "Aucun résultat trouvé";
}
?>
        </table>
    </div>

       </main>
    


    <script src="../js/scriptAdmin.js"></script>
</body>

</html>
