<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 16.03.15
 * Time: 21:00
 */
class study_controller extends controller
{
    public function index()
    {
        $this->render('pages', $this->model('study_pages')->getAll('position'));
        $this->view('study' . DS . 'list');
    }

    public function index_ajax()
    {
        switch($_REQUEST['action']) {
            case 'change_pages_position';
                foreach($_POST['old'] as $id => $v) {
                    $row = [];
                    $row['id'] = $id;
                    $row['position'] = $v['position'];
                    $this->model('study_pages')->insert($row);
                }
                break;
        }
    }

    public function add()
    {
        if(isset($_POST['add_page_btn'])) {

            $row = array();
            $row['create_date'] = date('Y-m-d H:i:s');
            $row['id_type'] = $_POST['type'];
            $row['position'] = $this->model('study')->getLastPagePosition() + 1;
            $row['title'] = $_POST['element'][1]['title'];
            $id = $this->model('study_pages')->insert($row);

            foreach($_POST['element'] as $k => $v) {
                foreach($v as $key => $value) {
                    $row = array();
                    $row['id_page'] = $id;
                    $row['content_key'] = $key;
                    if(strlen($value) < 100) {
                        $row['varchar_value'] = $value;
                    } else {
                        $row['text_value'] = $value;
                    }
                    $row['id_element'] = $k;
                    $this->model('study_page_content')->insert($row);
                }
            }

            if($_FILES['image']['name'] && $_FILES['image']['error'] == 0 ) {
                $name = $_FILES['image']['name'];
                echo $name;
                $dir = ROOT_DIR . 'uploads' . DS . 'study_images' . DS . $id . DS ;
                if(!file_exists($dir)) {
                    mkdir($dir, 0777, true);
                    echo 1;
                }
                echo copy($_FILES['image']['tmp_name'], $dir . $name);
                $row = array();
                $row['id_page'] = $id;
                $row['content_key'] = 'image';
                $row['varchar_value'] = $name;
            }
        }
        if($_GET['id']) {
            $this->render('page', $this->model('study')->getPage($_GET['id']));
        }
        $this->view('study' . DS . 'add');
    }

    public function add_ajax()
    {
        switch($_REQUEST['action']) {
            case "get_form":
                $elements = $this->model('study')->getTypeElements($_POST['type']);
                $this->render('elements', $elements);
                $this->view_only('study' . DS . 'ajax' . DS . 'get_form');
                exit;
                break;
        }

    }
}