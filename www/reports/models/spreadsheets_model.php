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
            c.position pos,
            s.name,
            s.id,
            f.id as id_field,
            f.name as field
        FROM
            reports_spreadsheets s
                LEFT JOIN
            reports_spreadsheet_fields f ON f.id_spreadsheet = s.id
                LEFT JOIN
            reports_spreadsheet_content c ON c.id_field = f.id
        ORDER BY c.id, f.position, s.position
        ');
        $res = $this->get_all($stm);
        $result = array();
        $stm = $this->pdo->prepare('
        SELECT
            MAX(c.position) max_pos
        FROM
            reports_spreadsheet_content c
        JOIN
            reports_spreadsheet_fields f
            ON c.id_field = f.id
        WHERE id_spreadsheet = :id_spreadsheet');
        foreach($res as $k => $v) {
            foreach($v as $key => $row) {
                $max_pos[$v['id']] = $this->get_row($stm, array('id_spreadsheet' => $v['id']))['max_pos'];
                if(in_array($key, array('id', 'name'))) {
                    $result[$v['id']][$key] = $row;
                } elseif(in_array($key, array('content')) && $v['pos']) {
                        $result[$v['id']]['content'][$v['pos']][$v['id_field']][$key] = $row;
                } elseif(in_array($key, array('field', 'id_field')) && $v['pos']) {
                    $result[$v['id']]['content'][$v['pos']][$v['id_field']]['fields'][$key] = $row;
                }
            }
        }
        $tmp = $this->get_all($this->pdo->prepare('SELECT * FROM reports_spreadsheet_fields'));
        $fields = array();
        foreach($tmp as $v) {
            $fields[$v['id_spreadsheet']][$v['id']] = $v['name'];
            $result[$v['id_spreadsheet']]['fields'][$v['id']] = $v['name'];
        }
        foreach($result as $k => $v) {
            if($v['content']) {
                foreach($v['content'] as $pos => $f) {
                    foreach($fields[$v['id']] as $id_field => $field_name) {

                        if(!$f[$id_field]) {
                            $result[$v['id']]['content'][$pos][$id_field]['fields']['name'] = $field_name;
                            $result[$v['id']]['content'][$pos][$id_field]['fields']['id_field'] = $id_field;
                            $result[$v['id']]['content'][$pos][$id_field]['content'] = '';
                        }
                    }
                }
            }
        }

        foreach($result as $k => $v) {
            if($v['content']) {
                for($i = 1; $i <= $max_pos[$v['id']]; $i ++) {
                    if(!$v['content'][$i]) {
                        foreach($fields[$v['id']] as $id_field => $field_name) {
                            $result[$v['id']]['content'][$i][$id_field]['fields']['name'] = $field_name;
                            $result[$v['id']]['content'][$i][$id_field]['fields']['id_field'] = $id_field;
                            $result[$v['id']]['content'][$i][$id_field]['content'] = '';

                        }
                    }
                    ksort($v['content']);
                }
            }
        }
        return $result;
    }
}