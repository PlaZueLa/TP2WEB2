<?php

require_once './app/models/cars.model.php';
require_once './app/views/api.view.php';

class CarApiController {
    private $model;
    private $view;

    private $data;
    
    public function __construct(){
        $this->model = new CarModel();
        $this->view = new ApiView();

        $this->data = file_get_contents("php://input");
    }

    private function getData(){
        return json_decode($this->data);
    }

   
    

    public function getCars($params = null){
       
        $sort = $_GET['sort'];
        $order = $_GET['order'];

        if(isset($order) && isset($sort)){
            if($sort == "id" || $sort == "marca" || $sort == "modelo" || $sort == "fecha_creacion" || $sort == "precio" || $sort == "descripcion" || $sort == "id_categoria" ||
            $sort == "ID" || $sort == "MARCA" || $sort == "MODELO" || $sort == "FECHA_CREACION" || $sort == "PRECIO" || $sort == "DESCRIPCION" || $sort == "ID_CATEGORIA"){
                if($order == "asc" || $order == "ASC"){
                    $Cars = $this->model->getCarsOrganized($sort, $order);
                    $this->view->response($Cars);
                }
                elseif($order == 'desc' || $order == 'DESC'){
                    $Cars = $this->model->getCarsOrganized($sort, $order);
                    $this->view->response($Cars);
                }
            }
            else{
                $this->view->response("Valor de variables incorrecto", 400);
            }
        }
        //Sino muestra normal
        if (!isset($order) && !isset($sort)) {

        $Cars = $this->model->getAll();
        $this->view->response($Cars);
        }
        else{ (!isset($order) && !isset($sort));
            $this->view->response("Error en la consulta", 400);
        }
    }

    public function getCar($params = null){
        $id = $params [':ID'];
        $Car = $this->model->get($id);

        if($Car)
            $this->view->response($Car);
        else
            $this->view->response("El vehiculo con el id=$id no existe, ERROR", 404);
    }

    public function deleteCar($params = null){
        $id = $params[':ID'];

        $car = $this->model->get($id);
        if($car){
            $this->model->delete($id);
            $this->view->response($car);                              
        }
        else
            $this->view->response("El vehiculo con el id=$id no existe, ERROR", 404);
    }


    // No se necesitan paramatros, pero por las dudas se pone
    public function insertCar($paramas = null){
        $car = $this->getData();

        if(empty($car->marca) || empty($car->modelo) || empty($car->fecha_creacion) || empty($car->precio) || empty($car->descripcion) || empty($car->id_categoria)){
            $this->view->model->response("Complete los datos", 400);
        }
        else{
            $id = $this->model->insert($car->marca, $car->modelo, $car->fecha_creacion, $car->precio, $car->descripcion, $car->id_categoria);
            $car = $this->model->get($id);
            $this->view->response($car, 201);
        }
    }
}