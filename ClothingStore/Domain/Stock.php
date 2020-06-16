<?php
namespace Domain;

class Stock
{

    private $stock_id;

    private $item_id;

    private $qty;

    private $add_date;

    private $unit_price;

    public function __construct($stock_id = null, $item_id = null, $qty = null, $add_date = null, $unit_price = null)
    {
        $this->stock_id = $stock_id;
        $this->item_id = $item_id;
        $this->qty = $qty;
        $this->add_date = $add_date;
        $this->unit_price = $unit_price;
    }

    /**
     *
     * @return string
     */
    public function getStock_id($id = null)
    {
        return $this->stock_id;
    }

    /**
     *
     * @return string
     */
    public function getItem_id()
    {
        return $this->item_id;
    }

    /**
     *
     * @return string
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     *
     * @return string
     */
    public function getAdd_date()
    {
        return $this->add_date;
    }

    /**
     *
     * @return string
     */
    public function getUnit_price()
    {
        return $this->unit_price;
    }
}

