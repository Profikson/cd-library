<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 9/10/19
 * Time: 10:39 PM
 */

class Controller
{

    protected $view;
    protected $action;
    protected $data;
    protected $errors;

    function __construct( ) {

    }

    protected function validateInputField($data) {
        $data = htmlspecialchars(strip_tags(trim($data)));
        return $data;
    }


    protected function validateInputArray($data) {
        foreach( $data as $key => $n ) {
            $data[$key] = trim($n);
            $data[$key] = stripslashes($n);
            $data[$key] = htmlspecialchars($n);
        }
        return $data;
    }

    protected function loadVar($varName){

        if (isset($_REQUEST[$varName]) and $_REQUEST[$varName]!="") {
            $this->data['http-data'][$varName] = $this->validateInputField($_REQUEST[$varName]);
            return true;
        }

        return false;
    }

    protected function loadVars($varNames){
        foreach ($varNames as $name){
            if (!$this->loadVar($name))
                $this->errors[] = $name." is missing";
        }
    }


}