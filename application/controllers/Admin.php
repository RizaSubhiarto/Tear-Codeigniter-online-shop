<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('model_user');
        mario();
    }

    public function index()
    {
        $data['userlist'] = $this->model_user->get_post();
        $data['users'] = $this->db->get_where('usertable', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Tear | Dashboard';

        $this->load->view('template/dashboard/header-dash', $data);
        $this->load->view('template/dashboard/sidebar-dash');
        $this->load->view('template/dashboard/content/usertable', $data);
        $this->load->view('template/dashboard/footer-dash');
    }

    public function itemtable()
    {
        $data['itemlist'] = $this->model_user->get_list();
        $data['users'] = $this->db->get_where('usertable', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Tear | Item list';

        $this->load->view('template/dashboard/header-dash', $data);
        $this->load->view('template/dashboard/sidebar-dash');
        $this->load->view('template/dashboard/content/itemtable', $data);
        $this->load->view('template/dashboard/footer-dash');
    }

    public function additem()
    {
        $data['title'] = 'Tear | Add Item';
        $data['bread'] = 'Post';
        $data['users'] = $this->db->get_where('usertable', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('price', 'Price', 'trim|required');
        $this->form_validation->set_rules('qty', 'Qty', 'trim|required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/dashboard/header-dash', $data);
            $this->load->view('template/dashboard/sidebar-dash');
            $this->load->view('template/dashboard/content/additem', $data);
            $this->load->view('template/dashboard/footer-dash');
        } else {
            $this->_additem();
        }
    }

    private function _additem()
    {
        // proses data
        $data = [
            'qty' => $this->input->post('qty'),
            'price' => $this->input->post('price'),
            'name' => $this->input->post('name')
        ];

        $upload_image = $_FILES['image']['name'];
        if ($upload_image) {
            $config['upload_path'] = './assets/itempic/';
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
        $this->db->insert('store', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Item has been addedded</div>');
        redirect('admin/additem');
    }
}
