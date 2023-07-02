<?php
session_start();
include("connexion.php");
    // Récupérer les valeurs du formulaire
   
    $nombebe = $_POST["txt_nombebe"];
    $prenombebe = $_POST["txt_prenombebe"];
    $datenais = $_POST["txt_datenais"];
    $villenais = $_POST["txt_villenais"];
    $nompere = $_POST["txt_nompere"];
    $nommere = $_POST["txt_nommere"];
   $_SESSION['nomb']=$nombebe;

$id_user=$_SESSION['nomb'];
$sql="select * from listebebe  where nombebe='".$id_user."'";
$result=mysqli_query($link,$sql);
$data=mysqli_fetch_assoc ( $result );
    if ($data && $id_user == $data["nombebe"]) {
        // Effectuer l'update des données
        $sql = "UPDATE listebebe SET prenombebe = '$prenombebe', datenais = '$datenais', villenais = '$villenais', nompere = '$nompere', nommere = '$nommere' WHERE nombebe = '$id_user'";
        $result = mysqli_query($link, $sql);
        if ($result) {
        echo "Données mises à jour avec succès.";
        
        } else {
        echo "Erreur lors de la mise à jour des données.";
        }
    } else {
        // Insérer les nouvelles données
        $sql = "INSERT INTO listebebe (nombebe, prenombebe, datenais, villenais, nompere, nommere) VALUES ('$nombebe', '$prenombebe', '$datenais', '$villenais', '$nompere', '$nommere')";
        $result = mysqli_query($link, $sql);
        if ($result) {
            echo "Données enregistrées avec succès.";
            $_SESSION['donnees_enregistrees'] = true; // Marquer les données comme enregistrées
        } else {
            echo "Erreur lors de l'enregistrement des données.";
        }
    }

    // Fermer la connexion à la base de données
    mysqli_close($link);
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="bg">
    <h1>Liste des nouveaux nées</h1>
    <table border="1px">
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Date de naissance</th>
            <th>Ville de naissance</th>
            <th>Nom du père</th>
            <th>Nom de la mère</th>

        </tr>
        <?php 
        $link=mysqli_connect("localhost","root","","engnee");
        $requete="select * from listebebe ";
        $result=mysqli_query($link,$requete);
        while($data=mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td> <?php  echo $data["nombebe"];   ?>  </td>
            <td> <?php  echo $data["prenombebe"];   ?>  </td>
            <td> <?php  echo $data["datenais"];   ?>  </td>
            <td> <?php  echo $data["villenais"];   ?>  </td> 
            <td> <?php  echo $data["nompere"];   ?>  </td>
            <td> <?php  echo $data["nommere"];   ?>  </td>


        </tr>
        <?php } ?>
    </table>
</body>
</html>