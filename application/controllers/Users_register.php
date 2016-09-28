<?php

require("AbstractController.php");

/**
 * ユーザ登録のコントローラ
 */
class Users_register extends AbstractController {
    function __construct(){ parent::__construct(); }

    public function index(){
        parent::index();

        $data = array();
        parent::showTemplatePage($data, "pages/users_register");
    }

    /**
     * ページタイトルを取得します。
     */
    protected function getTitle(){
        return "ユーザ登録";
    }
}