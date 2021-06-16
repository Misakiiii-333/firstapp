<?php
class Users_model extends CI_Model {
    /**
     * 「CodeIgniter.php」や他のコアクラスから事前にロードされることはない。
     * ユーザが開発するモデルの基底クラスとなり、ユーザは
     * このクラスを拡張してモデルをコーディングしていくことになる。
     */
    // CI_Modelを拡張して新しいモデルを作成し、データベースライブラリをロード
    public function __construct()
    {
        // ユーザーモデルをこのコントローラにロードする。
        $this->load->database();
    }

    public function index()
    {
        // userモデルのget_usersメソッドを使用して、ユーザーリストを取得
        $data["users"] = $this->users_model->get_users();
        $this->load->view('header');//(特定の)ビューファイルをロードする。

        //ビューにユーザーリストを割り当てる
        $this->load->view('users/index', $data);
        $this->load->view('footer');
    }

    public function get_users()
    {
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function create_user()
    {
        //url_helper.php という名前の URL ヘルパー ファイルをロードする
        $this->load->helper('url');

        //クライアントから送信されたPOSTデータを取得
        //POSTデータの取得を試みて取得できた場合は、POSTデータを返し、 
        //取得できなかった場合は、GETデータの取得を試みる。
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email')
        );
        /**
         * データの追加
         * 第一引数にテーブル名を指定し、
         * 第二引数には連想配列、またはオブジェクトデータを指定。
         **/
        return $this->db->insert('users', $data);
    }


}
?>