<?php

class Fasilitas extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if (empty($this->session->userdata('is_login'))) {
      echo '<script>alert("Anda Harus Login Terlebih Dahulu");window.location.href="'.base_url('login').'"</script>';
    }
  }

  public function index() {
    $data['fasilitas'] = $this->modelku->get_fasilitas(array());
    $this->load->view('fasilitas_view', $data);
  }

  public function detail($id = null) {
    $data['detail'] = $this->modelku->get_fasilitas(array('fasilitas_id'=>$id));
    $this->load->view('detail_view', $data);
  }

  public function kategori($kat = null) {
    $where = (!empty($kat)) ? array('fasilitas.kategori_id'=>$kat) : array();
    $data['fasilitas'] = $this->modelku->get_fasilitas($where);
    $this->load->view('fasilitas_view', $data);
  }

}
