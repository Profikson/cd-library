<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 1/18/20
 * Time: 9:38 PM
 */

require_once "View.php";
require_once "AbstractView.php";

class ErrorView extends View implements AbstractView
{
    /**
     * AppView constructor.
     * @param $modelName AppModel
     */
    function __construct( $modelName ) {
        parent::__construct();

        $this->model = $modelName;
    }


    public function displayBody($action){

        if ($action=="404"){
            return $this->render404();
        }

    }

    public function renderPage($data){
        //$this->model->manageSession($data);


        header("HTTP/1.0 404 Not Found");
        $this->displayHeader($data['page-title']);

        //$this->model->processData($data);

        //$this->displayNotifications();

        //$this->displayErrors();

        $this->displayBody($data['action']);

        $this->displayFooter();
    }



    private function render404(){

        require_once "templates/Error/404.php";

    }


}