<?php require_once __DIR__ . 'Class/newCar.class.php';

class Detail extends newCar
{
    protected $id_user;
    protected $title;
    protected $image_href;
    protected $reserve_price;
    protected $brand;
    protected $model;
    protected $hp;
    protected $description;
    protected $end_date;

    public function __construct($id_user, $title, $image_href, $reserve_price, $brand, $model, $hp, $description, $end_date)
    {
        $this->id_user = $id_user;
        $this->title = $title;
        $this->image_href = $image_href;
        $this->reserve_price = $reserve_price;
        $this->brand = $brand;
        $this->model = $model;
        $this->hp = $hp;
        $this->description = $description;
        $this->end_date = $end_date;
    }



    public function displayDetail()
    {
        echo '<div class="container-sm">';
        echo "<h1 > $this->title:</h1>";
        echo "<input. $this->image_href .>" . $this->image_href . "</inputp>";
        echo "<p> Prix de départ : " . $this->reserve_price . "</p>";
        echo "<p> Marque : " . $this->brand . "</p>";
        echo "<p> Modèle : " . $this->model . "</p>";
        echo "<p> CV :" . $this->hp . "</p>";
        echo "<p> Description : " . $this->description . "</p>";
        echo "<p> Date fin d'enchère : " . $this->end_date . "</p>";


    }
}