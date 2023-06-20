<?php
class newCar
{

    private $title;
    private $image_href;
    private $reserve_price;
    private $brand;
    private $model;
    private $hp;
    private $description;
    private $end_date;

    public function __construct($title, $image_href, $reserve_price, $brand, $model, $hp, $description, $end_date)
    {
        $this->title = $title;
        $this->image_href = $image_href;
        $this->reserve_price = $reserve_price;
        $this->brand = $brand;
        $this->model = $model;
        $this->hp = $hp;
        $this->description = $description;
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
    public function getDescription()
    {
        return $this->description;
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
    public function detDescription($description)
    {
        return $this->description = $description;
    }

    public function setEndDate($end_date)
    {
        return $this->end_date = $end_date;
    }
}
