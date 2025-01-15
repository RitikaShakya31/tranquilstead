<?php
class Home extends CI_Controller

{
    public function index()
    {
        $data['title'] = 'Home';
        $data['cat'] = $this->CommonModal->getAllRowsInOrder('category' , 'category_name' , 'ASC');
        $this->load->view('includes/header-link', $data);
        $this->load->view('includes/header');
        $this->load->view('home');
        $this->load->view('includes/footer');
    }
}
