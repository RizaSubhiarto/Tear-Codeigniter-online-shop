<?php
// malicious activity redirect initiation orientation
// orientasi inisiasi pengalihan aktivitas berbahaya
// mario();

function mario()
{
    // $ci adalah pengganti $this
    $ci = get_instance();

    // segment adalah anak link pertama
    $segment = $ci->uri->segment(1);

    // cek id yang ada di session
    $role = $ci->session->userdata('roleid');

    // kalau tidak punya session sama sekali, dipentalin ke halaman login
    if (!$ci->session->userdata('email')) {
        $ci->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please Login</div>');
        redirect('user');
    } else {
        // kalau member yang login masuk ke halaman admin
        if ($segment == 'admin') {
            if ($role == 2) {
                redirect(base_url('home'));
            }
        }

        // kalau buka checkout tanpa ada barang di cart
        if ($segment == 'checkout') {
            if ($ci->cart->total_items() == 0) {
                $ci->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">There is no item in the cart</div>');
                redirect(base_url('cart'));
            }
        }
    }
}
