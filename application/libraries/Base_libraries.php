<?php
class Base_libraries
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->model('SetPicture_model', 'SetPicture');
        $this->CI->load->model('SetPreface_model', 'SetPreface2');
        $this->CI->load->model('SetMenuData_model', 'SetMenuData');
        $this->CI->load->model('SetDiary_model', 'SetDiary');
    }

    public function SetPreface()
    {
        $data['Preface'] = $this->CI->SetPreface2->SelPreface();
        return $this->CI->load->view('vSetPreface', $data, true);
    }
    public function SetPicture()
    {
        $data['SelPicture'] = $this->CI->SetPicture->SelPicture();
        return $this->CI->load->view('vSetPicture', $data, true);
    }
    public function SetSoul()
    {
        return $this->CI->load->view('vSetSoul', '', true);
    }
    public function SetMenu()
    {
        $data['SelMenuList'] = $this->CI->SetMenuData->SelMenuList();
        return $this->CI->load->view('vSetMenu', $data, true);
    }

}
