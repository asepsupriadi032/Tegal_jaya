<u><i><h3>Daftar Pesanan Lunas:</h3></i></u>
<table class="table table-bordered" id="datatables" class="datatables">
	<thead>
		<tr>
			<th>No</th>
			<th>tanggal</th>
			<th>Meja</th>
			<th>Total</th>
			<th>Status</th>
			<th>Jenis Pesanan</th>
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
			<td><?php echo $key->total ?></td>
			<td><?php echo $key->status ?></td>
			<td><?php echo $key->tipe_pesanan ?></td>
		</tr>
		<?php
			$no++;
			}
		?>
	</tbody>
</table>