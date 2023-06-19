<?php
class newCar
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
    protected $created_date;
    protected $updated_date;
    protected $end_date;

    public function __construct($title, $image_href, $reserve_price, $brand, $model, $hp, $year, $color, $doors, $places, $fuel, $kms, $description, $created_date, $updated_date, $end_date)
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
        $this->created_date = $created_date;
        $this->updated_date = $updated_date;
        $this->end_date = $end_date;
    }



    public function getReservePrice()
    {
        return $this->reserve_price;
    }

    public function setReservePrice($reserve_price)
    {
        $this->reserve_price = $reserve_price;
    }


    public function getYear()
    {
        return $this->year;
    }

    public function setYear($year)
    {
        $this->year = $year;
    }
}
