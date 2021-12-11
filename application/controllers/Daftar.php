<?php

class Daftar extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $nama = $this->input->post('nama_lengkap');
    $notelp = $this->input->post('notelp');
    $alamat = $this->input->post('alamat');
    $email = $this->input->post('email');
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $data = array(
      'nama_lengkap' => $nama,
      'notelp'       => $notelp,
      'alamat'       => $alamat,
      'email'        => $email,
      'username'        => $username,
      'password'     => $password,
      'level'     => 'Mahasiswa',
    );

    $this->form_validation->set_rules('nama_lengkap', 'Nama Awal', 'required');
    $this->form_validation->set_rules('notelp', 'No Telp', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('username', 'Username', 'required|callback_check_usernamelama');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_emaillama');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

    if ($this->form_validation->run()) {
      if ($this->session->userdata('captcha') != $this->input->post('kode')) {
        $this->session->set_flashdata('msg', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>Kode Captcha Salah</div>');
        redirect(site_url('login'), $data);
      } else {
        $a = $this->modelku->insert($data, 'users');
        if ($a) {
          $this->session->set_flashdata('msg', '<div class="alert alert-success">Daftar Berhasil</div>');
          redirect('daftar');
        } else {
          $this->session->set_flashdata('msg', '<div class="alert alert-danger">Daftar Gagal</div>');
          redirect('daftar');
        }
      }
    }
    $this->load->view('daftar', $data);
  }

  public function check_emaillama($email_inputan)
  {
    $email_db = $this->modelku->checkEmailLama($email_inputan)->row();

    if (!empty($email_db)) {
      $this->form_validation->set_message('check_emaillama', 'Email Sudah Ada');
      return FALSE;
    }
    return TRUE;
  }

  public function check_usernamelama($username_inputan)
  {
    $username_db = $this->modelku->checkUsernameLama($username_inputan)->row();

    if (!empty($username_db)) {
      $this->form_validation->set_message('check_usernamelama', 'Username Sudah Ada');
      return FALSE;
    }
    return TRUE;
  }

  public function captcha()
  {
    ini_set('display_errors', 'off');
    $width = 85; //Ukuran lebar
    $height = 35; //Tinggi
    $im = imagecreate($width, $height);
    $bg = imagecolorallocate($im, 0, 0, 0);
    $len = 6; //Panjang karakter
    $chars = '12345abcdefg'; //Kombinasi huruf dan angka yang diacak
    $string = '';
    for ($i = 0; $i < $len; $i++) {
      $pos = rand(0, strlen($chars) - 1);
      $string .= $chars{
        $pos};
    }
    //$_SESSION['kode_captcha'] = $string;
    $this->session->set_userdata('captcha', $string);
    //menambahkan titik2 gambar / noise
    $bgR = mt_rand(100, 200);
    $bgG = mt_rand(100, 200);
    $bgB = mt_rand(100, 200);
    $noise_color = imagecolorallocate($im, abs(255 - $bgR), abs(255 - $bgG), abs(255 - $bgB));
    for ($i = 0; $i < ($width * $height) / 3; $i++) {
      imagefilledellipse($im, mt_rand(0, $width), mt_rand(0, $height), 3, rand(2, 5), $noise_color);
    }
    // proses membuat tulisan
    $text_color = imagecolorallocate($im, 240, 240, 240);
    $rand_x = rand(0, $width - 50);
    $rand_y = rand(0, $height - 15);
    imagestring($im, 12, $rand_x, $rand_y, $string, $text_color);
    header("Content-type: image/png"); //Output format gambar
    imagepng($im);
  }
}
