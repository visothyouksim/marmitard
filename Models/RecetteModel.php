<?php

require_once "core/Connect.php";

class RecetteModel
{
    public static function addRecette($titre, $description, $image, $gategorie, $listeIngredients, $auteur){
        $db = Connect::dbConnect();
        $request = $db->prepare("INSERT INTO recettes (titre, description, image, categorie, liste_ingredients, auteur) VALUES (?, ?, ?, ?, ?, ?)");
        try {
            $request->execute(array($titre, $description, $image, $gategorie, $listeIngredients, $auteur));
            return true;
        } catch(PDOException $e){
            // echo $e->getMessage();
            return false;
        }
    }
}
