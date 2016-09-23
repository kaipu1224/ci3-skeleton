<?php

/**
 * ユーザ情報のモデル
 */
class Users_model extends CI_Model {
    /**
     * ログイン可能か判定します。
     * @param $userid ユーザID
     * @param $password パスワード
     */
    public function can_login($userid, $password) {
        $this->db->where("id", $userid);
        $this->db->where("password", $password);
        $query = $this->db->get("m_users");

        if($query->num_rows() == 1){
            return true;
        }else{
            return false;
        }
    }
}