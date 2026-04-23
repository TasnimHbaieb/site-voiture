<?php 

class Car {

    public const DEVISE = "TND";

    public function __construct(
        private string $code,
        private string $modele,
        private float $prix,
        private string $brand,
        private int $annee,
        private int $kilometrage,
        private string $carburant,
        private string $boite_vitesse,
        private int $stock = 0,
        private string $image = "car.jpg",
        private bool $on_sale = false,
        private ?float $old_price = null,
        private string $description = ""
    ) {}

    // 🔷 Affichage simple
    public function __toString(): string {
        return "Voiture [" . $this->code . "] " . $this->modele .
               " | Prix: " . number_format($this->prix, 2) . " " . self::DEVISE .
               " | Marque: " . $this->brand .
               " | Stock: " . $this->stock;
    }

    // 🔷 isset()
    public function __isset($attr){
        return isset($this->$attr);
    }

    // 🔷 get
    public function __get(string $name) {
        return property_exists($this, $name) ? $this->$name : null;
    }

    // 🔷 set avec validation
    public function __set(string $name, $value): void {

        if (!property_exists($this, $name)) return;

        // ✔ prix positif
        if ($name === 'prix' && $value < 0) {
            echo "Erreur : le prix ne peut pas être négatif<br>";
            return;
        }

        // ✔ stock positif
        if ($name === 'stock' && $value < 0) {
            echo "Erreur : stock invalide<br>";
            return;
        }

        // ✔ année valide
        if ($name === 'annee' && ($value < 1900 || $value > date("Y"))) {
            echo "Erreur : année invalide<br>";
            return;
        }

        // ✔ kilométrage positif
        if ($name === 'kilometrage' && $value < 0) {
            echo "Erreur : kilométrage invalide<br>";
            return;
        }

        $this->$name = $value;
    }
}
?>