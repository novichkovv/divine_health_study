<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 13.03.15
 * Time: 19:13
 */
class four_o_four_controller extends controller
{
    public function index()
    {
        $this->view('404.php');
    }

    public function index_na()
    {
        $this->view('404.php');
    }
}