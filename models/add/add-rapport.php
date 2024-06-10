<?php include("../../connexion/connexion.php");

if (isset($_POST["valider"])) {

    $dates=date('Y-m-d h:m:s');
    $user=$_SESSION['user'];
    $description=htmlspecialchars($_POST['description']);
    $rapport=$_FILES['rapport']['name'];
    $upload="../../assets/rapport/".$rapport;
    move_uploaded_file($_FILES['rapport']['tmp_name'],$upload);
    $req=$connexion->prepare("INSERT INTO rapport(description,rapport,dates,user) VALUES (?,?,?,?)");
    $req->execute(array($description,$rapport,$dates,$user));
    if($req){
        $_SESSION['notif']="Rapport envoyé avec succès";
        header('location:../../views/rapport.php#envoyer');
    }

    
}
 ?>