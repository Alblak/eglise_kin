<?php 
include_once('../connexion/connexion.php');
if(isset($_GET['idmod']))
{
    $id=$_GET['idmod'];
    $action="../models/update/up-poste.php?idmod=$id";
    $bouton="Modifier";
    
    $req=$connexion->prepare("SELECT * from poste where id=?");
    $req->execute(array($id));
    $modData=$req->fetch();

}
else{
    $action="../models/add/add-rapport.php";
    $bouton="Envoyer";

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>rapport</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- link -->
    <?php 
    include_once('../include/link.php');
   
    
    ?>
     <link rel="stylesheet" href="rapport.css">
  <!-- link -->
  
<!-- menu -->
<?php 
include_once('../include/menu.php');
?>

</head>

<body>

  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <main id="main" class="main">

        <div class="pagetitle">
            <h1></h1>
            <nav>
               
            </nav>
        </div><!-- End Page Title -->
        <div>
           
        </div>
   
            <div class="container">
                <div class="row rapport">
                    <?php
                    if($_SESSION['poste']=='1'){
                        $req=$connexion->prepare("SELECT rapport.*,poste.nom as nomposte,poste.id as idposte,utilisateur.nom,utilisateur.postnom,utilisateur.prenom from utilisateur,poste,rapport where rapport.user=utilisateur.id and rapport.supprimer=0 and utilisateur.poste=poste.id order BY rapport.id ASC;");
                        $req->execute();
                    }
                    else
                    {
                        $user=$_SESSION['user'];
                        $req=$connexion->prepare("SELECT rapport.*,poste.nom as nomposte,poste.id as idposte,utilisateur.nom,utilisateur.postnom,utilisateur.prenom from utilisateur,poste,rapport where rapport.user=utilisateur.id and rapport.user=? OR rapport.user=1 and rapport.supprimer=0 and utilisateur.poste=poste.id GROUP BY rapport.id order BY rapport.id ASC;");
                        $req->execute(array($user));
                    }
                    
                    while($rapport=$req->fetch()){
                    $dates=strtotime($rapport["dates"]);  
                    if($_SESSION['user']==$rapport['user']){ 
                    
                    ?>

                    <div class="row ">
                        <div  class="col-2"></div>
                        <div class="col-10 shadow p-3">
                            <h5>Moi</h5>
                            <h6>envoyé Le <?php echo date('d-m-Y h:m:s',$dates);?></h6>
                            <p class=""><?=$rapport['description']?></p>
                            <p>
                                <a href="../assets/rapport/<?=$rapport['rapport']?>"download> <i class=" bi bi-save-fill">Telecharger   <?=$rapport['rapport']?></i></a> <a onclick=" return confirm('Voulez-vous vraiment supprimer ?')"href="../models/del/del-rapport.php?iddel=<?=$rapport['id'] ?>"
                                 class="btn btn-danger btn-sm "><i class="bi bi-trash3-fill"></i></a>
                            </p>
                        </div>
                    
                    </div>
                    <?php }else { 
                                              
                        ?>
                        <div class="row">
                    
                        <div class="col-10 shadow p-3">
                        <h5><?=$rapport['nomposte']?></h5>
                        <h6>envoyé par <?=$rapport['nom']." ".$rapport['postnom']." ".$rapport['prenom']?>  Le <?php echo date('d-m-Y h:m:s',$dates);?></h6>
                            <p class=""><?=$rapport['description']?></p>
                            <p>
                                <a href="../assets/rapport/<?=$rapport['rapport']?>"download> <i class=" bi bi-save-fill">Telecharger <?=$rapport['rapport']?></i> </a>
                            </p>
                        </div>
                        <div class="col-2"></div>
                    
                    </div>

                <?php } } ?> 
                </div>
            
            </div>
      
        <div>
            <div id="envoyer">
                 <form  class="shadow p-3"action="<?=$action?>" method="POST"enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-xl-8 col-lg-8 col-md-12  col-sm-12 ">
                                                    <label for="">Description </span></label>
                                                   <textarea class="form-control"   name="description"<?php if(isset($_GET['idmod'])){ ?> value="<?=$modData['nom']?>" <?php } ?> id=""></textarea>
                                                   
                                                </div>
                                                <div class="col-xl-3 col-lg-3 col-md-12  col-sm-12 ">
                                                    <label for="">Choisir le rapport</span></label>
                                                    <input autocomplete="off" required type="file" class="form-control"   name="rapport"<?php if(isset($_GET['idmod'])){ ?> value="<?=$modData['nom']?>" <?php } ?>> 
                                                </div>
                                            
                                                <div class="col-xl-1 col-lg-1 col-md-12 col-sm-12  aling-center">
                                                <label for=""></span></label>
                                               
                                                <button type="submit" class="btn btn-primary w-100" name="valider" ><i class="bi bi-cursor-fill"></i></button>
                                               
                                        </div>
                                        
                                    <div class="col-xl-12 col-lg-12 col-md-12 mt-10 col-sm-12 p-3 aling-center">


                                    <?php if(isset($_SESSION['notif']) && $_SESSION['notif']!=""){ ?>
                                        <center><p class="alert-dark alert">
                                                   <i class="bi bi-check-circle me-1">  <?php echo $_SESSION['notif'];$_SESSION['notif']=""; ?></i>
                                                   
                                        </p></center>
                                    <?php } ?>
                                    
                        </div>
                    </div>
                        
                        
             </form>
        </div>
    </div>

     

       

    </main><!-- End #main -->
  

  <!-- ======= Footer ======= -->
  <footer id="footer">
    
  <?php 
    include_once('../include/footer.php');
    
    ?>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- JS Files -->
  <?php 
    include_once('../include/script.php');
    
    ?>

 


</body>

</html>