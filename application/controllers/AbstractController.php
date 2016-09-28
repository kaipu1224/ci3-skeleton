<?php

/**
 * コントローラの基底クラス
 *
 * 以下の変数を共通処理で利用するので上書禁止
 * offset : 検索結果オフセット
 * title : ページタイトル
 */
abstract class AbstractController extends CI_Controller {
    function __construct(){ parent::__construct(); }

    /**
     * ログイン判定を行います。
     */
    public function index(){
        if(!$this->session->userdata('is_logged_in')){
            redirect('login/restricted');
        }
    }

    /**
     * ページネーション用のオフセットをクリアします。
     */
    protected function clearOffset(){
        $_POST["offset"] = 0;
    }

    /**
     * ページネーション用のオフセットを設定します。
     * @param limit 表示件数
     * @param isPrev 前ページ処理判定フラグ 
     */
    protected function setOffset($limit, $isPrev){
        if($isPrev){
            // 前ページ
            $offset = $this->input->post("offset");
            $offset = $offset - $this->limit;
            if($offset < 0){
                $offset = 0;
            }
            $_POST["offset"] = $offset;
        }else{
            // 次ページ
            $offset = $this->input->post("offset");
            $offset = $offset + $this->limit;
            $_POST["offset"] = $offset;
        }
    }

    /**
     * 指定されたページをヘッダー・フッターを含めて表示します。
     * @param data 表示データ
     * @param page ページ名
     */
    protected function showTemplatePage($data, $page){
        $data["title"] = $this->getTitle();

        $this->load->view('templates/header', $data);
        $this->load->view($page, $data);
        $this->load->view('templates/footer');
    }

    /**
     * [抽象メソッド]
     * ページタイトルを取得します。
     */
    abstract protected function getTitle();
}