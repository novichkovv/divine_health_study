<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 13.03.15
 * Time: 19:10
 */
class page_controller extends controller
{
    public function index()
    {

    }

    public function index_na()
    {
        switch($_GET['number']) {
            case "1":
                $this->view('pages' . DS . 'text_page');
                break;
            case "2":
                $this->view('pages' . DS . 'video_page');
        }
    }
}