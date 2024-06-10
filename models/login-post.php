<?php
include('../connexion/connexion.php');
if(isset($_POST['seconnecter']))
{
    $_fonction=$_GET['fonction'];
    if($_fonction=='central')
    {
        $fonction=1;
    }
    else{
        $fonction=2;
    }
     echo $fonction;
    $username=htmlspecialchars($_POST['username']);
    $password=htmlspecialchars($_POST['password']);


    $req=$connexion->prepare("SELECT * FROM `utilisateur` WHERE username=? AND motdepasse=? AND fonction=?");
    $req->execute(array($username,$password,$fonction));
    if($_identifiant = $req->fetch()){
      
            $_SESSION['notif']="";
            $_SESSION['user']= $_identifiant['id'];
            $_SESSION['poste']= $_identifiant['poste'];
            $_SESSION['fonction']= $_identifiant['fonction'];
            $_SESSION['noms']=$_identifiant['nom'].' '.$_identifiant['postnom'];
            header("location:../views/admin.php");
    
    } else {
        $_SESSION['notif']="username or password incorrect";
        header("location:../login.php?fonction=$_fonction");
    }
}
?>
