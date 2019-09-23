<?php

class login_model extends CI_Model
{

    public function checkUser()
    {
        return $this->db->select('value,memo')
                    ->from('userdata')
                    ->where('application', 'checklogin')
                    ->get();
    }
    public function Preface()
    {
        return $this->db->select('value')
                    ->from('userdata')
                    ->where('application', 'Preface')
                    ->get();
    }
    public function databody()
    {
        return $this->db->select('*')
                    ->from('diary')
                    ->get()
                    ->result();
    }
}
