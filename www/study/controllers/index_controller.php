<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 13.03.15
 * Time: 1:50
 */
class index_controller extends controller
{
    public function index()
    {
        if($_POST['logout']) {
            $this->logOut();
            header('Location: ' . SITE_DIR);
        }
        $this->view('index');
    }

    public function index_na()
    {
        if(isset($_POST['login_btn'])) {
            if($this->auth($_POST['login'], md5($_POST['password']), $_POST['remember'])) {
                header('Location: ' . SITE_DIR);
            } else {
                $this->render('error', true);
            }
        }
        $this->view_only('index_na');
    }
}