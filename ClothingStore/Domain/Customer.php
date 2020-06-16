<?php
namespace Domain;

class Customer
{
    private $id;
    private $name;
    private $username;
    private $contact;
    private $email;
    private $type;
    
    public function __construct($id = null, $name = null, $username = null, $contact = null, $email = null, $type = null){
        $this->id = $id;
        $this->name = $name;
        $this->username = $username;
        $this->contact = $contact;
        $this->email = $email;
        $this->type = $type;
    }
    
    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}

