<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 03.03.15
 * Time: 21:15
 */
class tools_controller extends controller
{
    public function index(){}

    public function slider()
    {
        $model = $this->model('tools');
        $model->table = 'banner7';
        if(isset($_POST['save_slideshow_btn'])) {
            foreach($_POST['slide'] as $id => $v) {
                $row = array();
                $row['update_time'] = date('Y-m-d H:i:s');
                $row['banner7_id'] = $id;
                $row['order'] = $v['order'];
                $row['status'] = $v['status'];
                $row['link'] = $v['link'];
                $row['title'] = $v['title'];
                if($_FILES['image']['name'][$id] && !$_FILES['image']['error'][$id]) {
                    $row['image'] = '<img src="yoururl/magentothem/banner7/' . $_FILES['image']['name'][$id] . '" height="80px" alt="" />';
                    $dir = SH_ROOT_DIR . 'media' . DS . 'magentothem' . DS . 'banner7' . DS;
                    copy($_FILES['image']['tmp_name'][$id], $dir . $_FILES['image']['name'][$id]);
                }
                if(!$id) {
                    unset($row['banner7_id']);
                    $row['created_time'] = date('Y-m-d H:i:s');
                }
                $model->updateByField($row, 'banner7_id');
            }
            header('Location: ' . R_SITE_DIR . 'tools/slider/');
        }

        if(isset($_POST['delete_slide_btn'])) {
            $model->delete('banner7_id', $_POST['slide_id']);
            header('Location: ' . R_SITE_DIR . 'tools/slider/');
        }
        $this->render('slider', $model->getAll('banner7_id DESC'));
        $this->view('tools' . DS . 'slider');
    }
}