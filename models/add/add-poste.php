<?php include("../../connexion/connexion.php");

if (isset($_POST["valider"])) {
    $nom=htmlspecialchars($_POST['nom']);
    $req=$connexion->prepare("INSERT INTO poste(nom) VALUES (?)");
    $req->execute(array($nom));
    if($req){
        $_SESSION['notif']="Enregistrement reussie";
        header('location:../../views/poste.php?new');
    }

    
}
 ?>