<?php

class Trip_db extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    
    public function add_trip($data)
    {
        $data['trip_status'] = 0;
        $this->db->insert("trip", $data);
        return $this->db->insert_id();
    }

    // user queries all his/her trips
    public function get_my_trips($data)
    {
        $user_id = $data['user_id'];

      //  $sql = "select * from trip where user_id =$user_id";
        
        
        $sql = "select admin.firstname as drivername, admin.lastname as driversurname, transport.registration_number, trip.id,trip.user_id, trip.starting_point,trip.destination,trip.trip_date, trip.passengers, trip.reg_date, trip.trip_nature, trip.trip_status, user.firstname, user.lastname, user.email from trip left join user on (trip.user_id = user.id) left join transport on (transport.id = trip.transport_id) left join admin on (admin.id =transport.admin_id) where trip.user_id = $user_id";
        

        $query = $this->db->query($sql);

        return ! empty($query) ? $query->result_array() : FALSE;
    }

    // user queries his/her each trip with user id and trip id
    public function get_my_trip($data)
    {
        $sql = "select * from trip where (user_id =" + $data['user_id'] + " and id = " + $data['id'] + ")";

        $query = $this->db->query($sql);

        return ! empty($query) ? $query->row_array() : FALSE;
    }

    // admin
    public function get_all_trips($admin_id)
    {
        $sql = "select transport.registration_number,trip.trip_started_ended,trip.transport_id , trip.id,trip.user_id, trip.starting_point,trip.destination,trip.trip_date, trip.passengers, trip.reg_date, trip.trip_nature, trip.trip_status, user.firstname, user.lastname, user.email from trip left join user on (trip.user_id = user.id) left join transport on (transport.id = trip.transport_id) left join admin on (admin.id =transport.admin_id) where (trip.trip_status <> 4 AND transport.admin_id=$admin_id)";

        $query = $this->db->query($sql);

        return ! empty($query) ? $query->result_array() : FALSE;
    }

    public function update_trip($where, $data)
    {
        $this->db->where($where)->update("trip", $data);
    }

    public function get_trip_by_id($id)
    {
        $sql = "select * from trip where id = $id";

        $query = $this->db->query($sql);

        return ! empty($query) ? $query->row_array() : FALSE;
    }
    
    
    function  get_trip_details($trip_id){
        $sql = "select trip.transport_id, admin.email, trip.starting_point, trip.destination from trip left join transport on (transport.id=trip.transport_id) left join admin on (transport.admin_id = admin.id) where trip.id = $trip_id";
        
        $query = $this->db->query($sql);
        
        return ! empty($query) ? $query->row_array() : FALSE;
    }
    
    
    function get_trip_user_information($trip_id)
    {
        $sql = "select trip.id, trip.user_id, user.email  from trip left join user on (user.id = trip.user_id) where trip.id = $trip_id";
        
        $query = $this->db->query($sql);
        
        return ! empty($query) ? $query->row_array() : FALSE;
    }
}

?>