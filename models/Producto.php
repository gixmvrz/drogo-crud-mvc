<?php

    class Producto extends Conectar{

        public function get_product(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql= "SELECT * FROM tm_product where status = 1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado= $sql->fetchAll();
        }

        public function get_product_x_id($product_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql= "SELECT * FROM tm_product where product_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $product_id);
            $sql->execute();
            return $resultado= $sql->fetchAll();
        }

        public function delete_product($product_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql= "UPDATE tm_product
                SET 
                status = 0,
                delete_date = now()
                WHERE
                    product_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $product_id);
            $sql->execute();
            return $resultado= $sql->fetchAll();
        }

        public function insert_product($name){
            $conectar= parent::conexion();
            parent::set_names();
            $sql= "INSERT INTO tm_product (id_product, name, date, modi_date, delete_date, status) VALUES (NULL, ?, now(), NULL, NULL, 1);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $name);
            $sql->execute();
            return $resultado= $sql->fetchAll();
        }

        public function update_product($product_id, $name){
            $conectar= parent::conexion();
            parent::set_names();
            $sql= "UPDATE tm_product
                SET 
                name = ?,
                modi_date = now()
                WHERE
                    product_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $name);
            $sql->bindValue(2, $product_id);            
            $sql->execute();
            return $resultado= $sql->fetchAll();
        }
    }


?>