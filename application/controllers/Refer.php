<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/16/016
 * Time: 16:32
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Refer extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('refer_model');
    }

    public function index()
    {

    }

    public function success()
    {
        ignore_user_abort( true);
        set_time_limit(0);
        //Array ( [url] => dev.izy123.com [md5] => fa4c423bc1e6166a45d9b5fbc0e8db8a )
//        log_message('error', 'Refer/success--' . $this->session->refer['url']);
        if(!$this->session->refer['url']) {
            return false;
        }
        if(in_array($this->session->refer['url'], [
            'izy123.com',
            'dev.izy123.com',
            'www.izy123.com',
        ])) return false;
        $info = $this->refer_model->getInfoByMd5($this->session->refer['md5']);
        if($info){
            $data = [
                'refer_id'          =>  $info['refer_id'],
                'visit_total_num'   =>  $info['visit_total_num'] + 1,
                'visit_today_num'   =>  $info['visit_today_num'] + 1,
                'last_visit_time'   =>  date('Y-m-d H:i:s')
            ];
            // 重置每天计数
            if($info['last_visit_time'] <= date('Y-m-d 00:00:00')){
                $data['visit_today_num'] = 1;
            }
            return $this->refer_model->update($data);
        }else{
            $websiteInfo = $this->fetchInfo($this->session->refer['url']);
//            $websiteInfo['title'] = preg_split('/[-,.;:?]+/is', $websiteInfo['title'])[0];
//            log_message('error', $websiteInfo['title']);
            $data = [
                'url'               =>  $this->session->refer['url'],
                'md5'               =>  $this->session->refer['md5'],
                'title'             =>  trim($websiteInfo['title']),
                'keywords'          =>  $websiteInfo['keywords'],
                'description'       =>  $websiteInfo['description'],
                'visit_total_num'   =>  $info['visit_total_num'] + 1,
                'visit_today_num'   =>  $info['visit_today_num'] + 1,
                'last_visit_time'   =>  date('Y-m-d H:i:s'),
                'create_time'       =>  date('Y-m-d H:i:s')
            ];
//            log_message('error', json_encode($data));
            return $this->refer_model->insert($data);
        }
    }

    private function fetchInfo($url){
        $url = 'http://' . $url;
        $this->load->helper('curl');
        $this->load->helper('text');

        $title = $keywords = $description = '';

        $html = curl_get($url);
        if($html!=false){
            $doc = new DOMDocument();
            @$doc->loadHTML($html);
            //get and display what you need:
            $title = $doc->getElementsByTagName('title')->item(0)->nodeValue;
            $metas = $doc->getElementsByTagName('meta');
            for ($i = 0; $i < $metas->length; $i++) {
                $meta = $metas->item($i);
                if ($meta->getAttribute('name') == 'keywords')
                    $keywords = $meta->getAttribute('content');
                if ($meta->getAttribute('name') == 'description')
                    $description = $meta->getAttribute('content');
            }
        }

        return [
            'title'         =>  mb_substr($title, 0, 20),
            'keywords'      =>  mb_substr($keywords, 0, 100),
            'description'   =>  mb_substr($description, 0, 200)
        ];
    }
}
