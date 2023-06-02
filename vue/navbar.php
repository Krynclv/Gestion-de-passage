<div class="wrapper">
    <header>
        <nav>
            <div class="logo">
                <a href="index.php"><img src="vue/image/logo.png"></a>
            </div>
            <div class="menu">
                <ul>
                    <li><a class= "nav-link" href='index.php?ctl=Saisie&action=vueSaisie'>Saisie</a></li>
                    <li><a class= "nav-link" href='index.php?ctl=Rechercher&action=vueRechercher'>Consultation</a></li>
                    <li><a class= "nav-link" href='index.php?ctl=Ajouter&action=vueAjouter'>Gestion</a></li>
                    <?php
                    if(!isset($_SESSION['email']))
                    {
                    ?>    
                    <li><a class= "nav-link" href='index.php?ctl=User&action=vueLogin'>Connexion</a></li>
                    <?php
                    }
                    else
                    { 
                    ?>
                    <li><a class= "nav-link" href='index.php?ctl=User&action=deconnect'>Déconnexion</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </nav>
    </header>        
</div>
 

