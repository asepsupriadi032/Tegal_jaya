<?php
defined('BASEPATH') or exit('No direct script access allowed');
include('Super.php');

class Laporan extends Super
{

  function __construct()
  {
    parent::__construct();
    $this->language       = 'english';
    /** Indonesian / english **/
    $this->tema           = "flexigrid";
    /** datatables / flexigrid **/
    $this->tabel          = "struk";
    $this->active_id_menu = "laporan";
    $this->nama_view      = "Laporan";
    $this->status         = true;
    $this->field_tambah   = array();
    $this->field_edit     = array();
    $this->field_tampil   = array('tanggal_pesanan', 'total', 'status', 'tipe_pesanan');
    $this->folder_upload  = 'assets/uploads/files';
    $this->add            = false;
    $this->edit           = false;
    $this->delete         = false;
    $this->crud;
  }

  function index()
  {
    $data = [];
    /** Bagian GROCERY CRUD USER**/
    if ($this->crud->getState() == 'read') {
      $stateInfo = $this->crud->getStateInfo();
      $id = $stateInfo->primary_key;
      redirect(base_url('admin/Laporan/detailStruk/' . $id));
    }

    /** Relasi Antar Tabel 
     * @parameter (nama_field_ditabel_ini, tabel_relasi, field_dari_tabel_relasinya)
     **/
    // $this->crud->set_relation('parent_menu','tjm_menu','nama_menu');

    /** Upload **/
    // $this->crud->set_field_upload('nama_field_upload',$this->folder_upload);  

    /** Ubah Nama yang akan ditampilkan**/
    // $this->crud->display_as('nama','Nama Setelah di Edit')
    //     ->display_as('email','Email Setelah di Edit'); 

    /** Akhir Bagian GROCERY CRUD Edit Oleh User**/
    $this->crud->where('status', 'lunas');
    $data = array_merge($data, $this->generateBreadcumbs());
    $data = array_merge($data, $this->generateData());
    $this->generate();
    $data['output'] = $this->crud->render();
    $this->load->view('admin/' . $this->session->userdata('theme') . '/v_index', $data);
  }

  private function generateBreadcumbs()
  {
    $data['breadcumbs'] = array(
      array(
        'nama' => 'Dashboard',
        'icon' => 'fa fa-dashboard',
        'url' => 'admin/dashboard'
      ),
      array(
        'nama' => 'Admin',
        'icon' => 'fa fa-users',
        'url' => 'admin/useradmin'
      ),
    );
    return $data;
  }

  public function detailStruk($id)
  {

    $data = [];
    $this->db->where('pesanan.id_struk', $id);
    $this->db->join('detail_kategori', 'detail_kategori.id_detail=pesanan.id_detail');
    $data['detail_pesanan'] = $this->db->get('pesanan')->result();

    $data = array_merge($data, $this->generateBreadcumbs());
    $data = array_merge($data, $this->generateData());
    $this->generate();
    $data['page'] = "detail_list_struk";
    $data['output'] = $this->crud->render();

    $this->load->view('admin/' . $this->session->userdata('theme') . '/v_index', $data);
  }
}
