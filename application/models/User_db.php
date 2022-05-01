<?php

class User_db extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function add_user($data)
    {
        $this->db->insert("user", $data);
    }

    public function login($data)
    {
        $email = $data['email'];
        $password = $data['password'];

        $sql = "select * from user where ( email = '$email' and password = '$password')";

        $query = $this->db->query($sql);

        return ! empty($query) ? $query->row_array() : FALSE;
    }

    public function update_user_profile($where, $data)
    {
        $this->db->where($where)->update("user", $data);
    }

    public function get_resetpassword_hash($email)
    {
        $sql = "select resetpassword_hash from user where email = '$email'";
        $query = $this->db->query($sql);
        return ! empty($query) ? $query->row_array() : false;
    }
}

?>