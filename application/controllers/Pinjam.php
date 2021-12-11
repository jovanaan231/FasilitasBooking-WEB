<?php

/**
 *
 */
class Pinjam extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (empty($this->session->userdata('is_login'))) {
      echo '<script>alert("Anda Harus Login Terlebih Dahulu");window.location.href="' . base_url('login') . '"</script>';
    }
  }

  public function index()
  {
    $this->load->view('pinjam_view');
  }



  public function simpan_pinjam()
  {
    date_default_timezone_set('Asia/Jakarta');
    $fasilitas_id    = $this->input->post('fasilitas_id');
    $tanggal         = $this->input->post('tanggal');
    $tanggalsampai       = $this->input->post('tanggalsampai');
    $deskripsikegiatan        = $this->input->post('deskripsikegiatan');
    $data_simpan = array(
      'user_id'    => $this->session->userdata('user_id'),
      'fasilitas_id'  => $fasilitas_id,
      'tanggal'       => $tanggal,
      'tanggalsampai'  => $tanggalsampai,
      'deskripsikegiatan'       => $deskripsikegiatan,
      'waktupinjam' => time()
    );
    $this->modelku->insert($data_simpan, 'peminjaman');
    $this->session->set_flashdata('msg', '<div class="alert alert-success">Anda Berhasil Meminjam, Silahkan upload bukti Kartu Identitas Mahasiswa</div>');
    redirect('akun');
  }


  public function tutup()
  {
  }
}
