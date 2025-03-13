<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
        $this->load->library('form_validation');
        $this->load->model('User_model');
        $this->load->model('Category_model');
        $this->load->model('Subcategory_model');
    }

    public function index() {
        $user_id = $this->session->userdata('user_id');
        $user = $this->User_model->get_user_by_id($user_id);
        $this->load->view('update_profile', ['user' => $user]);
    }

    public function update() {
        $user_id = $this->session->userdata('user_id');
        $name = $this->input->post('name');
        $profile_photo = '';

        if ($_FILES['profile_photo']['name']) {
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('profile_photo')) {
                $upload_data = $this->upload->data();
                $profile_photo = $upload_data['file_name'];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('profile');
            }
        }

        $update_data = [
            'name' => $name,
            'profile_photo' => $profile_photo ?: null
        ];

        $this->User_model->update_profile($user_id, $update_data);
        $this->session->set_flashdata('success', 'Profile updated successfully!');
        redirect('auth/dashboard');
    }

    public function manage_category($category_id) {
        $data['category'] = $this->Category_model->get_category_by_id($category_id);
        if (!$data['category']) {
            $this->session->set_flashdata('error', 'Category not found');
            redirect('profile/categories');
        }
        $this->load->view('edit_category', $data);
    }

    public function categories() {
        $data['categories'] = $this->Category_model->get_all_categories();
        $data['subcategories'] = $this->Subcategory_model->get_all_subcategories();
        $this->load->view('manage_categories', $data);
    }

    public function create_category() {
        $this->form_validation->set_rules('name', 'Category Name', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('create_category');
        } else {
            $name = $this->input->post('name');
            $this->Category_model->create_category($name);
            redirect('profile/categories');
        }
    }

    public function delete_category($category_id) {
        $this->Category_model->delete_category($category_id);
        redirect('profile/categories');
    }

    public function create_subcategory() {
        $this->load->model('Category_model');
        $this->load->model('Subcategory_model');
    
        $data['categories'] = $this->Category_model->get_all_categories();
    
        $this->form_validation->set_rules('name', 'Subcategory Name', 'required');
        $this->form_validation->set_rules('category_id', 'Category', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('create_subcategory', $data);
        } else {
            $name = $this->input->post('name');
            $category_id = $this->input->post('category_id');
            $this->Subcategory_model->create_subcategory($category_id, $name);
            $this->session->set_flashdata('success', 'Subcategory created successfully!');
            redirect('profile/categories');
        }
    }
    

    public function manage_subcategory($subcategory_id) {
        $data['subcategory'] = $this->Subcategory_model->get_subcategory_by_id($subcategory_id);
        $data['categories'] = $this->Category_model->get_all_categories();
    
        if ($_POST) {
            $name = $this->input->post('name');
            $category_id = $this->input->post('category_id');   
            $this->Subcategory_model->update_subcategory($subcategory_id, $name, $category_id);
            $this->session->set_flashdata('success', 'Subcategory updated successfully!');
            redirect('profile/categories');
        }
        $this->load->view('edit_subcategory', $data);
    }

    public function delete_subcategory($subcategory_id) {
        $this->Subcategory_model->delete_subcategory($subcategory_id);
        redirect('profile/categories');
    }

    public function logout() {
        $this->session->unset_userdata('logged_in');
        redirect('auth/login');
    }
}
