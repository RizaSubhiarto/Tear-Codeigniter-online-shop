<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['users'] = $this->db->get_where('usertable', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Tear | Profile';
        $this->load->view('template/common/header', $data);
        $this->load->view('template/common/jumbotron');
        $this->load->view('main/profile', $data);
        $this->load->view('template/common/footer');
    }

    public function edit()
    {

        $data['title'] = 'Tear | Edit profile';
        $data['users'] = $this->db->get_where('usertable', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('adress', 'Adress', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/common/header', $data);
            $this->load->view('template/common/jumbotron');
            $this->load->view('main/editprofile', $data);
            $this->load->view('template/common/footer');
        } else {
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $adress = $this->input->post('adress');

            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['upload_path'] = './assets/profile/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['users']['image'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('username', $username);
            $this->db->set('adress', $adress);
            $this->db->where('email', $email);
            $this->db->update('usertable');

            redirect('profile');
        }
    }
}
