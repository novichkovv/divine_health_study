<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 17.03.15
 * Time: 20:49
 */
class study_model extends model
{
    public function getTypeElements($id_type)
    {
        $stm = $this->pdo->prepare('
        SELECT
            *
        FROM
            study_type_element_link stel
                JOIN
            study_page_elements spe ON stel.id_element = spe.id
        WHERE
            id_type = :id_type
        ORDER BY stel.position
        ');
        $tmp = $this->get_all($stm, array('id_type' => $id_type));
        $res = [];
        foreach($tmp as $v) {
            $res[$v['pos']] = $v;
        }
        ksort($res);
        return $res;
    }

    public function getLastPagePosition()
    {
        $stm = $this->pdo->prepare('SELECT MAX(position) max_pos FROM study_pages');
        return $this->get_row($stm)['max_pos'];
    }

    public function getPage($id_page)
    {
        $stm = $this->pdo->prepare('
        SELECT
            p . *,
            stel.position as el_pos,
            spe.id as id_element,
            form_template,
            template,
            c.id as id_content,
            content_key,
            if(varchar_value != "",
                varchar_value,
                text_value) text
        FROM
            study_pages p
                JOIN
            study_type_element_link stel ON p.id_type = stel.id_type
                JOIN
            study_page_elements spe ON stel.id_element = spe.id
                JOIN
            study_page_content c ON c.id_element = spe.id
                AND c.id_page = p.id
        WHERE
            p.id = :id_page
        ORDER BY stel.position
        ');
        $tmp =  $this->get_all($stm, array('id_page' => $id_page));
        $res = array();
        foreach($tmp as $k => $v) {
            foreach($v as $key => $row) {
                if(in_array($key, array('id', 'position', 'title', 'id_type'))) {
                    $res[$key] = $row;
                } else {
                    $res['elements'][$v['id_element']][$key] = $row;
                }
            }
        }
        return $res;
    }

}