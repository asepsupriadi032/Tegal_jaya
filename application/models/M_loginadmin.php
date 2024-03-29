<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_loginadmin extends CI_Model
{

  function login()
  {

    try {
      $email = $this->input->post('email', true);
      $password = $this->input->post('password', true);
      $result = $this->db->get_where('admin', array(
        'email' => $email,
        'password' => $password,
        'status' => 1
      ))->row();

      if ($result) {
        $this->session->set_userdata('login_admin', true);
        $this->session->set_userdata('email', $result->email);
        $this->session->set_userdata('id_admin', $result->id);
        $this->session->set_userdata('nama', $result->nama);
        $this->session->set_userdata('kategori_user', $result->kategori_user);
        $this->session->set_userdata('gambar', $result->gambar);
        $this->session->set_userdata('theme', 'sb_admin');
        // var_dump($this->session->userdata()); die();

        redirect('admin/dashboard');
      } else {
        return "Maaf, Email atau Password Anda Salah !";
      }
    } catch (Exception $e) {
      return $e->getMessage();
    }
  }
}
