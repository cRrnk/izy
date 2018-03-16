<?php
/**
 * Created by PhpStorm.
 * User: xyw
 * Date: 2017/4/11
 * Time: 下午6:02
 */
class Apply_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function insert_apply($data)
    {
        return $this->db->insert('apply_table', $data);
    }
}
