<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 1/18/20
 * Time: 9:38 PM
 */

require_once "Model.php";

class ErrorModel extends Model
{

    function __construct( $database ) {
        parent::__construct($database);
    }

    public function processData($data)
    {

        $this->template['action'] = $data['action'];

    }


}