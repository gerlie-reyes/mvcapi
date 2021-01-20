<?php
/**
 * @author Gerlie Reyes
 * 
 * Base class
 * 
 * Default controller
 */
class BaseController
{
    public function __construct()
    {
    }

    public function index()
    {
        echo "Route not found";
    }

    public function model($model)
    {
        $filepath = '../app/Models/' . $model . '.php';

        if (file_exists($filepath)) {
            require_once $filepath;

            return new $model;
        }
    }
}
