<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('sys_model');
        $this->load->model('notice_model');
        $this->load->model('cate_model');
        $this->load->model('link_model');
    }

    /**
     * 首页
     */
	public function index()
	{
        $data['sys_info'] = $this->sys_model->get_sys_info();
        $data['notice'] = $this->notice_model->get_notice();
        $data['cates'] = $this->cate_model->get_cates();
        $data['links'] = $this->link_model->get_main_links();
        $this->load->view('public/header_front', $data);
        $this->load->view('home/index', $data);
        $this->load->view('public/footer_front', $data);
        $this->output->cache($data['sys_info']['cache_time']);
	}

    /**
     * 分类页
     * @param bool $cate_id
     */
	public function cate($cate_id = false)
    {
        $this->load->library('pagination');
        $config['base_url'] = base_url('/home/cate/').$cate_id.'/page';// 'http://example.com/index.php/test/page/';
        $config['first_link'] = '首页';
        $config['last_link'] = '尾页';
        $config['total_rows'] = $this->cate_model->get_count();
        $config['per_page'] = $this->sys_model->get_sys_info()['per_page'];
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $start = ($this->pagination->cur_page-1) * $config['per_page'];
        $start = $start < 0 ? 0 : $start;
        $data['links'] = $this->link_model->get_page_links($start,$config['per_page'],$cate_id);
        $data['sys_info'] = $this->sys_model->get_sys_info();
        $data['notice'] = $this->notice_model->get_notice();
        $data['cate_info'] = $this->cate_model->get_cates($cate_id);
        $this->load->view('/public/header_front',$data);
        $this->load->view('/home/cate', $data);
        $this->load->view('/public/footer_front',$data);
        $this->output->cache($data['sys_info']['cache_time']);
    }

    public function apply()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', '网站名', 'required');
        $this->form_validation->set_rules('link', '网站地址', 'required');
        $this->form_validation->set_rules('intro', '网站简介', 'required');
        $this->form_validation->set_rules('contact', '联系方式', 'required');
        $this->form_validation->set_rules('friend_link', '友链地址页', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('/home/apply');
        } else {
            $this->load->model('apply_model');
            $this->apply_model->insert_apply($this->input->post());
            show_error('添加申请成功','','提示');
        }
    }
}
