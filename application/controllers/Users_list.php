<?php

require("AbstractController.php");

/**
 * ユーザ一覧のコントローラ
 */
class Users_list extends AbstractController {
    function __construct(){ parent::__construct(); }

    public function index(){
        parent::index();

        $this->search();
    }

    /**
     * サブミット処理を振り分けます。
     */
    public function do_post(){
        $form = $this->input->post();

        if(isset($form["search"])) {
            // 検索
            $this->search();
        }else if(isset($form["clear"])){
            // クリア
            $_POST["name"] = "";
            $this->search();
        }else{
            // ありえない
        }
    }

    /**
     * 検索します。
     */
    public function search(){
        $this->load->model('users_model');

        $name = $this->input->post("name");

        $results = $this->users_model->selectLikeName($name);
        $data["title"] = "ユーザ一覧";
        if($results){
            $data["results"] = $results;
            $data["errors"] = array();

            $this->load->view('templates/header', $data);
            $this->load->view('pages/users_list', $data);
            $this->load->view('templates/footer');
        }else{
            $data["results"] = array();
            $data["errors"] = array("検索結果が存在しませんでした。");

            $this->load->view('templates/header', $data);
            $this->load->view('pages/users_list', $data);
            $this->load->view('templates/footer');
        }
    }
}