<div class="container-fluid" style='margin:0; padding:0; margin-top:3%;'>
    <h1 style='text-align:center; margin-bottom:3%;'>Rechercher par :</h1>
    <ul class="nav nav-tabs" id="myTab" role="tablist" style="padding:0; margin-bottom:3%;" >
        <div class="col-4">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true" style='display:block; margin:auto;'>Lieu(x)</button>
            </li>
        </div>
        <div class="col-4">
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false" style='display:block; margin:auto;'>Événement(s)</button>
            </li>
        </div>
        <div class="col-4">
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="eleve-tab" data-bs-toggle="tab" data-bs-target="#eleve-tab-pane" type="button" role="tab" aria-controls="eleve-tab-pane" aria-selected="false" style='display:block; margin:auto;'>Élève(s)</button>
            </li>
        </div>
    </ul>
</div>
<div class="tab-content" id="myTabContent">
    <!-- Rechercher lieu -->
    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0" style='margin-left:auto;'>
        <div style='display:flex; justify-content:center; align-items:center; height: 40vh;'>
            <div style="width:60%; background-color:#0D1B42; color:white; display: flex;align-items: center;justify-content: center; margin-top:3%; text-align:center; border-radius: 20px;"  >  
                <form method ='POST' action='index.php?ctl=Rechercher&action=listerLieu' style='width:50%;'>
                <label for="lieu-select" style='margin-bottom:3%; margin-top:3%;'>Choisir le lieu : </label>
                    <select class=form-select name="selectLieu" id="lieu-select" style='margin-bottom:5%;'>
                        <option value="">--Choisir le lieu--</option> 
                        <?php
                        foreach($listeLieu as $ligne)
                        {
                            echo "<option value=".$ligne['LibelleLieu'].">".$ligne['LibelleLieu']."</option>";
                        }
                        ?>
                    </select>
                    
                    <label for='dateLieu' style='margin-bottom:3%;'>Rechercher par date : </label>
                    <input type='radio' name='dateLieu' id='dateLieu' value='oui'>Oui
                    <input type='radio' name='dateLieu' id='dateLieu' value='non' checked>Non
                    <br>Date : <input type="date" name="valdateLieu" style="margin-top:3%;margin-bottom:5%; width:100%;">

                    <div class="row">
                        <div class="col-md-6">
                            <label for="heureDebut" style="margin-bottom:2%;">Heure de début :</label>
                            <br><input type="time" name="heureDebut" id="heureDebut" style="width:100%;">
                        </div>
                        <div class="col-md-6">
                            <label for="heureFin" style="margin-bottom:2%;">Heure de fin :</label>
                            <br><input type="time" name="heureFin" id="heureFin" style="width:100%;">
                        </div>
                    </div>


                    <br><input type="submit" class="btn btn-light btn-lg"  value="Rechercher" style='margin-bottom:5%;'>

                </form>
            </div> 
        </div>
    </div>
    <!-- Rechercher event -->
    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0" style='margin-left:auto;'>
        <div style='display:flex; justify-content:center; align-items:center; height: 40vh;'>
            <div style="width:60%; background-color:#0D1B42; color:white; display: flex;align-items: center;justify-content: center; margin-top:3%; text-align:center; border-radius: 20px;" >  
                <form method ='POST' action='index.php?ctl=Rechercher&action=listerEvent' style='width:50%;'>
                    <label for="Event-select" style='margin-bottom:3%; margin-top:3%;'>Choisir l'évènement : </label>
                    <select class="form-select" name="selectEvent" id="Event-select" style='margin-bottom:5%;'>
                        <option value="">--Choisir l'évènement--</option>
                        <?php
                        foreach($listeEvent as $ligne)
                        {
                            echo "<option value='".$ligne['LibelleEvent'] ."'>". $ligne['LibelleEvent'] . "</option>"; 
                        }
                        ?>
                    </select>
                    
                    <label for='dateEvent' style='margin-bottom:3%'>Rechercher par date : </label>
                    <input type='radio' name='dateEvent' id='dateEvent' value='oui'>Oui
                    <input type='radio' name='dateEvent' id='dateEvent' value='non' checked>Non
                    <br>Date : <input type="date" name="valdateEvent" style="margin-top:3%;margin-bottom:5%; width:100%;">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="heureDebut" style="margin-bottom:2%;">Heure de début :</label>
                            <br><input type="time" name="heureDebut" id="heureDebut" style="width:100%;">
                        </div>
                        <div class="col-md-6">
                            <label for="heureFin" style="margin-bottom:2%;">Heure de fin :</label>
                            <br><input type="time" name="heureFin" id="heureFin" style="width:100%;">
                        </div>
                    </div>
                    <br><input type="submit" class="btn btn-light btn-lg" value="Rechercher" style='margin-bottom:5%;'>

                </form>
            </div> 
        </div>
    </div>
    <!-- Rechercher élève -->
    <div class="tab-pane fade" id="eleve-tab-pane" role="tabpanel" aria-labelledby="eleve-tab" tabindex="0" style='margin-left:auto;'>
        <div style='display:flex; justify-content:center; align-items:center; height: 40vh;'>
            <div style="width:60%; background-color:#0D1B42; color:white; display: flex;align-items: center;justify-content: center; margin-top:3%; text-align:center; border-radius: 20px;" >  
                    <form method="POST" action ="index.php?ctl=Rechercher&action=listerEleve" style='width:50%;'>
                        <label for="eleve-select" style='margin-bottom:3%; margin-top:3%;'>Choisir l'élève : </label>
                        <select class="form-select" name="selectEleve" id="eleve-select" style='margin-bottom:5%;'>
                            <option value="">--Choisir l'elève--</option>
                            <?php
                            foreach($listeEleve as $ligne)
                            {
                                $PrenomNom = $ligne['Nom']." ".$ligne['Prenom'];
                                echo '<option value="'.$ligne['Nom'].' '.$ligne['Prenom'].'">'.$ligne['Nom'].' '.$ligne['Prenom'].'</option>';
                            }
                            ?>
                        </select>
                        
                        <label for='dateEleve' style='margin-bottom:3%'>Rechercher par date : </label>
                        <input type='radio' name='dateEleve' id='dateEleve' value='oui'>Oui
                        <input type='radio' name='dateEleve' id='dateEleve' value='non' checked>Non

                        <br>Date : <input type='date' name='valDateEleve' style="margin-top:3%;margin-bottom:5%; width:100%;">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="heureDebut" style="margin-bottom:2%;">Heure de début :</label>
                                <br><input type="time" name="heureDebut" id="heureDebut" style="width:100%;">
                            </div>
                            <div class="col-md-6">
                                <label for="heureFin" style="margin-bottom:2%;">Heure de fin :</label>
                                <br><input type="time" name="heureFin" id="heureFin" style="width:100%;">
                            </div>
                        </div>
                        <br><input type="submit" class="btn btn-light btn-lg" value="Rechercher" style='margin-bottom:5%;'>

                    </form>
            </div> 
        </div>
    </div>
</div>