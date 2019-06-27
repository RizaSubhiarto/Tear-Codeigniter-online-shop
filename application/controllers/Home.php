<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_user');
    }

    // tampilan utama web yang berupa toko
    public function index()
    {

        // if (!$this->session->userdata('email')) {
        //     $data['item'] = $this->model_user->get_item();
        //     $data['title'] = 'Tear | Home';
        //     $this->load->view('template/common/header2', $data);
        //     $this->load->view('template/common/jumbotron');
        //     $this->load->view('main/store', $data);
        //     $this->load->view('template/common/footer');
        // } else {

        $data['item'] = $this->model_user->get_item();
        $data['title'] = 'Tear | Home';
        $data['users'] = $this->db->get_where('usertable', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/common/header', $data);
        $this->load->view('template/common/jumbotron');
        $this->load->view('main/store', $data);
        $this->load->view('template/common/footer');

        // }
    }

    // menampilkan informasi tentang kami
    public function about()
    {
        // if (!$this->session->userdata('email')) {
        //     $data['title'] = 'Tear | About';
        //     $this->load->view('template/common/header2', $data);
        //     $this->load->view('template/common/jumbotron');
        //     $this->load->view('main/about');
        //     $this->load->view('template/common/footer');
        // } else {

        $data['title'] = 'Tear | About';
        $this->load->view('template/common/header', $data);
        $this->load->view('template/common/jumbotron');
        $this->load->view('main/about');
        $this->load->view('template/common/footer');

        // }
    }

    // menambahkan item ke keranjang
    function addcart($ids)
    {
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please Login</div>');
            redirect(base_url('user'));
        }

        $items = $this->model_user->find($ids);
        if ($items->qty <= 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Out Of Stock
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
            redirect('home');
        }
        $data = array(
            'id'    => $items->id,
            'qty'    => 1,
            'price'    => $items->price,
            'name'    => $items->name,
            'image' => $items->image

        );
        $this->cart->insert($data);
        $this->session->set_flashdata('message', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>Added to cart</strong> go to <a href="cart">Cart</a>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect('home');
    }

    // tampilan keranjang
    public function cart()
    {
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please Login</div>');
            redirect(base_url('user'));
        }

        $data['title'] = 'Tear | Cart';

        $this->load->view('template/common/header', $data);
        $this->load->view('template/common/jumbotron', $data);
        $this->load->view('main/cart', $data);
        $this->load->view('template/common/footer', $data);
    }

    // delete satu item yang ada di cart
    public function delete($rowid)
    {
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please Login</div>');
            redirect(base_url('user'));
        }

        $this->cart->remove($rowid);
        redirect('cart');
    }
}
