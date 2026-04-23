<?php

if (isset($_GET['query']) && isset($_GET['brand'])) {

    require "../Models/data_cars.php";

    $query = strtolower(trim($_GET['query']));
    $brand = strtolower(trim($_GET['brand']));

    foreach ($cars as $car) {

        // Vérifier le modèle
        $verifQuery = strpos(strtolower($car['modele']), $query);

        // Vérifier la marque
        $verifBrand = strtolower($car['brand']) === $brand;

        if ($verifQuery !== false && $verifBrand) {

            echo "<div style='border:1px solid #ccc; margin:10px; padding:10px;'>";

            echo "<h3>" . $car['modele'] . "</h3>";

            echo "<p>🚗 Marque : " . $car['brand'] . "</p>";

            echo "<img src='images/" . $car['image'] . "' width='150'>";

            echo "<p>💰 Prix : " . $car['prix'] . " DT</p>";

            echo "</div><hr>";
        }
    }
}
?>