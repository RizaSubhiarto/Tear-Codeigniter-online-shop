<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        mario();
        $this->load->model('model_user');
    }
    public function index()
    {
        $data['item'] = $this->model_user->get_item();
        $data['title'] = 'Tear | Home';
        $data['users'] = $this->db->get_where('usertable', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/common/header', $data);
        $this->load->view('template/common/jumbotron');
        $this->load->view('main/store');
        $this->load->view('template/common/footer');
    }
    public function about()
    {
        $data['title'] = 'Tear | About';
        $this->load->view('template/common/header', $data);
        $this->load->view('template/common/jumbotron');
        $this->load->view('main/about');
        $this->load->view('template/common/footer');
    }

    public function cart()
    {
        echo 'ok';
    }
}
