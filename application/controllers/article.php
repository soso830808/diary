<?php

class article extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model', 'login');
        $this->load->model('SetPicture_model', 'SetPicture');
        $this->load->model('SetPreface_model', 'SetPreface');
        $this->load->model('SetMenuData_model', 'SetMenuData');
        $this->load->model('SetArticleDiary_model', 'SetArticleDiary');
    }
    public function index()
    {
        $this->load->library('base_libraries', 'base_libraries');
        $aView['SetPreface']  = $this->base_libraries->SetPreface();
        $aView['SetPicture']  = $this->base_libraries->SetPicture();
        $aView['SetSoul']     = $this->base_libraries->SetSoul();
        $aView['SetMenu']     = $this->base_libraries->SetMenu();
        $aView['content']     = $this->Articlebody();
        $aView['SelMenuList'] = $this->SetMenuData->SelMenuList();
        $aView['background']  = $this->SetPicture->SetPicture();
        echo $this->load->view('vMenu', $aView, true);
    }
    public function Articlebody()
    {
        $data['Preface']      = $this->SetPreface->SelPreface();
        $data['code']         = $this->input->get('code');
        $data['serive']       = $this->input->get('serive');
        $data['Articlediary'] = $this->SetArticleDiary->SelArticleDiary($data['code']);
        $data['ArticleDiary'] = $this->ArticleDiary($data['code']);
        $data['SetNewDiary']  = $this->SetNewDiary($data['code']);
        return $this->load->view('vArticle', $data, true);
    }
    public function ArticleDiary($code)
    {
        $data['diarybody'] = $this->SetArticleDiary->SelArticleDiary($code);
        return $this->load->view('vArticleDiary', $data, true);
    }
    public function SetNewDiary($code)
    {
        $data['diarybody'] = $this->SetArticleDiary->SelArticleDiary($code);
        return $this->load->view('vNewArtDiary', $data, true);
    }
    public function editSelDiary()
    {
        $data = $this->SetArticleDiary->editSelDiary($this->input->post('serive'));
        echo json_encode(array('title' => $data->articletitle, 'body' => htmlspecialchars_decode($data->articlebody)));
    }
    public function editSave()
    {
        $data = array(
            "articlebody"  => htmlspecialchars($this->input->post('editbody')),
            "articletitle" => $this->input->post('edittitle'),
        );
        $where = array(
            "serive" => $this->input->post('SaveSerive'),
        );
        $this->SetArticleDiary->SetUpdata('diaryarticle', $data, $where);
    }
    public function DelDiary()
    {
        $this->SetArticleDiary->DelDiary($this->input->post('serive'));
    }
    public function SaveDiary()
    {
        $data = array(
            "articlecode"  => $this->input->post('BookmarkCode'),
            "articlebody"  => htmlspecialchars($this->input->post('newbody')),
            "articletitle" => $this->input->post('diarytitle'),
        );
        $this->SetArticleDiary->NewDiary($data);
        alert_msg('新增成功', 'article?code=' . $this->input->post('BookmarkCode') . '&serive=' . $this->input->post('serive'));
    }
}
