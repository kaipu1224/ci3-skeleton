<?php

class Top extends CI_Controller {
    function __construct(){ parent::__construct(); }

    public function index(){
        if($this->session->userdata('is_logged_in')){
            $data["title"] = "トップページ";
            $this->load->view('templates/header', $data);
            $this->load->view('pages/top');
            $this->load->view('templates/footer');
        }else{
            redirect('login/restricted');
        }
    }
}