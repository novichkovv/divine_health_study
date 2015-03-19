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
            product_id, p.value name, qty
        FROM
            cataloginventory_stock_item csi
                JOIN
            catalog_product_entity_varchar p ON csi.product_id = p.entity_id
                AND p.attribute_id = 71
                JOIN
            catalog_product_entity cpe ON cpe.entity_id = p.entity_id
        WHERE
            qty < :quantity
        ');
        return $this->get_all($stm, array('quantity' => $quantity ? $quantity : 3));
    }

}