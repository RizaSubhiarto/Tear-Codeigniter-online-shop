<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        mario();
        $this->load->library('form_validation');
    }

    // tampilan awal checkout
    public function index()
    {
        $data['title'] = "Tear | Checkout";
        $data['users'] = $this->db->get_where('usertable', ['email' => $this->session->userdata('email')])->row_array();
        $data['keranjang'] = $this->cart->contents();
        $this->load->view('template/common/header', $data);
        $this->load->view('template/common/jumbotron');
        $this->load->view('main/checkout', $data);
        $this->load->view('template/common/footer');
    }

    // delete isi cart
    public function delete()
    {
        $this->cart->destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Cart deleted</div>');
        redirect('cart');
    }

    // proses cart untuk diproses menjadi invoice
    public function submit()
    {
        $users = $this->db->get_where('usertable', ['email' => $this->session->userdata('email')])->row_array();

        $total = 0;
        if ($keranjang = $this->cart->contents()) {
            foreach ($keranjang as $items) {
                $total = $total + $items['subtotal'];
            }
        }

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
        $this->form_validation->set_rules('adress', 'Adress', 'trim|required');
        $this->form_validation->set_rules('courier', 'Courier', 'trim|required');
        $this->form_validation->set_rules('bank', 'Bank', 'trim|required');
        $this->form_validation->set_rules('total', 'Total', 'trim|required');

        $data = [
            'name' => $users['username'],
            'phone' => htmlspecialchars($this->input->post('phone')),
            'adress' => htmlspecialchars($this->input->post('adress')),
            'courier' => htmlspecialchars($this->input->post('courier', true)),
            'bank' => htmlspecialchars($this->input->post('bank', true)),
            'total' => $total,
            'status' => 'not verified',
            'date_created' => time()
        ];

        $this->db->insert('invoice', $data);

        $id_invoice = $this->db->insert_id();

        foreach ($this->cart->contents() as $item) {
            $data = array(
                'id_invoice' => $id_invoice,
                'id_item' => $item['id'],
                'name' => $item['name'],
                'qty' => $item['qty'],
                'price' => $item['price']
            );
            $this->db->insert('orders', $data);
        }

        $this->cart->destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulations! Checkout success</div>');
        redirect(base_url('cart'));
    }
}
