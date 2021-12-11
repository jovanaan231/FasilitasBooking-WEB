<?php

/**
 *
 */
class Data_member extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    if ($this->session->userdata('level') == 'Manajemen') {
      $data['member'] = $this->modelku->get_where(array('level !=' => 'Admin'), 'users');
    } else {
      $data['member'] = $this->modelku->get_where(array(), 'users');
    }
    $this->load->view('admin/data_member_view', $data);
  }
  public function tambahmember()
  {
    $this->load->view('admin/tambahmember');
  }
  public function simpan()
  {
    $nama = $this->input->post('nama');
    $notelp = $this->input->post('notelp');
    $alamat = $this->input->post('alamat');
    $email = $this->input->post('email');
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $level = $this->input->post('level');
    $data = array(
      'nama_lengkap' => $nama,
      'notelp'       => $notelp,
      'alamat'       => $alamat,
      'email'        => $email,
      'username'        => $username,
      'password'     => $password,
      'level'     => $level,
    );
    $a = $this->modelku->insert($data, 'users');
    if ($a) {
      $this->session->set_flashdata('msg', '<div class="alert alert-success">Akun Berhasil Di Daftarkan</div>');
      redirect('data_member/');
    } else {
      $this->session->set_flashdata('msg', '<div class="alert alert-danger">Anda gagal mendaftar, Coba Lagi</div>');
      redirect('data_member/');
    }
  }
  public function edit($id)
  {
    $data['users'] = $this->modelku->get_user(array('user_id' => $id), 'users');
    $this->load->view('admin/editmember', $data);
  }
  public function simpanedit()
  {
    $user_id = $this->input->post('user_id');
    $nama = $this->input->post('nama');
    $notelp = $this->input->post('notelp');
    $alamat = $this->input->post('alamat');
    $email = $this->input->post('email');
    $level = $this->input->post('level');
    $data = array(
      'nama_lengkap' => $nama,
      'notelp'       => $notelp,
      'alamat'       => $alamat,
      'email'        => $email,
      'level'     => $level,
    );
    $a = $this->modelku->update(array('user_id' => $user_id), $data, 'users');
    if ($a) {
      $this->session->set_flashdata('msg', '<div class="alert alert-success">Akun Berhasil Di Edit</div>');
      redirect('data_member/');
    } else {
      $this->session->set_flashdata('msg', '<div class="alert alert-danger">Anda Gagal Di Edit, Coba Lagi</div>');
      redirect('data_member/');
    }
  }
  public function hapus($id)
  {
    $hapus = $this->modelku->delete(array('user_id' => $id), 'users');
    if ($hapus) {
      redirect('data_member');
    }
  }
}
