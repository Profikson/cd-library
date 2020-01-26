<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 9/10/19
 * Time: 10:39 PM
 */

require_once "Controller.php";

class CDController extends Controller
{
    /**
     * AppController constructor.
     * @param $view CDView
     * @param $action
     */
    function __construct( $view, $action ) {
        parent::__construct();
        $this->view = $view;
        $this->processAction($action);
    }


    protected function processAction($action){



        if ($action == "cd-detail"){
            $this->prepareDataCDDetail();
        }elseif ($action == "add-new-cd"){
            //prepare and validate HTTP data
            $this->prepareDataCD();
        }else{
            exit;
        }

        $this->data['page-title']="CD Library - ".htmlspecialchars($action);

        $this->data['action'] = $action;

        $this->view->renderPage($this->data);

    }

    private function prepareDataCD()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $this->data = array();
            $this->errors = array();

            $vars = array ("title","artist","genre","year","price");

            $this->loadVars($vars,"post");

            //new or update
            if ($this->loadVar("status-hidden"))
                $this->errors[] = "Error with sending form";


            //load errors if any
            if (!empty($this->errors))
                $this->data['errors']=$this->errors;


            $this->data['httpmethod'] = "post";
        }else{
            $this->data['httpmethod'] = null;
        }
    }


    private function prepareDataCDDetail(){


        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $vars = array ("id");

            $this->loadVars($vars,"get");

            //load errors if any
            if (!empty($this->errors))
                $this->data['errors']=$this->errors;

            $this->data['httpmethod'] = "get";
        }elseif($_SERVER["REQUEST_METHOD"] == "POST"){
            $vars = array ("cd-id-delete");

            $this->loadVars($vars,"post");

            //load errors if any
            if (!empty($this->errors))
                $this->data['errors']=$this->errors;

            $this->data['httpmethod'] = "post";
        }
    }



}