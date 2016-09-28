<?php

require("AbstractController.php");

/**
 * ユーザ一覧のコントローラ
 */
class Users_list extends AbstractController {
    // 表示件数制限
    protected $limit = 1;

    function __construct(){ parent::__construct(); }

    public function index(){
        parent::index();

        $this->search();
    }

    /**
     * サブミット処理を振り分けます。
     */
    public function action(){
        $form = $this->input->post();

        if(isset($form["search"])) {
            // 検索
            parent::clearOffset();
            $this->search();

        }else if(isset($form["clear"])){
            // クリア
            $_POST["userid"] = "";
            $_POST["name"] = "";
            parent::clearOffset();
            $this->search();

        }else if(isset($form["prev"])){
            // 前ページ
            parent::setOffset($this->limit, true);
            $this->search();
            
        }else if(isset($form["next"])){
            // 次ページ
            parent::setOffset($this->limit, false);
            $this->search();
        }
    }

    /**
     * 検索します。
     */
    public function search(){
        $this->load->model('users_model');

        $userid = $this->input->post("userid"); 
        $name = $this->input->post("name");
        $offset = $this->input->post("offset");

        $results = $this->users_model->selectUsers($userid, $name, $this->limit, $offset);
        if($results){
            $data["results"] = $results;
            $data["errors"] = array();
            $data["offset"] = $offset;

            parent::showTemplatePage($data, "pages/users_list");
        }else{
            $data["results"] = array();
            $data["errors"] = array("検索結果が存在しませんでした。");
            $data["offset"] = $offset;

            parent::showTemplatePage($data, "pages/users_list");
        }
    }

    /**
     * ページタイトルを取得します。
     */
    protected function getTitle(){
        return "ユーザ一覧";
    }
}