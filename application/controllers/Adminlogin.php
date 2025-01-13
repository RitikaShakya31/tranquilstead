<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminlogin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (sessionId('user_id') != "") {
			redirect(base_url("AdminDashboard"));
		}
	}
	public function index()
	{
		$data['title'] = 'Admin login  ';
		$data['projectTitle'] = 'Shadi Milan';
		$this->load->view('admin/admin_login', $data);
	}
	public function validatelogin()
	{
		if (count($_POST) > 0) {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$user_id = $this->CommonModal->getRowById('admin_login', 'email', $email);
			if ($user_id) {
				if ($user_id[0]['password'] == $password) {
					$this->session->set_userdata('user_id', $user_id[0]['id']);
					$this->session->set_userdata('user_type', $user_id[0]['admin_type']);
					redirect('AdminDashboard');
				} else {
					$this->session->set_userdata('msg', '<div class="alert alert-danger">Invalid Password</div>');
				}
			} else {
				$this->session->set_userdata('msg', '<div class="alert alert-danger">Invalid username</div>');
			}
			redirect(base_url('admin'));
		}
	}
}
