<?php

class page extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model', 'login');
        $this->load->model('SetPicture_model', 'SetPicture');
        $this->load->model('SetPreface_model', 'SetPreface');
        $this->load->model('SetMenuData_model', 'SetMenuData');
        $this->load->model('SetPageDiary_model', 'SetPageDiary');
    }
    public function index()
    {
        $this->load->library('base_libraries', 'base_libraries');
        $aView['SetPreface']  = $this->base_libraries->SetPreface();
        $aView['SetPicture']  = $this->base_libraries->SetPicture();
        $aView['SetSoul']     = $this->base_libraries->SetSoul();
        $aView['SetMenu']     = $this->base_libraries->SetMenu();
        $aView['content']     = $this->pagebody();
        $aView['SelMenuList'] = $this->SetMenuData->SelMenuList();
        $aView['background']  = $this->SetPicture->SetPicture();
        echo $this->load->view('vMenu', $aView, true);
    }
    public function pagebody()
    {
        $data['Preface']   = $this->SetPreface->SelPreface();
        $data['code']      = $this->input->get('code');
        $data['serive']    = $this->input->get('serive');
        $data['pageidary'] = $this->SetPageDiary->SelPageDiary($data['code']);
        $data['PageDiary'] = $this->PageDiary($data['code']);
        return $this->load->view('vPage', $data, true);
    }
    public function PageDiary($code)
    {
        $data['diarybody'] = $this->SetPageDiary->SelPageDiary($code);
        return $this->load->view('vPageDiary', $data, true);
    }
    public function SavePageDiary()
    {
        $PageDiary = $this->SetPageDiary->SelDiaryPage($this->input->post('BookmarkCode'));
        if ($PageDiary == 0) {
            $this->SetPageDiary->IntDiaryPage($this->input->post('BookmarkCode'), $this->input->post('newbody'));
            alert_msg('新增成功', 'page?code=' . $this->input->post('BookmarkCode') . '&serive=' . $this->input->post('serive'));
        } else {
            $this->SetPageDiary->UPDiaryPage($this->input->post('BookmarkCode'), $this->input->post('newbody'));
            alert_msg('修改成功', 'page?code=' . $this->input->post('BookmarkCode') . '&serive=' . $this->input->post('serive'));
        }

    }
}
