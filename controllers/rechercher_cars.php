<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche voitures</title>
</head>
<body>

<h1>Recherche de voitures</h1>

<form action="recherche.php" method="GET">

    <label>Insérer partie du modèle :</label>
    <input type="text" name="query">
    <br><br>

    <label>Choisir la marque :</label>

    <select name="brand">

        <?php 
        require "data_cars.php";

        // récupérer toutes les marques sans doublons
        $brands = array_unique(array_column($cars, 'brand'));

        foreach ($brands as $value): ?>
            <option value="<?= $value ?>"><?= $value ?></option>
        <?php endforeach; ?>

    </select>

    <br><br>

    <input type="submit" value="Rechercher">

</form>

</body>
</html>