<?php 

if(!function_exists("tripstatuses")){
    
    function tripstatuses($usertype){
        
        if($usertype == "user"){
            
            return array(0=>"New", 1=>"Cancelled");
            
        }
        
        if($usertype == "admin"){
            
            return array(0=>"New", 1=>"Cancelled", 2=>"Approved", 3=>"Declined", 4=>"Closed");
            
        }
        
        
    }
}

?>