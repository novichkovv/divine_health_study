<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 03.03.15
 * Time: 21:18
 */
class tools_model extends model
{
    public function getSlider()
    {
        $this->table = 'banner7';
        return $this->getAll();
    }

//    public function updateSlide($row)
//    {
//        $rows = array();
//        foreach($row as $k => $v) {
//            if($k == 'banner7_id') continue;
//            $rows[] = $k . ' = :';
//        }
//        $stm = $this->pdo->prepare('
//
//        ');
//    }
}