<?php

class SetArticleDiary_model extends CI_Model
{
    public function SelArticleDiary($code)
    {
        return $this->db->select(" a.*,b.*,a.serive as menuid")
                    ->FROM('setmenu a')
                    ->join('diaryarticle b', 'a.BookmarkCode = b.articlecode', 'left')
                    ->where(' a.BookmarkCode', $code)
                    ->get()->result();

    }
    public function editSelDiary($serive)
    {
        return $this->db->select('*')
                    ->from('diaryarticle')
                    ->where('serive', $serive)
                    ->get()
                    ->row();
    }
    public function SetUpdata($table, $data, $where)
    {
        if ($where != '') {
            $this->db->where($where);
        }
        return $this->db->update($table, $data);
    }
    public function DelDiary($serive)
    {
        return $this->db->delete('diaryarticle', array('serive' => $serive));
    }
    public function NewDiary($data)
    {
        $this->db->insert('diaryarticle', $data);
    }
}
