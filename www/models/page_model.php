<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 17.03.15
 * Time: 19:25
 */
class page_model extends model
{
    public function getPage($position)
    {
        $stm = $this->pdo->prepare('
        SELECT
            spc.*,
            sp.id page_id,
            sp.position,
            spt.id id_type,
            spt.type_name
        FROM
            study_pages sp
                JOIN
            study_type_element_link stel USING (id_type)
                JOIN
            study_page_elements spe ON spe.id = stel.id_element
                JOIN
            study_page_content spc ON spc.id_page = sp.id
                AND spc.id_element = stel.id_element
                JOIN
            study_page_types spt ON spt.id = sp.id_type
        WHERE sp.position = :position
        ORDER BY stel.position
        ');
        $res = $this->get_all($stm, array('position' => $position));
        $result = array();
        foreach($res as $k => $v) {
            $result['elements'][$v['content_key']] = $v['varchar_value'] ? $v['varchar_value'] : $v['text_value'];
            if(!$result['type_name']) $result['type_name'] = $v['type_name'];
            if(!$result['id_page']) $result['id_page'] = $v['id_page'];
            if(!$result['id_type']) $result['id_type'] = $v['id_type'];
        }
        return $result;
    }

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
        return $this->get_all($stm, array('id_type' => $id_type));
    }
}