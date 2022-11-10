<?php

class AdminSales
{
    private $db;

    public function __construct()
    {
        $this->db = Mysqldb::getInstance()->getDatabase();
    }

    public function getSales()
    {
        $sql = 'SELECT * FROM carts WHERE state=1';
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /*public function getDetails()
    {
        $sql = 'SELECT * FROM carts WHERE state=1';
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }*/
}