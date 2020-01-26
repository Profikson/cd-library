<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 1/18/20
 * Time: 9:38 PM
 */

require_once "Model.php";

class AppModel extends Model
{


    private $link;
    private $orderBY;
    private $sortDirection;


    function __construct( $database ) {
        parent::__construct($database);
    }

    public function processData($data)
    {

        $this->template['cds'] = $this->db->getCDs($this->orderBY, $this->sortDirection);

        if ($data['httpmethod']!=null and !$this->displayErrors($data['data'])) {

            if ($data['action'] == "dashboard") {

            }

        }else{
//            $this->template['http-data'] = $data['http-data'];
        }
    }


}