<?php
/**
 * Created by PhpStorm.
 * User: xyw
 * Date: 2017/4/10
 * Time: 下午3:01
 */

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->is_login()){
            redirect('/login/index');
        }
    }

    public function is_login()
    {
        return $this->session->is_login;
    }
}