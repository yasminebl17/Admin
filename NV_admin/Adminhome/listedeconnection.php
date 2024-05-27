<!DOCTYPE html>
<html>
<head>
    <title>Utilisateurs connectés</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Utilisateurs connectés</h2>

<table>
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Date de Connexion</th>
    </tr>
    <?php
    include("config.php");

    $select_query = "SELECT * FROM connexions";
    $result = mysqli_query($con, $select_query) or die("Erreur de sélection : " . mysqli_error($con));

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['nom'] . "</td>";
        echo "<td>" . $row['prenom'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['date_connexion'] . "</td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
