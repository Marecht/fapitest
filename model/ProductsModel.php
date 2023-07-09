<?php
    Class ProductsModel extends Db{
        
        public function getProducts(){
            $sql = "SELECT * FROM products";
            return Db::getAll($sql, []);
        }

        public function getProduct($id){
            $sql = "SELECT * FROM products WHERE id = ?";
            return Db::getOne($sql, [$id]);
        }

        public function createProduct($name, $price){
            $sql = "INSERT INTO products (name, price) VALUES(?, ?)";
            return Db::execute($sql, [$name, $price]);
        }
    }
?>