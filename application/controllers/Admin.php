<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Category_model');
        $this->load->model('Subcategory_model');
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') !== 'admin') {
            redirect('auth/login');
        }
    }

    public function dashboard() {
        $data['users'] = $this->User_model->get_all_users();
        $data['categories'] = $this->Category_model->get_all_categories();
        $this->load->view('dashboard', $data);
    }

    public function categories() {
        $data['categories'] = $this->Category_model->get_all_categories();
        $data['subcategories'] = $this->Subcategory_model->get_all_subcategories();
        $this->load->view('admin/manage_categories', $data);
    }

    public function create_category() {
        $this->form_validation->set_rules('name', 'Category Name', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/create_category');
        } else {
            $name = $this->input->post('name');
            $this->Category_model->create_category($name);
            redirect('admin/categories');
        }
    }

    public function manage_category($category_id) {
        echo 2;die;
        $data['category'] = $this->Category_model->get_category_by_id($category_id);
        if ($_POST) {
            $name = $this->input->post('name');
            $this->Category_model->update_category($category_id, $name);
            redirect('admin/categories');
        }
        $this->load->view('edit_category', $data);
    }

    public function delete_category($category_id) {
        $this->Category_model->delete_category($category_id);
        redirect('admin/categories');
    }

    public function create_subcategory() {
        $data['categories'] = $this->Category_model->get_all_categories();
        $this->form_validation->set_rules('name', 'Subcategory Name', 'required');
        $this->form_validation->set_rules('category_id', 'Category', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/create_subcategory', $data);
        } else {
            $name = $this->input->post('name');
            $category_id = $this->input->post('category_id');
            $this->Subcategory_model->create_subcategory($name, $category_id);
            redirect('admin/categories');
        }
    }

    public function manage_subcategory($subcategory_id) {
        $data['subcategory'] = $this->Subcategory_model->get_subcategory_by_id($subcategory_id);
        $data['categories'] = $this->Category_model->get_all_categories();
        if ($_POST) {
            $name = $this->input->post('name');
            $category_id = $this->input->post('category_id');
            $this->Subcategory_model->update_subcategory($subcategory_id, $name, $category_id);
            redirect('admin/categories');
        }
        $this->load->view('admin/edit_subcategory', $data);
    }

    public function delete_subcategory($subcategory_id) {
        $this->Subcategory_model->delete_subcategory($subcategory_id);
        redirect('admin/categories');
    }

    public function logout() {
        $this->session->unset_userdata('logged_in');
        redirect('auth/login');
    }

    private function upload_photo($photo) {
        $config['upload_path'] = './uploads/profile_pics/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['file_name'] = $photo;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('profile_photo')) {
            $this->session->set_flashdata('error', $this->upload->display_errors());
        }
    }
}
