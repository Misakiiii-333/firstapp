<?php
class Users extends CI_Controller {
/**
 * ユーザーページクラスはCI_Controllerクラスの
 * system/core/Controller.phpで定義されているメソッドや変数に
 * アクセスできる。
 **/
    public function __construct()
    {
        parent::__construct();

        // This line will load user model to this controller
        $this->load->model('users_model');
        $this->load->helper('url'); //6/16追加
    }

    public function index()
    {
        $data["users"] = $this->users_model->get_users();

        // declaring page_title variable
        $data["page_title"] = "List Of Users";

        //ページタイトルデータのヘッダーへの割り当て
        $this->load->view('header', $data); 
        $this->load->view('users/index', $data);
        $this->load->view('footer');
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('url');

        $data["page_title"] = "Create New User";
        //検証ルールを設定する
        $this->form_validation->set_rules('first_name', 'First name', 'required');
        $this->form_validation->set_rules('last_name', 'Last name', 'required');
        $this->form_validation->set_rules('email', 'Email', array('required','valid_email'));

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('header', $data); 
            $this->load->view('users/create', $data);
            $this->load->view('footer');
        } else {
            $this->users_model->create_user();
            redirect(base_url('/')); //ベースURLに移動する
        }
    }
    public function update($user_id)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        //現在のユーザーデータを取得して更新フォームに表示。
        $data["user"] = $this->users_model->get_user($user_id);

        $data["page_title"] = "Update User";

        $this->form_validation->set_rules('first_name', 'First name', 'required');
        $this->form_validation->set_rules('last_name', 'Last name', 'required');
        $this->form_validation->set_rules('email', 'Email', array('required','valid_email'));
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('header', $data); 
            $this->load->view('users/update', $data);
            $this->load->view('footer');
        } else {
            $this->users_model->update_user($user_id);
            redirect(base_url('/'));
        }
    }
    //登録されているユーザーを消去する
    public function delete($user_id)
    {
        $this->users_model->delete_user($user_id);
        redirect(base_url('/'));
    }



}
