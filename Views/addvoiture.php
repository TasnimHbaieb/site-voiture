<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Voiture</title>
</head>
<body>

    <h1>Formulaire d'ajout de Voiture</h1>

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">

        <table>

            <tr>
                <td><label>Modèle:</label></td>
                <td><input type="text" name="modele"></td>
            </tr>

            <tr>
                <td><label>Prix:</label></td>
                <td><input type="number" name="prix" step="any"></td>
            </tr>

            <tr>
                <td><label>Année:</label></td>
                <td><input type="number" name="annee"></td>
            </tr>

            <tr>
                <td><label>Kilométrage:</label></td>
                <td><input type="number" name="kilometrage"></td>
            </tr>

            <tr>
                <td><label>Carburant:</label></td>
                <td><input type="text" name="carburant"></td>
            </tr>

            <tr>
                <td><label>Boîte vitesse:</label></td>
                <td><input type="text" name="boite_vitesse"></td>
            </tr>

            <tr>
                <td><label>Marque:</label></td>
                <td><input type="text" name="brand"></td>
            </tr>

            <tr>
                <td><label>Stock:</label></td>
                <td><input type="number" name="stock"></td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" name="ajouter" value="Ajouter Voiture"></td>
            </tr>

        </table>

<?php
require "data_cars.php";

if (isset($_POST['ajouter'])) {

    if (
        isset($_POST['modele']) &&
        isset($_POST['prix']) &&
        isset($_POST['stock']) &&
        isset($_POST['brand'])
    ) {

        $modele = htmlspecialchars(trim($_POST['modele']), ENT_QUOTES);
        $prix = htmlspecialchars(trim($_POST['prix']), ENT_QUOTES);
        $stock = htmlspecialchars(trim($_POST['stock']), ENT_QUOTES);
        $brand = htmlspecialchars(trim($_POST['brand']), ENT_QUOTES);

        $annee = $_POST['annee'];
        $kilometrage = $_POST['kilometrage'];
        $carburant = $_POST['carburant'];
        $boite = $_POST['boite_vitesse'];

        if (!empty($modele) && !empty($prix) && !empty($stock) && !empty($brand)) {

            if (!is_numeric($prix) || !is_numeric($stock)) {
                echo "Le prix et le stock doivent être numériques";
            }
            elseif ((float)$prix < 0 || (int)$stock < 0) {
                echo "Le prix et le stock doivent être positifs";
            }
            else {

                $cars[] = [
                    'code' => 'C' . rand(100, 999),
                    'modele' => $modele,
                    'prix' => floatval($prix),
                    'old_price' => null,
                    'brand' => $brand,
                    'annee' => $annee,
                    'kilometrage' => $kilometrage,
                    'carburant' => $carburant,
                    'boite_vitesse' => $boite,
                    'image' => 'car.jpg',
                    'stock' => intval($stock),
                    'on_sale' => false
                ];

                echo "<p>🚗 La voiture $modele est ajoutée avec succès</p>";
            }

        } else {
            echo "Veuillez remplir tous les champs obligatoires";
        }
    }
}
?>

    </form>
</body>
</html>