<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 9/10/19
 * Time: 10:39 PM
 */

require_once "Controller.php";

class AppController extends Controller
{
    /**
     * AppController constructor.
     * @param $view AppView
     * @param $action
     */
    function __construct( $view, $action ) {
        parent::__construct();
        $this->view = $view;
        $this->processAction($action);
    }


    protected function processAction($action){

        if ($action){
            if ($action == "dashboard"){
                $this->prepareDataDashboard();
            }else{
                exit;
            }

            $this->data['page-title']="CD Library - ".htmlspecialchars($action);

            $this->data['action'] = $action;

            $this->view->renderPage($this->data);
        }
    }

    private function prepareDataDashboard()
    {


        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            $this->data = array();
            $this->errors = array();

            if (!empty($errors))
                $this->data['errors']=$errors;


            $this->data['httpmethod'] = "post";
        }else{
            $this->data['httpmethod'] = null;
        }
    }




}