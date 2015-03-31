<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 02.03.15
 * Time: 22:11
 */

define('DS', DIRECTORY_SEPARATOR);
define('ROOT_DIR', realpath($_SERVER['ROOT_DIRECTORY']) . DS);
define('SITE_DIR', 'http://' . $_SERVER['HTTP_HOST'] . '/');
define('R_ROOT_DIR', ROOT_DIR . 'reports' . DS);
define('R_SITE_DIR', SITE_DIR . 'reports/');

require_once('config.php');
require_once('model.php');
require_once('models' . DS . 'shop_model.php');


//////////////////////////////////////
//////// email low inventory /////////
//////////////////////////////////////
$model = new shop_model('shop');
if($model->getOption('enable_low_stock_notifications')) {
    $low_stock_products = $model->getLowDateProducts($model->getOption('low_stock_notifications_quantity'));
    if($low_stock_products) {

        $subject = 'Low Inventory Stock Product Notification';
        $mail = '<h1>Some products are close to be out of the stock:</h1>' . "\n";
        $mail .= '<table border="1" cellspacing="0"><tr><th>SKU</th><th>Name</th><th>Quantity</th><th>Min Stock</th>' . "\n";
        $mail .= '<th>Manufacturer</th><th>Contact Name</th><th>Contact phone</th><th>Contact email</th><th>Cost</th><th>Link</th></tr>'. "\n";
        foreach($low_stock_products as $v) {
            $mail .= '<tr><td>' . $v['sku'] . '</td><td>' . $v['name'] . '</td><td>' . ceil($v['m']) . '</td><td>' . $v['minimum'] . '</td>' . "\n";
            $mail .= '<td>' . $v['manufacturer'] . '</td><td>' . $v['contact_name'] . '</td><td>' . $v['contact_phone'] . '</td><td>' . $v['contact_email'] . '</td><td>' . $v['cost'] . '</td>' . "\n";
            $mail .= '<td><a target="_blank" class="btn btn-icon btn-default" href="' .
                SITE_DIR . 'index.php/admin/catalog_product/edit/id/' . $v['product_id'] . '/">Edit</a></td></tr>' . "\n";
        }
        $mail .= '</table><br /><br />' . "\n";
        $mail .= '<a href="http://shop.drcolbert.com/reports/reports/low_stock/">Go to Reports</a><br />';
        $mail .= '<a href="http://shop.drcolbert.com/index.php/admin/catalog_product/index/">Manage Products</a>';
        $model->table = 'low_stock_notify_emails';
        $from = 'info@drcolbert.com';
        foreach($model->getAll() as $row) {
            $to = $row['email'];
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
            $headers .= 'To: ' . $to . "\r\n";
            $headers .= 'From: Divine Health Reports <info@drcolbert.com>' . "\r\n";
            mail($to, $subject, $mail, $headers);
        }

    }
}


