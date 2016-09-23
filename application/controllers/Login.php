<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Login
 * ログイン関連処理クラス
 */
class Login extends CI_Controller {
    /**
     * コンストラクタ
     */
    function __construct(){ parent::__construct();}

    /**
     * 初期処理
     */
    public function index(){
        $this->login();
    }

    /**
     * ログイン画面表示
     */
    public function login(){
        $this->load->view('login', array('auth_failed'=>false));
    }

    /**
     * ログイン時のバリデーション
     */
    public function login_validation(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('userid', 'ユーザID', 'trim|required');
        $this->form_validation->set_rules('password', 'パスワード', 'trim|required|md5');

        if($this->form_validation->run()){
            if($this->can_login()){
                redirect('top');
            }else{
                // エラーメッセージ設定
                $this->load->view('login', array('auth_failed'=>true));
            }
        }else{
            $this->load->view('login', array('auth_failed'=>false));
        }
    }

    /**
     * ログイン可能か判定します。
     */
    function can_login(){
        $this->load->model('users_model');

        $userid = $this->input->post('userid');
        $password = $this->input->post('password');

        echo $password;

        if($this->users_model->can_login($userid, $password)){
            // ログイン出来たらセッション情報セット
            $data = array(
                'userid' => $this->input->post('userid'),
                'is_logged_in' => 1
            );
            $this->session->set_userdata($data);
            return true;
        }
        return false;
    }

    /**
     * セッション情報が存在しない場合の処理
     */
    public function restricted(){
        $this->load->view('restricted');
    }

    /**
     * ログアウト処理
     */
    public function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }
}