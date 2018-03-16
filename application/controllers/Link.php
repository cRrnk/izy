<?php
/**
 * Created by PhpStorm.
 * User: xyw
 * Date: 2017/4/10
 * Time: 下午1:40
 */

defined('BASEPATH') OR exit('No direct script access allowed');
class Link extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cate_model');
        $this->load->model('link_model');
    }

    public function info()
    {
        $this->load->model('sys_model');
        $this->load->library('pagination');

        $config['base_url'] = base_url('/link/info/page');// 'http://example.com/index.php/test/page/';
        $config['first_link'] = '首页';
        $config['last_link'] = '尾页';
        $config['total_rows'] = $this->link_model->get_count();
        $config['per_page'] = $this->sys_model->get_sys_info()['per_page'];
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $start = ($this->pagination->cur_page-1) * $config['per_page'];
        $start = $start < 0 ? 0 : $start;
        $data['links'] = $this->link_model->get_page_links($start,$config['per_page'],false,true);
        $data['cates']  = $this->cate_model->get_cates();
        $this->load->view('/public/header_admin',$data);
        $this->load->view('/admin/link_info', $data);
        $this->load->view('/public/footer_admin',$data);
    }

    public function add()
    {
        $data['cates']  = $this->cate_model->get_cates();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cate_id', '分类', 'required');
        $this->form_validation->set_rules('title', '链接名', 'required');
        $this->form_validation->set_rules('link', '链接地址', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('/public/header_admin',$data);
            $this->load->view('/admin/link_add',$data);
            $this->load->view('/public/footer_admin',$data);
        } else {
            $this->link_model->insert_link($this->input->post());
            redirect('/link/info');
        }
    }

    public function edit($link_id=false)
    {
        if(false===$link_id) show_error('link_id 缺失');
        $data['link_info'] = $this->link_model->get_link($link_id);
        $data['cates']  = $this->cate_model->get_cates();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cate_id', '分类', 'required');
        $this->form_validation->set_rules('title', '链接名', 'required');
        $this->form_validation->set_rules('link', '链接地址', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('/public/header_admin',$data);
            $this->load->view('/admin/link_edit',$data);
            $this->load->view('/public/footer_admin',$data);
        } else {
            $this->link_model->update_link($this->input->post());
            redirect('link/info');
        }

    }
}