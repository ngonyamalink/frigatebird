<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_db extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function login($data)
    {
        $email = $data['email'];
        $password = $data['password'];

        $sql = "select * from admin where ( email = '$email' and password = '$password')";

        $query = $this->db->query($sql);
        return ! empty($query) ? $query->row_array() : FALSE;
    }

    public function update_admin_profile($where, $data)
    {
        $this->db->where($where)->update("admin", $data);
    }
}

?>