<?php

class newBids
{
    private $id_bid;
    private $auction_id;
    private $user_id;
    private $amount;
    private $bid_date;
    private $winner_bid;
    private $reserve_price;
    private $newAmount;

    public function __construct($id_bid, $auction_id, $user_id, $amount, $bid_date, $winner_bid, $reserve_price, $newAmount)
    {
        $this->id_bid = $id_bid;
        $this->auction_id = $auction_id;
        $this->user_id = $user_id;
        $this->amount = $amount;
        $this->bid_date = $bid_date;
        $this->winner_bid = $winner_bid;
        $this->reserve_price = $reserve_price;
        $this->newAmount = $this->reserve_price + ($this->amount);
    }


    public function getBid()
    {
        return $this->id_bid;
    }

    public function getAuction()
    {
        return $this->auction_id;
    }

    public function getUser()
    {
        return $this->user_id;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getBid_date()
    {
        return $this->bid_date;
    }

    public function getWinner()
    {
        return $this->winner_bid;
    }
    public function getReservePrice()
    {
        return $this->reserve_price;
    }
    public function getNewAmount()
    {
        return $this->newAmount;
    }


    public function setBid()
    {
        return $this->id_bid;
    }
    public function setAuction()
    {
        return $this->auction_id;
    }
    public function setUser()
    {
        return $this->user_id;
    }
    public function setAmount()
    {
        return $this->amount;
    }
    public function setBid_date()
    {
        return $this->bid_date;
    }
    public function setWinner()
    {
        return $this->winner_bid;
    }
    public function setReservePrice()
    {
        return $this->reserve_price;
    }
    public function setNewAmount()
    {
        return $this->newAmount;
    }
    public function saveAuction($dbh)
    {

        //echo "<script>alert('Le gagnant est $');</script>";
        // AJOUT d'une enchère - connexion avec la db
        $query = $dbh->prepare("INSERT INTO `bids` (`id_bid`, `auction_id`,`user_id`,`amount`,`bid_date`,
     `winner_bid`,`reserve_price`,`newAmount`) VALUES (:id_bid, :auction_id, :user_id, :amount, :bid_date, :reserve_price, :newAmount())");
        $query->bindValue(":id_bid", $_POST["id_bid"]);
        $query->bindValue(":auction_id", $_POST["auction_id"]);
        $query->bindValue(":user_id", $_POST["user_id"]);
        $query->bindValue(":bid_date", $_POST["bid_date"]);
        $query->bindValue(":winner_bid", $_POST["winner_bid"]);
        $query->bindValue(":reserve_price", $_POST["reserve_price"]);
        $query->bindValue(":newAmount", $_POST["newAmount"]);

        $query->execute();
    }
}
