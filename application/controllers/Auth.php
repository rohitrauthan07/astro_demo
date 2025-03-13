<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Category_model');
        $this->load->library('session');
        $this->load->helper('form');
    }

    public function index()
    {
        $this->login();
    }

    public function login()
    {
        if ($this->session->userdata('user_id')) {
            redirect('dashboard');
        }

        $this->load->view('login');
    }

    public function register()
    {
        $this->load->view('auth/register');
    }

    public function register_post()
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $data = array(
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' => 'user',
        );

        $this->User_model->register_user($data);

        $this->session->set_flashdata('success', 'Registration successful! Please login.');
        redirect('auth/login');
    }

    public function login_post()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->User_model->login($email, $password);

        if ($user) {
            $this->session->set_userdata('user_id', $user->id);
            $this->session->set_userdata('role', $user->role);

            if ($user->role == 'admin') {
                redirect('auth/admin_dashboard');
            } else {
                redirect('auth/dashboard');
            }
        } else {
            $this->session->set_flashdata('error', 'Invalid login credentials.');
            redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }

    public function dashboard()
    {
        $user_id = $this->session->userdata('user_id');
        $user = $this->User_model->get_user_by_id($user_id);

        if ($user) {
            $data['user'] = $user;
            $this->load->view('user_dashboard', $data);
        } else {
            redirect('auth/login');
        }
    }

    public function admin_dashboard()
    {
        $data['users'] = $this->User_model->get_all_users();
        $data['categories'] = $this->Category_model->get_all_categories();
        $this->load->view('dashboard', $data);
    }

    public function forgot_password()
    {
        $this->load->view('forgot_password');
    }

    public function forgot_password_post()
    {
        $email = $this->input->post('email');

        $this->session->set_flashdata('success', 'Password reset link has been sent to your email.');
        redirect('auth/login');
    }
}
