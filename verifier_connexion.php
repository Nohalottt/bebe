<?php
 $link=mysqli_connect("localhost","root","","engnee") or die("Echec de connexion a la base");
//  $sql="select * from user where LOGIN='".$login."'";
//  $result=mysqli_query($link,$sql);
//  $row=mysqli_fetch_assoc($result);
$nom=$_POST["nom"];
session_start();
$sql="select * from listebebe  where nombebe='".$nom."'";
$result=mysqli_query($link,$sql);

$data=mysqli_fetch_assoc ( $result );

if($data){
   
    $_SESSION['nomb']=$data["nombebe"];;
    $_SESSION['prenomb']=$data["prenombebe"];
    $_SESSION['daten']=$data['datenais'];
    $_SESSION['villen']=$data['villenais'];
    $_SESSION['nomp']= $data['nompere'];
    $_SESSION['nomme']=$data['nommere'];
    echo "hello";

    header("Location:formulaire.php");
}else{
    $_SESSION['nomb']=$_POST["nom"];;
    $_SESSION['prenomb']="";
    $_SESSION['daten']="";
    $_SESSION['villen']="";
    $_SESSION['nomp']= "";
    $_SESSION['nomme']="";
    echo "hello2";
    header("Location:formulaire.php");
    // $link=mysqli_connect("localhost","root","","inscription") or die("Echec de connexion a la base");
    // $sql="select * from user where LOGIN='".$login."' and  PASSWORD='".$pass."' ";
    // $result=mysqli_query($link,$sql);
    // $row=mysqli_fetch_assoc($result);
    // if($row!=False){
      
        
    //     $_SESSION['prenom']=$row['PRENOM'];
    //     $_SESSION['ville']=$row['VILLE'];
        
    }
















?>