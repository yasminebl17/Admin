<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<script src="https://kit.fontawesome.com/8c4c819bf8.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <title>Gestion Employés</title>
    <link rel="stylesheet" href="css/styleadmin.css">

   
    
</head>

<body>
    
    <!-- SIDEBAR -->
	<div class="sidebar">
		<div class="logo_details">
		  <i class="bx bx-menu" id="btn"></i>
	</div>

	<ul class="nav-list">    

	    <li>
			<a href="#">
            <i class="fa-solid fa-house-chimney"></i>
			  <span class="link_name">Dashboard</span>
			</a>
			<span class="tooltip">Dashboard</span>
		</li>
		<li>
			<a href="#">
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
			<div><img src="img/logoo.svg" alt="" class="logo"></div>
			<div class="text">BILAN D'ACTIVITE MENSUEL</div>
		 </div>
		<div class="profile-dropdown">
            <div onclick="toggle()" class="profile-dropdown-btn">
              <div class="profile-img">
                <i class="fa-solid fa-circle"></i>
              </div>
    
              <span
                >Chiheb Maria
                <i class="fa-solid fa-angle-down"></i>
              </span>
            </div>
    
            <ul class="profile-dropdown-list">
              <li class="profile-dropdown-list-item">
                <a href="#">
                  <i class="fa-regular fa-user"></i>
                  Edit Profile
                </a>
              </li>
    
              <li class="profile-dropdown-list-item">
                <a href="#">
                  <i class="fa-regular fa-envelope"></i>
                  Inbox
                </a>
              </li>
    
              <li class="profile-dropdown-list-item">
                <a href="#">
                  <i class="fa-solid fa-sliders"></i>
                  Settings
                </a>
              </li>
    
              <hr />
    
              <li class="profile-dropdown-list-item">
                <a href="#">
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
             <img src="images/plus.png"> Ajouter
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
                        <td><a href="modifier.php?id=<?= $row['id'] ?>"><img src="images/pen.png" class="modif" w></a></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
    </div>


    <!-- Add a button to open the modal dialog box -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajouterModal">
  Ajouter
</button>

<!-- Add the modal dialog box -->
<div class="modal fade" id="ajouterModal" tabindex="-1" role="dialog" aria-labelledby="ajouterModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ajouterModalLabel">Ajouter un utilisateur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Add the code from your ajouter.php file here -->

          
        <?php
