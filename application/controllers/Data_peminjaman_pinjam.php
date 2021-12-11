<?php
class Data_peminjaman_pinjam extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['peminjaman'] = $this->modelku->get_peminjaman_pinjam(array());
    $this->load->view('admin/data_peminjaman_pinjam_view', $data);
  }

  public function verifikasi($id)
  {
    $data['peminjaman'] = $this->modelku->get_peminjaman(array('peminjaman.peminjaman_id' => $id));
    $this->load->view('admin/verifikasi', $data);
  }

  public function setuju($idt, $idp)
  {
    $peminjaman = $this->modelku->get_peminjaman_pinjam(array('peminjaman.peminjaman_id' => $idt));
    $fasilitas    = $this->modelku->get_peminjaman_pinjam(array('fasilitas.fasilitas_id' => $idp));
    if ($this->modelku->update(array('peminjaman_id' => $idt), array('status' => '1'), 'peminjaman')) {
      redirect('data_peminjaman_pinjam');
    }
  }

  public function kembali($idt, $idp)
  {
    $peminjaman = $this->modelku->get_peminjaman_pinjam(array('peminjaman.peminjaman_id' => $idt));
    $fasilitas    = $this->modelku->get_peminjaman_pinjam(array('fasilitas.fasilitas_id' => $idp));
    if ($this->modelku->update(array('peminjaman_id' => $idt), array('status' => '2'), 'peminjaman')) {
      redirect('data_peminjaman_pinjam');
    }
  }

  public function aksiverifikasi()
  {
    $peminjaman_id = $this->input->post('peminjaman_id');
    $status = $this->input->post('status');
    $keteranganditolak = $this->input->post('keteranganditolak');
    $data = array(
      'peminjaman_id' => $peminjaman_id,
      'status' => $status,
      'keteranganditolak' => '',
    );
    $data_update = array(
      'peminjaman_id' => $peminjaman_id,
      'status' => $status,
      'keteranganditolak' => $keteranganditolak,
    );
    if ($status == '1') {
      $simpan = $this->modelku->update(array('peminjaman_id' => $peminjaman_id), $data, 'peminjaman');
    } elseif ($status == '2') {
      $simpan = $this->modelku->update(array('peminjaman_id' => $peminjaman_id), $data_update, 'peminjaman');
    }
    if ($simpan) {
      redirect('data_peminjaman_pinjam');
    }
  }

  public function hapus($id)
  {
    $hapus = $this->modelku->delete(array('peminjaman_id' => $id), 'peminjaman');
    if ($hapus) {
      redirect('data_peminjaman_pinjam');
    }
  }
}
