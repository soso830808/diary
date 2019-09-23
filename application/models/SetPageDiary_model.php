<?php

class SetPageDiary_model extends CI_Model
{
    public function SelPageDiary($code)
    {
        return $this->db->select(" a.*,b.*")
                    ->FROM('setmenu a')
                    ->join('diarypage b', 'a.BookmarkCode = b.pagecode', 'left')
                    ->where(' a.BookmarkCode', $code)
                    ->get()->row();

    }
    public function SelDiaryPage($pagecode)
    {
        return $this->db->select('count(*) as row')
                    ->from('diarypage')
                    ->where('pagecode', $pagecode)
                    ->get()->row('row');
    }
    public function IntDiaryPage($pagecode, $pagebody)
    {
        $data = array(
            'pagecode' => $pagecode,
            'pagebody' => $pagebody,
        );
        $this->db->insert('diarypage', $data);
    }
    public function UPDiaryPage($pagecode, $pagebody)
    {
        $data = array(
            "pagebody" => $pagebody,
        );

        $this->db->where('pagecode', $pagecode);
        $this->db->update('diarypage', $data);
    }
}
