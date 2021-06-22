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

        // クライアントから送信されたPOSTデータを取得
        // POSTデータの取得を試みて取得できた場合は、POSTデータを返し、 
        // 取得できなかった場合は、GETデータの取得を試みる。
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'phone_number' => $this->input->post('phone_number')
        );
        /**
         * データの追加
         * 第一引数にテーブル名を指定し、
         * 第二引数には連想配列、またはオブジェクトデータを指定。
         **/
        return $this->db->insert('users', $data);
    }

    public function update_user($user_id)
    {
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'phone_number' => $this->input->post('phone_number') 
            
        );

        $this->db->where('id', $user_id);
        return $this->db->update('users', $data);
    }
    //現在のユーザーデータを編集フォームに表示する
    public function get_user($user_id)
    {
        $query = $this->db->where('id', $user_id)->get('users');
        return $query->row();
    }

    public function delete_user($user_id)
    {
        return $this->db->where('id', $user_id)->delete('users');
        /**
         * データを削除するために、以下のクエリを生成して実行します
         * DELETE FROM users WHERE id = $user_id
         */
    }

    public function delete_users($user_ids)
    {
        //
        // for($i = 0; $i < count($user_ids); $i++){
        //     $this->db->where('id', $user_ids[$i])->delete('users'); 
        // }

        //上のfor文と同じ
        foreach($user_ids as $user_id){
            $this->db->where('id', $user_id)->delete('users'); 
        }
        
        return;
    }
}
?>