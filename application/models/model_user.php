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
}
