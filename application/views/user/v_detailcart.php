<?php
$this->load->view("user/header");
?>
<div class="products">
  <div class="section_container">
    <h3><i>Detail Pesanan:</i></h3>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th scope="col" class="border-0 bg-light">
              <div class="p-2 px-3 text-uppercase">Nama Makanan</div>
            </th>
            <th scope="col" class="border-0 bg-light">
              <div class="py-2 text-uppercase">Harga</div>
            </th>
            <th scope="col" class="border-0 bg-light">
              <div class="py-2 text-uppercase">Jumlah</div>
            </th>
            <th scope="col" class="border-0 bg-light">
              <div class="py-2 text-uppercase">Subtotal</div>
            </th>
            <th scope="col" class="border-0 bg-light">
              <div class="py-2 text-uppercase">Hapus</div>
            </th>
          </tr>
        </thead>
        <tbody>
          <?php  
          $no=1;
          $total=0;
          foreach ($this->cart->contents() as $key) {
            $gambar = $key["image"];
            $nama = $key["name"];
            $harga = $key["price"];
            $jumlah = $key["qty"];
            $subtotal = $key["subtotal"];
            $total = $total + $subtotal;
            $kategori = $key["kategori"];
            $id_kategori = $key["id_kategori"];
          
          ?>
          <tr>
            <th scope="row" class="border-0">
              <div class="p-2">
                <img src="<?php echo base_url("assets/uploads/files")."/".$gambar ?>" alt="" width="70" class="img-fluid rounded shadow-sm"> 
                <div class="ml-3 d-inline-block align-middle">
                  <h5 class="mb-0"> <?php echo $nama?></h5><span class="text-muted font-weight-normal font-italic d-block"><a href="<?php echo base_url("Index/makanan")."/".$id_kategori?>" class="text-dark d-inline-block align-middle">Kategori: <?php echo $kategori?></a></span>
                </div>
              </div>
            </th>
            <td class="border-0 align-middle"><strong>Rp. <?php echo number_format($harga,0,',','.')?></strong></td>
            <td class="border-0 align-middle"><strong><?php echo $jumlah ?></strong></td>
            <td class="border-0 align-middle"><strong>Rp. <?php echo number_format($subtotal,0,',','.')?></strong></td>
            <td class="border-0 align-middle"><a href="<?php echo base_url('Index/hapusCart')."/".$key['id']."/".$jumlah ?>" class="text-dark"><i class="fa fa-trash"></i></a></td>
          </tr>
        <?php } ?>
        <tr>
          <th colspan="3" class="text-right">Total</th>
          <th>Rp. <?php echo number_format($total,0,',','.')?></th>

        </tr>
        <?php if(!empty($total)){?>
        <form action="<?php echo base_url('Index/pesanMakanan') ?>" method= "post">
        <tr>
          <th colspan="3"><select class="form-control" required="" name="tipe" id="tipe">
            <option value="">Pilih Salah Satu</option>
            <option value="makan ditempat">Makan Ditempat</option>
            <option value="bawa pulang">Bawa Pulang</option>
          </select></th>
          <th><input type="submit" name="" class="btn btn-success" value="Pesan"></th>
        </tr>
      </form>
    <?php } ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>

  <?php
  $this->load->view("user/footer");
  ?>
