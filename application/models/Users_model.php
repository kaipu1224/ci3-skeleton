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
        return true;
    }
}