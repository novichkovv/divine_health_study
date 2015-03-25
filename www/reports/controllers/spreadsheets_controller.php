<?php
/**
 * Created by PhpStorm.
 * User: enovichkov
 * Date: 20.03.15
 * Time: 11:35
 */
class spreadsheets_controller extends controller
{
    public function index()
    {
        $this->render('tabs', $this->model('spreadsheets')->getSpreadsheets());
        $this->view('spreadsheets' . DS . 'index');
    }

    public function index_ajax()
    {
        switch($_REQUEST['action']) {
            case "save_td":
                $arr = explode('_', $_POST['td_id']);
//                $id_field = $this->model('reports_spreadsheet_fields')->getByField('position', $arr[0]);
                $id_content = $this->model('reports_spreadsheet_content')->getByFields(array('position' => $arr[0],'id_field' => $arr[1]))['id'];
                $row = array();
                if($id_content) {
                    $row['id'] = $id_content;
                }
                $row['id_field'] = $arr[1];
                $row['position'] = $arr[0];
                $row['content'] = $_POST['value'];
                $this->model('reports_spreadsheet_content')->insert($row);
                exit;
                break;
            case "save_color":
                $this->model('reports_spreadsheet_colors')->insert(
                    array(
                        'position'=> $_POST['position'],
                        'id_spreadsheet' => $_POST['id'],
                        'color' => $_POST['color']
                    )
                );
                exit;
                break;
        }
    }

    public function add()
    {
        if($_GET['id']) {
            $this->render('spreadsheet', $this->model('reports_spreadsheets')->getById($_GET['id']));
            $this->render('fields', $this->model('reports_spreadsheet_fields')->getByField('id_spreadsheet', $_GET['id'], true, 'position'));
            if(isset($_POST['add_field_btn'])) {
                if($_POST['old']) {
                    foreach($_POST['old'] as $id => $v) {
                        $row = array();
                        $row['id'] = $id;
                        $row['name'] = $v['name'];
                        $row['position'] = $v['position'];
                        $this->model('reports_spreadsheet_fields')->insert($row);
                    }
                }
                if($_POST['new_name']) {
                    $pos = $this->model('reports_spreadsheet_fields')->getByField('id_spreadsheet', $_GET['id'], false, 'position DESC', '1')['position'];
                    $row = array();
                    $row['id_spreadsheet'] = $_GET['id'];
                    $row['name'] = $_POST['new_name'];
                    $row['position'] = $pos ? ($pos + 1) : 0;
                    $this->model('reports_spreadsheet_fields')->insert($row);
                }
                header('Location: ' . R_SITE_DIR . 'spreadsheets/add/?id=' . $_GET['id']);
            }
        } else {
            if(isset($_POST['add_field_btn'])) {
                $pos = $this->model('reports_spreadsheets')->getAll('position DESC', '1')['position'];
                $id = $this->model('reports_spreadsheets')->insert(array(
                    'name' => $_POST['spreadsheet_name'],
                    'create_date' => date('Y-m-d H:i:s'),
                    'position' => $pos ? ($pos + 1) : 0
                    )
                );
                header('Location: ' . R_SITE_DIR . 'spreadsheets/add/?id=' . $id);
            }
        }
        $this->view('spreadsheets' . DS . 'add');

    }

    public function manage()
    {
        if(isset($_POST['save_changes_btn'])) {
            foreach($_POST['old'] as $id => $row) {
                $row['id'] = $id;
                $this->model('reports_spreadsheets')->insert($row);
            }
            header('Location: ?');
            exit;
        }
        if(isset($_POST['delete_btn'])) {
            $this->model('reports_spreadsheets')->deleteById($_POST['delete_id']);
            header('Location: ?');
            exit;
        }
        $this->render('spreadsheets', $this->model('reports_spreadsheets')->getAll('position'));
        $this->view('spreadsheets' . DS . 'manage');
    }
}