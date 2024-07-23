<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_account');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('account/login');
        }

        $data['accounts'] = $this->M_account->get_account();
        $this->load->view('account/index', $data);
    }

    public function view($username)
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('account/login');
        }

        $data['account'] = $this->M_account->get_account_by_username($username);
        if (empty($data['account'])) {
            show_404();
        }
        $this->load->view('account/view', $data);
    }

    public function create()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('account/login');
        }

        if ($this->input->post()) {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'name' => $this->input->post('name'),
                'role' => $this->input->post('role')
            );
            $this->M_account->create_account($data);
            redirect('account');
        }
        $this->load->view('account/create');
    }

    public function edit($username)
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('account/login');
        }

        $data['account'] = $this->M_account->get_account_by_username($username);
        if (empty($data['account'])) {
            show_404();
        }

        if ($this->input->post()) {
            $data = array(
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'name' => $this->input->post('name'),
                'role' => $this->input->post('role')
            );
            $this->M_account->update_account($username, $data);
            redirect('account');
        }
        $this->load->view('account/edit', $data);
    }

    public function delete($username)
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('account/login');
        }

        $this->M_account->delete_account($username);
        redirect('account');
    }

    public function login()
    {
        $this->load->helper('url');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $this->load->model('M_account');
            $account = $this->M_account->get_account_by_username($username);

            if ($account && password_verify($password, $account['password'])) {
                $this->session->set_userdata('logged_in', true);
                $this->session->set_userdata('username', $username);
                $this->session->set_userdata('role', $account['role']);
                redirect('account');
            } else {
                $data['error'] = 'Invalid username or password';
            }
        }

        $this->load->view('account/login', isset($data) ? $data : NULL);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('account/login');
    }
}
