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
	public function category_all()
	{
		$get['category_all'] = $this->CommonModal->getRowByIdInOrder('category', "is_delete = '1'", 'category_name', 'ASC');
		$get['title'] = 'All Category';
		$this->load->view('admin/category_all', $get);
	}

    public function category_add()
	{
		extract($this->input->post());
		$id = $this->input->get('id');
		$dID = $this->input->get('dID');
		$decrypt_id = decryptId($this->input->get('id'));
        $data['image_all'] = $this->CommonModal->getRowById('slider_image', "category_id", $decrypt_id);
		$get = $this->CommonModal->getSingleRowById('category', "category_id = '$decrypt_id'");
		$data['category_name'] = set_value('category_name') == false ? @$get['category_name'] : set_value('category_name');
		$data['sub_name'] = set_value('sub_name') == false ? @$get['sub_name'] : set_value('sub_name');
		if (isset($id)) {
			$data['title'] = 'Edit Category';
		} else {
			$data['title'] = 'Add Category';
		}
		if (isset($dID)) {
			$update = $this->CommonModal->updateRowById('category', 'category_id', decryptId($dID), array('is_delete' => '0'));
			redirect('categoryAll');
			exit;
		}
		if (count($_POST) > 0) {
			$this->form_validation->set_rules('category_name', 'category name', 'required');
			$this->form_validation->set_rules('sub_name', 'sub_name', 'required');
			if ($this->form_validation->run()) {
				$post['category_name'] = trim($category_name);
				$post['sub_name'] = trim($sub_name);
				if (isset($id)) {
					$update = $this->CommonModal->updateRowById('category', 'category_id', $decrypt_id, $post);
					flashData('errors', 'Category Update Successfully');
				} else {
                    $p_id = $this->CommonModal->insertRowReturnIdWithClean('category', $post);
                    $filesCount = count($_FILES['image']['name']);
					if ($filesCount > 0) {
						for ($i = 0; $i < $filesCount; $i++) {
							if ($_FILES['image']['name'] != '') {
								$extension = pathinfo($_FILES["image"]["name"][$i], PATHINFO_EXTENSION);
								$newFilename = round(microtime(true) * 1000);
								$_FILES['files']['name'] = $newFilename . '.' . $extension;
								$_FILES['files']['type'] = $_FILES['image']['type'][$i];
								$_FILES['files']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
								$_FILES['files']['error'] = $_FILES['image']['error'][$i];
								$_FILES['files']['size'] = $_FILES['image']['size'][$i];
								$picture = fullImage('files', 'upload/category/');
								if ($picture) {
									$post2['image_path'] = $picture;
									$post2['category_id'] = $p_id;
									$insert = $this->CommonModal->insertRow('slider_image', $post2);
								}
							}
						}
					}
					flashData('errors', 'Category Add Successfully');
				}
				redirect('category_all');
			}
		}
		$data['setting'] = $this->setting;
		$this->load->view('admin/category_add', $data);
	}

    public function productImageD($id, $img)
	{
		$delete = $this->CommonModal->deleteRowById('slider_image', "category_id = '" . decryptId($id) . "'");
		unlink('upload/category/' . $img);
		redirect($_SERVER['HTTP_REFERER']);
	}

}