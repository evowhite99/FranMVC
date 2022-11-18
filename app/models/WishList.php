<?php

class wishList
{
    private $db;

    public function __construct()
    {
        $this->db = Mysqldb::getInstance()->getDatabase();
    }

    public function getWishList()
    {
        $sql = 'SELECT p.image as image,p.name as name,p.description as description,p.price as price,p.id as product_id FROM wishList as w,products as p WHERE p.id=w.product_id';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function delete($product, $user)
    {
        $sql = 'DELETE FROM wishList WHERE user_id=:user_id AND product_id=:product_id';
        $query = $this->db->prepare($sql);
        $params = [
            ':user_id' => $user,
            ':product_id' => $product,
        ];
        return $query->execute($params);
    }

    public function addProduct($product_id, $user_id)
    {
        $sql = 'SELECT * FROM products WHERE id=:id';
        $query = $this->db->prepare($sql);
        $query->execute([':id' => $product_id]);
        $product = $query->fetch(PDO::FETCH_OBJ);

        $sql2 = 'INSERT INTO wishList(user_id, product_id, quantity, discount, send, date) VALUES (:user_id, :product_id, :quantity, :discount, :send, :date)';
        $query2 = $this->db->prepare($sql2);
        $params2 = [
            ':user_id' => $user_id,
            ':product_id' => $product_id,
            ':quantity' => 1,
            ':discount' => $product->discount,
            ':send' => $product->send,
            ':date' => date('Y-m-d H:i:s',strtotime('+1 hours')),
        ];

        $query2->execute($params2);

        return $query2->rowCount();

    }

    public function verifyProduct($product_id, $user_id)
    {
        $sql = 'SELECT * FROM wishList WHERE product_id=:product_id AND user_id=:user_id';
        $query = $this->db->prepare($sql);
        $params = [
            ':product_id' => $product_id,
            ':user_id' => $user_id,
        ];
        $query->execute($params);

        return $query->rowCount();
    }

}