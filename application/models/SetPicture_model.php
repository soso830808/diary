<?php

class SetPicture_model extends CI_Model
{
    public function UPBoardFiles($title,$filename){
        $ext   = preg_replace('/^.*\.([^.]+)$/D', '$1', $filename);
        $Picture = now().".".$ext;
        $data  = array(
            'title'     => $title,
            'Picture' => $Picture,
        );
        $this->db->insert('setpicture', $data);
        $serial = $this->db->select('serial')->from('setpicture')->where(array('Picture' => $Picture))->get()->row('serial');
        return $Picture. "#" . $serial."#".$title;
    }
    public function SelPicture(){
         return $this->db->select('*')
                    ->from('setpicture')
                    ->get()
                    ->result();
    }
    public function SetUpdata($table,$data,$where){
        if($where != ''){
            $this->db->where($where);
        }
        return $this->db->update($table, $data);
    }
    public function SetPicture(){
        $isOn = $this->db->select('isOn')
                    ->from('setpicture')
                    ->get()
                    ->row('isOn');
         if($isOn == null){
            return 'null';
         }else{
           $Picture =  $this->db->select('Picture')
                    ->from('setpicture')
                    ->where(array('serial' => $isOn))
                    ->get()
                    ->row('Picture');
            return $Picture;
         }
    }
}
