<?php

class model_invoice extends CI_model
{
    public function getinvoice()
    {
        return $this->db->get('invoice')->result_array();
    }

    public function getlaporan()
    {
        $k = "verified";
        //$query = $this->db->query("SELECT * from invoice WHERE status=$k" );
        //return $query->result_array();
        return $this->db->get_where("invoice", array('status' => $k))->result_array();
    }

    public function detail($ids)
    {
        $code = $this->db->where('id', $ids)->limit(1)->get('invoice');
        if ($code->num_rows() > 0) {
            return $code->row();
        } else {
            return array();
        }
    }

    public function printinvoice($ids)
    {
        $code = $this->db->where('id', $ids)
            ->limit(1)
            ->get('invoice');

        return $code->row();
    }

    public function orderx($ids)
    {
        $code = $this->db->where('id_invoice', $ids)->get('orders');
        return $code->result_array();
    }

    public function delete($ids)
    {
        $this->db->where('id', $ids)->delete('store');
    }

    public function deleteinv($ids)
    {
        $this->db->where('id', $ids)->delete('invoice');
    }

    public function deletepay($ids)
    {
        $this->db->where('id', $ids)->delete('confirm');
    }
}
