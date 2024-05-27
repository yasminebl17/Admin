<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'utilisateur</title>
    <link rel="stylesheet" href="../css/styleadmin.css">
</head>

<body>
    <?php
    // Connexion à la base de données
    include_once "config.php";

    // On récupère l'id dans le lien
    $id = $_GET['id'];

    // Requête pour afficher les informations d'un utilisateur
    $req = mysqli_query($con, "SELECT * FROM userss WHERE id = $id");
    $row = mysqli_fetch_assoc($req);

    // Vérifier que le bouton de modification a bien été cliqué
    if (isset($_POST['button'])) {
        // Extraction des informations envoyées dans des variables par la méthode POST
        extract($_POST);

        // Vérifier que tous les champs requis ont été remplis
        if (isset($nom) && isset($prenom) && isset($email)  && isset($type_de_compte)  && isset($Etat_de_compte)  && isset($mot_de_passe)) {
            // Requête de modification
            $req = mysqli_query($con, "UPDATE userss SET nom = '$nom', prenom = '$prenom', email = '$email', type_de_compte = '$type_de_compte', DOT='$DOT',Etat_de_compte='$Etat_de_compte', mot_de_passe = '$mot_de_passe' WHERE id = $id");

            if ($req) {
                // Si la requête a été effectuée avec succès, on fait une redirection
                header("location: Adminhome.php");
            } else {
                // Si non, afficher un message d'erreur
                $message = "Utilisateur non modifié";
            }
        } else {
            // Si non, afficher un message demandant de remplir tous les champs
            $message = "Veuillez remplir tous les champs !";
        }
    }

    ?>

    <div class="form">
        <a href="Adminhome.php" class="back_btn"><img src="../images/back.png"> Retour</a>
        <h2>Modifier l'utilisateur :  <?= $row['prenom'] ?> <?= $row['nom'] ?></h2>
        <p class="erreur_message">
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
        </p>
        <form action="" method="POST">
    <label>Nom</label>
    <input type="text" name="nom" value="<?= $row['nom'] ?>">

    <label>Prénom</label>
    <input type="text" name="prenom" value="<?= $row['prenom'] ?>">

    <label>Email</label>
    <input type="email" name="email" value="<?= $row['email'] ?>">

    <label>Type de compte</label>
    <select name="type_de_compte">
        <option value="admin" <?= $row['type_de_compte'] == 'admin' ? 'selected' : '' ?>>Admin</option>
        <option value="manager" <?= $row['type_de_compte'] == 'manager' ? 'selected' : '' ?>>Manager</option>
        <option value="chef_dot" <?= $row['type_de_compte'] == 'chef_dot' ? 'selected' : '' ?>>Chef_dot</option>
        <option value="agent_CM" <?= $row['type_de_compte'] == 'agent_CM' ? 'selected' : '' ?>>Agent_CM</option>
        <option value="agent_CH" <?= $row['type_de_compte'] == 'agent_CH' ? 'selected' : '' ?>>agent_CH</option>
        <option value="agent_RB" <?= $row['type_de_compte'] == 'agent_RB' ? 'selected' : '' ?>>agent_RB</option>
        <option value="agent_RA" <?= $row['type_de_compte'] == 'agent_RA' ? 'selected' : '' ?>>agent_RA</option>
        
    </select>
    <label>DOT</label>
