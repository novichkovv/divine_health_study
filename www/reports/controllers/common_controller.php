<?php
/**
 * Created by PhpStorm.
 * User: enovichkov
 * Date: 19.03.15
 * Time: 18:03
 */
class common_controller extends controller
{
    public function index()
    {
        $count_new_reviews = $this->model('reviews', 'reports_reviews')->countByField('read_mark', 0);
        registry::set('new_reviews', $count_new_reviews ? $count_new_reviews : '');
    }
}