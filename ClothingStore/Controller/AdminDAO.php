<?php
namespace Controller;
session_start();
use Domain\Admin;
use DataBase\DataBase;
require_once '../autoload.php';

class AdminDAO implements DAO
{
    private $connection;
    private $admin;
    
    public function __construct(Admin $admin = null){
        $this->connection = DataBase::getConnection();
        $this->admin = $admin;
    }
    
    public function getAll()
    {
        return false;
    }

    public function getById($id)
    {
        return false;
    }

    public function getByName($name)
    {}

    public function save()
    {
        
    }

    public function update()
    {
        
    }

    public function delete()
    {
        return false;
    }
    
    public function verify($password = null){
        if($password != null){
            $stmt = $this->connection->prepare('SELECT id, name, username, password, email, contact, user_role_id FROM customer WHERE username = :username AND user_role_id > 1;');
            $stmt->execute([':username'=>$this->admin->getUsername()]);
            $row = $stmt->fetch();
            if($row){
                if(password_verify($password, $row['password'])){
                    $this->admin = new Admin($row['id'], $row['name'], $row['username'], $row['contact'], $row['email'], $row['type']);
                    $_SESSION['admin'] = $this->admin;
                    return true;
                }
            }
        }
        return false;
    }
}

