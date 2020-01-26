<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 1/18/20
 * Time: 9:38 PM
 */

class View
{

    public $model;

    function __construct(  ) {

    }

    protected function displayNotifications()
    {

        if (isset($_SESSION['notification']) and !empty($_SESSION['notification'])){
            echo "<div class='container'>";

            foreach ($_SESSION['notification'] as $notif) {
                echo "<div style='border:solid green 1px;'>" . htmlspecialchars($notif) . "</div>";
                echo "</div>";
            }
            return true;
        }
        return false;

    }
    protected function displayHeader($title){

        require_once "templates/header.php";
    }

    protected function displayFooter(){

        require_once "templates/footer.php";

    }

    protected function displayErrors(){

        if (isset($this->model->template['errors']) and !empty($this->model->template['errors'])){
            echo "<div class='container'>";

            foreach ($this->model->template['errors'] as $error) {
                echo "<div style='border:solid red 1px;'>" . htmlspecialchars($error) . "</div>";

            }
            echo "</div>";
            return true;
        }
        return false;
    }

}