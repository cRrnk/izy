<?php
/**
 * Created by PhpStorm.
 * User: xyw
 * Date: 2017/4/10
 * Time: 下午5:01
 */

class Cate_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    /**
     * 获取分类目录
     * @param bool $cate_id
     * @param bool $is_admin
     * @return mixed
     */
    public function get_cates($cate_id=false, $is_admin=false)
    {
        $condition = array(
            'status'=>'online',
            'pid'=>0
        );
        if($is_admin) {
            $condition['status<>'] = 'delete';
        }
        if(false===$cate_id){
            $query = $this->db->where($condition)->order_by('sort_order')->get('cate_info');
            return $query->result_array();
        }
        $condition['cate_id'] = $cate_id;
        $query = $this->db->where($condition)->order_by('sort_order')->get('cate_info');
        return $query->row_array();
    }

    public function get_count()
    {
        $condition = array(
            'status<>'=>'delete'
        );
        return $this->db->where($condition)->count_all_results('cate_info');
    }

    public function get_page_cates($start=0,$limit,$is_admin=false)
    {
        $condition = array(
            'status'=>'online'
        );
        if($is_admin) {
            $condition['status<>'] = 'delete';
        }
        $this->db->where($condition);
        $this->db->order_by('sort_order');
        $this->db->limit($limit,$start);
        $query = $this->db->get('cate_info');
        return $query->result_array();
    }

    public function insert($data)
    {
        return $this->db->insert('cate_info', $data);
    }

    public function update($data)
    {
        return $this->db->where(['cate_id'=>$data['cate_id']])->update('cate_info',$data);
    }
}