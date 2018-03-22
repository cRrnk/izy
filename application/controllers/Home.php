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
        //增加来源访问记录
        if(empty($this->session->refer['url']) || (time()-$this->session->refer['time']>=60)) {
            $headerRefer = $this->input->get_request_header('Referer', TRUE);
            $serverRefer = $this->input->server('HTTP_REFERER', true);
            $refer = $headerRefer ?:  $serverRefer;
            if($refer){
                $refer = parse_url($refer);
                $this->session->refer = [
                    'url'   =>  $refer['host'],
                    'md5'   =>  md5($refer['host']),
                    'time'  =>  time()
                ];
            }
        }

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
//        $this->output->cache($data['sys_info']['cache_time']);
    }

    public function refer()
    {
        $this->load->model('refer_model');
        $data['sys_info'] = $this->sys_model->get_sys_info();
        $data['notice'] = $this->notice_model->get_notice();
        $data['links'] = $this->refer_model->get_top_links();
        $this->load->view('public/header_front', $data);
        $this->load->view('home/refer', $data);
        $this->load->view('public/footer_front', $data);
        // $this->output->cache($data['sys_info']['cache_time']);
    }
}
