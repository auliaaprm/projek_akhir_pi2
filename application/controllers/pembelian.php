<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PembelianModel');
        $this->load->model('SupplierModel');
    }
    public function index()
    {

        $data['allpembelian'] = $this->PembelianModel->get_all_data_pembelian();
        
        $data['title'] = "Daftar Pembelian";

        $this->load->view('templates/header', $data);
        $this->load->view('pembelian/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data['allsupplier'] = $this->SupplierModel->get_all_data_supplier();
        
        $data['title'] = "Tambah Pembelian";

        $this->load->view('templates/header', $data);
        $this->load->view('pembelian/create', $data);
        $this->load->view('templates/footer');
    }

    public function simpanpembelian()
    {
        $pembelian_id = time();
        $data = [
            'pembelian_id' => $pembelian_id,
            'supplier_id' => $this->input->post('supplier_id'),
            'tgl_masuk' => $this->input->post('tgl_masuk'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        $this->db->insert('pembelian', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Data sudah ditambahkan.
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>');

        redirect('pembeliandetail/proses/' . $pembelian_id);
    }

    public function detail($pembelian_id)
    {
        $data['title'] = "Detail Pembelian";
        $data['pembelian'] = $this->db->get_where('pembelian', ['pembelian_id' => $pembelian_id])->row_array();
        $data['pembeliandetail'] = $this->PembelianModel->get_detail_pembelian($pembelian_id);

        $this->load->view('templates/header', $data);
        $this->load->view('pembelian/detail', $data);
        $this->load->view('templates/footer');
    }

    public function editpembelian()
    {

        $this->db->set('tgl_masuk', $this->input->post('tgl_masuk'));
        $this->db->set('supplier_id', $this->input->post('supplier_id'));
        $this->db->set('keterangan', $this->input->post('keterangan'));
        $this->db->update('pembelian');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Data sudah diedit.
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>');

        redirect('pembelian');
    }

    public function hapus($pembelian_id)
    {

        $this->db->where('pembelian_id', $pembelian_id);
        $this->db->delete('pembelian');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Data sudah dihapus.
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>');

        redirect('pembelian');
    }
}
