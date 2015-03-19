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
        return $this->get_all($stm, array('id_type' => $id_type));
    }

}