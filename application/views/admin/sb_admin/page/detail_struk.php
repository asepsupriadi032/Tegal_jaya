<u><i><h3>Daftar Pesanan:</h3></i></u>
<table class="table table-bordered" id="datatables" class="datatables">
	<thead>
		<tr>
			<th>No</th>
			<th>tanggal</th>
			<th>Meja</th>
			<th>Total</th>
			<th>Status</th>
			<th>Jenis Pesanan</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$no = 1;
			foreach ($detail_struk as $key) {
		?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $key->tanggal_pesanan ?></td>
			<td><?php echo $key->no_meja ?></td>
			<td><?php echo "Rp. ".number_format($key->total,0,'','.'); ?></td>
			<td><?php echo $key->status ?></td>
			<td><?php echo $key->tipe_pesanan ?></td>
			<td>
				<a href="<?php echo base_url('admin/Pesanan/detailStruk')."/".$key->id_struk; ?>">Lihat</a> | 
				<?php if($this->session->userdata('kategori_user') == "pelayan"){?>
					<a href="<?php echo base_url('admin/Pesanan/antar')."/".$key->id_struk; ?>">Antar</a>
				<?php }elseif ($this->session->userdata('kategori_user') == "Kasir") {
						if($key->status=="proses"){
				?>
						<a href="<?php echo base_url('admin/Pesanan/batal')."/".$key->id_struk; ?>">Batal</a>
					<?php }else{ ?>
						<a href="<?php echo base_url('admin/Pesanan/bayar')."/".$key->id_struk; ?>">Bayar</a>
					<?php } ?>
				<?php }else{ ?>
					<a href="<?php echo base_url('admin/Pesanan/bayar')."/".$key->id_struk; ?>">Bayar</a> | <a href="<?php echo base_url('admin/Pesanan/antar')."/".$key->id_struk; ?>">Antar</a>
				<?php } ?>
				
			</td>
		</tr>
		<?php
			$no++;
			}
		?>
	</tbody>
</table>

<script src="js/jquery.js"></script>
