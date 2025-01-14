<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AdminDashboard extends CI_Controller
{

    public function index()
    {
        $data['profile'] = $this->profile_data;
        $data['projectTitle'] = 'Tranquilstead';
        $data['menu_cat'] = 'Dashboard';
        $data['menu_subcat'] = 'Home';
        $data['title'] = 'Welcome! Admin';
        // $data['register'] = $this->CommonModal->getNumRows('register', 'id IS NOT NULL');
        $this->load->view('admin/index', $data);
    }



}