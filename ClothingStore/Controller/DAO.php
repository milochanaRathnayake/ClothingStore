<?php
namespace Controller;

interface DAO
{
    public function getAll();
    public function getById($id);
    public function getByName($name);
    public function save();
    public function update();
    public function delete();
}

