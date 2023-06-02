<div class="container-fluid" style='margin:0; padding:0; margin-top:3%;'>
    <h1 style='text-align:center; margin-bottom:3%;'>Saisir un passage :</h1>
    <ul class="nav nav-tabs" id="myTab" role="tablist" style="padding:0; margin-bottom:3%;" >
        <div class="col-6">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true" style='display:block; margin:auto;'>Lieu(x)</button>
            </li>
        </div>
        <div class="col-6">
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false" style='display:block; margin:auto;'>Événement(s)</button>
            </li>
        </div>
    </ul>
</div>

<div class="tab-content" id="myTabContent">
    <!-- Saisir lieu -->
    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0" style='margin-left:auto;'>
        <div style='display:flex; justify-content:center; align-items:center; height: 40vh;'>
            <div style="width:60%; background-color:#0D1B42; color:white; display: flex;align-items: center;justify-content: center; margin-top:3%; text-align:center; border-radius: 20px;" >  
                <form method ='POST' action='index.php?ctl=Saisie&action=AjouterPassageLieu' style='width:50%;'>
                <label for="lieu-select" style='margin-bottom:3%; margin-top:3%;'>Choisir le lieu : </label>
                    <select class="form-select " name="selectLieu" id="lieu-select" style='margin-bottom:5%;'>
                        <option value="">--Choisir le lieu--</option>
                        <?php
                        foreach($listeLieu as $ligne)
                        {
                            echo "<option value=".$ligne['LibelleLieu'].">".$ligne['LibelleLieu']."</option>";
                        }
                        ?>
                    </select>

                    <label for="eleve-select" style='margin-bottom:3%;' required>Saisir le code de l'élève : </label>
                    <br><input type="text" name='codeEleve' style="margin-bottom:5%; width:100%;"><br>
                    <?php
                        if(isset($_GET['msg']))
                        {
                        ?>
                            <div class="alert alert-danger" role="alert " style='padding-top:5%;'>
                            <?php echo $_GET['msg'] ?>
                            </div>
                        <?php
                        }
                    ?>
                    <button type="submit" class="btn btn-light btn-lg" style='margin-bottom:5%;'>Ajouter</button>


                </form>
            </div> 
        </div>
    </div>
    <!-- Rechercher event -->
    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
        <div style='display:flex; justify-content:center; align-items:center; height: 40vh;'>
            <div style="width:60%; background-color:#0D1B42; color:white; display: flex;align-items: center;justify-content: center; margin-top:3%; text-align:center; border-radius: 20px;" >  
                <form method ='POST' action='index.php?ctl=Saisie&action=AjouterPassageEvent' style='width:50%;'>
                <label for="lieu-select" style='margin-bottom:3%; margin-top:3%;' required>Choisir l'évènement : </label>
                    <select class="form-select " name="selectEvent" id="lieu-select" style='margin-bottom:5%;'>
                        <option value="">--Choisir l'évènement--</option>
                        <?php
                        foreach($listeEvent as $ligne)
                        {
                            echo "<option value=".$ligne['LibelleEvent'].">".$ligne['LibelleEvent']."</option>";
                        }
                        ?>
                    </select>

                    <label for="eleve-select" style='margin-bottom:3%;'>Saisir le code de l'élève : </label>
                    <br><input type="text" name='codeEleve' style="margin-bottom:5%; width:100%;"><br>
                        <?php
                        if(isset($_GET['msg']))
                        {
                        ?>
                            <div class="alert alert-danger" role="alert " style='padding-top:5%;'>
                            <?php echo $_GET['msg'] ?>
                            </div>
                        <?php
                        }
                        ?>
                    <button type="submit" class="btn btn-light btn-lg" style='margin-bottom:5%;'>Ajouter</button>


                </form>
            </div> 
        </div>
    </div>