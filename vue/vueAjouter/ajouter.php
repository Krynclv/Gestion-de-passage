<?php
   if(isset($_SESSION['email'])){
     ?>
     <?php
     if(isset($erreur))
     {
     ?>
       <div class="alert alert-danger" role="alert " style='text-align:center;'>
         <?php echo $erreur ?>
       </div>
     <?php
     }
     ?>
          <?php
     if(isset($message))
     {
     ?>
       <div class="alert alert-success" role="alert " style='text-align:center;'>
         <?php echo $message ?>
       </div>
     <?php
     }
     ?>
<form method="POST" action="index.php?ctl=Ajouter&action=importEleves" enctype="multipart/form-data">
<label>Choisir un fichier:</label>
<input type="file" name="txtEleve" id="txtEleve" />
<input type="submit" name="Ok"  value="Importer" >
</form>
<div class="container-fluid" style='margin:0; padding:0; margin-top:3%;'>
    <h1 style='text-align:center; margin-bottom:3%;'>Ajouter un Lieu / Événement</h1>
    <ul class="nav nav-tabs" id="myTab" role="tablist" style="padding:0;" >
      <div class="col-6">
          <li class="nav-item" role="presentation">
              <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="true" style='display:block; margin:auto;'>Lieu(x)</button>
          </li>
      </div>
      <div class="col-6">
          <li class="nav-item" role="presentation">
              <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="false" style='display:block; margin:auto;'>Événement(s)</button>
          </li>
      </div>
    </ul>
</div>

  <div class="tab-content" id="myTabContent">
  
    <!-- Ajouter Événement -->
    <div class="tab-pane fade" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab2" tabindex="0" style='margin-left:auto;'>
        <div style='display:flex; justify-content:center; align-items:center; height: 40vh;'>
            <div style="width: 60%;background-color: #0D1B42;color: white;justify-content: center;margin-top: 10%;text-align: center;border-radius: 20px;" > 
                <form action="index.php?ctl=Ajouter&action=ajouterEvenement" method ="post">

                  <?php 
                  if(isset($lister2)){
                  ?>

                  <label class="mep" for="lieu-select">Nom de l'événement :</label>
                  
                  <input type="text" class="form-control" id="event" name="evenements" placeholder="Forum des études, Conférence, Sortie culturelle...">
                  
                  <button type="submit" class="btn btn-light ms-auto" name="ajouter">Ajouter</button>
                  <?php
                  }
                  ?>

                </form>
                
                <div class="box">
                  <table class="table">
                    <thead class="thead-dark" style="background-color:black; color:white; text-align:center;">
                      <tr>
                        <th>Évenement(s)</th>
                        <th>Supprimer</th>
                      </tr>
                    </thead>
                    <tbody style='text-align:center; color:white;'>
                      <?php
                      if(isset($lister2))
                      {
                        foreach($lister2 as $ligne){
                          echo "<tr>
                            <td>".$ligne['LibelleEvent']."</td>
                            
                            <td>
                            
                              <a href=index.php?ctl=Ajouter&action=supprimerEvent&IdEvent=".$ligne['IdEvent']."><img class='crx' src='./vue/image/croix.png'></a>
                        
                            </td> 
                            </tr>";		
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>

            </div> 
        </div>
    </div>

   <!-- Ajouter Lieu -->
   <div class="tab-pane fade show active" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
      <div style='display:flex; justify-content:center; align-items:center; height: 40vh;'>
        <div style="width: 60%;background-color: #0D1B42;color: white;justify-content: center;margin-top: 10%;text-align: center;border-radius: 20px;" >  
            <form action="index.php?ctl=Ajouter&action=ajouterLieu" method ="post">

                  <label class="mep2" for="lieu-select">Nom du Lieu :</label>

                  <input type="text" class="form-control" id="event" name="lieux" placeholder="CDI, Batiment S, Cantine...">
                  
                  <button type="submit" class="btn btn-light ms-auto" name="ajouter">Ajouter</button>
                  
            </form>
            
            <div class="box">
                <form action="index.php?ctl=Ajouter&action=vueAjouter" method="post">
                  <table class="table">
                    <thead class="thead-dark" style="background-color:black; color:white; text-align:center;">
                      <tr>
                        <th>Lieu(x)</th>
                        <th>Supprimer</th>
                      </tr>
                    </thead>
                    <tbody style='text-align:center; color:white;'>
                              <?php
                              if(isset($lister))
                              {
                                foreach($lister as $ligne){
                                  echo "<tr>
                                    <td>".$ligne['LibelleLieu']."</td>
                                    
                                    <td>
                                    
                                      <a href=index.php?ctl=Ajouter&action=supprimerLieu&IdLieu=".$ligne['IdLieu']."><img class='crx' src='./vue/image/croix.png'></a>
                                
                                    </td> 
                                    </tr>";		
                                }
                              }
                              ?>
                    </tbody>
                  </table>
                </form>
            </div> 
        </div>
      </div>
    </div>
  <div>

<?php
}
?>


<?php
   if(!isset($_SESSION['email'])){
?>

<form action="index.php?ctl=User&action=validLogin" method="POST">
  <section class="gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <div>

                <h2 class="fw-bold mb-2 text-uppercase">Se connecter</h2>
                <p class="text-white-50 mb-4">Veuillez rentrer un Email et un Mot-de-passe valide.</p>

                <div class="form-outline form-white mb-4">
                  <label class="form-label" for="typeEmailX">Email :  </label>
                  <input type="email" id="email" name='email' class="form-control form-control-lg" />
                </div>

                <div class="form-outline form-white mb-4">
                  <label class="form-label" id="mdplabel" for="typePasswordX">Mot-de-Passe : </label>
                  <input type="password" id="password" name='password' class="form-control form-control-lg" />
                </div>

                <button class="btn btn-outline-light btn-lg px-5" type="submit">Connexion</button>

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</form>

<?php
}
?>
