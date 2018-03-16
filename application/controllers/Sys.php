<?php
/**
 * Created by PhpStorm.
 * User: xyw
 * Date: 2017/4/12
 * Time: 下午5:38
 */

defined('BASEPATH') OR exit('No direct script access allowed');
class Sys extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sys_model');
    }

    public function edit()
    {
        $data['sys_info'] = $this->sys_model->get_sys_info();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('site_name', '网站名', 'required');
        $this->form_validation->set_rules('site_keyword', '网站关键字', 'required');
        $this->form_validation->set_rules('site_desc', '网站描述', 'required');
        $this->form_validation->set_rules('notice_limit', '公告条数', 'required');
        $this->form_validation->set_rules('link_show_limit', '首页分类链接展示数', 'required');
        $this->form_validation->set_rules('per_page', '每页条目数', 'required');
        $this->form_validation->set_rules('footer_info', '页脚信息', 'required');
        $this->form_validation->set_rules('copy_right', '版权所有', 'required');
        $this->form_validation->set_rules('add_source', '是否添加跳转来源参数', 'required');
        $this->form_validation->set_rules('cache_time', '缓存时间', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('/public/header_admin',$data);
            $this->load->view('/admin/sys_edit',$data);
            $this->load->view('/public/footer_admin',$data);
        } else {
            $this->sys_model->update_sys_info($this->input->post());
            redirect('sys/edit');
        }

    }
}