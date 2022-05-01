<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stat_db extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_stat()
    {
        $sql = "select
(select count(id) from admin) as numdrivers,
(select count(id) from user) as numusers,
(select count(id) from trip) as numtrips,
(select count(id) from transport) as numtransport";

        $query = $this->db->query($sql);

        return ! empty($query) ? $query->row_array() : FALSE;
    }
}