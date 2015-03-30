<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 25.02.15
 * Time: 21:39
 */

class index_controller extends controller
{
    function index()
    {
        if($_POST['logout']) {
            $this->logOut();
            header('Location: ' . R_SITE_DIR);
            exit;
        }
        $this->view('index');
    }

    public function index_na()
    {
        if(isset($_POST['login_btn'])) {
            if($this->auth($_POST['login'], md5($_POST['password']), $_POST['remember'])) {
                header('Location: ' . R_SITE_DIR);
                exit;
            } else {
                $this->render('error', true);
            }
        }
        $this->view_only('index_na');
    }
}