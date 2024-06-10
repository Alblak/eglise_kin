
<header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
         
        <h1 class="text-light"><a href="#">Eglise</a></h1>
        
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
        <li><a href="../index.php" class="nav-link active"><i class="bi bi-house-fill"></i> <span>Accueil</span></a></li>
          <?php if($_SESSION['fonction']=='1' )
          { ?>
         
          <li><a href="../views/poste.php" class="nav-link active"><i class="bi bi-pie-chart-fill"></i> <span>Poste</span></a></li>
          <li><a href="../views/utilisateur.php" class="nav-link active"><i class="bi bi-people-fill"></i> <span>Utilisateurs</span></a></li>
          <li><a href="../views/rapport.php#envoyer" class="nav-link active"><i class="bi bi-envelope-fill"></i> <span>Rapport</span></a></li>
       <?php } else { ?>
     
        <li><a href="../views/rapport.php#envoyer" class="nav-link active"><i class="bi bi-envelope-fill"></i> <span>Rapport</span></a></li>
        <?php } ?>
        <li><a href="../index.php" class="nav-link active"><i class="bi bi-power"></i> <span>Deconnexion</span></a></li>
         
          
        </ul>
      </nav>
    </div>
  </header>