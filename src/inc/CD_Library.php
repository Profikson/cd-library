<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 9/10/19
 * Time: 10:39 PM
 */

require_once "Router.php";
require_once "Database.php";


class CD_Library
{


    private $router;
    private $db;


    function __construct(  ) {

        $this->db = new Database();
        $this->router = new Router();

    }

    public function start(){

        //start router and get the next controller and action
        $fullAction = $this->router->route();

        //start correct controller
        $this->startController($fullAction);

    }

    /**Language Level
     * @param $fullAction "name of controller and its action"
     */
    private function startController($fullAction){



        if ($this->isAjax()){
            require_once "Model/AjaxModel.php";
            $ajaxModel = new AjaxModel($this->db);
            $ajaxModel->processAjax($fullAction);
            exit;
        }

        $name = $this->defineName($fullAction);
        $action = $this->defineAction($fullAction);

        if ($name==null || $action==null){
            $name="Error";
            $action = "error";
        }

        $controllerName = $name."Controller";
        $modelName = $name."Model";
        $viewName = $name."View";

        require_once "Controller/".$controllerName.".php";
        require_once "View/".$viewName.".php";
        require_once "Model/".$modelName.".php";

        $controller = new $controllerName(new $viewName(new $modelName($this->db)),$action);

    }

    /**
     * @param $fullAction
     * @return null|string - controller|model|view name
     */
    private function defineName($fullAction){
        if ($fullAction!==null){
            $action = explode(':', $fullAction, 2);
            if ($action[0]!="" && $action[0]!=null){
                $appName = $action[0];
                return $appName;
            }

        }

        return null;
    }

    /**
     * @param $fullAction
     * @return null|string - action name
     */
    private function defineAction($fullAction){
        if ($fullAction!==null){
            $action = explode(':', $fullAction, 2);
            $actionName = $action[1] ?? null;
            return $actionName;
        }else
            return null;
    }

    private function isAjax(){

        if (isset($_POST["isAjax"]))
            return true;

    }

}