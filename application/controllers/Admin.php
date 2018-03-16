<?php
/**
 * Created by PhpStorm.
 * User: xyw
 * Date: 2017/4/10
 * Time: 下午12:00
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller
{

    public function index()
    {
        $this->load->helper('date');
        $data['now_time'] = mdate('%Y-%m-%d %H:%i:%s');
        $this->load->view('/public/header_admin',$data);
        $this->load->view('/admin/index', $data);
        $this->load->view('/public/footer_admin',$data);
    }
}