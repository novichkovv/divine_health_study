<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 25.02.15
 * Time: 22:25
 */
class shop_model extends model
{
    public function getCustomersByProduct($product_id)
    {
        $stm = $this->pdo->prepare('
        SELECT
            o.customer_email email,
            o.customer_firstname name,
            CONCAT(a.street, ", ",a.city,", ",a.region, ", ", a.postcode) address,
            a.telephone phone
        FROM
            sales_flat_order_item i
                JOIN
            sales_flat_order o ON o.entity_id = i.order_id
            JOIN
                sales_flat_order_address a ON a.parent_id = i.order_id and a.address_type = "shipping"
        WHERE
            i.product_id = :product_id
        ');
        return $this->get_all($stm, array('product_id' => $product_id));
    }

    public function getLastSixtyDaysSalesByProduct()
    {
        $stm = $this->pdo->prepare('
        SELECT
            count(product_id)
        FROM
            sales_flat_order_item
        GROUP BY product_id;
        ');
        return $this->get_all($stm);
    }

    public function productNameSuggest($string)
    {
        $stm = $this->pdo->prepare('
        SELECT
            value value, entity_id id
        FROM
            catalog_product_entity_varchar
        WHERE
            value LIKE :string
        AND
            attribute_id = 71
        LIMIT 15
        ');
        return $this->get_all($stm, array('string' => '%' . $string . '%'));
    }

    public function getLowStockProducts($quantity)
    {
        $stm = $this->pdo->prepare('
       SELECT
            product_id, p.value name, qty, t.days
        FROM
            cataloginventory_stock_item csi
                JOIN
            catalog_product_entity_varchar p ON csi.product_id = p.entity_id
                AND p.attribute_id = 71
                JOIN
            catalog_product_entity cpe ON cpe.entity_id = p.entity_id
            LEFT JOIN
            product_manufacturing_times t ON t.entity_id = p.entity_id
        WHERE
            qty < :quantity
        ');
        return $this->get_all($stm, array('quantity' => $quantity ? $quantity : 3));
    }

    public function getProductManufacturingTimes()
    {
        $stm = $this->pdo->prepare('
        SELECT
            p.entity_id id, value name, days
        FROM
            catalog_product_entity_varchar p
                LEFT JOIN
            product_manufacturing_times t ON t.entity_id = p.entity_id
        WHERE p.attribute_id = 71
        ');
        return $this->get_all($stm);
    }

    public function getLowDateProducts($min = 5)
    {
        $stm = $this->pdo->prepare('
        SELECT
            count(s.product_id) count, s.product_id, t.days, count(s.product_id)/60*days m, qty, p.value name
        FROM
            sales_flat_order_item s
        LEFT JOIN
            product_manufacturing_times t ON t.entity_id = s.product_id
        JOIN
            cataloginventory_stock_item q ON q.product_id = t.entity_id
        JOIN
        catalog_product_entity_varchar p ON s.product_id = p.entity_id
            AND p.attribute_id = 71
        WHERE s.created_at > NOW() - INTERVAL 60 DAY
        AND t.days > 0
        GROUP BY product_id
        ');
        $stm->execute();
        $stm->setFetchMode(PDO::FETCH_ASSOC);
        $res = array();
        while($row = $stm->fetch()) {
            if($row['m'] >= $row['qty'] - $min) {
                $res[] = $row;
            }
        }
        return $res;
    }

}