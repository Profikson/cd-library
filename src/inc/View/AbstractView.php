<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 1/18/20
 * Time: 11:07 PM
 */

interface AbstractView
{

    public function displayBody($action);
    public function renderPage($data);

}