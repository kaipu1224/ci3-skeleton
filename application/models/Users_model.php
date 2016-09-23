<?php

/**
 * ユーザ情報のモデル
 */
class Users_model extends CI_Model {
    /**
     * ユーザ情報を取得します。
     * @param $userid ユーザID
     * @param $password パスワード
     */
    public function selectByKey($userid, $password) {
        $this->db->where("id", $userid);
        $this->db->where("password", $password);
        $query = $this->db->get("m_users");

        if($query->num_rows() == 1){
            return $query->row(0);
        }else{
            return false;
        }
    }

    /**
     * ユーザ情報を取得します。
     * @param $userid ユーザID
     */
    public function selectById($userid) {
        $this->db->where("id", $userid);
        $query = $this->db->get("m_users");

        if($query->num_rows() == 1){
            return $query->row(0);
        }else{
            return false;
        }
    }

    /**
     * ユーザ情報を名前で検索して取得します。
     * @param $userid ユーザID
     */
    public function selectLikeName($name) {
        $this->db->select("u.id, u.name, c1.code_value as is_valid, c2.code_value as permission")
            ->from("m_users u")
            ->like("u.name", $name, "both")
            ->join("m_code c1", "c1.code_no = '000' and c1.code = u.is_valid","left")
            ->join("m_code c2", "c2.code_no = '001' and c2.code = to_char(u.permission,'FM9')","left")
            ->order_by("u.id", "asc");

        $query = $this->db->get();
        if($query->num_rows() == 0){
            return false;
        }else{
            return $query->result();
        }
    }

    /**
     * ユーザ情報を全件検索します。
     * @return 検索結果
     */
    public function selectAll(){
        $this->db->select("u.id, u.name, c1.code_value as is_valid, c2.code_value as permission")
            ->from("m_users u")
            ->join("m_code c1", "c1.code_no = '000' and c1.code = u.is_valid","left")
            ->join("m_code c2", "c2.code_no = '001' and c2.code = to_char(u.permission,'FM9')","left")
            ->order_by("u.id", "asc");

        $query = $this->db->get();
        if($query->num_rows() == 0){
            return false;
        }else{
            return $query->result();
        }
    }
}