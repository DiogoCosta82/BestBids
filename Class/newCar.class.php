
<?php

class newCar
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

    public function getIdUser()
    {
        return $this->id_user;
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

    public function save($dbh)
    {
        // Insérer l'annonce dans la table auctions
        $query = $dbh->prepare("INSERT INTO `auctions` (`id_user`, `title`, `image_href`, `reserve_price`, `brand`,`model`, `hp`, `description`, `created_date`, `end_date`) 
        VALUES (:id_user, :title, :image_href, :reserve_price, :brand, :model, :hp, :description, NOW(), :end_date)");

        $query->bindParam(":id_user", $this->id_user);
        $query->bindParam(":title", $this->title);
        $query->bindParam(":image_href", $this->image_href);
        $query->bindParam(":reserve_price", $this->reserve_price);
        $query->bindParam(":brand", $this->brand);
        $query->bindParam(":model", $this->model);
        $query->bindParam(":hp", $this->hp);
        $query->bindParam(":description", $this->description);
        $query->bindParam(":end_date", $this->end_date);
        $query->execute();
    }
}
