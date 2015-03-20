<?php
/**
 * Created by PhpStorm.
 * User: enovichkov
 * Date: 20.03.15
 * Time: 11:39
 */
class spreadsheets_model extends model
{
    public function getTable($id)
    {
        $stm = $this->pdo->prepare('
        SELECT
            *
        FROM
            reports_spreadsheets s
        JOIN
            reports_spreadsheet_content sc
            ON s.id = sc.id_spreadsheet
        WHERE s.id = :id
        ORDER BY
            sc.position
        ');
        return $this->get_all($stm, array('id' => $id));
    }

    public function getSpreadsheets()
    {
        $stm = $this->pdo->prepare('
        SELECT
            c.id as id_content,
            c.content,
            s.name,
            s.id,
            f.id as id_field,
            f.name as field
        FROM
            reports_spreadsheets s
                JOIN
            reports_spreadsheet_fields f ON f.id_spreadsheet = s.id
                LEFT JOIN
            reports_spreadsheet_content c ON c.id_field = f.id
        ORDER BY c.id, f.position, s.position
        ');
        $res = $this->get_all($stm);
        $result = array();
        foreach($res as $k => $v) {
            foreach($v as $key => $row) {
                if(in_array($key, array('id', 'name'))) {
                    $result[$v['id']][$key] = $row;
                } elseif(in_array($key, array('field', 'id_field'))) {
                    $result[$v['id']]['fields'][$v['id_field']]['field'][$key] = $row;
                } else {
                    $result[$v['id']]['fields'][$v['id_field']]['content'][$key] = $row;
                }
            }
        }
        return $result;
    }
}