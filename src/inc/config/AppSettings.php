<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 1/14/20
 * Time: 8:56 PM
 */


class AppSettings
{
    protected $db_name;
    protected $db_user;
    protected $db_password;
    protected $db_server;

    function __construct() {
        $this->db_name = "";
        $this->db_user = "";
        $this->db_password = "";
        $this->db_server = "";
    }
}

