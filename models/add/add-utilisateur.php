<?php include("../../connexion/connexion.php");

if (isset($_POST["valider"])) {
    $heure=date('h:m:s');
    $nom=htmlspecialchars($_POST['nom']);
    $postnom=htmlspecialchars($_POST['postnom']);
    $prenom=htmlspecialchars($_POST['prenom']);
    $poste=htmlspecialchars($_POST['poste']);
    $fonction=htmlspecialchars($_POST['fonction']);
    $username="$nom$postnom@eglise.com";
    $code=substr($nom,0,2).substr($postnom,1,1).strtoupper(substr($nom,2,1)).substr($heure,6,2).substr($prenom,0,1).strtoupper(substr($nom,1,1)).substr($heure,1,2).strtoupper(substr($postnom,0,2)).$poste;
    echo $username." code ".$code;
    $req=$connexion->prepare("INSERT INTO utilisateur(nom,postnom,prenom,username,fonction,poste,motdepasse) VALUES (?,?,?,?,?,?,?)");
    $req->execute(array($nom,$postnom,$prenom,$username,$fonction,$poste,$code));
    if($req){
        $_SESSION['notif']="Enregistrement reussie";
        header('location:../../views/utilisateur.php?new');
    }

    
}
 ?>