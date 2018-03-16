<?php
/**
 * Created by PhpStorm.
 * User: xyw
 * Date: 2017/4/10
 * Time: 下午2:23
 */

class Login extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->helper('form');
        $this->load->view('admin/login');
    }

    public function check_login()
    {
        $this->load->model('user_model');
        $this->load->library('form_validation');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/login');
        } else {
            $result = $this->user_model->get_check_info($username);
            if (empty($result)) {
                show_error('没有此用户','','提示');
            }
            if($result['password'] != md5($password)){
                show_error('密码错误','','提示');
            }
            if ($result['status'] != 'online') {
                show_error('账户异常','','提示');
            }
            $this->session->is_login = true;
            $this->session->user_info = $result;
            redirect('/admin/index');
        }

    }

    public function logout()
    {
        $this->session->is_login = false;
        $this->session->user_info = null;
        redirect('/login/index');
    }

}