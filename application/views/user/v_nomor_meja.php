<?php
$this->load->view("user/header");
?>
<style type="text/css">
	p{
		color: #000 !important;
	}
	.bg2{
		background:rgba(25, 147, 221, 0.75);
		color:#000 !important;
	}

	.bg3{
		background:orange;
		color:#000 !important;
	}

	.bg1{
		background: #62dc62; 
		color:#000 !important;
	}
	.bg0{
		background: #b72020; 
		color:#000 !important;
	}
</style>
<div class="products">

	<div class="section_container">
	<h2><u>Nomor Meja</u></h2>
							<hr>
		<div class="row row-cols-1 row-cols-md-3 mr-5">
			<?php foreach ($rowMeja as $row) {
					if($row->status=='1'){//pelanggan sudah pilih tempat namun blm pesan
					?>
						<a href="#">
							<div class="col mb-2">
							    <div class="card bg1">
							      	<div class="card-body">
							        <h5 class="card-title">Meja <?php echo $row->no_meja; ?></h5>
							        <p class="card-text">
							        	Aktif
							        </p>
							      	</div>
							   </div>
							</div>
						</a>
			<?php }elseif($row->status=='2'){ //pelanggan menunggu pesanan?>
		        		<a href="#">
							<div class="col mb-2">
							    <div class="card bg2">
							      	<div class="card-body">
							        <h5 class="card-title">Meja <?php echo $row->no_meja; ?></h5>
							        <p class="card-text">
							        	Menunggu Pesanan
							        </p>
							      	</div>
							   </div>
							</div>
						</a>
			<?php }elseif($row->status=='3'){ //pelanggan sudah terima pesanan tpi blm bayhar?>
		        		<a href="#">
							<div class="col mb-2">
							    <div class="card bg3">
							      	<div class="card-body">
							        <h5 class="card-title">Meja <?php echo $row->no_meja; ?></h5>
							        <p class="card-text">
							        	Pesanan Diterima
							        </p>
							      	</div>
							   </div>
							</div>
						</a>
					<?php }else{ ?>
					<a href="<?php echo base_url('Index/pilih_meja?id='.$row->id_meja) ?>">
						<div class="col mb-2">
						    <div class="card bg0">
						      	<div class="card-body">
						        <h5 class="card-title">Meja <?php echo $row->no_meja; ?></h5>
						        <p class="card-text">
						        	Kosong
						        </p>
						      	</div>
						   </div>
						</div>
					</a>
				<?php } ?>
				
		  <?php } ?>
		</div>
	</div>
</div>

<?php
$this->load->view("user/footer");
?>