<?php
include './model/Db_user.php';

$action =$_GET['action'];

switch($action){	

    case 'vueLogin':
        include('vue/vueLogin/login.php');
        break;

    case 'validLogin':
        if(isset($_POST['email']) && isset($_POST['password']))
        {
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $user = DbUser::getUser($email,$password);
        
        if(is_array($user))
        {
                $_SESSION['email']=$email;
                echo "<script>window.location.replace('index.php?ctl=Saisie&action=vueSaisie');</script>";
        }
        else
        {
            #echo "<script>window.location.replace('index.php?msg=Email ou mot de passe incorrect');</script>";
            echo "<script>window.location.replace('index.php?ctl=User&action=vueLogin&msg=Email ou mot de passe incorrect');</script>";
        }
        }
         break;		

    case 'deconnect':
        //appel à la base de donnée le modele
        session_unset();
        session_destroy();
        //appel à la vue
        header('Location: index.php');
        break;
}
?>