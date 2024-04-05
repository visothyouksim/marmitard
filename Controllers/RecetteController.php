<?php
require_once "Controllers/NavController.php";
require_once "Models/CategorieModel.php";
require_once "Models/RecetteModel.php";
class RecetteController extends NavController
{
    public function ajoutForm()
    {
        $this->afficherNav();
        $categories = CategorieModel::getCategories();
        include "Views/ajout_recette.php";
    }

    // methode pour ajouter une recette
    public function add()
    {
        if (isset($_POST['ajout_recette'])) {
            $tmp = $_FILES['image']['tmp_name']; // recuperer le nom temporaire
            $type = explode('/', $_FILES['image']['type']);
            $type = $type[1]; // recuperer le type de l'image
            $name = date("YmdHis"); // renommer l'image
            $imgName = $name. "." . $type;

            $fileDestination = $_SERVER['DOCUMENT_ROOT'] . '/marmitard/imgs/' . $imgName;
            // si l'image est bien sauvegarder
            if (move_uploaded_file($tmp, $fileDestination)) {
                if (RecetteModel::addRecette($_POST['titre'], $_POST['description'], $imgName, $_POST['categorie'], $_POST['ingredient'], $_SESSION['user']['id_user'])) {
                    echo "ça marche";
                } else {
                    echo "ça ne marche pas";
                }
            }
        }
    }
}
