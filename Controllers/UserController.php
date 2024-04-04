<?php
require_once "Models/UserModel.php";
require_once "Controllers/NavController.php";
class UserController extends NavController{
    // affichage du formulaire d'inscription
    public function registerForm(){
        $this->afficherNav();
        include "Views/inscription.php";
    }
    // inscription
    public function register(){
        if(isset($_POST['inscription'])){
            UserModel::register();
        }
    }
    // affichage du fomulaire de connexion
    public function loginForm(){
        $this->afficherNav();
        include "Views/login.php";
    }

    public function login(){
        if(isset($_POST['login'])){
            $user = UserModel::login();
            if(empty($user)){
                echo "Cet email n'existe pas!";
            }else{
                if(password_verify($_POST['password'], $user['mdp'])){
                    $_SESSION['user'] = $user;
                }
            }
        }
        
    }

}