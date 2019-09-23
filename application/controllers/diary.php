<?php

class diary extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model', 'login');
        $this->load->model('SetPicture_model', 'SetPicture');
        $this->load->model('SetPreface_model', 'SetPreface');
        $this->load->model('SetMenuData_model', 'SetMenuData');
        $this->load->model('SetDiary_model', 'SetDiary');
    }
    public function index()
    {
        $this->load->library('base_libraries', 'base_libraries');
        $aView['SetPreface']  = $this->base_libraries->SetPreface();
        $aView['SetPicture']  = $this->base_libraries->SetPicture();
        $aView['SetSoul']     = $this->base_libraries->SetSoul();
        $aView['SetMenu']     = $this->base_libraries->SetMenu();
        $aView['content']     = $this->diarybody();
        $aView['SelMenuList'] = $this->SetMenuData->SelMenuList();
        $aView['background']  = $this->SetPicture->SetPicture();
        echo $this->load->view('vMenu', $aView, true);
    }
    //view
    public function diarybody()
    {

        $data['diarybody']   = $this->login->databody();
        $data['DiaryList']   = $this->DiaryList();
        $data['SetNewDiary'] = $this->SetNewDiary();
        $data['Preface']     = $this->SetPreface->SelPreface();
        return $this->load->view('vDiary', $data, true);
    }
    public function SetNewDiary()
    {
        return $this->load->view('vSetNewDiary', '', true);
    }
    public function DiaryList()
    {
        $data['diarybody'] = $this->login->databody();
        return $this->load->view('vDiaryList', $data, true);
    }
    //data
    public function Preface()
    {
        $data = $this->login->Preface();
        echo (json_encode($data->row()->value));
    }
    public function SaveDiary()
    {
        $datestring = '%Y-%m-%d';
        $time       = time();
        $data       = array(
            "datatime" => mdate($datestring, $time),
            "body"     => htmlspecialchars($this->input->post('newbody')),
            "title"    => $this->input->post('diarytitle'),
        );
        $this->SetDiary->NewDiary($data);
        alert_msg('新增成功', 'diary');
    }
    //ajax
    public function uploadfile()
    {
        $this->load->helper('file');
        $title = $this->input->post('pictitle');
        if (isset($_FILES['files']) && $_FILES['files']['error'] == 0) {
            $Picture       = $this->SetPicture->UPBoardFiles($title, $_FILES['files']['name']);
            $FName         = explode('#', $Picture);
            $upload_folder = "_public/SetPictitle/";
            $upload_path   = $upload_folder . "/" . $FName[0];
            move_uploaded_file($_FILES['files']['tmp_name'], $upload_path);
            echo json_encode(array('Picture' => $FName[0], 'serial' => $FName[1], 'titletext' => $FName[2]));
            exit;
        }
    }
    public function SetPic()
    {
        $data = array(
            "isOn" => $this->input->get('drone'),
        );
        $Picture = $this->SetPicture->SetUpdata('setpicture', $data, '');
    }
    public function SetSoulPass()
    {
        $data = array(
            "value" => $this->input->get('UpPasswod'),
            "memo"  => $this->input->get('UpPassPrompt'),
        );
        $where = array(
            "application" => 'checklogin',
        );
        $this->SetPicture->SetUpdata('userdata', $data, $where);
    }
    public function SavePreface()
    {
        $data = array(
            "value" => htmlspecialchars($this->input->post('Preface')),
            "memo"  => $this->input->post('PrefaceTitle'),
        );
        $where = array(
            "application" => 'Preface',
        );
        $this->SetPicture->SetUpdata('userdata', $data, $where);
    }
    public function editSelDiary()
    {
        $data = $this->SetDiary->editSelDiary($this->input->post('serive'));
        echo json_encode(array('title' => $data->title, 'body' => htmlspecialchars_decode($data->body)));
    }
    public function editSave()
    {
        $data = array(
            "body"  => htmlspecialchars($this->input->post('editbody')),
            "title" => $this->input->post('edittitle'),
        );
        $where = array(
            "serive" => $this->input->post('SaveSerive'),
        );
        $this->SetPicture->SetUpdata('diary', $data, $where);
    }
    public function DelDiary()
    {
        $this->SetDiary->DelDiary($this->input->post('serive'));
    }
    public function SetMenuNew()
    {
        $BookmarkName = $this->input->post('BookmarkName');
        $BookmarkCode = $this->input->post('BookmarkCode');
        $template     = $this->input->post('template');
        $data         = array(
            "BookmarkName" => $BookmarkName,
            "BookmarkCode" => $BookmarkCode,
            "template"     => $template,
        );
        $insert_serive = $this->SetMenuData->MenuInset($data);
        echo $insert_serive;
    }
    public function SetMenuDel()
    {
        $this->SetMenuData->DelMenu($this->input->post('serive'));
        if ($this->input->post('template') == 'page') {
            $this->SetMenuData->Deldiarypage($this->input->post('BookmarkCode'));
        } else {
            $this->SetMenuData->Delarticlepage($this->input->post('BookmarkCode'));
        }
    }

}
