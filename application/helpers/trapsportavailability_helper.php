<?php 

if(!function_exists("gettransportavailability")){
    
    function gettransportavailability($transport_id){
        $CI = &get_instance();
        $CI->load->model("transport_db");
       return $CI->transport_db->check_transport_availability($transport_id);
        
    }
}

?>