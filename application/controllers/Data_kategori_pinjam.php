<?php

/**
 *
 */
class Data_kategori_pinjam extends CI_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $data['kategori'] = $this->modelku->get_where(array(), 'kategori');
    $this->load->view('admin/data_kategori_pinjam_view', $data);
  }

  public function simpan() {
    $kategori_id  = $this->input->post('kategori_id');
    $nama_kategori  = $this->input->post('nama_kategori');
    if (!empty($kategori_id)) {
      $a = $this->modelku->update(array('kategori_id' => $kategori_id), array('nama_kategori' => $nama_kategori), 'kategori');
      if ($a) {
        redirect('data_kategori_pinjam');
      }
    }else {
      $a = $this->modelku->insert(array('nama_kategori' => $nama_kategori), 'kategori');
      if ($a) {
        redirect('data_kategori_pinjam');
      }
    }
  }

  public function hapus($id) {
    $a = $this->modelku->delete(array('kategori_id' => $id), 'kategori');
    if ($a) {
      redirect('data_kategori_pinjam');
    }
  }

}
