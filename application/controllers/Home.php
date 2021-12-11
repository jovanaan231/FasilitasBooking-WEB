<?php
class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $this->load->view('home_view');
  }
  public function tentangkami()
  {
    $this->load->view('tentangkami');
  }
  public function fasilitas()
  {
    $data['fasilitas'] = $this->modelku->get_fasilitas_user();
    $this->load->view('fasilitas', $data);
  }
  public function peminjaman()
  {
    $data['peminjaman'] = $this->modelku->get_peminjamanhome(array());
    $this->load->view('peminjaman', $data);
  }
}
