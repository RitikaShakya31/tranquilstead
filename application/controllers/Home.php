<?php
class Home extends CI_Controller

{
    public function index()
    {
        $data['title'] = 'Home';
        $data['cat'] = $this->CommonModal->getAllRowsInOrder('category' , 'category_name' , 'DESC');
        $this->load->view('includes/header-link', $data);
        $this->load->view('includes/header');
        $this->load->view('home');
        $this->load->view('includes/footer');
    }
    public function subCateDatails($id)
    {
        $data['title'] = 'Detials';
        $data['getSub'] = $this->CommonModal->getSingleRowById('sub_category', ['sub_category_id' => $id]);
        $catId = $data['getSub']['category_id'];
        $data['getCat'] = $this->CommonModal->getSingleRowById('category', ['category_id' => $catId]);
        $this->load->view('includes/header-link', $data);
        $this->load->view('includes/header');
        $this->load->view('details');
        $this->load->view('includes/footer');
    }
}
