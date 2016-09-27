<?php

require("AbstractController.php");

/**
 * ユーザ一覧のコントローラ
 */
class Users_register extends AbstractController {
    function __construct(){ parent::__construct(); }

    public function index(){
        parent::index();

        $data["title"] = "ユーザ登録";
        $this->show($data);
    }

    function show($data){
        $this->load->view('templates/header', $data);
        $this->load->view('pages/users_register', $data);
        $this->load->view('templates/footer');
    }
}