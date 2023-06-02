<?php
session_start();
include('vue/header.php');
include('vue/navbar.php');
include('vue/menu.php');
if(!isset($_GET['ctl']))
{
    include('vue/vueSaisie/saisie.php');
}



if(isset($_GET['ctl']))
{
	switch($_GET['ctl'])
    {
        case 'Rechercher':
            include('controleur/ctlRechercher.php');
            break;

        case 'User':
            include('controleur/ctlUser.php');
            break;
        
        case 'Ajouter':
            include('controleur/ctlAjouter.php');
            break;
        
        case 'Saisie' :
            include ('controleur/ctlSaisie.php');
            break;

    }
} 


include('vue/footer.php');
?>