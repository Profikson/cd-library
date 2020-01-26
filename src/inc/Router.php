<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 1/14/20
 * Time: 9:55 PM
 */

class Router
{

    private $routes;

    public function __construct()
    {
        $this->loadRoutes();
    }


    private function loadRoutes(){
        //TODO load from DB
        $this->routes= array ("/" => "App:dashboard",
            ""=>"App:dashboard",
            "/dashboard"=>"App:dashboard",
            "/cd-detail"=>"CD:cd-detail",
            "/add-new-cd"=>"CD:add-new-cd"
            );
    }


    /**
     * @return false|string returns array_search
     */
    public function route(){

        $request = explode('?', $_SERVER['REQUEST_URI'], 2);

        if (isset($this->routes[$request[0]]))
            return $this->routes[$request[0]];

        return false;
      }

}