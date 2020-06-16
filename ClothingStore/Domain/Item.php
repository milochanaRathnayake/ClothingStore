<?php
namespace Domain;

class Item
{
    private $id;
    private $name;
    private $description;
    private $image;
    private $size;
    private $unit_price;

    public function __construct($id = null, $name = null, $description = null, $image = null, $size = null, $unit_price = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
        $this->size = $size;
        $this->unit_price = $unit_price;
    }
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }
    
    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }
    
    /**
     * @return string
     */
    public function getPrice()
    {
        return $this->unit_price;
    } 
}

