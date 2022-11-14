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
        
       $attribute = $_GET['sort_by'] ?? null;
        $order = $_GET['order'] ?? null;
        $filter = $_GET['filter'] ?? null;
        $message = '';  
        if (isset($attribute) && isset($order)) {

            if (($attribute == 'id' || $attribute == 'marca' || $attribute == 'modelo' || $attribute == 'fecha_creacion'
           || $attribute == 'precio' || $attribute == 'descripcion' || $attribute == 'id_categoria') && 
            ($order == 'asc' || $order == 'desc' || $order == 'ASC' || $order == 'DESC')) {
               $Cars = $this->model->getCarsOrganized($attribute, $order);
               $this->view->response($Cars);
            } else {
               $message .= "Atributo no válido en sort_by y/o en order";
               $this->view->response($message, 400);

          }
        } 
        if(isset($filter) && is_numeric($filter)){
            $Cars = $this->model->filter($filter);
            $this->view->response($Cars);
        }
        elseif ($filter != null){
            $this->view->response("Valor de categorias incorrecto", 400);
        }
        
        else{ 
            $Cars = $this->model->getAll();
            $this->view->response($Cars);
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
            $this->view->response("Vehiculo creado", 201);
        }
    }

    public function updateCar($params = null){
        $id = $params[':ID'];
        $car = $this->getData();
        $car = $this->model->get($id);
        if($car){
            $this->model->update($id,$car->marca, $car->modelo, $car->fecha_creacion, $car->precio, $car->descripcion, $car->id_categoria);
            $this->view->response("Vehiculo modificado", 200);
        }
        else{
            $this->view->response("Complete los datos", 400);
        }
        
    }
}
