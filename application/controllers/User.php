<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model(array(
            "user_db",
            "trip_db",
            "transport_db"
        ));
        $this->load->library(array(
            "session",
            "email"
        ));

        $this->userdata = $this->session->all_userdata();
    }

    public function index()
    {
        $this->load->view('template/user_header');

        $this->load->view('user/index');

        $this->load->view('template/user_footer');
    }

    public function login_form()
    {
        $this->load->view('template/user_header');

        $this->load->view('user/login_form');

        $this->load->view('template/user_footer');
    }

    public function login_auth()
    {
        $data = $this->input->post();

        $data['password'] = do_hash($data['password'], "md5");

        $result = $this->user_db->login($data);

        if (isset($result)) {
            $this->session->set_userdata(array(
                "email" => $result['email'],
                "user_id" => $result['id'],
                "firstname" => $result['firstname'],
                "lastname" => $result['lastname'],
                "is_admin" => "false"
            ));

            redirect(base_url());
        } else {

            redirect(base_url("user/login_form"));
        }
    }

    public function view_requests()
    {
        if (! isset($this->userdata['user_id'])) {

            redirect(base_url("user/login_form"));
        }

        $udata['udata'] = $this->userdata;

        $this->load->view('template/user_header', $udata);

        $data['trips'] = $this->trip_db->get_my_trips($this->userdata);

        $this->load->view('user/view_requests', $data);

        $this->load->view('template/user_footer');
    }

    public function create_request($processed = 0, $transport_id = 0)
    {
        if (! isset($this->userdata['user_id'])) {
            redirect(base_url("user/login_form"));
        }

        if ($processed == 1) {
            $this->session->set_flashdata('success', 'Your trip request was sucessfully submitted. Please check your trip list to keep updated.');
        }

        $udata['udata'] = $this->userdata;

        $this->load->view('template/user_header', $udata);

        $data['transport_id'] = $transport_id;

        $this->load->view('user/create_request', $data);

        $this->load->view('template/user_footer');
    }

    public function send_create_request()
    {
        $data = $this->input->post();

        $data['user_id'] = $this->userdata['user_id'];

        $data['trip_date'] = date("Y-m-d H:i:s");

        $response = $this->trip_db->get_trip_details($this->trip_db->add_trip($data));

        // send email to the driver

        $this->email->from('frigatebird-noreply@ngonyamalink.co.za', 'frigatebird-noreply');
        $this->email->to($response['email']);
        $this->email->subject('Frigate New Trip Request');
        $this->email->message("You have a trip request." . $response['starting_point'] . " >>>" . $response['destination'] . ". Visit https://www.ngonyamalink.co.za/frigatebird/admin/view_requests");

        $this->email->send();

        redirect(base_url("user/create_request/1/" . $data['transport_id']));
    }

    public function registration_form($processed = 0)
    {
        if ($processed == 1) {
            $this->session->set_flashdata('success', 'You have successfully registered with Frigate Bird. Please proceed to login or check your emails for more information.');
        }

        $this->load->view('template/user_header');

        $this->load->view('user/registration_form');

        $this->load->view('template/user_footer');
    }

    public function add_user()
    {
        $data = $this->input->post();

        $data['password'] = do_hash($data['password'], "md5");

        $this->user_db->add_user($data);

        sleep(2);

        $this->email->from('frigatebird-noreply@ngonyamalink.co.za', 'frigatebird-noreply');
        $this->email->to($data['email']);
        $this->email->subject('Frigatebird-Registration');
        $this->email->message('You have succesfully registered with FrigateBird. You can start using the the application - ' . base_url());

        $this->email->send();

        redirect(base_url("user/registration_form/1"));
    }

    public function user_added()
    {
        $this->load->view('template/user_header');

        $this->load->view('user/user_added');

        $this->load->view('template/user_footer');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function forgot_password()
    {
        $this->load->view('template/user_header');

        $this->load->view('user/forgot_password');

        $this->load->view('template/user_footer');
    }

    public function profile_edit_form($processed = 0)
    {
        if (! isset($this->userdata['user_id'])) {
            redirect(base_url("user/login_form"));
        }

        if ($processed == 1) {
            $this->session->set_flashdata('success', 'Profile successfully updated.');
        }

        $udata['udata'] = $this->userdata;

        $this->load->view('template/user_header', $udata);

        $this->load->view('user/profile_edit_form', $udata);

        $this->load->view('template/user_footer');
    }

    public function update_user_profile()
    {
        $fdata = $this->input->post();

        $this->user_db->update_user_profile(array(
            "id" => $this->userdata['user_id']
        ), $fdata);

        $this->session->set_userdata(array(
            "email" => $fdata['email'],
            "firstname" => $fdata['firstname'],
            "lastname" => $fdata['lastname'],
            "is_admin" => "false"
        ));

        redirect(base_url("user/profile_edit_form/1"));
    }

    public function available_transport()
    {
        $data['transport'] = $this->transport_db->get_trasport_list();

        $udata['udata'] = $this->userdata;

        $this->load->view('template/user_header', $udata);

        $this->load->view('user/available_transport', $data);

        $this->load->view('template/user_footer');
    }

    public function request_available_transport($id)
    {
        if (! isset($this->userdata['user_id'])) {
            redirect(base_url("user/login_form"));
        }

        $data = $this->transport_db->get_transport_by_id($id);

        $data['user_id'] = $this->userdata['user_id'];
        unset($data['registration_number']);
        unset($data['vin_number']);
        unset($data['transport_mode']);
        unset($data['transport_capacity']);
        unset($data['admin_id']);
        unset($data['id']);

        // copy

        $data['passengers'] = 1;
        $data['trip_nature'] = 1;
        $this->trip_db->add_trip($data);

        redirect(base_url("user/trip_edit_form/$id"));
    }

    public function trip_edit_form($trip_id, $processed = 0)
    {
        if ($processed == 1) {
            $this->session->set_flashdata('success', 'Your trip was updated. Please view your trip lists to stay updated.');
        }

        $adata['udata'] = $this->userdata;

        $data['trip'] = $this->trip_db->get_trip_by_id($trip_id);

        $this->load->view('template/user_header', $adata);
        $this->load->view('user/trip_edit_form', $data);
        $this->load->view('template/user_footer');
    }

    public function update_trip()
    {
        $data = $this->input->post();

        $this->trip_db->update_trip($where = array(
            "id" => $data['id']
        ), $data);

        redirect(base_url("user/trip_edit_form/$data[id]/1"));
    }

    public function submit_forgot_password()
    {
        $data = $this->input->post();

        $password_hash = do_hash(date('l jS \of F Y h:i:s A'), "md5");

        $this->user_db->update_user_profile(array(
            "email" => $data['email']
        ), array(
            'resetpassword_hash' => $password_hash
        ));

        sleep(2);

        $this->email->from('frigatebird-noreply@ngonyamalink.co.za', 'frigatebird-noreply');
        $this->email->to($data['email']);

        $this->email->subject('Frigate Bird-Forgot-Password');
        $this->email->message('Click on the link to reset password - ' . base_url("user/new_password_form/$password_hash"));

        $this->email->send();

        redirect(base_url("user/forgot_password"));
    }

    public function new_password_form($resetpassword_hash)
    {
        $udata['udata'] = $this->userdata;
        $udata['resetpassword_hash'] = $resetpassword_hash;
        $this->load->view('template/user_header', $udata);
        $this->load->view('user/new_password_form', $udata);
        $this->load->view('template/user_footer');
    }

    public function submit_new_password()
    {
        $data = $this->input->post();

        $this->user_db->update_user_profile(array(
            'resetpassword_hash' => $data['resetpassword_hash']
        ), array(
            "password" => do_hash($data['password'], "md5")
        ));

        redirect(base_url("user/login_form"));
    }
}
