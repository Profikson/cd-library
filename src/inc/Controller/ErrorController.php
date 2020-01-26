<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 9/10/19
 * Time: 10:39 PM
 */

require_once "Controller.php";

class ErrorController extends Controller
{
    /**
     * AppController constructor.
     * @param $view ErrorView
     * @param $action
     */
    function __construct( $view, $action ) {
        parent::__construct();
        $this->view = $view;
        $this->processAction($action);
    }


    protected function processAction($action){


        $this->data['page-title']="CD Library - Page not found";

        $this->data['action'] = "404";

        $this->view->renderPage($this->data);
    }





}