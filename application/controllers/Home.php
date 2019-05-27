<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        mario();
    }
    public function index()
    {
        $data['title'] = 'Tear | Home';
        $this->load->view('template/common/header', $data);
        $this->load->view('template/common/jumbotron');
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
}
