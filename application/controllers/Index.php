<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {


	function __construct(){
		parent::__construct();
	}

	public function index()
	{
		
		$this->load->view('user/home');
	
	}

	public function menu(){

		$this->load->view("user/menu");
	}

	public function makanan($id_kategori = NULL){
		if(!empty($id_kategori)){
			$this->db->where('id_kategori',$id_kategori);	
		}
		if (!empty($this->input->post("search"))){
			$this->db->like("judul_kategori", $this->input->post("search"));
		}
		$data["makanan"]=$this->db->get("detail_kategori")->result();
		$this->load->view("user/makanan",$data);
	}
	
	public function minuman(){
		$this->db->where('id_kategori','2');
		$data["minuman"]=$this->db->get("detail_kategori")->result();
		$this->load->view("user/minuman",$data);
	}

	public function input_nomor_meja(){
		// $this->db->where('status','0');
		$this->db->order_by('no_meja','ASC');
		$data['rowMeja'] = $this->db->get('meja')->result();
		// var_dump($data); die();
		$this->load->view("user/v_nomor_meja", $data);
	}


	public function pilih_meja(){
		// var_dump($_GET); exit();
		$id_meja = $_GET['id'];
		// $id_meja = $this->input->post('no_meja');
		// $nama = $this->input->post('nama');
		$dateNow = date('Y-m-d H:is');
		$kode_pemesan = $id_meja.$nama.$dateNow;
		$this->session->set_userdata('kode_pemesan',$kode_pemesan);

		$this->db->where('id_meja',$id_meja);
		// $this->db->set('nama_pemesan',$nama);
		$this->db->set('kode_pemesan',$kode_pemesan);
		$this->db->set('status','1');
		$this->db->update('meja');
		// print_r($this->session->userdata()); die();
		redirect(base_url());
	}

	public function destroy(){
		$this->session->sess_destroy();
		$this->cart->destroy();
		redirect(base_url());
	}

	public function input_makanan($id_detail){
		$this->db->where('id_detail',$id_detail);
		$this->db->join("kategori","kategori.id_kategori=detail_kategori.id_kategori");
		$getData = $this->db->get('detail_kategori')->row();

		$data = array(
			'id' =>$getData->id_detail,
			'qty' => 1,
			'name' => $getData->judul_kategori,
			'price' => $getData->harga,
			'image' => $getData->gambar,
			"kategori"=> $getData->kategori,
			"id_kategori" => $getData->id_kategori
		);

		$this->cart->insert($data);
		// var_dump($this->cart->contents()); die();

		header('Location: '.$_SERVER['HTTP_REFERER']);
	}

	public function cart(){
		$this->load->view("user/v_detailcart");	
	}

	public function hapusCart($id_detail, $jumlah){

		$this->db->where('id_detail',$id_detail);
		$this->db->join("kategori","kategori.id_kategori=detail_kategori.id_kategori");
		$getData = $this->db->get('detail_kategori')->row();

		$data = array(
			'id' =>$getData->id_detail,
			'qty' => - $jumlah,
			'name' => $getData->judul_kategori,
			'price' => $getData->harga,
			'image' => $getData->gambar,
			"kategori"=> $getData->kategori,
			"id_kategori" => $getData->id_kategori
		);

		$this->cart->insert($data);

		foreach ($this->cart->contents() as $key) {
			if($key['qty']<=0){
				$this->cart->remove($key['rowid']);
			}
		}
		// var_dump($this->cart->contents()); die();

		header('Location: '.$_SERVER['HTTP_REFERER']);

	}

	public function pesanMakanan(){

		$kode_pemesan = $this->session->userdata("kode_pemesan");
		$this->db->where('kode_pemesan',$kode_pemesan);
		$row = $this->db->get('meja')->row();

		$id_meja = $row->id_meja;
		// $nama = $row->nama_pemesan;
		$tipe = $this->input->post('tipe');
		$tanggal_pesanan = date("Y-m-d H:i:s");

		// var_dump($this->session->userdata()); die();
		$total=0;
		$countRow = 1;
          foreach ($this->cart->contents() as $key) {
            $jumlah = $key["qty"];
            $subtotal = $key["subtotal"];
            $total = $total + $subtotal;
            $countRow ++;
        }

        $this->db->set("id_meja",$id_meja);
        // $this->db->set("nama",$nama);
        $this->db->set("tanggal_pesanan",$tanggal_pesanan);
        $this->db->set("total",$total);
        $this->db->set("status","proses");
        $this->db->set("tipe_pesanan",$tipe);
        $this->db->insert("struk");

        $id_struk=$this->db->insert_id();

       
          foreach ($this->cart->contents() as $key) {
            $id_detail = $key["id"];
            $harga = $key["price"];
            $jumlah = $key["qty"];
            $subtotal = $key["subtotal"];

        	$this->db->set("id_detail",$id_detail);
	        $this->db->set("id_struk",$id_struk);
	        $this->db->set("jumlah",$jumlah);
	        $this->db->set("subtotal",$subtotal);
	        $this->db->insert("pesanan");
        }
        $this->cart->destroy();

        $this->db->where('id_meja',$id_meja);
        $this->db->set('status','2');
        $this->db->update('meja');

        redirect(base_url('Index/destroy'));

	}

	public function detailPesanan($kode_pemesan){
		$kode_pemesan = $this->session->userdata("kode_pemesan");
		// echo $kode_pemesan; die();
		$this->db->where('meja.kode_pemesan',$kode_pemesan);
		$this->db->where('struk.status','proses');
		$this->db->join('meja','meja.id_meja=struk.id_meja');
		$row = $this->db->get('struk')->row();

		$id_struk = $row->id_struk;
		$this->db->where('pesanan.id_struk',$id_struk);
		$this->db->join('detail_kategori','detail_kategori.id_detail=pesanan.id_detail');
		$data['detail_pesanan'] = $this->db->get('pesanan')->result();
		// var_dump($data);
		$this->load->view('user/v_detail_pesanan', $data);
		// echo $id_strukss;
	}

	public function batal($id_meja =NULL){
		$this->db->where('id_meja', $id_meja);
		$this->db->set('status','0');
		$this->db->update('meja');

		$this->session->sess_destroy();

		$this->cart->destroy();

		redirect(base_url());
	}
	
}