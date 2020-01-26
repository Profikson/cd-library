<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 1/18/20
 * Time: 9:38 PM
 */

require_once "View.php";
require_once "AbstractView.php";

class CDView extends View implements AbstractView
{
    /**
     * AppView constructor.
     * @param $modelName CDModel
     */
    function __construct( $modelName ) {
        parent::__construct();

        $this->model = $modelName;
    }

    /**
     * @param $action
     */
    public function displayBody($action){

        if ($action=="add-new-cd"){
            return $this->displayFormCD($this->model->template);
        }elseif ($action=="cd-detail"){
            return $this->displayCDDetail($this->model->template);
        }

    }

    /**
     * @param $data
     */
    //TODO check how to move this method to View
    public function renderPage($data){
        $this->model->manageSession($data);

        $this->displayHeader($data['page-title']);

        $this->model->processData($data);

        $this->displayNotifications();
        $this->displayErrors();

        $this->displayBody($data['action']);

        $this->displayFooter();
    }

    private function displayFormCD($template){

        //TODO load templates based on action
        require_once "templates/CD/add-new-cd.php";

    }

    private function displayCDDetail($template){

        require_once "templates/CD/cd-detail.php";

    }
}