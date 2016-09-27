<?php

class AbstractController extends CI_Controller {
    function __construct(){ parent::__construct(); }

    public function index(){
        if(!$this->session->userdata('is_logged_in')){
            redirect('login/restricted');
        }
    }
}