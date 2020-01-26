<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 1/18/20
 * Time: 9:38 PM
 */

require_once "Model.php";

class Model
{
    /**
     * @var Database
     */
    protected $db;


    public $template;


    public $notices;


    function __construct( $database ) {
        $this->db = $database;
    }

    public function manageSession($data){
        session_start();
        if (isset($_POST['logout'])){
            session_destroy();
            setcookie("user","");
            header("Location: /");
            exit;
        }
    }

    protected function addToSessionArray($key, $value){
        $_SESSION[$key] = array_push($_SESSION[$key],$value);
    }
}