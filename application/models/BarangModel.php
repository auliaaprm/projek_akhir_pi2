<?php

class BarangModel extends CI_Model
{

    public function get_all_data_barang()
    {
        $query = "SELECT * FROM barang ORDER BY nama_barang ASC";
        return $this->db->query($query)->result_array();
    }

}
