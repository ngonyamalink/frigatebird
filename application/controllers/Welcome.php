<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

 
    public function __construct()
    {
        parent::__construct();

        $this->load->library(array(
            "session",
            "email"
        ));

        $this->load->model(array(
            "transport_db","Stat_db"
        ));
        
        $this->load->helper("trapsportavailability");

        $this->userdata = $this->session->all_userdata();
    }

    public function index()
    {

        $udata['udata'] = $this->userdata;
        $data['transport'] = $this->transport_db->get_trasport_list();
        $this->load->view('template/welcome_header', $udata);
        $this->load->view('welcome_message', $data);
        $this->load->view('template/welcome_footer');
    }

    public function contact()
    {
        $udata['udata'] = $this->userdata;

        $this->load->view('template/welcome_header', $udata);
        $this->load->view('contact');
        $this->load->view('template/welcome_footer');
    }

    public function about()
    {
        $udata['udata'] = $this->userdata;

        $this->load->view('template/welcome_header', $udata);
        $this->load->view('about');
        $this->load->view('template/welcome_footer');
    }

    public function customised()
    {
        $udata['udata'] = $this->userdata;

        $this->load->view('template/welcome_header', $udata);
        $this->load->view('purchase');
        $this->load->view('template/welcome_footer');
    }

    public function listyourtransport()
    {
        $udata['udata'] = $this->userdata;

        $this->load->view('template/welcome_header', $udata);
        $this->load->view('listyourtransport');
        $this->load->view('template/welcome_footer');
    }

    public function tell_a_friend_form($processed = 0)
    {
        
        if($processed == 1){
            $this->session->set_flashdata('success', 'Thanks fot telling your friend about Frigate Bird.');
            
        }
        $udata['udata'] = $this->userdata;

        $this->load->view('template/welcome_header', $udata);
        $this->load->view('tell_a_friend_form');
        $this->load->view('template/welcome_footer');
    }

    public function submit_tell_a_friend()
    {
        $data = $this->input->post();

        $this->email->from('frigatebird-noreply@ngonyamalink.co.za', 'frigatebird-noreply');
        $this->email->to($data['email']);
        // $this->email->cc('another@another-example.com');
        $this->email->bcc('ngonyamalink@gmail.com');

        $this->email->subject('Frigate Bird-Friend-Referral');
        $this->email->message('Hi ' . $data['email'] . ', Your friends are referring you to start using Frigate Bird for convenient transportation. The link is ' . base_url() . '  This is still a pilot version, Warmest regards, Ngonyama Link Marketing.');

        $this->email->send();

        sleep(2);

        redirect(base_url("welcome/tell_a_friend_form/1"));
    }

    public function tell_a_friend_thankyou()
    {
        $udata['udata'] = $this->userdata;

        $this->load->view('template/welcome_header', $udata);
        $this->load->view('tell_a_friend_thankyou');
        $this->load->view('template/welcome_footer');
    }

    public function privacypolicy()
    {
        $udata['udata'] = $this->userdata;
        $this->load->view('template/welcome_header', $udata);
        $this->load->view('privacypolicy');
        $this->load->view('template/welcome_footer');
    }

    public function termsandconditions()
    {
        $udata['udata'] = $this->userdata;
        $this->load->view('template/welcome_header', $udata);

        $this->load->view('termsandconditions');
        $this->load->view('template/welcome_footer');
    }
    
    public function feedback_form($processed = 0)
    {
        
        if($processed == 1){
            $this->session->set_flashdata('success', 'You have successfully submitted your feedback to Ngonyama Link. We appreciate your contribution.');
            
        }
        
        $this->load->view('template/welcome_header');
        $this->load->view('feedback_form');
        $this->load->view('template/welcome_footer');
    }
    
    public function submit_feedback()
    {
        $data = $this->input->post();
        
        
        if (strlen($data['email'])==0){
            redirect(base_url('welcome/index/subscribed'));
        }else{
            
            sleep(2);
            $this->email->from($data['email'], 'Feedback');
            $this->email->to('info@ngonyamalink.co.za');
            $this->email->subject('Frigate Bird : Feedback ' . $data['subject']);
            $this->email->message($data['message'] . " # " . $data['phone'] . " # " . $data['fullnames'].' # '. $data['email']);
            
            $this->email->send();
            
            sleep(2);
           
            redirect(base_url("welcome/feedback_form/1"));
        }
    }
    
    
    public function frigatebird_json($keyword=null){
        echo json_encode($this->transport_db->get_trasport_list($keyword));
    }
    
    
    public function frigatebird_stat_json(){
        echo json_encode($this->Stat_db->get_stat());
    } 
    
}
