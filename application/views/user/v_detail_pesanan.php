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
          </tr>
        </thead>
        <tbody>
          <?php  
          $no=1;
          $total=0;
          // var_dump($detail_pesanan); die();
          foreach ($detail_pesanan as $key) {
            $gambar = $key->gambar;
            $nama = $key->judul_kategori;
            $harga = $key->harga;
            $jumlah = $key->jumlah;
            $subtotal = $key->subtotal;
            $total = $total + $subtotal;
          
          ?>
          <tr>
            <th scope="row" class="border-0">
              <div class="p-2">
                <img src="<?php echo base_url("assets/uploads/files")."/".$gambar ?>" alt="" width="70" class="img-fluid rounded shadow-sm"> 
                <div class="ml-3 d-inline-block align-middle">
                  <h5 class="mb-0"> <?php echo $nama?></h5>
                </div>
              </div>
            </th>
            <td class="border-0 align-middle"><strong>Rp. <?php echo number_format($harga,0,',','.')?></strong></td>
            <td class="border-0 align-middle"><strong><?php echo $jumlah ?></strong></td>
            <td class="border-0 align-middle"><strong>Rp. <?php echo number_format($subtotal,0,',','.')?></strong></td>
            
          </tr>
        <?php } ?>
        <tr>
          <th colspan="3" class="text-right">Total</th>
          <th>Rp. <?php echo number_format($total,0,',','.')?></th>

        </tr>
        
          </tbody>
        </table>
      </div>

    </div>
  </div>

  <?php
  $this->load->view("user/footer");
  ?>
