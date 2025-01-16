<?php
defined('BASEPATH') or exit('No direct script access allowed');
class AdminDashboard extends CI_Controller
{
	public function index()
	{
		$data['profile'] = $this->profile_data;
		$data['projectTitle'] = 'Tranquil Stead';
		$data['menu_cat'] = 'Dashboard';
		$data['menu_subcat'] = 'Home';
		$data['title'] = 'Welcome! Admin';
		$this->load->view('admin/index', $data);
	}

	public function category_all()
	{
		$get['category_all'] = $this->CommonModal->getRowByIdInOrder('category', "is_delete = '1'", 'category_name', 'ASC');
		$get['title'] = 'All Category';
		$get['projectTitle'] = 'Tranquil Stead';
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
			$data['projectTitle'] = 'Tranquil Stead';
		} else {
			$data['title'] = 'Add Category';
			$data['projectTitle'] = 'Tranquil Stead';
		}
		if (isset($dID)) {
			$update = $this->CommonModal->updateRowById('category', 'category_id', decryptId($dID), array('is_delete' => '0'));
			redirect('category_all');
			exit;
		}
		if (count($_POST) > 0) {
			$this->form_validation->set_rules('category_name', 'category name', 'required');
			$this->form_validation->set_rules('sub_name', 'sub_name', 'required');
			if ($this->form_validation->run()) {
				$post['category_name'] = trim($category_name);
				$post['sub_name'] = trim($sub_name);
				if (isset($_FILES['banner']) && !empty($_FILES['banner']['name'])) {
					$banner = imageUploadWithRatio('banner', 'upload/category/', 600, 400, $data['banner']);
					$post['banner'] = $banner;
				}
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
		$data['projectTitle'] = 'Tranquil Stead';
		$data['setting'] = $this->setting;
		$this->load->view('admin/subcategory_all', $data);
	}

	public function subCategoryAdd()
	{
		$dID = $this->input->get('dID');
		$id = $this->input->get('id');
		extract($this->input->post());
		$decrypt_id = decryptId($this->input->get('id'));
		$data['image_all'] = $this->CommonModal->getRowById('subcat_images', "sub_category_id", $decrypt_id);
		$get = $this->CommonModal->getSingleRowById('sub_category', "sub_category_id = '$decrypt_id'");
		$data['sub_category_name'] = set_value('sub_category_name') == false ? @$get['sub_category_name'] : set_value('sub_category_name');
		$data['sub_category_heading'] = set_value('sub_category_heading') == false ? @$get['sub_category_heading'] : set_value('sub_category_heading');
		$data['sub_category_description'] = set_value('sub_category_description') == false ? @$get['sub_category_description'] : set_value('sub_category_description');
		$data['category_id'] = set_value('category_id') == false ? @$get['category_id'] : set_value('category_id');
		$data['image'] = set_value('image') == false ? @$get['image'] : set_value('image');
		$data['effect_image'] = set_value('effect_image') == false ? @$get['effect_image'] : set_value('effect_image');
		if (isset($id)) {
			$data['title'] = 'Edit Sub Category';
			$data['projectTitle'] = 'Tranquil Stead';
		} else {
			$data['title'] = 'Add Sub Category';
			$data['projectTitle'] = 'Tranquil Stead';
		}
		if (isset($dID)) {
			$update = $this->CommonModal->updateRowById('sub_category', 'sub_category_id', decryptId($dID), array('is_delete' => '0'));
			redirect('subcategory_all');
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
					$filesCount = count($_FILES['moreimage']['name']);
					if (isset($_FILES['moreimage']['name']) && !empty($_FILES['moreimage']['name'][0])) {
						$filesCount = count($_FILES['moreimage']['name']);
						for ($i = 0; $i < $filesCount; $i++) {
							if (!empty($_FILES['moreimage']['name'][$i])) {
								$extension = pathinfo($_FILES["moreimage"]["name"][$i], PATHINFO_EXTENSION);
								$newFilename = round(microtime(true) * 1000) . '.' . $extension;
								$_FILES['files']['name'] = $newFilename;
								$_FILES['files']['type'] = $_FILES['moreimage']['type'][$i];
								$_FILES['files']['tmp_name'] = $_FILES['moreimage']['tmp_name'][$i];
								$_FILES['files']['error'] = $_FILES['moreimage']['error'][$i];
								$_FILES['files']['size'] = $_FILES['moreimage']['size'][$i];
								$picture = fullImage('files', 'upload/subcat/'); // इमेज सेविंग फंक्शन
								if ($picture) {
									$post3['image_path'] = $picture;
									$post3['sub_category_id'] = isset($decrypt_id) ? $decrypt_id : $p_id;
									$this->CommonModal->insertRow('subcat_images', $post3);
								}
							}
						}
					} else {
						$file_error = "Please select at least one file to upload.";
					}
					flashData('errors', 'Subcategory Update Successfully');
				} else {
					$p_id = $this->CommonModal->insertRowReturnIdWithClean('sub_category', $post);
					$filesCount = count($_FILES['moreimage']['name']);
					if ($filesCount > 0) {
						for ($i = 0; $i < $filesCount; $i++) {
							if ($_FILES['moreimage']['name'] != '') {
								$extension = pathinfo($_FILES["moreimage"]["name"][$i], PATHINFO_EXTENSION);
								$newFilename = round(microtime(true) * 1000);
								$_FILES['files']['name'] = $newFilename . '.' . $extension;
								$_FILES['files']['type'] = $_FILES['moreimage']['type'][$i];
								$_FILES['files']['tmp_name'] = $_FILES['moreimage']['tmp_name'][$i];
								$_FILES['files']['error'] = $_FILES['moreimage']['error'][$i];
								$_FILES['files']['size'] = $_FILES['moreimage']['size'][$i];
								$picture = fullImage('files', 'upload/subcat/');
								if ($picture) {
									$post2['image_path'] = $picture;
									$post2['sub_category_id'] = $p_id;
									$insert = $this->CommonModal->insertRow('subcat_images', $post2);
								}
							}
						}
					}
					flashData('errors', 'Subcategory Add Successfully');
				}
				redirect('subcategory_all');
			}
		}
		$data['setting'] = $this->setting;
		$this->load->view('admin/sub_category_add', $data);
	}

	public function nashik_blog()
	{
		$data['title'] = 'Nashik Blog ';
		$get = $this->CommonModal->getSingleRowById('nashik_blog', "id = '1'");
		$data['image_all'] = $this->CommonModal->getRowByIdInOrder('nashik_images', [], 'id', 'DESC');
		if (!$get) {
			$postdata = [
				'id' => 1,
				'heading' => 'Why Nashik?',
				'sub_heading' => ''
			];
			$this->CommonModal->insertRow('nashik_blog', $postdata);
			$get = $this->CommonModal->getSingleRowById('nashik_blog', "id = '1'");
		}
		$data['heading'] = set_value('heading') == false ? @$get['heading'] : set_value('heading');
		$data['sub_heading'] = set_value('sub_heading') == false ? @$get['sub_heading'] : set_value('sub_heading');
		$data['description'] = set_value('description') == false ? @$get['description'] : set_value('description');
		$data['effect_image'] = set_value('effect_image') == false ? @$get['effect_image'] : set_value('effect_image');
		$data['banner_image'] = set_value('banner_image') == false ? @$get['banner_image'] : set_value('banner_image');
		if (count($_POST) > 0) {
			$this->form_validation->set_rules('heading', 'heading', 'required');
			$this->form_validation->set_rules('sub_heading', 'sub_heading', 'required');
			if ($this->form_validation->run()) {
				$heading = $this->input->post('heading');
				$sub_heading = $this->input->post('sub_heading');
				$description = $this->input->post('description');

				// Collect hidden field data for previous images
				$prev_banner_image = $this->input->post('banner_image');
				$prev_effect_image = $this->input->post('effect_image');

				$postdata = [
					'heading' => $heading,
					'sub_heading' => $sub_heading,
					'description' => $description,
				];

				// Handle Banner Image
				if (isset($_FILES['banner_image']) && !empty($_FILES['banner_image']['name'])) {
					$picture = imageUploadWithRatio('banner_image', 'upload/category/', 600, 400);
					if ($picture) {
						$postdata['banner_image'] = $picture;
					}
				} else {
					// Retain the previous image if no new file is uploaded
					$postdata['banner_image'] = $prev_banner_image;
				}

				// Handle Effect Image
				if (isset($_FILES['effect_image']) && !empty($_FILES['effect_image']['name'])) {
					$picture2 = imageUploadWithRatio('effect_image', 'upload/category/', 600, 400);
					if ($picture2) {
						$postdata['effect_image'] = $picture2;
					}
				} else {
					// Retain the previous image if no new file is uploaded
					$postdata['effect_image'] = $prev_effect_image;
				}

				// Handle multiple images for `moreimage[]`
				$filesCount = count($_FILES['moreimage']['name']);
				if ($filesCount > 0) {
					for ($i = 0; $i < $filesCount; $i++) {
						if ($_FILES['moreimage']['name'][$i] != '') {
							$extension = pathinfo($_FILES["moreimage"]["name"][$i], PATHINFO_EXTENSION);
							$newFilename = round(microtime(true) * 1000);
							$_FILES['files']['name'] = $newFilename . '.' . $extension;
							$_FILES['files']['type'] = $_FILES['moreimage']['type'][$i];
							$_FILES['files']['tmp_name'] = $_FILES['moreimage']['tmp_name'][$i];
							$_FILES['files']['error'] = $_FILES['moreimage']['error'][$i];
							$_FILES['files']['size'] = $_FILES['moreimage']['size'][$i];
							$picture = fullImage('files', 'upload/subcat/');
							if ($picture) {
								$post2['image'] = $picture;
								$this->CommonModal->insertRow('nashik_images', $post2);
							}
						}
					}
				}

				// Update database
				$update = $this->CommonModal->updateRowById('nashik_blog', 'id', 1, $postdata);

				if ($update) {
					flashData('errors', 'Updates Successfully');
					redirect('nashik_blog');
				} else {
					flashData('errors', 'Something went wrong');
					redirect('nashik_blog');
				}
			}
		}

		$this->load->view('admin/nashik_blog', $data);
	}

}