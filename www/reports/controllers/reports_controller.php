<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 25.02.15
 * Time: 22:16
 */
class reports_controller extends controller
{
    public function index()
    {

    }

    public function customers_by_products()
    {

        $this->model = $this->model('shop');
        if(isset($_POST['export'])) {
            $string = 'firstname;email;address;phone' . "\n";

            foreach($this->model->getCustomersByProduct($_POST['product_id']) as $row)
            {
                $string .= $row['name'] . ';' . $row['email'] . ';' . $row['address'] . ';' . $row['phone'] . "\n";

            }
            header('Content-type:application/csv');
            header('Content-Disposition:attachment;filename=customers_' . str_replace(' ', '_', $_POST['name']) . '_'.date('y-m-d').'.csv');
            echo $string;
            exit;
        }

        if($_REQUEST['ajax']) {
            $this->ajax();
            exit;
        }

        if(isset($_POST['customers_by_products_btn'])) {
            $this->render('res', $this->model->getCustomersByProduct($_POST['product_id']));
        }

        $this->view('reports/customers_by_products');
    }

    public function detox()
    {
        $this->model = $this->model('detox', 'login_users', DB_DETOX_NAME, DB_DETOX_USER, DB_DETOX_PASSWORD);

        if(isset($_POST['export'])) {
            $string = 'firstname;email;date' . "\n";

            foreach($this->model->getAll('sdate DESC') as $row)
            {
                $string .= $row['username'] . ';' . $row['email'] . ';' . date('Y-m-d H:i', strtotime($row['sdate'])) . "\n";
            }
            header('Content-type:application/csv');
            header('Content-Disposition:attachment;filename=detox_subscribers_'.date('y-m-d').'.csv');
            echo $string;
            exit;
        }

        $res = $this->model->getAll('sdate DESC');
        $this->render('res', $res);
        $this->view('reports/detox');
    }

    public function cando()
    {
        $this->model = $this->model('cando', 'wp_users', DB_CHALLENGE_NAME, DB_CHALLENGE_USER, DB_CHALLENGE_PASSWORD);

        if(isset($_POST['export'])) {
            $string = 'firstname;email;date' . "\n";

            foreach($this->model->getAll('sdate DESC') as $row)
            {
                $string .= $row['user_nicename'] . ';' . $row['user_email'] . ';' . date('Y-m-d H:i', strtotime($row['sdate'])) . "\n";
            }
            header('Content-type:application/csv');
            header('Content-Disposition:attachment;filename=cando_subscribers_'.date('y-m-d').'.csv');
            echo $string;
            exit;
        }

        $res = $this->model->getAll('sdate DESC');
        $this->render('res', $res);
        $this->view('reports' . DS . 'cando');
    }

    public function low_stock()
    {
        $res = $this->model('shop')->getLowDateProducts($_GET['quantity'] ? $_GET['quantity'] : $this->model('report_options')->getOption('low_stock_notifications_quantity'));
//        $this->model = $this->model('shop');
//        $res = $this->model->getLowStockProducts($_GET['quantity']);
        $this->render('products', $res);
        $this->view('reports' . DS . 'low_stock');
    }

    public function manufacturing()
    {
        $this->render('products', $this->model('shop')->getProductManufacturingTimes());
        $this->view('reports' . DS . 'manufacturing');
    }

    public function manufacturing_ajax()
    {
        switch($_REQUEST['action']) {
            case "save_td":
                $row = $this->model('product_manufacturing_times')->getByField('entity_id', $_POST['td_id']);
                $row['entity_id'] = $_POST['td_id'];
                $row['days'] = $_POST['value'];
                $this->model('product_manufacturing_times')->insert($row, 1);
                exit;
                break;
        }
    }

    public function signature()
    {
        $this->view('reports' . DS . 'signature');
    }

    protected function ajax()
    {
        switch($_REQUEST['action'])
        {
            case 'product_suggest':
                if(!$_POST['value'])exit;
                $products = $this->model->productNameSuggest($_POST['value']);
                echo json_encode($products);
                break;
        }
    }
}