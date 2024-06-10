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
    $action="../models/add/add-poste.php";
    $bouton="Enregistrer";

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Poste</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- link -->
    <?php 
    include_once('../include/link.php');
    
    ?>
  <!-- link -->
  
<!-- menu -->
<?php 
include_once('../include/menu.php');
?>

</head>

<body>

  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- <main id="main" class="main">

        <div class="pagetitle">
            <h1></h1>
            <nav>
               
            </nav>
        </div><!-- End Page Title -->
        <!-- <div>
           
        </div>
        <div class="container">
          <section class="section" id="entrees" >
              <div class="row">
                  <div class="col-lg-12">

                      <div class="card">
                          <div class="card-body">
                              <h5 class="card-title text-center ">POSTE</h5>
                                                      
                             <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-6">
                                    <?php if(isset($_GET['new'])){ ?>
                                        <div>
                                        <form  class="shadow p-3"action="<?=$action?>" method="POST">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12  col-sm-12 p-3">
                                                    <label for="">Nom</span></label>
                                                    <input autocomplete="off" required type="text" class="form-control" placeholder="Ex:Poste butembo"  name="nom" <?php if(isset($_GET['idmod'])){ ?> value="<?=$modData['nom']?>" <?php } ?>> 
                                                </div>
                                            
                                            <div class="col-xl-12 col-lg-12 col-md-12 mt-10 col-sm-12 p-3 aling-center">


                                            <?php if(isset($_SESSION['notif']) && $_SESSION['notif']!=""){ ?>
                                                <center><p class="alert-dark alert">
                                                        <i class="bi bi-check-circle me-1">  <?php echo $_SESSION['notif'];$_SESSION['notif']=""; ?></i>
                                                        
                                                </p></center>
                                            <?php } ?>
                                                <input type="submit" class="btn btn-primary w-100" name="valider" value="<?=$bouton?>">
                                            </div>
                                            </div>
                        
                        
                                        </form>
                                        </div>

                                    <?php }else{ ?>
                                        <a href="poste.php?new" class=" btn btn-outline-primary bi bi-plus">Ajouter</a> 
                                    <?php }?>
                                </div>
                                <div class="col-xl-8 col-lg-8 col-md-6">

                                    <div class="table-responsive">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">N°</th>  
                                                    <th scope="col">Nom</th>
                                                
                                                    <th scope="col">Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $req=$connexion->prepare("SELECT * From poste");
                                                $req->execute();
                                                $numero=0;
                                                while($data=$req->fetch())
                                                { 
                                                    $numero++;
                                                ?>
                                            <tr>
                                                    <th scope="row"><?php echo $numero; ?></th>
                                                    <td><?php echo $data['nom'] ?></td>
                                                  
                                                    <td>
                                                    <a href="poste.php?new&idmod=<?=$data['id']?>" class="btn btn-primary btn-sm "><i
                                                            class="bi bi-pencil-square"></i></a>
                                                    <a onclick=" return confirm('Voulez-vous vraiment supprimer ?')"
                                                        href="../models/del/del-poste.php?iddel=<?=$data['id'] ?>"
                                                        class="btn btn-dark btn-sm "><i class="bi bi-trash3-fill"></i></a>
                                                </td>

                                            </tr>
                                                


                                            
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>

                                <!-- End Table with stripped rows -->
                                </div>
                              
                          </div>
                      </div>

                  </div>
              </div>
          </section>
        </div> -->

     

       

    </main><!-- End #main -->
  

  ======= Footer ======= -->
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