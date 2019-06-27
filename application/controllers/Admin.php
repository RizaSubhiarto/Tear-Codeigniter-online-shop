<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('model_user');
        $this->load->model('model_invoice');
        mario();
    }

    // tampilan userlist
    public function index()
    {
        // model untuk menarik data user untuk ditampilkan
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
        // model untuk menarik data barang toko untuk ditampilkan
        $data['itemlist'] = $this->model_user->get_list();

        $data['users'] = $this->db->get_where('usertable', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Tear | Item list';

        $this->load->view('template/dashboard/header-dash', $data);
        $this->load->view('template/dashboard/sidebar-dash');
        $this->load->view('template/dashboard/content/itemtable', $data);
        $this->load->view('template/dashboard/footer-dash');
    }

    // menambah item ke dalam toko
    public function additem()
    {
        $data['title'] = 'Tear | Add Item';
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

    // kenapa ada _? codeigniter menyarankan hal ini agar function tidak bisa diakses menggunakan url localhost/tear/user_guide/general/controllers.html?highlight=private
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

    public function edititem($ids)
    {
        $data['items'] = $this->model_user->find($ids);
        $data['title'] = 'Tear | Edit Item';

        $data['users'] = $this->db->get_where('usertable', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('qty', 'Qty', 'trim|required');
        $this->form_validation->set_rules('price', 'Price', 'trim|required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/dashboard/header-dash', $data);
            $this->load->view('template/dashboard/sidebar-dash');
            $this->load->view('template/dashboard/content/edititem', $data);
            $this->load->view('template/dashboard/footer-dash');
        } else {
            $this->ubahitem();
        }
    }

    public function ubahitem()
    {
        $data = [
            "name" => $this->input->post('name', true),
            "qty" => $this->input->post('qty', true),
            "price" => $this->input->post('price', true)
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

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('store', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Item has been edited</div>');
        redirect('admin/itemtable');
    }

    // delete item
    public function delete($ids)
    {
        $this->model_invoice->delete($ids);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Item has been deleted</div>');
        redirect('admin/itemtable');
    }

    // list invoice
    public function invoice()
    {
        $data['title'] = 'Tear | Invoice';

        $data['users'] = $this->db->get_where('usertable', ['email' => $this->session->userdata('email')])->row_array();

        $data['invoice'] = $this->model_invoice->getinvoice();

        $this->load->view('template/dashboard/header-dash', $data);
        $this->load->view('template/dashboard/sidebar-dash');
        $this->load->view('template/dashboard/content/invoice', $data);
        $this->load->view('template/dashboard/footer-dash');
    }

    // detail isi invoice yang bersangkutan
    public function detailinvoice($ids)
    {
        $data['title'] = 'Tear | Invoice Detail';

        $data['users'] = $this->db->get_where('usertable', ['email' => $this->session->userdata('email')])->row_array();

        $data['itemx'] = $this->model_invoice->detail($ids);

        $data['orderx'] = $this->model_invoice->orderx($ids);

        $this->load->view('template/dashboard/header-dash', $data);
        $this->load->view('template/dashboard/sidebar-dash');
        $this->load->view('template/dashboard/content/detail', $data);
        $this->load->view('template/dashboard/footer-dash');
    }

    // mengubah status invoice menjadi verified
    public function confirm($ids)
    {

        $this->db->set('status', 'verified');

        $this->db->where('id', $ids);
        $this->db->update('invoice');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Item has been confirmed </div>');

        redirect('admin/invoice');
    }

    // delete invoice
    public function deleteinv($ids)
    {
        $this->model_invoice->deleteinv($ids);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Invoice has been deleted</div>');
        redirect('admin/invoice');
    }


    public function deletepay($ids)
    {
        $this->model_invoice->deletepay($ids);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Payment has been deleted</div>');
        redirect('admin/payment');
    }

    // list konfirmasi pembayaran
    public function payment()
    {
        $data['title'] = 'Tear | Payment Confirm';
        $data['confirm'] = $this->model_user->get_confirm();
        $data['users'] = $this->db->get_where('usertable', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/dashboard/header-dash', $data);
        $this->load->view('template/dashboard/sidebar-dash');
        $this->load->view('template/dashboard/content/payment', $data);
        $this->load->view('template/dashboard/footer-dash');
    }

    // halaman print laporan
    public function cetak_laporan()
    {
        $data['users'] = $this->db->get_where('usertable', ['email' => $this->session->userdata('email')])->row_array();
        $data['laporan'] = $this->model_invoice->getlaporan();
        $this->load->view('template/dashboard/content/laporan_print_hari', $data);
    }

    // halaman laporan
    public function laporan()
    {
        $data['title'] = 'Tear | Laporan';
        $data['users'] = $this->db->get_where('usertable', ['email' => $this->session->userdata('email')])->row_array();
        $data['laporan'] = $this->model_invoice->getlaporan();
        $this->load->view('template/dashboard/header-dash', $data);
        $this->load->view('template/dashboard/sidebar-dash');
        $this->load->view('template/dashboard/content/laporan', $data);
        $this->load->view('template/dashboard/footer-dash');
    }

    public function printinvoice($ids)
    {
        $data['title'] = 'Tear | Print Invoice' . '[' . $ids . ']';

        $data['itemx'] = $this->model_invoice->detail($ids);

        $data['orderx'] = $this->model_invoice->orderx($ids);

        $this->load->view('template/dashboard/content/printinvoice', $data);
    }
}