// Vérifiez si le bouton d'ajout a été cliqué
if (isset($_POST['button'])) {
    // Extraire les informations envoyées dans des variables par la méthode POST
    extract($_POST);
    
    // Vérifiez que tous les champs requis ont été remplis
    if (isset($nom) && isset($prenom) && isset($email) && isset($type_de_compte) && isset($Etat_de_compte) && isset($mot_de_passe)) {
        // Connexion à la base de données
        include_once "config.php";
        
        // Requête d'insertion
        // Ajout des valeurs dans la table users
       
        
        $req = mysqli_query($con, "INSERT INTO userss (nom, prenom, email, type_de_compte, DOT, Etat_de_compte, mot_de_passe)
                                   VALUES ('$nom', '$prenom', '$email', '$type_de_compte', '$DOT', '$Etat_de_compte', '$mot_de_passe')");
    } else {
        echo "La combinaison de type_de_compte et DOT n'est pas valide.";
    }
    
         if ($req) { // Si la requête a été effectuée avec succès, redirigez vers la page principale
            header("location: adminhome.php");
        } else { // Sinon, affichez un message d'erreur
            $message = "Utilisateur non ajouté. Veuillez réessayer.";
        }
    } else {
        // Si non, affichez un message demandant de remplir tous les champs requis
        $message = "Veuillez remplir tous les champs requis !";
    }

?>


    <div class="form">
        <a href="adminhome.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2>Ajouter un utilisateur</h2>
        <p class="erreur_message">
            <?php
            // Si la variable `message` existe, affichez son contenu
            if (isset($message)) {
                echo $message;
            }
            ?>
        </p>
        <form action="" method="post">
            <label>Nom</label>
            <input type="text" name="nom" required>

            <label>Prénom</label>
            <input type="text" name="prenom" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Type de compte</label>
            
                <select name="type_de_compte" required>
               <option value="admin">Admin</option>
               <option value="manager">Manager</option>
                <option value="chef_dot">Chef dot</option>
                <option value="agent_CM">Agent CM</option>
                <option value="agent_CH">Agent CH</option>
                <option value="agent_RB">Agent RB</option>
                <option value="agent_RA">Agent RA</option>
            </select>

            <label>DOT</label>
          <select name="DOT" required>
    <option value="" disabled selected>Choisissez une zone</option>
    <option value="Null"></option>
    <option value="Adrar">Adrar</option>
    <option value="AIN DEFLA">AIN DEFLA</option>
    <option value="AIN TEMOUCHENT">AIN TEMOUCHENT</option>
    <option value="ALGER CENTRE">ALGER CENTRE</option>
    <option value="ALGER EST">ALGER EST</option>
    <option value="ALGER OUEST">ALGER OUEST</option>
    <option value="ANNABA">ANNABA</option>
    <option value="BATNA">BATNA</option>
    <option value="BECHAR">BECHAR</option>
    <option value="BEJAIA">BEJAIA</option>
    <option value="BISKRA">BISKRA</option>
    <option value="BLIDA">BLIDA</option>
    <option value="BORDJ BOUARRERIDJ">BORDJ BOUARRERIDJ</option>
    <option value="BOUIRA">BOUIRA</option>
    <option value="BOUMERDES">BOUMERDES</option>
    <option value="CHLEF">CHLEF</option>
    <option value="CONSTANTINE">CONSTANTINE</option>
    <option value="DJELFA">DJELFA</option>
    <option value="EL BAYADH">EL BAYADH</option>
    <option value="EL OUED">EL OUED</option>
    <option value="EL TAREF">EL TAREF</option>
    <option value="GHARDAIA">GHARDAIA</option>
    <option value="GUELMA">GUELMA</option>
    <option value="ILLIZI">ILLIZI</option>
    <option value="JIJEL">JIJEL</option>
    <option value="KHENCHELA">KHENCHELA</option>
    <option value="LAGHOUAT">LAGHOUAT</option>
    <option value="MASCARA">MASCARA</option>
    <option value="MEDEA">MEDEA</option>
    <option value="MILA">MILA</option>
    <option value="MOSTAGANEM">MOSTAGANEM</option>
    <option value="M SILA">M SILA</option>
    <option value="NAAMA">NAAMA</option>
    <option value="Oran">Oran</option>
    <option value="OUARGLA">OUARGLA</option>
    <option value="OUM EL BOUAGHI">OUM EL BOUAGHI</option>
    <option value="RELIZANE">RELIZANE</option>
    <option value="SAIDA">SAIDA</option>
    <option value="SETIF">SETIF</option>
    <option value="SIDI BEL ABBES">SIDI BEL ABBES</option>
    <option value="SKIKDA">SKIKDA</option>
    <option value="SOUK AHRAS">SOUK AHRAS</option>
    <option value="TAMANRASSET">TAMANRASSET</option>
    <option value="TEBESSA">TEBESSA</option>
    <option value="TIARET">TIARET</option>
    <option value="TINDOUF">TINDOUF</option>
    <option value="TIPAZA">TIPAZA</option>
    <option value="TISSEMSILT">TISSEMSILT</option>
    <option value="TIZI OUZOU">TIZI OUZOU</option>
    <option value="TLEMCEN">TLEMCEN</option>
    <option value="BENI ABBES">BENI ABBES</option>
    <option value="BORDJ BADJI MOKHTAR">BORDJ BADJI MOKHTAR</option>
    <option value="DJANET">DJANET</option>
    <option value="EL MEGHAIER">EL MEGHAIER</option>
    <option value="EL MENIAA">EL MENIAA</option>
    <option value="IN GUEZZAM">IN GUEZZAM</option>
    <option value="IN SALAH">IN SALAH</option>
    <option value="OULED DJELLAL">OULED DJELLAL</option>
    <option value="TIMIMOUN">TIMIMOUN</option>
    <option value="TOUGGOURT">TOUGGOURT</option>
          </select>

             <label>État de compte</label>
             <select name="Etat_de_compte" required>
             <option value="Activer">Activer</option>
            <option value="Deactive">Désactiver</option>
            </select>

   
            <label>Mot de passe</label>
            <input type="password" name="mot_de_passe" required>

            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>

        <!-- ... -->
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

       </main>
    


    <script src="js/scriptAdmin.js"></script>
</body>

</html>
