<?php
/**
 * Created by PhpStorm.
 * User: xyw
 * Date: 2017/4/10
 * Time: 下午5:09
 */

class Sys_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    /**
     * 获取系统配置信息
     * @return mixed
     */
    public function get_sys_info()
    {
        $query = $this->db->get('sys_info');
        return $query->row_array();
    }

    public function update_sys_info($data)
    {
        return $this->db->update('sys_info',$data);
    }
}