<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 13.03.15
 * Time: 19:10
 */
class page_controller extends controller
{
    public function index_na()
    {
        header('Location: ' . SITE_DIR);
    }

    public function index()
    {
        $page = $this->model('page')->getPage($_GET['number']);
        $elements = $this->model('page')->getTypeElements($page['id_type']);
        $this->render('elements', $elements);
        $this->render('page', $page);
        $this->view('pages' . DS . 'page');
    }
}