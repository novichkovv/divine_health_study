<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 02.03.15
 * Time: 23:09
 */
class settings_controller extends controller
{
    public function index()
    {
    }

    public function low_stock()
    {
        $emails_model = $this->model('settings', 'low_stock_notify_emails');
        if(isset($_POST['save_settings'])) {
            $emails_model->setOption('enable_low_stock_notifications', $_POST['enable']);
            $emails_model->setOption('low_stock_notifications_quantity', $_POST['quantity']);
            header('Location: ' . R_SITE_DIR . 'settings/low_stock/');
            exit;
        }

        if(isset($_POST['add_email'])) {
            if(!$_POST['email']) {
                $this->render('warning', 'Email Required');
            } else {

                $emails_model->insert(array('email'=> $_POST['email']));
                header('Location: ' . R_SITE_DIR . 'settings/low_stock/');
                exit;
            }
        }

        if(isset($_POST['delete_email_button'])) {
            $emails_model->deleteById($_POST['email']);
            header('Location: ' . R_SITE_DIR . 'settings/low_stock/');
            exit;
        }
        $value['enable'] = $emails_model->getOption('enable_low_stock_notifications');
        $value['quantity'] = $emails_model->getOption('low_stock_notifications_quantity');
        $value['email'] = $emails_model->getAll();
        $this->render('value', $value);

        $this->view('settings' . DS . 'low_stock');
    }
}