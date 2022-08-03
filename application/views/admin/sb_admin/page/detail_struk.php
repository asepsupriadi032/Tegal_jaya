<u><i>
		<h3>Daftar Pesanan:</h3>
	</i></u>
<table class="table table-bordered" id="datatables" class="datatables">
	<thead>
		<tr>
			<th class="text-center">No</th>
			<th class="text-center">tanggal</th>
			<th class="text-center">Meja</th>
			<th class="text-center">Total</th>
			<th class="text-center">Status</th>
			<th class="text-center">Jenis Pesanan</th>
			<th class="text-center">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no = 1;
		foreach ($detail_struk as $key) {
		?>
			<tr>
				<td class="text-center"><?php echo $no ?></td>
				<td class="text-center"><?php echo $key->tanggal_pesanan ?></td>
				<td class="text-center"><?php echo $key->no_meja ?></td>
				<td class="text-right"><?php echo "Rp. " . number_format($key->total, 0, '', '.'); ?></td>
				<td class="text-center"><?php echo $key->status ?></td>
				<td class="text-center"><?php echo $key->tipe_pesanan ?></td>
				<td>
					<a href="<?php echo base_url('admin/Pesanan/detailStruk') . "/" . $key->id_struk; ?>">Lihat</a>
					<?php if ($this->session->userdata('kategori_user') == "Pelayan") { ?>
						<?php if ($key->status == "proses") { ?> | <a href="<?php echo base_url('admin/Pesanan/antar') . "/" . $key->id_struk; ?>">Antar</a><?php } ?>
						<?php } elseif ($this->session->userdata('kategori_user') == "Kasir") {
						if ($key->status == "proses") {
						?>
							| <a href="<?php echo base_url('admin/Pesanan/batal') . "/" . $key->id_struk; ?>">Batal</a>
						<?php } else { ?>
							|
							<a href="<?php echo base_url('admin/Pesanan/bayar') . "/" . $key->id_struk; ?>">Bayar</a>
						<?php } ?>
					<?php } else { ?>
						| <a href="<?php echo base_url('admin/Pesanan/bayar') . "/" . $key->id_struk; ?>">Bayar</a> <?php if ($key->status != "diterima") { ?>| <a href="<?php echo base_url('admin/Pesanan/antar') . "/" . $key->id_struk; ?>">Antar</a><?php } ?>
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