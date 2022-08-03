<?php
defined('BASEPATH') or exit('No direct script access allowed');
include('Super.php');

class Pesanan extends Super
{

  function __construct()
  {
    parent::__construct();
    $this->language       = 'english';
    /** Indonesian / english **/
    $this->tema           = "flexigrid";
    /** datatables / flexigrid **/
    $this->tabel          = "struk";
    $this->active_id_menu = "list_pesanan";
    $this->nama_view      = "List Pesanan";
    $this->status         = true;
    $this->field_tambah   = array();
    $this->field_edit     = array();
    $this->field_tampil   = array();
    $this->folder_upload  = 'assets/uploads/files';
    $this->add            = true;
    $this->edit           = true;
    $this->delete         = true;
    $this->crud;
  }

  function index()
  {
    $data = [];
    if ($this->crud->getState() == 'list')

      redirect(base_url('admin/Pesanan/listStruk'));
    //if($this->crud->getState() == "read")
    //redirect (base_url('admin/produk/detail/'.$this->uri->segment(5)));
    /** Bagian GROCERY CRUD USER**/


    /** Relasi Antar Tabel 
     * @parameter (nama_field_ditabel_ini, tabel_relasi, field_dari_tabel_relasinya)
     **/
    // $this->crud->set_relation('id_meja','meja','no_meja');
    // $this->crud->set_relation_n_n('warna','relasi_warna','warna','id_produk','id_warna','warna');

    /** Upload **/
    // $this->crud->set_field_upload('nama_field_upload',$this->folder_upload);  
    // $this->crud->set_field_upload('gambar',$this->folder_upload);  

    /** Ubah Nama yang akan ditampilkan**/
    // $this->crud->display_as('nama','Nama Setelah di Edit')
    //     ->display_as('email','Email Setelah di Edit'); 

    /** Akhir Bagian GROCERY CRUD Edit Oleh User**/
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
        'nama' => $this->session->userdata('kategori_user'),
        'icon' => 'fa fa-users',
        'url' => 'admin/useradmin'
      ),
    );
    return $data;
  }

  public function listStruk()
  {
    // $data = [];

    // echo $this->session->userdata('kategori_user')."<br>";
    $this->db->select('struk.id_struk, struk.id_meja, struk.status, struk.status, struk.tanggal_pesanan, struk.tipe_pesanan, struk.total, meja.no_meja');
    $this->db->order_by('struk.id_struk', 'desc');
    if ($this->session->userdata('kategori_user') != 'Admin') {
      $this->db->where('struk.status', 'proses');
      $this->db->or_where('struk.status', 'diterima');

      if ($this->session->userdata('kategori_user') == 'Kasir') {
        $this->db->or_where('struk.status', 'diterima');
      }
    }
    $this->db->join('meja', 'meja.id_meja=struk.id_meja');
    $data['detail_struk'] = $this->db->get('struk')->result();

    $data = array_merge($data, $this->generateBreadcumbs());
    $data = array_merge($data, $this->generateData());
    $this->generate();
    $data['page'] = "detail_struk";
    $data['output'] = $this->crud->render();
    $this->load->view('admin/' . $this->session->userdata('theme') . '/v_index', $data);
  }

  public function detailStruk($id_struk)
  {
    $data = [];
    $data = array_merge($data, $this->generateBreadcumbs());
    $data = array_merge($data, $this->generateData());
    $this->generate();
    $data['page'] = "detail_list_struk";
    $data['output'] = $this->crud->render();

    $this->db->where('pesanan.id_struk', $id_struk);
    $this->db->join('detail_kategori', 'detail_kategori.id_detail=pesanan.id_detail');
    $data['detail_pesanan'] = $this->db->get('pesanan')->result();

    $this->load->view('admin/' . $this->session->userdata('theme') . '/v_index', $data);
  }

  public function bayar($id_struk)
  {
    $data = [];
    $data = array_merge($data, $this->generateBreadcumbs());
    $data = array_merge($data, $this->generateData());
    $this->generate();
    $data['page'] = "detail_struk";
    $data['output'] = $this->crud->render();

    $this->db->where('id_struk', $id_struk);
    $this->db->set('status', 'lunas');
    $this->db->update('struk');

    $this->db->where('id_struk', $id_struk);
    $row = $this->db->get('struk')->row();
    $id_meja = $row->id_meja;

    $this->db->where('id_meja', $id_meja);
    $this->db->set('status', '0');
    $this->db->set('kode_pemesan', '');
    $this->db->update('meja');


    redirect(base_url('admin/Pesanan/listStruk'));
  }

  public function antar($id = NULL)
  {

    $row = $this->db->get_where('struk', array('id_struk' => $id))->row();
    $id_meja = $row->id_meja;

    $this->db->where('id_meja', $id_meja);
    $this->db->set('status', '3');
    $this->db->update('meja');

    $this->db->where('struk.id_struk', $id);
    $this->db->set('status', 'diterima');
    $this->db->update('struk');

    redirect(base_url('admin/Pesanan/listStruk'));
  }

  public function batal($id_struk)
  {

    $row = $this->db->get_where('struk', array('id_struk' => $id_struk))->row();
    $id_meja = $row->id_meja;

    $this->db->where('id_meja', $id_meja);
    $this->db->set('status', '0');
    $this->db->update('meja');

    $this->db->where('struk.id_struk', $id_struk);
    $this->db->delete('struk');

    redirect(base_url('admin/Pesanan/listStruk'));
  }
}
