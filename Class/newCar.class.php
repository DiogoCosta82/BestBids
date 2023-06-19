<?php
class newCar
{

    private $title;
    private $image_href;
    private $reserve_price;
    private $brand;
    private $model;
    private $hp;
    private $year;
    private $color;
    private $doors;
    private $places;
    private $fuel;
    private $kms;
    private $description;
    private $created_date;
    private $updated_date;
    private $end_date;

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

    public function getTitle()
    {
        return $this->title;
    }

    public function getImageHref()
    {
        return $this->image_href;
    }

    public function getReservePrice()
    {
        return $this->reserve_price;
    }

    public function getBrand()
    {
        return $this->brand;
    }
    public function getModel()
    {
        return $this->model;
    }
    public function getHp()
    {
        return $this->hp;
    }
    public function getYear()
    {
        return $this->year;
    }
    public function getColor()
    {
        return $this->color;
    }
    public function getDoors()
    {
        return $this->doors;
    }
    public function getPlaces()
    {
        return $this->places;
    }
    public function getFuel()
    {
        return $this->fuel;
    }
    public function getKms()
    {
        return $this->kms;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getCreatedDate()
    {
        return $this->created_date;
    }
    public function getUpdatedDate()
    {
        return $this->updated_date;
    }
    public function getEndDate()
    {
        return $this->end_date;
    }



    public function setTitle($title)
    {
        return $this->title = $title;
    }
    public function setImageHref($image_href)
    {
        return $this->image_href = $image_href;
    }
    public function setReservePrice($reserve_price)
    {
        return $this->reserve_price = $reserve_price;
    }
    public function setBrand($brand)
    {
        return $this->brand = $brand;
    }
    public function setModel($model)
    {
        return $this->model = $model;
    }
    public function setHp($hp)
    {
        return $this->hp = $hp;
    }
    public function setYear($year)
    {
        return $this->year = $year;
    }
    public function setColor($color)
    {
        return $this->color = $color;
    }
    public function setDoors($doors)
    {
        return $this->doors = $doors;
    }
    public function setPlaces($places)
    {
        return $this->places = $places;
    }
    public function setFuel($fuel)
    {
        return $this->fuel = $fuel;
    }
    public function setKms($kms)
    {
        return $this->kms = $kms;
    }
    public function detDescription($description)
    {
        return $this->description = $description;
    }
    public function setCreatedDate($created_date)
    {
        return $this->created_date = $created_date;
    }
    public function setUpdatedDate($updated_date)
    {
        return $this->updated_date = $updated_date;
    }
    public function setEndDate($end_date)
    {
        return $this->end_date = $end_date;
    }
}
