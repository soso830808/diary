<?php

class SetDiary_model extends CI_Model
{
  public function NewDiary($data){
     $this->db->insert('diary', $data);
  }
  public function editSelDiary($serive){
  	 return $this->db->select('*')
                    ->from('diary')
                    ->where('serive',$serive)
                    ->get()
                    ->row();
  }
  public function DelDiary($serive){
     return $this->db->delete('diary', array('serive' => $serive)); 
  }
}
