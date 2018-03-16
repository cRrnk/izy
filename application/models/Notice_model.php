<?php
/**
 * Created by PhpStorm.
 * User: xyw
 * Date: 2017/4/10
 * Time: 下午5:08
 */

class Notice_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    /**
     * 获取公告
     */
    public function get_notice()
    {
        $this->db->where(['status'=>'online']);
//        $query = $this->db->get('notice_table',$this->get_sys_info()['notice_limit']);
//        return $query->result_array();
        $query = $this->db->get('notice_table');
        return $query->row_array();
    }

    public function add_notice()
    {

    }

    public function edit_notice()
    {

    }
}