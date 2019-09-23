<?php

class SetMenuData_model extends CI_Model
{
    public function MenuInset($data)
    {
        $this->db->insert('setmenu', $data);
        return $this->db->insert_id('serive');
    }
    public function SelMenuList()
    {
        return $this->db->select('*')
                    ->from('setmenu')
                    ->get()
                    ->result();
    }
    public function DelMenu($serive)
    {
        return $this->db->delete('setmenu', array('serive' => $serive));
    }
    public function Deldiarypage($BookmarkCode)
    {
        return $this->db->delete('diarypage', array('pagecode' => $BookmarkCode));
    }
    public function Delarticlepage($BookmarkCode)
    {
        return $this->db->delete('diaryarticle', array('articlecode' => $BookmarkCode));
    }
}
