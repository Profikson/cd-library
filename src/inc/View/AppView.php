<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 1/18/20
 * Time: 9:38 PM
 */

require_once "View.php";
require_once "AbstractView.php";

class AppView extends View implements AbstractView
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

        if ($action=="dashboard"){
            return $this->renderDashboard();
        }

    }

    /**
     * @param $data
     */
    public function renderPage($data){
        $this->model->manageSession($data);

        $this->displayHeader($data['page-title']);

        $this->model->processData($data);

        $this->displayNotifications();

        $this->displayErrors();

        $this->displayBody($data['action']);

        $this->displayFooter();
    }



    private function renderDashboard(){

        require_once "templates/App/dashboard.php";

    }



}