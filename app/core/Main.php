<?php
/**
 * @author Gerlie Reyes
 * 
 * Main class
 * 
 * Loads controller and calls the method based on the url
 * FORMAT: <BASE_URL>/controller/params
 */
class Main
{
    protected $controller = 'BaseController';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {

        $path = $this->getPath();

        // Set the first query param as current controller if file exists
        if (file_exists('../app/Controllers/' . ucwords($path[0]) . '.php')) {
            $this->controller = ucwords($path[0]);

            // Unset to retain the query parameters
            unset($path[0]);
        }

        // Load the controller
        require_once '../app/Controllers/' . $this->controller . '.php';

        // Instantiate controller object
        $this->controller = new $this->controller;

        // Get parameters
        $this->params = $path ? array_values($path) : [];

        // Call the methods based on the request method
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                if (!empty($this->params)) {
                    $this->method = 'get';
                }
                break;
            case 'POST':
                $this->method = 'create';
                break;
            case 'PUT':
                $this->method = 'update';
                break;
            case 'DELETE':
                $this->method = 'delete';
                break;

            default:
                $this->method = 'index';
                break;
        }
        // Call a callback with array of params
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function getPath()
    {
        if (isset($_GET['route'])) {
            $route = rtrim($_GET['route'], '/');
            $route = filter_var($route, FILTER_SANITIZE_URL);
            $route = explode('/', $route);

            return $route;
        }
    }
}
