<?php
/**
 * Created by PhpStorm.
 * User: xyw
 * Date: 2017/4/10
 * Time: 下午4:59
 */

class Link_model extends CI_Model
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

    /**
     * 获取每个分类下前xx个链接
     * @return mixed
     */
    public function get_main_links()
    {
        $sys_info = $this->get_sys_info();
        $sql = "SELECT * FROM `izy_link_info` WHERE FIND_IN_SET(`link_id`, (SELECT GROUP_CONCAT(link_id) AS link_id FROM (SELECT `cate_id`,SUBSTRING_INDEX(GROUP_CONCAT(`link_id` ORDER BY `sort_order` DESC), ',', {$sys_info['link_show_limit']}) AS link_id FROM `izy_link_info` WHERE `status`='online' GROUP BY `cate_id`) AS temp)) ORDER BY `sort_order` DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_link($link_id=false,$title=false)
    {
        if(false===$link_id){
            return array();
        }
        $condition = array(
            'link_id'=>$link_id
        );
        if($title){
            $this->db->like('title', $title);
        }
        $query = $this->db->where($condition)->get('link_info');
        return $query->row_array();
    }

    /**
     * 获取链接
     * @param bool $cate_id
     * @param bool $is_admin
     * @return mixed
     */
    public function get_links($cate_id = false,$is_admin=false)
    {

        $condition = array(
            'status'=>'online'
        );
        if($is_admin) {
            unset($condition['status']);
            $condition['status<>'] = 'delete';
        }
        $this->db->order_by('sort_order','DESC');
        if(false===$cate_id){
            $query = $this->db->where($condition)->get('link_info');
            return $query->result_array();
        }
        $condition['cate_id'] = $cate_id;
        $query = $this->db->where($condition)->get('link_info');
        return $query->result_array();
    }

    public function get_count()
    {
        $condition = array(
            'status<>'=>'delete'
        );
        return $this->db->where($condition)->count_all_results('link_info');
    }

    public function get_page_links($start=0,$limit,$cate_id=false,$is_admin=false)
    {
        $condition = array(
            'status'=>'online'
        );
        if($cate_id){
            $condition['cate_id'] = $cate_id;
        }
        if($is_admin) {
            unset($condition['status']);
            $condition['status<>'] = 'delete';
        }
        $this->db->where($condition);
        $this->db->order_by('sort_order','DESC');
        $this->db->order_by('link_id','DESC');
        $this->db->limit($limit,$start);
        $query = $this->db->get('link_info');
        return $query->result_array();
    }

    public function insert_link($data)
    {
        return $this->db->insert('link_info', $data);
    }

    public function update_link($data)
    {
        $data['last_time'] = date('Y-m-d H:i:s');
        return $this->db->where(['link_id'=>$data['link_id']])->update('link_info',$data);
    }

}