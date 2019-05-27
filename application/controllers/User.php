<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {

        // kalau sudah login, tidak bisa login lagi
        if ($this->session->userdata('email')) {
            redirect(base_url('welcome'));
        }

        // input login
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
        // model user
        if ($this->form_validation->run() == false) {
            // title data
            $data['title'] = 'Tear | Login';

            $this->load->view('user/login', $data);
        } else {
            $this->_login();
        }
    }

    // proses login
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $username = $this->db->get_where('usertable', ['email' => $email])->row_array();

        if ($username) {
            if (password_verify($password, $username['password'])) {
                $data = [
                    'email' => $username['email'],
                    'roleid' => $username['roleid']
                ];
                $this->session->set_userdata($data);
                if ($username['roleid'] == 1) {
                    redirect(base_url('admin'));
                }
                redirect('home');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password</div>');
                redirect(base_url());
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered</div>');
            redirect(base_url());
        }
    }

    // register akun
    public function register()
    {
        // kalau sudah login, tidak bisa register lagi
        if ($this->session->userdata('email')) {
            redirect(base_url('home'));
        }

        // set rule
        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[usertable.email]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => "Password doesn't match!",
            'min_length' => 'Password is too weak!'
        ]);
        $this->form_validation->set_rules('adress', 'Adress', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

        // form validation
        if ($this->form_validation->run() == false) {
            // title data
            $data['title'] = 'Tear | Register';
            $this->load->view('user/register', $data);
        } else {
            // if succsess
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'adress' => htmlspecialchars($this->input->post('adress', true)),
                'image' => 'default.png',
                'roleid' => 2

            ];

            $this->db->insert('usertable', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulations! Your account has been created</div>');
            redirect(base_url());
        }
    }

    // logout
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('roleid');

        redirect(base_url());
    }

    // 403 akses ditolak
    public function notpass()
    {
        // 403 tidak bisa kases
        $this->load->view('errors/notpass');
    }
}
