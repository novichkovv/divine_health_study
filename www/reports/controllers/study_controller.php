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
        $this->view('study' . DS . 'list');
    }

    public function add()
    {
        if(isset($_POST['add_page_btn'])) {
            $row = array();
            $row['create_date'] = date('Y-m-d H:i:s');
            $row['id_type'] = $_POST['type'];
            $id = $this->model('study_pages')->insert($row);
            switch($_POST['type']) {
                case "1":
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
                    break;
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