<select name="DOT" required>
    <option value="" disabled <?= empty($row['DOT']) ? 'selected' : '' ?>>Choisissez une zone</option>
    <option value="Null" <?= $row['DOT'] == 'Adrar' ? 'selected' : '' ?>></option>></option>
    <option value="Adrar" <?= $row['DOT'] == 'Adrar' ? 'selected' : '' ?>>Adrar</option>
    <option value="AIN DEFLA" <?= $row['DOT'] == 'AIN DEFLA' ? 'selected' : '' ?>>AIN DEFLA</option>
    <option value="AIN TEMOUCHENT" <?= $row['DOT'] == 'AIN TEMOUCHENT' ? 'selected' : '' ?>>AIN TEMOUCHENT</option>
    <option value="ALGER CENTRE" <?= $row['DOT'] == 'ALGER CENTRE' ? 'selected' : '' ?>>ALGER CENTRE</option>
    <option value="ALGER EST" <?= $row['DOT'] == 'ALGER EST' ? 'selected' : '' ?>>ALGER EST</option>
    <option value="ALGER OUEST" <?= $row['DOT'] == 'ALGER OUEST' ? 'selected' : '' ?>>ALGER OUEST</option>
    <option value="ANNABA" <?= $row['DOT'] == 'ANNABA' ? 'selected' : '' ?>>ANNABA</option>
    <option value="BATNA" <?= $row['DOT'] == 'BATNA' ? 'selected' : '' ?>>BATNA</option>
    <option value="BECHAR" <?= $row['DOT'] == 'BECHAR' ? 'selected' : '' ?>>BECHAR</option>
    <option value="BEJAIA" <?= $row['DOT'] == 'BEJAIA' ? 'selected' : '' ?>>BEJAIA</option>
    <option value="BISKRA" <?= $row['DOT'] == 'BISKRA' ? 'selected' : '' ?>>BISKRA</option>
    <option value="BLIDA" <?= $row['DOT'] == 'BLIDA' ? 'selected' : '' ?>>BLIDA</option>
    <option value="BORDJ BOUARRERIDJ" <?= $row['DOT'] == 'BORDJ BOUARRERIDJ' ? 'selected' : '' ?>>BORDJ BOUARRERIDJ</option>
    <option value="BOUIRA" <?= $row['DOT'] == 'BOUIRA' ? 'selected' : '' ?>>BOUIRA</option>
    <option value="BOUMERDES" <?= $row['DOT'] == 'BOUMERDES' ? 'selected' : '' ?>>BOUMERDES</option>
    <option value="CHLEF" <?= $row['DOT'] == 'CHLEF' ? 'selected' : '' ?>>CHLEF</option>
    <option value="CONSTANTINE" <?= $row['DOT'] == 'CONSTANTINE' ? 'selected' : '' ?>>CONSTANTINE</option>
    <option value="DJELFA" <?= $row['DOT'] == 'DJELFA' ? 'selected' : '' ?>>DJELFA</option>
    <option value="EL BAYADH" <?= $row['DOT'] == 'EL BAYADH' ? 'selected' : '' ?>>EL BAYADH</option>
    <option value="EL OUED" <?= $row['DOT'] == 'EL OUED' ? 'selected' : '' ?>>EL OUED</option>
    <option value="EL TAREF" <?= $row['DOT'] == 'EL TAREF' ? 'selected' : '' ?>>EL TAREF</option>
    <option value="GHARDAIA" <?= $row['DOT'] == 'GHARDAIA' ? 'selected' : '' ?>>GHARDAIA</option>
    <option value="GUELMA" <?= $row['DOT'] == 'GUELMA' ? 'selected' : '' ?>>GUELMA</option>
    <option value="ILLIZI" <?= $row['DOT'] == 'ILLIZI' ? 'selected' : '' ?>>ILLIZI</option>
    <option value="JIJEL" <?= $row['DOT'] == 'JIJEL' ? 'selected' : '' ?>>JIJEL</option>
    <option value="KHENCHELA" <?= $row['DOT'] == 'KHENCHELA' ? 'selected' : '' ?>>KHENCHELA</option>
    <option value="LAGHOUAT" <?= $row['DOT'] == 'LAGHOUAT' ? 'selected' : '' ?>>LAGHOUAT</option>
    <option value="MASCARA" <?= $row['DOT'] == 'MASCARA' ? 'selected' : '' ?>>MASCARA</option>
    <option value="MEDEA" <?= $row['DOT'] == 'MEDEA' ? 'selected' : '' ?>>MEDEA</option>
    <option value="MILA" <?= $row['DOT'] == 'MILA' ? 'selected' : '' ?>>MILA</option>
    <option value="MOSTAGANEM" <?= $row['DOT'] == 'MOSTAGANEM' ? 'selected' : '' ?>>MOSTAGANEM</option>
    <option value="M SILA" <?= $row['DOT'] == 'M SILA' ? 'selected' : '' ?>>M SILA</option>
    <option value="NAAMA" <?= $row['DOT'] == 'NAAMA' ? 'selected' : '' ?>>NAAMA</option>
    <option value="Oran" <?= $row['DOT'] == 'Oran' ? 'selected' : '' ?>>Oran</option>
    <option value="OUARGLA" <?= $row['DOT'] == 'OUARGLA' ? 'selected' : '' ?>>OUARGLA</option>
    <option value="OUM EL BOUAGHI" <?= $row['DOT'] == 'OUM EL BOUAGHI' ? 'selected' : '' ?>>OUM EL BOUAGHI</option>
    <option value="RELIZANE" <?= $row['DOT'] == 'RELIZANE' ? 'selected' : '' ?>>RELIZANE</option>
    <option value="SAIDA" <?= $row['DOT'] == 'SAIDA' ? 'selected' : '' ?>>SAIDA</option>
    <option value="SETIF" <?= $row['DOT'] == 'SETIF' ? 'selected' : '' ?>>SETIF</option>
    <option value="SIDI BEL ABBES" <?= $row['DOT'] == 'SIDI BEL ABBES' ? 'selected' : '' ?>>SIDI BEL ABBES</option>
    <option value="SKIKDA" <?= $row['DOT'] == 'SKIKDA' ? 'selected' : '' ?>>SKIKDA</option>
    <option value="SOUK AHRAS" <?= $row['DOT'] == 'SOUK AHRAS' ? 'selected' : '' ?>>SOUK AHRAS</option>
    <option value="TAMANRASSET" <?= $row['DOT'] == 'TAMANRASSET' ? 'selected' : '' ?>>TAMANRASSET</option>
    <option value="TEBESSA" <?= $row['DOT'] == 'TEBESSA' ? 'selected' : '' ?>>TEBESSA</option>
    <option value="TIARET" <?= $row['DOT'] == 'TIARET' ? 'selected' : '' ?>>TIARET</option>
    <option value="TINDOUF" <?= $row['DOT'] == 'TINDOUF' ? 'selected' : '' ?>>TINDOUF</option>
    <option value="TIPAZA" <?= $row['DOT'] == 'TIPAZA' ? 'selected' : '' ?>>TIPAZA</option>
    <option value="TISSEMSILT" <?= $row['DOT'] == 'TISSEMSILT' ? 'selected' : '' ?>>TISSEMSILT</option>
    <option value="TIZI OUZOU" <?= $row['DOT'] == 'TIZI OUZOU' ? 'selected' : '' ?>>TIZI OUZOU</option>
    <option value="TLEMCEN" <?= $row['DOT'] == 'TLEMCEN' ? 'selected' : '' ?>>TLEMCEN</option>
    <option value="BENI ABBES" <?= $row['DOT'] == 'BENI ABBES' ? 'selected' : '' ?>>BENI ABBES</option>
    <option value="BORDJ BADJI MOKHTAR" <?= $row['DOT'] == 'BORDJ BADJI MOKHTAR' ? 'selected' : '' ?>>BORDJ BADJI MOKHTAR</option>
    <option value="DJANET" <?= $row['DOT'] == 'DJANET' ? 'selected' : '' ?>>DJANET</option>
    <option value="EL MEGHAIER" <?= $row['DOT'] == 'EL MEGHAIER' ? 'selected' : '' ?>>EL MEGHAIER</option>
    <option value="EL MENIAA" <?= $row['DOT'] == 'EL MENIAA' ? 'selected' : '' ?>>EL MENIAA</option>
    <option value="IN GUEZZAM" <?= $row['DOT'] == 'IN GUEZZAM' ? 'selected' : '' ?>>IN GUEZZAM</option>
    <option value="IN SALAH" <?= $row['DOT'] == 'IN SALAH' ? 'selected' : '' ?>>IN SALAH</option>
    <option value="OULED DJELLAL" <?= $row['DOT'] == 'OULED DJELLAL' ? 'selected' : '' ?>>OULED DJELLAL</option>
    <option value="TIMIMOUN" <?= $row['DOT'] == 'TIMIMOUN' ? 'selected' : '' ?>>TIMIMOUN</option>
    <option value="TOUGGOURT" <?= $row['DOT'] == 'TOUGGOURT' ? 'selected' : '' ?>>TOUGGOURT</option>
</select>
<label>Etat de compte</label>
<select name="Etat_de_compte" required>
    <option value="Activer" <?= $row['Etat_de_compte'] == 'Activer' ? 'selected' : '' ?>>Activer</option>
    <option value="Deactive" <?= $row['Etat_de_compte'] == 'Deactive' ? 'selected' : '' ?>>Désactiver</option>
</select>



    <label>Mot de passe</label>
    <input type="password" name="mot_de_passe" value="<?= $row['mot_de_passe'] ?>">

    <input type="submit" value="Modifier" name="button">
</form>

    </div>
    <script src="../js/scriptAdmin.js"></script>
</body>

</html>
