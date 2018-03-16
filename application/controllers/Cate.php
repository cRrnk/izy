<?php
/**
 * Created by PhpStorm.
 * User: xyw
 * Date: 2017/4/10
 * Time: 下午1:40
 */

defined('BASEPATH') OR exit('No direct script access allowed');
class Cate extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cate_model');
//        $this->load->model('link_model');
    }

    public function info()
    {
        $this->load->model('sys_model');
        $this->load->library('pagination');

        $config['base_url'] = base_url('/cate/info/page');// 'http://example.com/index.php/test/page/';
        $config['first_link'] = '首页';
        $config['last_link'] = '尾页';
        $config['total_rows'] = $this->cate_model->get_count();
        $config['per_page'] = $this->sys_model->get_sys_info()['per_page'];
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $start = ($this->pagination->cur_page-1) * $config['per_page'];
        $start = $start < 0 ? 0 : $start;
        $data['cates'] = $this->cate_model->get_page_cates($start,$config['per_page'],true);
        $this->load->view('/public/header_admin',$data);
        $this->load->view('/admin/cate_info', $data);
        $this->load->view('/public/footer_admin',$data);
    }

    public function add()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cate_name', '分类名', 'required');
        $this->form_validation->set_rules('seo_title', 'seo标题', 'required');
        $this->form_validation->set_rules('seo_keyword', 'seo关键字', 'required');
        $this->form_validation->set_rules('seo_desc', 'seo描述', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('/public/header_admin');
            $this->load->view('/admin/cate_add');
            $this->load->view('/public/footer_admin');
        } else {
            $this->cate_model->insert_cate($this->input->post());
            redirect('/cate/info');
        }
    }

    public function edit($cate_id=false)
    {
        if(false===$cate_id) show_error('cate_id 缺失');
        $data['cate_info']  = $this->cate_model->get_cates($cate_id);
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cate_name', '分类名', 'required');
        $this->form_validation->set_rules('seo_title', 'seo标题', 'required');
        $this->form_validation->set_rules('seo_keyword', 'seo关键字', 'required');
        $this->form_validation->set_rules('seo_desc', 'seo描述', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('/public/header_admin',$data);
            $this->load->view('/admin/cate_edit',$data);
            $this->load->view('/public/footer_admin',$data);
        } else {
            $this->cate_model->update_cate($this->input->post());
            redirect('cate/info');
        }

    }
}