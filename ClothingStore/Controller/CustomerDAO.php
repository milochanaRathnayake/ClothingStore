<?php
namespace Controller;
session_start();
require_once 'autoload.php';
use DataBase\DataBase;
use Domain\Customer;

class CustomerDAO implements DAO
{
    private $connection;
    private $customer;
    
    public function __construct(Customer $customer = null){
        $this->connection = DataBase::getConnection();    
        $this->customer = $customer;
    }
    
    public function getAll()
    {
        //TODO implement when needed
        return false;
    }

    public function getById($id)
    {
        //TODO implement when needed
        return false;
    }

    public function getByName($name)
    {
        //TODO implement when needed
        return false;
    }

    public function save($password = null)
    {
        if($password != null){
            $stmt = $this->connection->prepare('INSERT INTO customer(name, username, password, contact, email) VALUES(:name, :username, :password, :contact, :email)');
            if($stmt->execute([':name'=>$this->customer->getName(), ':username'=>$this->customer->getUsername(), ':password'=>$password, ':contact' => $this->customer->getContact(), ':email' => $this->customer->getEmail()])) return true;
        }
        return false;
    }

    public function update()
    {
        //TODO implement when needed
        return false;
    }

    public function delete()
    {
        //TODO implement when needed
        return false;
    }
    
    public function verify($password = null){
        if($password != null){
            $stmt = $this->connection->prepare('SELECT id, name, username, password, email, contact, user_role_id FROM customer WHERE username = :username;');
            $stmt->execute([':username'=>$this->customer->getUsername()]);
            $row = $stmt->fetch();
            if(password_verify($password, $row['password'])){
                $this->customer = new Customer($row['id'], $row['name'], $row['username'], $row['contact'], $row['email'], $row['user_role_id']);
                $_SESSION['customer'] = $this->customer;
                return true;
            }
        }
        return false;
    }
}

