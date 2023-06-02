<?php
include './model/Db_Saisie.php';

$action =$_GET['action'];

switch($action)
{
    case 'vueSaisie':
        $listeEvent = DbSaisie::listerEvent();
        $listeLieu = DbSaisie::listerLieu();
        include ('vue/vueSaisie/saisie.php');
        break;

    case 'AjouterPassageLieu':
        $LibelleLieu = $_POST['selectLieu'];
        $IdLieu = DbSaisie::getIdLieu($LibelleLieu);
        foreach($IdLieu as $ligne)
        {
            $IdLieu = $ligne['IdLieu']; 
        }
        $CodeEleve = $_POST['codeEleve'];
        $verifCodeEleve = DbSaisie::verifCodeEleve($CodeEleve);
        if(is_array($verifCodeEleve))
        {
            DbSaisie::ajouterPassageLieu($IdLieu,$CodeEleve);
            $listeEvent = DbSaisie::listerEvent();
            $listeLieu = DbSaisie::listerLieu();
            include ('vue/vueSaisie/saisie.php');
        }
        else 
        {
            echo "<script>window.location.replace('index.php?ctl=Saisie&action=vueSaisie&msg=Le Code eleve est incrorect');</script>";
        }

        
        break;

    case 'AjouterPassageEvent':
        $LibelleEvent = $_POST['selectEvent'];
        $IdEvent = DbSaisie::getIdEvent($LibelleEvent);
        foreach($IdEvent as $ligne)
        {
            $IdEvent = $ligne['IdEvent'];
        }
        $CodeEleve = $_POST['codeEleve'];
        $verifCodeEleve = DbSaisie::verifCodeEleve($CodeEleve);
        if(is_array($verifCodeEleve))
        {
            DbSaisie::ajouterPassageEvent($IdEvent,$CodeEleve);
            $listeEvent = DbSaisie::listerEvent();
            $listeLieu = DbSaisie::listerLieu();
            include ('vue/vueSaisie/saisie.php');
        }
        else
        {
            echo "<script>window.location.replace('index.php?ctl=Saisie&action=vueSaisie&msg=test');</script>";
        }

        break;

}
?>