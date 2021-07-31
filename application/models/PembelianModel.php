<?php

class PembelianModel extends CI_Model
{
    public function get_all_data_pembelian()
    {
        $query = "SELECT p.*, s.nama_supplier FROM pembelian p, supplier s WHERE p.supplier_id = s.supplier_id";
        return $this->db->query($query)->result_array();
    }

    public function get_detail_pembelian($pembelian_id)
    {
        $query = "SELECT * FROM pembelian_detail pd, pembelian pb, barang b, supplier s 
        WHERE pb.supplier_id = s.supplier_id AND pd.pembelian_id = pb.pembelian_id 
        AND pd.barang_id = b.barang_id AND pb.pembelian_id = $pembelian_id";
        return $this->db->query($query)->result_array();
    }
}
