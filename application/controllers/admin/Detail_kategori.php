<?php
defined('BASEPATH') or exit('No direct script access allowed');
include('Super.php');

class Detail_kategori extends Super
{

    function __construct()
    {
        parent::__construct();
        $this->language       = 'english';
        /** Indonesian / english **/
        $this->tema           = "flexigrid";
        /** datatables / flexigrid **/
        $this->tabel          = "detail_kategori";
        $this->active_id_menu = "detail_kategori";
        $this->nama_view      = "detail kategori";
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
        /** Bagian GROCERY CRUD USER**/


        /** Relasi Antar Tabel 
         * @parameter (nama_field_ditabel_ini, tabel_relasi, field_dari_tabel_relasinya)
         **/
        $this->crud->set_relation('id_kategori', 'kategori', 'kategori');

        /** Upload **/
        $this->crud->set_field_upload('gambar', $this->folder_upload);

        /** Ubah Nama yang akan ditampilkan**/
        // $this->crud->display_as('nama','Nama Setelah di Edit')
        $this->crud->display_as('id_kategori', "Kategori");

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
                'nama' => 'Admin',
                'icon' => 'fa fa-users',
                'url' => 'admin/useradmin'
            ),
        );
        return $data;
    }
}
