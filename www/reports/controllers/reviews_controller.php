<?php
/**
 * Created by PhpStorm.
 * User: enovichkov
 * Date: 19.03.15
 * Time: 14:29
 */
class reviews_controller extends controller
{
    public function index()
    {
        $model = $this->model('reviews', 'reports_reviews');
        $this->render('reviews', $model->getAll('create_date DESC'));
        $this->view('reviews' . DS . 'index');
    }

    public function index_ajax()
    {
        $text = $this->model('reviews', 'reports_reviews')->getById($_POST['id']);
        $text['read_mark'] = 1;
        $this->model('reviews', 'reports_reviews')->insert($text);
        echo $text['review'];
        exit;
    }
}