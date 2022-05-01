<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array(
            "admin_db",
            "trip_db",
            "transport_db"
        ));
        $this->load->library(array(
            "session",
            "email"
        ));

        $this->admindata = $this->session->all_userdata();
    }

    public function index()
    {
        $this->load->view('template/admin_header');
        $this->load->view('admin/login_form');
        $this->load->view('template/admin_footer');
    }

    public function login_form()
    {
        $this->load->view('template/admin_header');
        $this->load->view('admin/login_form');
        $this->load->view('template/admin_footer');
    }

    public function view_requests()
    {

        // for all admin pages
        if ($this->admindata['is_admin'] == 'false') {

            redirect(base_url());
        }

        if (! isset($this->admindata['user_id'])) {
            redirect(base_url("admin/login_form"));
        }

        $adata['adata'] = $this->admindata;

        $this->load->view('template/admin_header', $adata);

        $data['trips'] = $this->trip_db->get_all_trips($this->admindata['user_id']);

        $this->load->view('admin/view_requests', $data);

        $this->load->view('template/admin_footer');
    }

    public function login_auth()
    {
        $data = $this->input->post();

        $data['password'] = do_hash($data['password'], "md5");

        $result = $this->admin_db->login($data);

        if (isset($result)) {
            $this->session->set_userdata(array(
                "email" => $result['email'],
                "user_id" => $result['id'],
                "firstname" => $result['firstname'],
                "lastname" => $result['lastname'],
                "is_admin" => "true"
            ));

            redirect(base_url("admin/view_requests"));
        } else {

            redirect(base_url("admin/login_form"));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function trip_edit_form($trip_id)
    {

        // for all admin pages
        if ($this->admindata['is_admin'] == 'false') {

            redirect(base_url());
        }

        if (! isset($this->admindata['user_id'])) {
            redirect(base_url("admin/login_form"));
        }

        $adata['adata'] = $this->admindata;

        $data['trip'] = $this->trip_db->get_trip_by_id($trip_id);

        $this->load->view('template/admin_header', $adata);
        $this->load->view('admin/trip_edit_form', $data);
        $this->load->view('template/admin_footer');
    }

    public function add_transport_form()
    {

        // for all admin pages
        if ($this->admindata['is_admin'] == 'false') {

            redirect(base_url());
        }

        if (! isset($this->admindata['user_id'])) {
            redirect(base_url("admin/login_form"));
        }

        $adata['adata'] = $this->admindata;

        $this->load->view('template/admin_header', $adata);

        $this->load->view('admin/add_transport_form');

        $this->load->view('template/admin_footer');
    }

    public function send_create_transport()
    {

        // for all admin pages
        if ($this->admindata['is_admin'] == 'false') {

            redirect(base_url());
        }

        if (! isset($this->admindata['user_id'])) {
            redirect(base_url("admin/login_form"));
        }

        $data = $this->input->post();

        $data['admin_id'] = $this->admindata['user_id'];
        $this->transport_db->add_transport($data);

        // START BROADCAST

        // send email out
        $keyword = "email";
        $url_subscriptions = (ENVIRONMENT == 'development') ? "http://localhost:8888/ngonyamalinkwebsite/index.php/welcome/get_subscriptions_json" : "http://www.ngonyamalink.co.za/welcome/get_subscriptions_json";
        $json = file_get_contents($url_subscriptions . "/" . $keyword);
        $emails = json_decode($json, true);

        // send sms out
        $keyword = "phone";
        $url_subscriptions = (ENVIRONMENT == 'development') ? "http://localhost:8888/ngonyamalinkwebsite/index.php/welcome/get_subscriptions_json" : "http://www.ngonyamalink.co.za/welcome/get_subscriptions_json";
        $json = file_get_contents($url_subscriptions . "/" . $keyword);
        $phones = json_decode($json, true);

        // send email push notifications

        $email_string = 'info@ngonyamalink.co.za';

        $cnt = 0;

        foreach ($emails as $value) {
            $cnt = $cnt + 1;
            $email_string = $email_string . "," . $value['email'];
        }

        if ($email_string != NULL) {

            echo ("Email Receipients : " . $email_string);

            $this->email->from('no-reply@ngonyamalink.co.za', 'NginyamaLink Wesbite');
            $this->email->bcc($email_string);
            $this->email->subject("New Transport Around " . $data['area']);
            $this->email->message("New transport has been added onto the system. Proceed to https://www.ngonyamalink.co.za/frigatebird for more.");
            $this->email->send();
        }

        sleep(1);

        $textmessage = str_replace(" ", "+", "New transport has been added onto the system. Proceed to https://www.ngonyamalink.co.za/frigatebird for more.");

        // send sms push notifications
        echo "<br/><br/>";

        $phone_string = '+27633861016';
        $cnt = 0;
        foreach ($phones as $value) {
            $cnt = $cnt + 1;
            $phone_string = $phone_string . "," . $value['phone'];
        }

        $phone_string = substr($phone_string, 1, strlen($phone_string));

        if ($phone_string != NULL) {

            echo ("SMS Receipients : " . $phone_string);

            $url = "https://platform.clickatell.com/messages/http/send?apiKey=uqTlIWcPRviI0IGfaVtBgg==&to=+27713022315&content=$textmessage.";

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

            $response = curl_exec($ch);
            curl_close($ch);

            var_dump($response);
        }

        // END BROADCAST

        redirect(base_url("admin/get_trasport_list"));
    }

    public function get_trasport_list()
    {
        // for all admin pages
        if ($this->admindata['is_admin'] == 'false') {

            redirect(base_url());
        }

        if (! isset($this->admindata['user_id'])) {
            redirect(base_url("admin/login_form"));
        }

        $data['transport'] = $this->transport_db->admin_get_trasport_list($this->admindata['user_id']);

        $adata['adata'] = $this->admindata;

        $this->load->view('template/admin_header', $adata);

        $this->load->view('admin/transport_list', $data);

        $this->load->view('template/admin_footer');
    }

    public function edit_transport_form($id)
    {

        // for all admin pages
        if ($this->admindata['is_admin'] == 'false') {
            redirect(base_url());
        }

        if (! isset($this->admindata['user_id'])) {
            redirect(base_url("admin/login_form"));
        }

        $adata['adata'] = $this->admindata;

        $this->load->view('template/admin_header', $adata);

        $data['transport'] = $this->transport_db->get_transport_by_id($id);

        $this->load->view('admin/edit_transport_form', $data);

        $this->load->view('template/admin_footer');
    }

    public function send_edit_transport()
    {

        // for all admin pages
        if ($this->admindata['is_admin'] == 'false') {

            redirect(base_url());
        }

        if (! isset($this->admindata['user_id'])) {
            redirect(base_url("admin/login_form"));
        }

        $data = $this->input->post();

        $data['admin_id'] = $this->admindata['user_id'];
        $this->transport_db->update_transport($where = array(
            "id" => $data['id']
        ), $data);

        redirect(base_url("admin/get_trasport_list"));
    }

    public function update_trip()
    {
        $data = $this->input->post();

        $this->trip_db->update_trip($where = array(
            "id" => $data['id']
        ), $data);

        $response = $this->trip_db->get_trip_user_information($data['id']);

        $this->email->from('no-reply@ngonyamalink.co.za', 'NginyamaLink Wesbite');
        $this->email->to($response['email']);
        $this->email->subject("Trip Status Changed");
        $this->email->message("Your Trip Status Has Changed To " . tripstatuses("admin")[$data['trip_status']] . " . For more visit https://www.ngonyamalink.co.za/frigatebird");
        $this->email->send();

        redirect(base_url("admin/view_requests"));
    }

    public function driver_application_form($processed = 0)
    {
        if ($processed == 1) {
            $this->session->set_flashdata('success', 'Your application was successfully submitted, we will be in touch.');
        }
        $this->load->view('template/admin_header');
        $this->load->view('admin/driver_application_form');
        $this->load->view('template/admin_footer');
    }

    public function send_driver_application()
    {
        $data = $this->input->post();

        $message = "First name: " . $data['firstname'] . ". Last name " . $data['lastname'] . ". ID Number: " . $data['idnumber'] . ". Licence Number: " . $data['licencenumber'] . ". Email: " . $data['email'] . ". Phone : " . $data['phone'];
        $this->email->from($data['email'], 'NginyamaLink Wesbite');
        $this->email->to("info@ngonyamalink.co.za");
        $this->email->bcc("ndlovmbu@gmail.com");
        $this->email->subject("Frigate Bird Driver Application");
        $this->email->message($message);
        $this->email->send();

        redirect(base_url("admin/driver_application_form/1"));
    }

    public function start_end_trip($trip_id, $transport_id, $trip_text)
    {
        if ($trip_text == "Started") {
            $this->trip_db->update_trip(array(
                "id" => $trip_id,
                "transport_id" => $transport_id
            ), array(
                "trip_started_ended" => $trip_text,
                "trip_start_date" => date("Y-m-d H:i:s")
            ));
        } else if ($trip_text == "Ended") {

            $this->trip_db->update_trip(array(
                "id" => $trip_id,
                "transport_id" => $transport_id
            ), array(
                "trip_started_ended" => $trip_text,
                "trip_end_date" => date("Y-m-d H:i:s"),
                "trip_status" => 4
            ));
        }

        $response = $this->trip_db->get_trip_user_information($trip_id);

        $this->email->from('no-reply@ngonyamalink.co.za', 'NginyamaLink Wesbite');
        $this->email->to($response['email']);
        $this->email->subject("Trip " . $trip_text);
        $this->email->message("Your Trip Status Has Changed To " . $trip_text . ". Proof of payment may be forwadred to frigatebird@ngonyamalink.co.za. For more visit https://www.ngonyamalink.co.za/frigatebird");
        $this->email->send();

        redirect(base_url("admin/view_requests"));
    }
}
