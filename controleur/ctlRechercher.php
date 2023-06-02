<?php
include './model/Db_rechercher.php';

$action =$_GET['action'];

switch($action)
{
    case 'vueRechercher':
        $listeLieu = DbRechercher::listerLieu();
        $listeEleve = DbRechercher::listerEleve();
        $listeEvent = DbRechercher::listerEvent();
        include('vue/vueRechercher/Rechercher.php');
        break;
    

    case 'listerEleve':
        $temp = explode(" ", $_POST['selectEleve']);
        $nom = $temp[0];
        $prenom = $temp[1];
        if($_POST['dateEleve']=='non')
        {
            $Passages = DbRechercher::histoEleve($nom,$prenom);
            include('vue/vueRechercher/ListerEleve.php');
        }
        else
        {
            $Date = $_POST['valDateEleve'];
            $heureDebut = $_POST['heureDebut'];
            $heureFin = $_POST['heureFin'];
            $DateDebut = $Date." ".$heureDebut;
            $DateFin = $Date." ".$heureFin;
            $Passages = DbRechercher::histoEleveDate($nom,$prenom,$DateDebut,$DateFin);
            include('vue/vueRechercher/ListerEleve.php');
            
        }
        break;

    case 'listerLieu':
        $lieu = $_POST['selectLieu'];
        if($_POST['dateLieu']=='non')
        {
            $Passages = DbRechercher::histoLieu($lieu);
            include('vue/vueRechercher/ListerLieu.php');
        }
        else
        {
            $Date = $_POST['valdateLieu'];
            $heureDebut = $_POST['heureDebut'];
            $heureFin = $_POST['heureFin'];
            $DateDebut = $Date." ".$heureDebut.":00";
            $DateFin = $Date." ".$heureFin.":00";
            $Passages = DbRechercher::histoLieuDate($lieu,$DateDebut,$DateFin);
            include('vue/vueRechercher/ListerLieu.php');
            
        }
        break;

    case 'listerEvent':
        $event = $_POST['selectEvent'];
        if($_POST['dateEvent']=='non')
        {
            $Passages = DbRechercher::histoEvent($event);
            include('vue/vueRechercher/ListerEvent.php');
        }
        else
        {
            $Date = $_POST['valdateEvent'];
            $heureDebut = $_POST['heureDebut'];
            $heureFin = $_POST['heureFin'];
            $DateDebut = $Date." ".$heureDebut.":00";
            $DateFin = $Date." ".$heureFin.":00";
            $Passages = DbRechercher::histoEventDate($event,$DateDebut,$DateFin);
            include('vue/vueRechercher/ListerEvent.php');
            
        }
        break;



    


}


?>