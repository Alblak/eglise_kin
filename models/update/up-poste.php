<?php
include_once('../../connexion/connexion.php');
if(isset($_POST['valider']))
{
    $id=$_GET['idmod'];
    $nom=htmlspecialchars($_POST['nom']);
    $adresse=htmlspecialchars($_POST['adresse']);
    $req=$connexion->prepare("UPDATE poste SET nom=? where id=?");
    $req->execute(array($nom,$id));
    if($req)
    {
        $_SESSION['notif']="Modification  reussie";
        header('location:../../views/poste.php?new');
    }

}

?>