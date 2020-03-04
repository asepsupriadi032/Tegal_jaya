<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('Super.php');

class Pesananlunas extends Super
{
    
    function __construct()
    {
        parent::__construct();
        $this->language       = 'english'; /** Indonesian / english **/
        $this->tema           = "flexigrid"; /** datatables / flexigrid **/
        $this->tabel          = "struk";
        $this->active_id_menu = "Pesanan Lunas";
        $this->nama_view      = "Pesanan Lunas";
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

    function index(){
            $data = [];
            if($this->crud->getState()=='list')

                redirect(base_url('admin/Pesananlunas/listStruk'));
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
            $data = array_merge($data,$this->generateBreadcumbs());
            $data = array_merge($data,$this->generateData());
            $this->generate();
            $data['output'] = $this->crud->render();
            $this->load->view('admin/'.$this->session->userdata('theme').'/v_index',$data);
    }

    private function generateBreadcumbs(){
        $data['breadcumbs'] = array(
                array(
                    'nama'=>'Dashboard',
                    'icon'=>'fa fa-dashboard',
                    'url'=>'admin/dashboard'
                ),
                array(
                    'nama'=>'Admin',
                    'icon'=>'fa fa-users',
                    'url'=>'admin/useradmin'
                ),
            );
        return $data;
    }

    public function listStruk(){
        $data = [];
        $data = array_merge($data,$this->generateBreadcumbs());
        $data = array_merge($data,$this->generateData());
        $this->generate();
        $data['page'] = "pesanan_lunas";
        $data['output'] = $this->crud->render();

        $this->db->select('struk.id_struk, struk.id_meja, struk.status, struk.nama, struk.status, struk.tanggal_pesanan, struk.tipe_pesanan, struk.total, meja.no_meja');
        $this->db->order_by('struk.id_struk','desc');
        $this->db->where('struk.status','lunas');
        $this->db->join('meja','meja.id_meja=struk.id_meja');
        $data['detail_struk'] = $this->db->get('struk')->result();
        $this->load->view('admin/'.$this->session->userdata('theme').'/v_index',$data);
    }


    
}