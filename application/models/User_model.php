<?php
/**
 * Created by PhpStorm.
 * User: xyw
 * Date: 2017/4/10
 * Time: 下午12:01
 */

class User_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    /**
     * @param bool $user_id
     * @return mixed
     */
    public function get_user_info($user_id = false)
    {
        if(false===$user_id) {
            $query = $this->db->where(['status<>'=>'delete'])->get('user_info');
            return $query->result_array();
        }
        $this->db->where(['user_id'=>$user_id]);
        $query = $this->db->get('user_info');
        return $query->row_array();
    }

    /**
     * @param string $username
     * @return array
     */
    public function get_check_info($username='')
    {
        if(''===$username) return array();
        $condition = array(
            'username'=>$username
        );
        $this->db->where($condition);
        $query = $this->db->get('user_info');
        return $query->row_array();
    }

    /**
     * @return mixed
     */
    public function add_user_info()
    {
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );
        return $this->db->insert('user_info', $data);
    }

    /**
     * @param $user_id
     * @return bool
     */
    public function edit_user_info($user_id)
    {
        if(false===$user_id) return false;
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'status'   => $this->input->post('status')
        );
        $this->db->where('user_id',$user_id);
        return $this->db->update('user_info', $data);
    }
}