<?php
defined('BASEPATH') or exit('No direct script access allowed');
include('Super.php');

class Useradmin extends Super
{

    function __construct()
    {
        parent::__construct();
        $this->language       = 'english';
        /** Indonesian / english **/
        $this->tema           = "datatables";
        /** datatables / flexigrid **/
        $this->tabel          = "admin";
        $this->active_id_menu = "useradmin";
        $this->nama_view      = "User";
        $this->status         = true;
        $this->field_tambah   = array('email', 'password', 'nama', 'status', 'kategori_user');
        $this->field_edit     = array('email', 'password', 'nama', 'status', 'kategori_user');
        $this->field_tampil   = array('email', 'nama');
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
        // $this->crud->set_relation('user_id','users','username');

        /** Upload **/
        // $this->crud->set_field_upload('nama_field_upload',$this->folder_upload);  

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
                'nama' => 'Admin',
                'icon' => 'fa fa-users',
                'url' => 'admin/useradmin'
            ),
        );
        return $data;
    }
}
