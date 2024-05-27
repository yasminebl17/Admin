<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="../css/styleadmin.css">
</head>

<body>
    
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
        <a href="adminhome.php" class="back_btn"><img src="../images/back.png"> Retour</a>
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
    <script src="../js/scriptAdmin.js"></script>
</body>

</html>
