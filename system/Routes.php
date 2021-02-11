<?php

class RouteErrorFound extends Exception { }

class Route {

    private $routes = [];
    private $root;

    public function root($path)
    {
        $this->root = $path;
    }

    public function get($path)
    {
        array_push($this->routes, $path);
    }

    public function run()
    {
        $requ = $_SERVER['REQUEST_URI'];
        $requ_no_base_url = explode("/", $requ);

        if($requ == "/BackWard/") {
            if(file_exists("../views/".$this->root.".php")) {
                require_once '../views/'.$this->root.'.php';
            } else {
                throw new RouteErrorFound('Get error found');
            }
            
        } else if(in_array(end($requ_no_base_url), $this->routes)) {
            foreach($this->routes as $route)
            {
                if(file_exists("../views/".$route.".php")) {
                    if($route == end($requ_no_base_url)) {
                        require_once '../views/'.$route.'.php';
                    }     
                } else {
                    throw new RouteErrorFound('Get error found');
                }
            }
        } else {
            http_response_code(404);
            throw new RouteErrorFound('Get error found');
        }   
    }
}