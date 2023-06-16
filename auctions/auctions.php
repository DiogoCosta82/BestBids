<?php
class Auctions
{

    protected $title;
    protected $image_href;
    protected $reserve_price;
    protected $brand;
    protected $model;
    protected $hp;
    protected $year;
    protected $color;
    protected $doors;
    protected $places;
    protected $fuel;
    protected $kms;
    protected $description;
    protected $create_date;
    protected $updated_date;
    protected $end_date;

    public function __construct($title, $image_href, $reserve_price, $brand, $model, $hp, $year, $color, $doors, $places, $fuel, $kms, $description, $create_date, $updated_date, $end_date)
    {
        $this->title = $title;
        $this->image_href = $image_href;
        $this->reserve_price = $reserve_price;
        $this->brand = $brand;
        $this->model = $model;
        $this->hp = $hp;
        $this->year = $year;
        $this->color = $color;
        $this->doors = $doors;
        $this->places = $places;
        $this->fuel = $fuel;
        $this->kms = $kms;
        $this->description = $description;
        $this->create_date = $create_date;
        $this->updated_date = $updated_date;
        $this->end_date = $end_date;

    }
    public function displayAuctions()
    {
        echo "<h1> Votre Annonce:</h1>";
        echo "<div class=\"result\">";
        echo "<input type=\"image\">:" . $this->image_href . "</image>";
        echo "<p> Prix de Réserve : " . $this->reserve_price . "</p>";
        echo "<p> Marque: " . $this->brand . "</p>";
        echo "<p> Model : " . $this->model . "</p>";
        echo "<p>Hp: " . $this->hp . "</p>";
        echo "<p> Year : " . $this->year . "%</p>";
        echo "<p> Colors :" . $this->color . "</p>";
        echo "<p> Doors : " . $this->doors . "</p>";
        echo "<p> Places :" . $this->places . "</p>";
        echo "<p> Fuel :" . $this->fuel . "</p>";
        echo "<p> Kms :" . $this->kms . "</p>";
        echo "<p> Description :" . $this->description . "</p>";
        echo "<p> create_date :" . $this->create_date . "</p>";
        echo "<p> Mise à jourds de la date de vente:" . $this->updated_date . "</p>";
        echo "<p> fin enchère:" . $this->end_date . "</p>";

        echo "</div>";
    }
}