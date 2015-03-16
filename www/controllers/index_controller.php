<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 13.03.15
 * Time: 1:50
 */
class index_controller extends controller
{
    public function index()
    {
        $this->view('index');
    }

    public function index_na()
    {
        $this->view('index');
    }
}