<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pembeliandetail extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PembelianModel');
        $this->load->model('SupplierModel');
        $this->load->model('BarangModel');
    }
    public function proses($pembelian_id)
    {

        $data['pembelian'] = $this->db->get_where('pembelian', ['pembelian_id' => $pembelian_id])->row_array();
        $data['allbarang'] = $this->BarangModel->get_all_data_barang();
        $data['allsupplier'] = $this->SupplierModel->get_all_data_supplier();

        $data['title'] = "Detail Pembelian";

        $this->load->view('templates/header', $data);
        $this->load->view('pembeliandetail/create', $data);
        $this->load->view('templates/footer');
    }

    public function simpandetailpembelian()
    {
        $barang = $this->db->get_where('barang', ['barang_id' => $this->input->post('barang_id')])->row_array();

        $totaltambah = $barang['stok'] + $this->input->post('stok_tambahan');
        $this->db->set('stok', $totaltambah);
        $this->db->where('barang_id', $this->input->post('barang_id'));
        $this->db->update('barang');

        //proses update grand total
        $barang = $this->db->get_where('pembelian_detail', ['pembelian_id' => $this->input->post('pembelian_id')])->row_array();
        $hargatotal = $this->input->post('harga_satuan') * $this->input->post('stok_tambahan');
        $grandtotal = $barang['harga_total'] + $hargatotal;
        $this->db->set('total_bayar', $grandtotal);
        $this->db->where('pembelian_id', $this->input->post('pembelian_id'));
        $this->db->update('pembelian');

        
        $data = [
            'pembelian_id' => $this->input->post('pembelian_id'),
            'barang_id' => $this->input->post('barang_id'),
            'stok_tambahan' => $this->input->post('stok_tambahan'),
            'harga_satuan' => $this->input->post('harga_satuan'),
            'harga_total' => $hargatotal,
        ];
        $this->db->insert('pembelian_detail', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Data sudah ditambahkan.
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>');

        redirect('pembelian/detail/' . $this->input->post('pembelian_id'));
    }

    public function hapus($pembelian_id, $pembelian_detail_id, $barang_id)
    {
        $pmbd = $this->db->get_where('pembelian_detail', ['pembelian_detail_id' => $pembelian_detail_id])->row_array();
        $pmb = $this->db->get_where('pembelian', ['pembelian_id' => $pembelian_id])->row_array();

        $grandtotal = $pmb['total_bayar'] - $pmbd['harga_total'];
        $this->db->set('total_bayar', $grandtotal);
        $this->db->where('pembelian_id', $pembelian_id);
        $this->db->update('pembelian');

        $br = $this->db->get_where('barang', ['barang_id' => $barang_id])->row_array();
        
        $stoktotal = $br['stok'] - $pmbd['stok_tambahan'];
        $this->db->set('stok', $stoktotal);
        $this->db->where('barang_id', $barang_id);
        $this->db->update('barang');

        $this->db->where('pembelian_detail_id', $pembelian_detail_id);
        $this->db->delete('pembelian_detail');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Data sudah dihapus.
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>');

        redirect('pembelian');
    }
}
