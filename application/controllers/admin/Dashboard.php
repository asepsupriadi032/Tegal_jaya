<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('login_admin')) {
            redirect('admin/login');
        }
    }

    function index()
    {
        $data['active']     = 'dash';
        $data['judul_1']    = '[' . $this->session->userdata('kategori_user') . '] -' . $this->session->userdata('nama');
        $data['judul_2']    = 'Selamat Datang';
        $data['page']       = 'v_dashboard';
        $data['menu']       = $this->Menus->generateMenu();
        $data['breadcumbs'] = array(
            array(
                'nama' => 'Dashboard',
                'icon' => 'fa fa-dashboard',
                'url' => 'admin/dashboard'
            ),
        );

        $this->db->where('status', '1');
        $this->db->or_where('status', '2');
        $this->db->or_where('status', '3');
        $data['meja'] = $this->db->get('meja')->num_rows();

        $dateNow = date('Y-m-d');

        $this->db->like('tanggal_pesanan', $dateNow);
        $this->db->where('status', 'lunas');
        $data['hariIni'] = $this->db->get('struk')->num_rows();


        $this->db->where('status', 'lunas');
        $data['total'] = $this->db->get('struk')->num_rows();

        $this->load->view('admin/' . $this->session->userdata('theme') . '/v_index', $data);
    }
}
