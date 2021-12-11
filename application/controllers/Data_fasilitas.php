<?php

/**
 *
 */
class Data_fasilitas extends CI_Controller
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
    $data['fasilitas'] = $this->modelku->get_fasilitas(array(), 'fasilitas');
    $this->load->view('admin/data_fasilitas_view', $data);
  }

  public function edit($id)
  {
    $data['kategori'] = $this->modelku->get_where(array(), 'kategori');
    $data['fasilitas'] = $this->modelku->get_fasilitas(array('fasilitas_id' => $id), 'fasilitas');
    $this->load->view('admin/edit_fasilitas_view', $data);
  }

  public function tambah()
  {
    $data['kategori'] = $this->modelku->get_where(array(), 'kategori');
    $this->load->view('admin/tambah_fasilitas_view', $data);
  }

  public function hapus($id)
  {
    $hapus = $this->modelku->delete(array('fasilitas_id' => $id), 'fasilitas');
    if ($hapus) {
      redirect('data_fasilitas');
    }
  }

  public function simpan()
  {
    $nama_fasilitas = $this->input->post('nama_fasilitas');
    $kategori = $this->input->post('kategori');
    $deskripsi = $this->input->post('deskripsi');
    if (!empty($_FILES)) {
      $config['upload_path']          = getcwd() . '/upload/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 5024;
      $config['encrypt_name']         = true;
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('gambar')) {
        $error = array('error' => $this->upload->display_errors());
        print_r($error);
      } else {
        $data = array('upload_data' => $this->upload->data());
        $filename = $data['upload_data']['file_name'];
        $data_update = array(
          'kategori_id' => $kategori,
          'nama_fasilitas' => $nama_fasilitas,
          'deskripsi'   => $deskripsi,
          'gambar'      => $filename,
        );
        $simpan = $this->modelku->insert($data_update, 'fasilitas');
        if ($simpan) {
          redirect('data_fasilitas');
        }
      }
    } else {
      $data_update = array(
        'kategori_id' => $kategori,
        'nama_fasilitas' => $nama_fasilitas,
        'deskripsi'   => $deskripsi,
      );
      $simpan = $this->modelku->insert($data_update, 'fasilitas');
      if ($simpan) {
        redirect('data_fasilitas');
      }
    }
  }

  public function simpan_edit()
  {
    $fasilitas_id = $this->input->post('fasilitas_id');
    $nama_fasilitas = $this->input->post('nama_fasilitas');
    $kategori = $this->input->post('kategori');
    $deskripsi = $this->input->post('deskripsi');
    if (!empty($_FILES)) {
      $config['upload_path']          = getcwd() . '/upload/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 1024;
      $config['encrypt_name']         = true;
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('gambar')) {
        $error = array('error' => $this->upload->display_errors());
        print_r($error);
      } else {
        $data = array('upload_data' => $this->upload->data());
        $filename = $data['upload_data']['file_name'];
        $data_update = array(
          'kategori_id' => $kategori,
          'nama_fasilitas' => $nama_fasilitas,
          'deskripsi'   => $deskripsi,
          'gambar'      => $filename,
        );
        $simpan = $this->modelku->update(array('fasilitas_id' => $fasilitas_id), $data_update, 'fasilitas');
        if ($simpan) {
          redirect('data_fasilitas');
        }
      }
    } else {
      $data_update = array(
        'kategori_id' => $kategori,
        'nama_fasilitas' => $nama_fasilitas,
        'deskripsi'   => $deskripsi,
      );
      $simpan = $this->modelku->update(array('fasilitas_id' => $fasilitas_id), $data_update, 'fasilitas');
      if ($simpan) {
        redirect('data_fasilitas');
      }
    }
  }
}
