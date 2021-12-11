<?php

class Modelku extends CI_model
{

  public $table = "peminjaman";

  public function __construct()
  {
    parent::__construct();
  }

  public function ambil_satu($syarat)
  {
    $this->db->where($syarat);
    return $this->db->get($this->table)->row();
  }

  public function format_tanggal($tgl)
  {
    $y    = date('Y', strtotime($tgl));
    $d    = date('d', strtotime($tgl));
    $dt_m = date('m', strtotime($tgl));
    $m    = $this->month($dt_m);
    $date = $d . ' ' . $m . ' ' . $y;
    return $date;
  }

  public function month($dt)
  {
    $array = array(
      '01' => 'Januari',
      '02' => 'Febuari',
      '03' => 'Maret',
      '04' => 'April',
      '05' => 'Mei',
      '06' => 'Juni',
      '07' => 'Juli',
      '08' => 'Agustus',
      '09' => 'September',
      '10' => 'Oktober',
      '11' => 'November',
      '12' => 'Desember',
    );
    return $array[$dt];
  }




  public function get_where($where = array(), $table)
  {
    $this->db->from($table);
    $this->db->where($where);
    return $this->db->get()->result();
  }

  public function get_dimana($where = array(), $table)
  {
    $this->db->from($table);
    $this->db->where($where);
    return $this->db->get()->row();
  }

  public function get_fasilitas($where = array())
  {
    $this->db->from('fasilitas');
    $this->db->join('kategori', 'fasilitas.kategori_id = kategori.kategori_id', 'LEFT');
    $this->db->where($where);
    return $this->db->get()->result();
  }

  public function get_fasilitas_limit($where = array())
  {
    $this->db->from('fasilitas');
    $this->db->join('kategori', 'fasilitas.kategori_id = kategori.kategori_id', 'LEFT');
    $this->db->where($where);
    return $this->db->get()->result();
  }

  public function get_fasilitas_user()
  {
    $this->db->from('fasilitas');
    $this->db->join('kategori', 'fasilitas.kategori_id = kategori.kategori_id', 'LEFT');
    return $this->db->get()->result();
  }

  public function get_peminjaman_pinjam($where)
  {
    $this->db->from('peminjaman');
    $this->db->join('fasilitas', 'peminjaman.fasilitas_id = fasilitas.fasilitas_id');
    $this->db->join('kategori', 'fasilitas.kategori_id = kategori.kategori_id');
    $this->db->join('users', 'users.user_id = peminjaman.user_id');
    $this->db->where($where);
    return $this->db->get()->result();
  }


  public function insert($data, $table)
  {
    return $this->db->insert($table, $data);
  }

  public function delete($where, $table)
  {
    $this->db->where($where);
    return $this->db->delete($table);
  }

  public function update($where, $data, $table)
  {
    $this->db->where($where);
    return $this->db->update($table, $data);
  }

  public function get_peminjaman($where = array())
  {
    $this->db->select('*');
    $this->db->from('peminjaman');
    $this->db->join('users', 'users.user_id = peminjaman.user_id');
    $this->db->join('fasilitas', 'peminjaman.fasilitas_id = fasilitas.fasilitas_id');
    $this->db->join('kategori', 'fasilitas.kategori_id = kategori.kategori_id');
    $this->db->where($where);
    return $this->db->get()->result();
  }

  public function get_user($where = array())
  {
    $this->db->from('users');
    $this->db->where($where);
    return $this->db->get()->result();
  }

  public function get_peminjamanhome()
  {
    $this->db->select('*');
    $this->db->from('peminjaman');
    $this->db->join('users', 'users.user_id = peminjaman.user_id');
    $this->db->join('fasilitas', 'peminjaman.fasilitas_id = fasilitas.fasilitas_id');
    $this->db->join('kategori', 'fasilitas.kategori_id = kategori.kategori_id');
    $this->db->where('status', '1');
    $this->db->or_where('status', '3');
    return $this->db->get()->result();
  }

  public function checkEmailLama($email_inputan)
  {
    return $this->db->get_where('users', ['email' => $email_inputan]);
  }

  public function checkUsernameLama($username_inputan)
  {
    return $this->db->get_where('users', ['username' => $username_inputan]);
  }
}
