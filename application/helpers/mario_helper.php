<?php
// malicious activity redirect initiation orientation
// orientasi inisiasi pengalihan aktivitas berbahaya
// mario();

function mario()
{
    $ci = get_instance();
    $segment = $ci->uri->segment(1);
    $role = $ci->session->userdata('roleid');
    if (!$ci->session->userdata('email')) {
        redirect('user');
    } else {
        // kalau member masuk admin
        if ($segment == 'admin') {
            $role = $ci->session->userdata('roleid');
            if ($role == 2) {
                redirect(base_url('home'));
            }
        }
    }
}
