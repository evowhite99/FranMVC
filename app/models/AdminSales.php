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
        $sql = 'SELECT u.id as user_id, u.first_name as user_name,GROUP_CONCAT(p.name SEPARATOR ", ") as product_name,c.date as date FROM carts as c,products as p,users as u WHERE c.state=1 AND c.product_id=p.id AND c.user_id=u.id GROUP BY date';
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getSaleDetails($id,$date)
    {
        $sql='SELECT c.user_id as user, c.product_id as product, c.quantity as quantity, 
                c.send as send, c.discount as discount, p.price as price, p.image as image,
                p.description as description, p.name as name
                FROM carts as c, products as p
                WHERE c.user_id=:user_id AND state=1 AND c.product_id=p.id AND date=:date';

        $params= [
            ':user_id' => $id,
            ':date' => $date,
            ];

        $query = $this->db->prepare($sql);
        $query->execute($params);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

}