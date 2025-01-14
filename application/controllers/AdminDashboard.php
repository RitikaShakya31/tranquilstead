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
				// if (isset($_FILES['banner']) && !empty($_FILES['banner']['name'])) {
				// 	$banner = imageUploadWithRatio('banner', 'upload/category/', 600, 400, $data['banner']);
				// 	$post['banner'] = $banner;
				// }
				if (isset($id)) {
					$update = $this->CommonModal->updateRowById('category', 'category_id', $decrypt_id, $post);
					$filesCount = count($_FILES['image']['name']);
					if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'][0])) {
						$filesCount = count($_FILES['image']['name']);
						for ($i = 0; $i < $filesCount; $i++) {
							if (!empty($_FILES['image']['name'][$i])) { // चेक करें कि फाइल खाली नहीं है
								$extension = pathinfo($_FILES["image"]["name"][$i], PATHINFO_EXTENSION);
								$newFilename = round(microtime(true) * 1000) . '.' . $extension;
								$_FILES['files']['name'] = $newFilename;
								$_FILES['files']['type'] = $_FILES['image']['type'][$i];
								$_FILES['files']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
								$_FILES['files']['error'] = $_FILES['image']['error'][$i];
								$_FILES['files']['size'] = $_FILES['image']['size'][$i];
								$picture = fullImage('files', 'upload/category/'); // इमेज सेविंग फंक्शन
								if ($picture) {
									$post3['image_path'] = $picture;
									$post3['category_id'] = isset($decrypt_id) ? $decrypt_id : $p_id;
									$this->CommonModal->insertRow('slider_image', $post3);
								}
							}
						}
					} else {
						$file_error = "Please select at least one file to upload.";
					}
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

	public function subcategory_all()
	{
		$data['sub_category'] = $this->CommonModal->getRowByIdInOrder('sub_category', "is_delete = '1'", 'sub_category_name', 'ASC');
		$data['title'] = "All Sub Categories";
		$data['setting'] = $this->setting;
		$this->load->view('admin/subcategory_all', $data);
	}

	public function subCategoryAdd()
	{
		$dID = $this->input->get('dID');
		$id = $this->input->get('id');
		extract($this->input->post());
		$decrypt_id = decryptId($this->input->get('id'));
		$get = $this->CommonModal->getSingleRowById('sub_category', "sub_category_id = '$decrypt_id'");
		$data['sub_category_name'] = set_value('sub_category_name') == false ? @$get['sub_category_name'] : set_value('sub_category_name');
		$data['sub_category_heading'] = set_value('sub_category_heading') == false ? @$get['sub_category_heading'] : set_value('sub_category_heading');
		$data['sub_category_description'] = set_value('sub_category_description') == false ? @$get['sub_category_description'] : set_value('sub_category_description');
		$data['category_id'] = set_value('category_id') == false ? @$get['category_id'] : set_value('category_id');
		$data['image'] = set_value('image') == false ? @$get['image'] : set_value('image');
		$data['effect_image'] = set_value('effect_image') == false ? @$get['effect_image'] : set_value('effect_image');
		if (isset($id)) {
			$data['title'] = 'Edit Sub Category';
		} else {
			$data['title'] = 'Add Category';
		}
		if (isset($dID)) {
			$update = $this->CommonModal->updateRowById('sub_category', 'sub_category_id', decryptId($dID), array('is_delete' => '0'));
			redirect('subCategoryAll');
			exit;
		}
		if (count($_POST) > 0) {
			$this->form_validation->set_rules('sub_category_name', 'sub category name', 'trim|required');
			$this->form_validation->set_rules('category_id', 'category', 'required');
			if ($this->form_validation->run()) {
				$post['sub_category_name'] = $sub_category_name;
				$post['category_id'] = $category_id;
				$post['sub_category_heading'] = $sub_category_heading;
				$post['sub_category_description'] = $sub_category_description;
				$post['slug_title'] = url_title($sub_category_name, '-', true);
				if (!empty($_FILES['effect_image']['name'])) {
					$picture2 = imageUploadWithRatio('effect_image', 'upload/subcat/', 600, 400, $data['effect_image']);
					$post['effect_image'] = $picture2;
				}
				if (!empty($_FILES['image']['name'])) {
					$picture = imageUploadWithRatio('image', 'upload/subcat/', 600, 400, $data['image']);
					$post['image'] = $picture;
				}
				if (isset($id)) {
					$update = $this->CommonModal->updateRowById('sub_category', 'sub_category_id', $decrypt_id, $post);
					flashData('errors', 'Laboratory Update Successfully');
				} else {
					$insert = $this->CommonModal->insertRow('sub_category', $post);
					flashData('errors', 'Laboratory Add Successfully');
				}
				redirect('subcategory_all');
			}
		}
		$data['setting'] = $this->setting;
		$this->load->view('admin/sub_category_add', $data);
	}

}