<?php
/**
 * Created by PhpStorm.
 * User: xyw
 * Date: 2017/4/11
 * Time: 下午6:02
 */
class Refer_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getInfoByMd5($md5=false)
    {
        if(false===$md5){
            return array();
        }
        $condition = array(
            'md5'=>$md5
        );
        $query = $this->db->where($condition)->get('refer_info');
        return $query->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert('refer_info', $data);
    }

    public function update($data)
    {
        return $this->db->where(['refer_id'=>$data['refer_id']])->update('refer_info',$data);
    }

    public function get_top_links()
    {
        $this->db->order_by('last_visit_time', 'DESC');
        $this->db->order_by('visit_today_num', 'DESC');
        $this->db->limit(50);
        $query = $this->db->get('refer_info');
        return $query->result_array();
    }
}
