<?php
$this->load->view("user/header");
?>
<div class="products">
		<div class="section_container">
			<!-- <div class="container">
				<div class="row">
					<div class="col">
						<div class="products_container grid"> -->

						<form action="<?php echo base_url('Index/pilih_meja') ?>" method="post">
							<h2><u>Nomor Meja</u></h2>
							<hr>
							<div class="row">
								<div class="col-md-2">
									<label>No Meja</label>
								</div>
								<div class="col-md-4">
									<select name="no_meja" id="no_meja" class="form-control">
									<?php foreach ($rowMeja as $key) { ?>
										<option value="<?php echo $key->id_meja ?>"><?php echo $key->no_meja ?></option>
									<?php } ?>
									</select>
								</div>
							</div>
							<div class="row"  style="margin-top: 15px;">
								<div class="col-md-2">
									<label>Nama</label>
								</div>
								<div class="col-md-4">
									<input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Anda" required="">
								</div>
							</div>
							<div class="row" style="margin-top: 15px;">
								<div class="col-md-6 text-right">
									
									<input type="submit" name="" value="Masuk" class="btn btn-secondary">
								</div>
							</div>
						</form>

						<!-- </div>
					</div>
				</div>
			</div> -->
		</div>
	</div>

<?php
$this->load->view("user/footer");
?>