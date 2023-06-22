<?php


class newBid
{
    protected $id_auction;
    protected $id_user;
    protected $amount;
    protected $bid_date;
    protected $winner_bid;

    public function __construct($id_auction, $id_user, $amount, $bid_date, $winner_bid)
    {
        $this->id_auction = $id_auction;
        $this->id_user = $id_user;
        $this->amount = $amount;
        $this->bid_date = $bid_date;
        $this->winner_bid = $winner_bid;
    }

    public function getIdAuction()
    {
        return $this->id_auction;
    }

    public function getIdUser()
    {
        return $this->id_user;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getBidDate()
    {
        return $this->bid_date;
    }

    public function getWinnerBid()
    {
        return $this->winner_bid;
    }

    public function setIdAuction($id_auction)
    {
        return $this->id_auction = $id_auction;
    }

    public function setIdUser($id_user)
    {
        return $this->id_user = $id_user;
    }

    public function setAmount($amount)
    {
        return $this->amount = $amount;
    }

    public function setBidDate($bid_date)
    {
        return $this->bid_date = $bid_date;
    }

    public function setWinnerBid($winner_bid)
    {
        return $this->winner_bid = $winner_bid;
    }

    public function save($dbh)
    {
        // Insertion de l'enchère dans la table bids
        $query = $dbh->prepare("INSERT INTO `bids` (`id_auction`, `id_user`, `amount`, `bid_date`, `winner_bid`)
                                VALUES (:id_auction, :id_user, :amount, NOW(), :id_user)");
        $query->bindParam(":id_auction", $this->id_auction);
        $query->bindParam(":id_user", $this->id_user);
        $query->bindParam(":amount", $this->amount);
        $query->bindParam(":id_user", $this->id_user);
        $query->execute();

        // Mise à jour du reserve_price dans la table auctions
        $query = $dbh->prepare("UPDATE `auctions` SET reserve_price = :amount, updated_date = NOW() WHERE id_auction = :id_auction");
        $query->bindParam(":amount", $this->amount);
        $query->bindParam(":id_auction", $this->id_auction);
        $query->execute();
    }

    public function getWinnerName($dbh)
    {
        $query = $dbh->prepare('SELECT user.first_name, user.last_name FROM user
                                INNER JOIN bids ON user.id_user = bids.id_user
                                WHERE bids.id_auction = :id_auction AND bids.winner_bid = 1');
        $query->execute(array(':id_auction' => $this->id_auction));
        $result = $query->fetch();

        if ($result) {
            return $result['first_name'] . ' ' . $result['last_name'];
        } else {
            return '';
        }
    }
}
