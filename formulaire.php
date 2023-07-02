<?php
include ("connexion.php");
session_start();
echo "verifier<br>";
if(isset($_SESSION['nomb'])){
echo "nom :".$_SESSION['nomb']." ";
echo "nom :".$_SESSION['villen']." ";
$ville=$_SESSION['villen'];






}else{
    echo "pas";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="tableau.php" method="post">
    



    <label for="">Nom</label>
    
    <input type="text"   name="txt_nombebe"  type="hidden"  value="<?php echo $_SESSION['nomb']; ?>">  <br> <br>

    <label for="">Prenom</label>
    <input type="text"  type="hidden" name="txt_prenombebe"   value="<?php echo $_SESSION['prenomb']; ?>"> <br> <br>

    <label for="">Date de naissance</label>
    <input type="date" type="hidden" name="txt_datenais"  value="<?php echo $_SESSION['daten']; ?>"> <br> <br>

    <label for="">Lieu de naissance</label>
    <select name="txt_villenais" id="select2">
            <?php
            $link=mysqli_connect('localhost', 'root', '', 'engnee');
            $sql = "SELECT * FROM ville";
            $result = mysqli_query($link, $sql);

            while ($liste_ville = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $liste_ville["cod_ville"] . '">' . $liste_ville["lib_ville"] . '</option>';
            }

            // Si une ville est déjà sélectionnée, l'ajouter en tant qu'option sélectionnée
            if ($data) {
                echo '<option value="' . $data["cod_ville"] . '" selected>' . $data["lib_ville"] . '</option>';
            }
            ?>
        </select><br><br>




    <label for="">Nom & Prenom du pere</label>
    <input type="text"   type="hidden" name="txt_nompere"   value="<?php echo $_SESSION['nomp']; ?>"> <br> <br>

    <label for="">Nom & Prenom de la mere</label>
    <input type="text"   type="hidden"  name="txt_nommere" value="<?php echo $_SESSION['nomme']; ?>"> <br> <br>
 

    <input type="submit" value="envoyer">
    </form>
    
</body>
</html>