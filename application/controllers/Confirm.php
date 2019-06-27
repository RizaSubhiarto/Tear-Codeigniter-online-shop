<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Confirm extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        mario();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Tear | Confirm";

        $data['users'] = $this->db->get_where('usertable', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('userid', 'Userid', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/common/header', $data);
            $this->load->view('template/common/jumbotron', $data);
            $this->load->view('main/confirm', $data);
            $this->load->view('template/common/footer', $data);
        } else {


            $data = [
                'userid' => htmlspecialchars($this->input->post('userid', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
            ];

            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['upload_path'] = './assets/confirm/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->insert('confirm', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Payment confirmation has been sended! </div>');
            redirect(base_url('confirm'));
        }
    }
}
