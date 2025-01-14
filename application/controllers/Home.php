<?php
class Home extends CI_Controller

{
    public function index()
    {
        $data['title'] = 'Home';
        $data['cat'] = $this->CommonModal->getRowByOrderWithLimit('category', array('is_delete' => '1'), 'category_id', 'DESC', '20');
        $this->load->view('includes/header-link', $data);
        $this->load->view('includes/header');
        $this->load->view('home');
        $this->load->view('includes/footer');
    }
    public function subCateDatails($id)
    {
        $data['title'] = 'Detials';
        $data['getSub'] = $this->CommonModal->getSingleRowById('sub_category', ['sub_category_id' => $id]);
        $data['allimg'] = $this->CommonModal->getRowByMoreId('subcat_images', ['sub_category_id' => $id]);
        $catId = $data['getSub']['category_id'];
        $data['getCat'] = $this->CommonModal->getSingleRowById('category', ['category_id' => $catId]);
        $this->load->view('includes/header-link', $data);
        $this->load->view('includes/header');
        $this->load->view('details');
        $this->load->view('includes/footer');
    }
    public function cateListing($id)
    {
        $data['title'] = 'Detials';
        $data['getCat'] = $this->CommonModal->getSingleRowById('category', ['category_id' => $id]);
        $catId = $data['getCat']['category_id'];
        $data['getSub'] = $this->CommonModal->getSingleRowById('sub_category', ['category_id' => $catId]);
        $data['allsub'] = $this->CommonModal->getRowByMoreId('sub_category', ['category_id' => $id]);
        $this->load->view('includes/header-link', $data);
        $this->load->view('includes/header');
        $this->load->view('listing');
        $this->load->view('includes/footer');
    }
}
