<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transport_db extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function add_transport($data)
    {
        $this->db->insert("transport", $data);
    }

    public function update_transport($where, $data)
    {
        $this->db->where($where)->update("transport", $data);
    }

    public function get_trasport_list($keyword = NULL)
    {
        if ($keyword == null) {
            $sql = "select admin.firstname, admin.lastname, transport.id,  transport.registration_number, transport.vin_number , transport.transport_mode, transport.transport_capacity, transport.admin_id
  , transport.status,transport.area, transport.reg_date  from transport left join admin on (admin.id = transport.admin_id)";
        } else {

            $sql = "select transport.id,admin.firstname, admin.lastname, transport.area, transport.registration_number, transport.vin_number , transport.transport_mode, transport.transport_capacity, transport.admin_id
  , transport.status, transport.reg_date from transport left join admin on (admin.id = transport.admin_id) where (transport.registration_number like '%" . $keyword . "%' OR transport.area like '%" . $keyword . "%')  ";
        }

        $query = $this->db->query($sql);

        return ! empty($query) ? $query->result_array() : FALSE;
    }
    
    
    
    public function admin_get_trasport_list($admin_id = 0)
    {
   
            $sql = "select admin.firstname, admin.lastname, transport.id,  transport.registration_number, transport.vin_number , transport.transport_mode, transport.transport_capacity, transport.admin_id
  , transport.status,transport.area, transport.reg_date  from transport left join admin on (admin.id = transport.admin_id) where transport.admin_id = $admin_id";
        
        
        $query = $this->db->query($sql);
        
        return ! empty($query) ? $query->result_array() : FALSE;
    }

    public function get_transport_by_id($id)
    {
        $sql = "select * from transport where id = $id";

        $query = $this->db->query($sql);

        return ! empty($query) ? $query->row_array() : FALSE;
    }
    
    
    
    function  check_transport_availability($transport_id){
        
        $sql = "select * from trip where (trip_status = 2 AND transport_id = $transport_id)";
        
        
        $query = $this->db->query($sql);
        
        return ! empty($query) ?  $query->row_array() : false;
    }
}

?>