<?php
namespace Controller;
use DataBase\DataBase;
use Domain\Item;
use PDO;

class ItemDAO implements DAO
{
    private $connection;
    
    public function __construct(){
        $this->connection = DataBase::getConnection();
    }
    
    public function getAll()
    {
        $stmt = $this->connection->prepare("SELECT i.id, i.name, i.description, i.image, i.size FROM item i;");
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Item::class);
    }

    public function getById($id)
    {
        $stmt = $this->connection->prepare("SELECT i.id, i.name, i.description, i.image FROM item i WHERE i.id = :itemid;");
        $stmt->execute([':itemid'=>intval($id)]);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Item::class);
        return $stmt->fetch();
    }

    public function getByName($name)
    {
        //TODO implement when needed  
        return false;
    }

    public function save(Item $item = null)
    {
        if($item != null){
            $stmt = $this->connection->prepare('INSERT INTO item(name,description,image,size) VALUES(:name, :description, :image, :size);');
            if($stmt->execute([':name'=> $item->getName(), ':description'=>$item->getDescription(), ':image'=>$item->getImage(), ':size'=>$item->getSize()])){
                
                return true;
            }
        }
        return false;
    }

    public function update()
    {
        //TODO implement when needed  
        return false;
    }

    public function delete($id= null)
    {
        $stmt = $this->connection->prepare('DELETE FROM item WHERE item_id = :id;');
        if($stmt->execute([':id'=>intval($id)])){
            return true;
            
        }
        return false;
    } 
    
    public function getItemWithPrice(){
        $stmt = $this->connection->prepare("SELECT DISTINCT i.id, i.name, i.description, i.image, s.size, st.unit_price FROM item i INNER JOIN item_size s ON i.size = s.id INNER JOIN stock st ON st.item_id = i.id WHERE st.qty > 0 ORDER BY st.id;");
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Item::class);
    }
    
    public function getByIdWithPrice($id){
        $stmt = $this->connection->prepare("SELECT i.id, i.name, i.description, i.image, s.size, st.unit_price FROM item i INNER JOIN item_size s ON i.size = s.id INNER JOIN stock st ON st.item_id = i.id WHERE st.qty > 0 AND i.id = :itemid ORDER BY st.id;");
        $stmt->execute([':itemid'=>intval($id)]);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Item::class);
        return $stmt->fetch();
    }
}

