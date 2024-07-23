<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Post extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_post');
        $this->load->library('session');
    }

    public function index()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('account/login');
        }

        $data['posts'] = $this->M_post->get_posts();
        $this->load->view('post/index', $data);
    }

    public function view($id)
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('account/login');
        }

        $data['post'] = $this->M_post->get_post_by_id($id);
        if (empty($data['post'])) {
            show_404();
        }
        $this->load->view('post/view', $data);
    }
    public function create()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('account/login');
        }

        if ($this->input->post()) {
            $data = array(
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'date' => date('Y-m-d H:i:s'),
                'username' => $this->session->userdata('username')
            );
            $this->M_post->create_post($data);
            redirect('post');
        }
        $this->load->view('post/create');
    }

    public function edit($id)
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('account/login');
        }

        $data['post'] = $this->M_post->get_post_by_id($id);
        if (empty($data['post'])) {
            show_404();
        }

        if ($this->input->post()) {
            $data = array(
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'date' => date('Y-m-d H:i:s'),
            );
            $this->M_post->update_post($id, $data);
            redirect('post');
        }
        $this->load->view('post/edit', $data);
    }

    public function delete($id)
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('account/login');
        }

        $this->Post_model->delete_post($id);
        redirect('post');
    }
}
