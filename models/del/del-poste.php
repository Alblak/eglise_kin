<?php
include_once('../../connexion/connexion.php');
if(isset($_GET['iddel']))
{
    $id=$_GET['iddel'];
    $supprimer=1;
    $req=$connexion->prepare("UPDATE poste set supprimer=?  where id=?");
    $req->execute(array($supprimer,$id));
    if($req)
    {
        $_SESSION['notif']="Suppression  reussie";
        header('location:../../views/poste.php?new');
    }
}
?>