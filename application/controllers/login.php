<?php

class login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model', 'login');
    }
    public function index()
    {
        $this->load->view('vLogin');
    }
    public function check()
    {
        if (empty($this->input->post('Soul'))) {
            $msg['error'] = true;
            $msg['msg']   = "請輸入密碼!";
        } else {
            $data = $this->login->checkUser();
            if ($this->input->post('Soul') != $data->row()->value) {
                $msg['error'] = true;
                if ($data->row()->memo) {
                    $msg['msg'] = "提示:" . $data->row()->memo;
                }
            } else {
                $msg['msg'] = "登入中!請稍後...";
            }

        }

        echo (json_encode($msg));
    }
}
