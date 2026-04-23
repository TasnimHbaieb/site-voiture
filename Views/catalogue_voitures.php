<?php
require "data_cars.php";

if (!isset($cars)) {
    die("Erreur : les données des voitures ne sont pas chargées !");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Catalogue de voitures</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Catalogue de voitures</h1>


<?php foreach ($cars as $car) { ?>

<div class="card">

    <?php if ($car['on_sale']) { ?>
        <div class="badge">PROMO</div>
    <?php } ?>

    <img src="images/<?= $car['image'] ?>">

    <div class="card-content">
        <h2 class="title-card"><?= $car['modele'] ?></h2>
        <p class="category"><?= $car['brand'] ?></p>

        <p class="price">
            <?= $car['prix'] ?> DT
            <?php if ($car['old_price']) { ?>
                <span class="old-price"><?= $car['old_price'] ?> DT</span>
            <?php } ?>
        </p>

        <p class="stock">Stock: <?= $car['stock'] ?></p>

        <button class="btn-buy">Acheter</button>
    </div>

</div>

<?php } ?>

</body>
</html>