<?php

class CarModel{

    private $db;

    public function __construct(){
        $this->db = new PDO ('mysql:host=localhost;'.'dbname=db_autos;charset=utf8', 'root', '');
    }

    public function getAll(){

        $query = $this->db->prepare("SELECT vehiculos.*, categorias.nombre as categoria FROM vehiculos JOIN categorias ON vehiculos.id_categoria = categorias.id");
        $query->execute();

        $Cars = $query->fetchAll(PDO::FETCH_OBJ);

        return $Cars;
    }


    public function getCarsOrganized($attribute, $order){
        if($order != null && $attribute != null){
        $query = $this->db->prepare("SELECT * FROM `vehiculos` ORDER BY $attribute $order");
        $query->execute();

        $Cars = $query->fetchAll(PDO::FETCH_OBJ);
        return $Cars;
        }
    }

   
    
    public function get($id){
        $query = $this->db->prepare("SELECT * FROM vehiculos WHERE id = ?");
        $query->execute([$id]);

        $car = $query->fetch(PDO::FETCH_OBJ);
        
        return $car;
    }

    public function insert($marca , $modelo , $fecha_creacion, $precio , $descripcion , $id_categoria){

        $query = $this->db->prepare("INSERT INTO vehiculos (marca, modelo, fecha_creacion, precio, descripcion, id_categoria) VALUES ( ? , ? , ? , ? , ?, ?)");
        $query->execute([$marca , $modelo , $fecha_creacion, $precio , $descripcion , $id_categoria]);

        return $this->db->lastInsertId(); 
    }
    function delete($id){
        $query= $this->db->prepare('DELETE FROM vehiculos WHERE id = ? ');
        $query->execute([$id]);
    }
}