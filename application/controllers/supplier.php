<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SupplierModel');
    }
    public function index()
    {
        $this->load->model('SupplierModel');

        $data['allsupplier'] = $this->SupplierModel->get_all_data_supplier();
        $data['title'] = "Daftar Supplier";

        $this->load->view('templates/header', $data);
        $this->load->view('supplier/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data['title'] = "Tambah Supplier";

        $this->load->view('templates/header', $data);
        $this->load->view('supplier/create', $data);
        $this->load->view('templates/footer');
    }

    public function simpansupplier()
    {
        $data = [
            'nama_supplier' => $this->input->post('nama_supplier'),
            'no_tlp' => $this->input->post('no_tlp'),
        ];
        $this->db->insert('supplier', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Data sudah ditambahkan.
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>');

        redirect('Supplier');
    }

    public function edit($supplier_id)
    {
        $data['title'] = "Edit Supplier";
        $data['supplier'] = $this->db->get_where('supplier', ['supplier_id' => $supplier_id])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('supplier/edit', $data);
        $this->load->view('templates/footer');
    }

    public function editsupplier()
    {

        $this->db->set('nama_supplier', $this->input->post('nama_supplier'));
        $this->db->set('no_tlp', $this->input->post('no_tlp'));
        $this->db->where('supplier_id', $this->input->post('supplier_id'));
        $this->db->update('supplier');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Data sudah diedit.
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>');

        redirect('supplier');
    }

    public function hapus($supplier_id)
    {

        $this->db->where('supplier_id', $supplier_id);
        $this->db->delete('supplier');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Data sudah dihapus.
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>');

        redirect('supplier');
    }
}
