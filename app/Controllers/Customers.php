<?php

use app\Traits\HasCRUD;

/**
 * @author Gerlie Reyes
 * 
 * Customer class
 * 
 * Class for all the routes of customer CRUD
 */
class Customers extends BaseController
{
    use HasCRUD;

    protected $model;

    public function __construct()
    {
        $this->model = $this->model('Customer');
    }

    public function index()
    {
        // var_dump($this->model->all());
        // echo "Customers controller";
        
        // Check authentication and authorization here
    }

    // public function get($id)
    // {
    //     var_dump($id);
    //     echo response(['id' => $id]);
    // }

    // public function create($data)
    // {
    // }

    // public function save($id, $data)
    // {
    // }

    // public function delete($id)
    // {
    // }
}
