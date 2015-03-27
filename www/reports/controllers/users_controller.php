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
            header('Location: ' . R_SITE_DIR . 'users/groups/');
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
            header('Location: ' . R_SITE_DIR . 'users/groups/');
            exit;
        }

        if($_GET['id']) {
            $this->render('group', $this->model('report_user_groups')->getById($_GET['id']));
        }
        $this->view('users' . DS . 'add_group');
    }

    public function permissions()
    {
        if(isset($_POST['save_permissions_btn'])) {
            $this->model('report_group_routes')->deleteAll();
            foreach($_POST['permission'] as $id_group => $routes) {
                if($routes) {
                    foreach($routes as $id_route) {
                        $row = [];
                        $row['id_group'] = $id_group;
                        $row['id_route'] = $id_route;
                        $this->model('report_group_routes')->insert($row);
                    }
                }
            }
            header('Location: ' . R_SITE_DIR . 'users/permissions/');

        }
        $permissions = [];
        $tmp = $this->model('report_group_routes')->getAll();
        foreach($tmp as $v) {
            $permissions[$v['id_group']][] = $v['id_route'];
        }
        $tmp = $this->model('report_routes')->getAll('position');
        $routes = [];
        foreach($tmp as $v) {
            if(!$v['parent']) {
                $routes[$v['id']] = $v;
            } else {
                $routes[$v['parent']]['children'][$v['id']] = $v;
            }
        }
        $groups = $this->model('report_user_groups')->getAll();

        $result = [];
        foreach($groups as $v) {
            $result[$v['id']]['group_name'] = $v['group_name'];
            $result[$v['id']]['routes'] = $routes;
            foreach($result[$v['id']]['routes'] as $k => $route) {
                if(is_array($permissions[$v['id']]) && in_array($route['id'], $permissions[$v['id']])) {
                    $result[$v['id']]['routes'][$k]['checked'] = true;
                }
                if($route['children']) {
                    foreach($route['children'] as $key => $child) {
                        if(is_array($permissions[$v['id']]) && in_array($child['id'], $permissions[$v['id']])) {
                            $result[$v['id']]['routes'][$k]['children'][$key]['checked'] = true;
                        }
                    }
                }
            }
        }
        $this->render('result', $result);
        $this->view('users' . DS . 'permissions');
    }
}