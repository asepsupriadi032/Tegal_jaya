<?php
$this->load->view("user/header");
?>
<div class="products">
		<div class="section_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="products_container grid">

							<?php foreach ($makanan as $row) { ?>
							<!-- Product -->
							<div class="product grid-item">
								<div class="product_inner">
									<div class="product_image">
									<center><img src="<?php echo base_url('assets/uploads/files') ?>/<?php echo $row->gambar; ?>" alt="" height="150px"></div>
									<div class="product_content text-center">
										<div class="product_title"><a href="product.html"><?php echo $row->judul_kategori; ?></a></div>
										<div class="product_price">Rp. <?php echo $row->harga; ?></div>
										<div class="product_button ml-auto mr-auto trans_200">
											<?php  if ($this->session->userdata("kode_pemesan")!=""){?>  
											<a href="<?php echo base_url('Index/input_makanan')."/".$row->id_detail ?>">Tambah</a>
										<?php }else{ ?>
											<a href="<?php echo base_url("Index/input_nomor_meja") ?>">Pilih Meja</a>
										<?php } ?>
										</div>
									</div>
								</div>	
							</div>

							<?php } ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php
$this->load->view("user/footer");
?>