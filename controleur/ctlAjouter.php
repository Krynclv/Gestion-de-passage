<?php
include './model/Db_ajouter.php';

$action =$_GET['action'];

switch($action){	

    case 'vueAjouter' :
        $lister = DbAjouter::getListeLieux();
        $lister2 = DbAjouter::getListeEvent();
        include 'vue/vueAjouter/ajouter.php';
    break;

    case 'supprimerEvent' :
        $IdEvent=$_GET['IdEvent'];
        DbAjouter::supprimerEvent($IdEvent);
        $lister = DbAjouter::getListeLieux();
        $lister2 = DbAjouter::getListeEvent();
        include 'vue/vueAjouter/ajouter.php';
     break;

    case 'ajouterEvenement' :
        $evenements=$_POST['evenements'];
        DbAjouter::Evenement($evenements);
        $lister = DbAjouter::getListeLieux();
        $lister2 = DbAjouter::getListeEvent();
        include 'vue/vueAjouter/Ajouter.php';
    break;

    case 'ajouterLieu' :
        $lieux=$_POST['lieux'];
        DbAjouter::Lieu($lieux);
        $lister = DbAjouter::getListeLieux();
        $lister2 = DbAjouter::getListeEvent();
        include 'vue/vueAjouter/Ajouter.php';
    break;


    case 'supprimerLieu' :
        $IdLieu=$_GET['IdLieu'];
        DbAjouter::supprimerLieu($IdLieu);
        $lister = DbAjouter::getListeLieux();
        $lister2 = DbAjouter::getListeEvent();
        include 'vue/vueAjouter/ajouter.php';
     break;

     case 'importEleves': 
        if (is_uploaded_file($_FILES['txtEleve']['tmp_name']) ) 
        {
            
            if(pathinfo($_FILES['txtEleve']['name'], PATHINFO_EXTENSION)=="TXT")
            {
                $txt_file = $_FILES['txtEleve']['tmp_name'];
                $lines = file($txt_file);
                DbAjouter::deleteEleve();
                foreach ($lines as $num=>$line)
                {
                    $temp=explode("\t",$line);
                    $CodeEleve = $temp[5]; 
                    $NomEleve = $temp[11];
                    $PrenomEleve = $temp[12];
                    $Classe = $temp[1];
                    DbAjouter::importEleve($CodeEleve,$NomEleve,$PrenomEleve,$Classe);
                }
                $lister = DbAjouter::getListeLieux();
                $lister2 = DbAjouter::getListeEvent();
                $message = "La liste d'élèves à bien été importé";
                include 'vue/vueAjouter/ajouter.php';
                echo "<script type='text/javascript'>alert('La base de donnée a bien été enregistré');</script>";
            }
            else
            {
                $lister = DbAjouter::getListeLieux();
                $lister2 = DbAjouter::getListeEvent();
                $erreur = "Le fichier doit être un fichier texte";
                include 'vue/vueAjouter/ajouter.php';
            }

        }
        

        break;
    
}

?>
