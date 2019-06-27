<?php

class model_user extends CI_model
{
    public function get_post()
    {
        return $this->db->get('usertable')->result_array();
    }

    public function get_list()
    {
        return $this->db->get('store')->result_array();
    }

    public function get_item()
    {
        $hasil = $this->db->get('store');
        return $hasil->result();
    }

    public function get_confirm()
    {
        return $this->db->get('confirm')->result_array();
    }

    public function find($ids)
    {
        $code = $this->db->where('id', $ids)
            ->limit(1)
            ->get('store');

        return $code->row();
    }
}
