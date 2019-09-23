<?php

class SetPreface_model extends CI_Model
{

   
    public function SelPreface()
    {
        return $this->db->select('*')
                    ->from('userdata')
                    ->where('application','Preface')
                    ->get()
                    ->row();
    }
}
