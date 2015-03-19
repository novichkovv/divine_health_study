<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 25.02.15
 * Time: 21:39
 */

class index_controller extends controller
{
    function index()
    {
        $this->view('index');
    }
}