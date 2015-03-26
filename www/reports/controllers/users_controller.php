<?php
/**
 * Created by PhpStorm.
 * User: enovichkov
 * Date: 26.03.15
 * Time: 12:42
 */
class users_controller extends controller
{
    public function index()
    {
        if(isset($_POST['delete_btn'])) {
            $this->model('report_users')->deleteById($_POST['delete_id']);
            header('Location: ' . R_SITE_DIR . 'users/');
            exit;
        }
        $this->render('users', $this->model('users')->getUsers());
        $this->view('users' . DS . 'list');
    }

    public function add()
    {
        if(isset($_POST['save_user_btn'])) {
            $row = [];
            if($_GET['id']) {
                $row['id'] = $_GET['id'];
            } else {
                $row['create_date'] = date('Y-m-d H:i:s');
            }
            $row['login'] = $_POST['login'];
            $row['user_name'] = $_POST['user_name'];
            $row['user_surname'] = $_POST['user_surname'];
            $row['user_group'] = $_POST['user_group'];
            if($_POST['user_password']) {
                $row['user_password'] = md5($_POST['user_password']);
            }
            $this->model('report_users')->insert($row);
            header('Location: ' . R_SITE_DIR . 'users/');
            exit;
        }

        $this->render('user_groups', $this->model('report_user_groups')->getAll());
        if($_GET['id']) {
            $this->render('user', $this->model('report_users')->getById($_GET['id']));
        }
        $this->view('users' . DS . 'add');
    }

    public function groups()
    {
        if(isset($_POST['delete_btn'])) {
            $this->model('report_user_groups')->deleteById($_POST['delete_id']);
            header('Location: ' . R_SITE_DIR . 'groups/');
            exit;
        }
        $this->render('groups', $this->model('report_user_groups')->getAll());
        $this->view('users' . DS . 'groups');
    }

    public function add_group()
    {
        if(isset($_POST['save_group_btn'])) {
            $row = [];
            if($_GET['id']) {
                $row['id'] = $_GET['id'];
            }
            $row['group_name'] = $_POST['group_name'];
            $this->model('report_user_groups')->insert($row);
            header('Location: ' . R_SITE_DIR . 'groups/');
            exit;
        }

        if($_GET['id']) {
            $this->render('group', $this->model('report_user_groups')->getById($_GET['id']));
        }
        $this->view('users' . DS . 'add_group');
    }
}