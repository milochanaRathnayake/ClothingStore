<?php
namespace Controller;

use DataBase\DataBase;
use Domain\Stock;
use PDO;

class StockDAO implements DAO
{
    private $connection;

    public function __construct(){
        $this->connection = DataBase::getConnection();
    }
    public function getAll()
    {
        $stmt = $this->connection->prepare("SELECT s.id, s.unit_price, s.qty, s.add_date, s.item_id FROM stock s");
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Stock::class);
    }

    public function getById($id)
    {}

    public function getByName($name)
    {}

    public function save(Stock $stock = null)
    {
        if($stock != null){
            $stmt = $this->connection->prepare('INSERT INTO stock(unit_price, qty, add_date, item_id) VALUES(:unit_price, :qty, :add_date, :item_id)');
            if($stmt->execute([':unit_price'=> $stock->getUnit_price(), ':qty'=> $stock->getQty(),':add_date'=>$stock->getAdd_date(), ':item_id'=>$stock->getItem_id()])){
                
                return true;
            }
        }
        return false;
    }

    public function update()
    {}

    public function delete()
    {}
}

