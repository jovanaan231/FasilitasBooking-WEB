<?php

/**
 *
 */
class Uploadbukti extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (empty($this->session->userdata('is_login'))) {
      echo '<script>alert("Anda Harus Login Terlebih Dahulu");window.location.href="' . base_url('login') . '"</script>';
    }
  }

  // public function edit()
  // {
  // 	if ($this->input->get('id', TRUE)) {
  // 		$id = $this->input->get('id', TRUE);
  // 		$data["data"] = $this->M_kategori->ambil_satu(["idkategori" => $id]);
  // 		$this->load->view('uploadbukti', $data);
  // 	}
  // }



  public function edit($id)
  {
    $data['peminjaman'] = $this->modelku->get_peminjaman(array('peminjaman_id' => $id), 'peminjaman');
    $this->load->view('uploadbukti', $data);
  }

  public function simpan()
  {

    if ($this->input->post()) {
      $config['upload_path']     = './uploads/bukti/'; # FOLDER UPLOAD
      $config['allowed_types']   = 'gif|jpg|png|jpeg'; # FILE YANG DIIZINKAN
      $config['max_size']      = '6000'; # MAKSIMAL 2MB
      $config['encrypt_name']    = true; # ENKRIPSI NAMA FILE BIAR UNIK

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload("img")) {
      } else {
        $data_update = $this->modelku->update(
          array(
            "bukti_tf"     => $this->upload->data("file_name")
          ),
          'peminjaman'
        );

        $insert = $this->M_konfirmasi->insert($data);
        if ($insert) {
          # JIKA BERHASIL MASUKAN DB
          $this->session->set_flashdata('msg', '<div class="alert alert-success fade in alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>Bukti Pernyataan Berhasil Di Upload</div>');
        } else {
          # JIKA GAGAL MASUKAN KE DB
          $this->session->set_flashdata('msg', '<div class="alert alert-danger fade in alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>Pernyataan Gagal Di Upload</div>');
        }
      }
      redirect(site_url('akun'), 'refresh');
    }
  }
  public function simpan_bukti($id = null)
  {
    $peminjaman_id = $this->input->post('peminjaman_id');
    if (!empty($_FILES)) {
      $config['upload_path']          = getcwd() . '/upload/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 9024;
      // $config['max_width']            = 1024;
      // $config['max_height']           = 768;
      $config['encrypt_name']         = true;
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('gambar')) {
        $error = array('error' => $this->upload->display_errors());
        print_r($error);
      } else {
        $data = array('upload_data' => $this->upload->data());
        $filename = $data['upload_data']['file_name'];
        $data_update = array(
          'bukti'      => $filename,
        );
        $this->db->set($data_update);
        $this->db->where('peminjaman_id', $peminjaman_id);
        $this->db->update('peminjaman');
        // $simpan = $this->modelku->update(array('fasilitas_id'=>$fasilitas_id),$data_update, 'fasilitas');
        // if ($simpan) {
        $this->session->set_flashdata('msg', '<div class="alert alert-success fade in alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a> Bukti Pernyataan Berhasil Di Upload</div>');
        // redirect('akun');
        redirect(site_url('akun'), 'refresh');
        // }
      }
    } else {
      $this->session->set_flashdata('msg', '<div class="alert alert-danger fade in alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>Pernyataan Gagal Di Upload</div>');
      redirect(site_url('akun'), 'refresh');
    }
  }
}
