<!DOCTYPE html>
<html lang="en">
<head>
<title>Rumah Makan Tegal Jaya</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="aStar Fashion Template Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/user');?>/styles/bootstrap-4.1.3/bootstrap.css">
<link href="<?php echo base_url('assets/user');?>/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/user');?>/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/user');?>/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/user');?>/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/user');?>/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/user');?>/styles/responsive.css">
</head>
<body>

<div class="super_container">

	<!-- Header -->

	<header class="header">
		<div class="header_content d-flex flex-row align-items-center justify-content-start">
			
			<!-- Hamburger -->
			<div class="hamburger menu_mm"><i class="fa fa-bars menu_mm" aria-hidden="true"></i></div>

			<!-- Logo -->
			<div class="header_logo">
				<a href="#"><div>Tegal<span> Jaya</span></div></a>
			</div>

			<!-- Navigation -->
			<!-- <nav class="header_nav">
				<ul class="d-flex flex-row align-items-center justify-content-start">
					<li><a href="index.html">home2</a></li>
					<li><a href="#">woman</a></li>
					<li><a href="#">man</a></li>
					<li><a href="#">lookbook</a></li>
					<li><a href="#">blog</a></li>
					<li><a href="#">contact</a></li>
				</ul>
			</nav> -->

			<!-- Header Extra -->
			<!-- <div class="header_extra ml-auto d-flex flex-row align-items-center justify-content-start">

				<div class="cart d-flex flex-row align-items-center justify-content-start">
					<div class="cart_icon"><a href="cart.html">
						<img src="<?php echo base_url('assets/user');?>/images/bag.png" alt="">
						<div class="cart_num">2</div>
					</a></div>
				</div>

			</div> -->

		</div>
	</header>

	<!-- Menu -->

	<div class="menu d-flex flex-column align-items-start justify-content-start menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<div class="menu_top d-flex flex-row align-items-center justify-content-start">

			


		</div>
		<div class="menu_search">
			<form action="<?php echo base_url("Index/makanan")?>" class="header_search_form menu_mm" method="post">
				<input type="text" class="search_input menu_mm" placeholder="Search" name="search">

				<button type="submit" class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
					<i class="fa fa-search menu_mm" aria-hidden="true"></i>
				</button>
			</form>
		</div>
		<?php  if ($this->session->userdata("kode_pemesan")!=""){?> 
		<nav class="menu_nav">
			<?php 
				$kode_pemesan = $this->session->userdata("kode_pemesan");
				$this->db->where('kode_pemesan',$kode_pemesan);
				$row = $this->db->get('meja')->row();
			?>
				<ul class="menu_mm">
					<li class="menu_mm"><a href="<?php echo base_url("index/makanan")?>">Menu</a></li>
					<?php 
						$this->db->order_by("urutan", "asc");
							$getKategori = $this->db->get('kategori')->result();

							foreach ($getKategori as $key) {
							?>
					<li class="menu_mm">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
						<a href="<?php echo base_url("index/makanan")."/".$key->id_kategori?>"><?php echo $key->kategori; ?></a>
					</li>
					<?php } ?>
				</ul>

		</nav>

		<hr style="border: thin solid #fff !important">
			<nav class="menu_mm" style="margin-top: 35px; ">
				<li class="menu_mm">
					No Meja: <?php echo $row->no_meja; ?> | 
					<a href="<?php echo base_url('Index/batal').'/'.$row->id_meja?>">Batal</a>
				</li>
				<!-- <li><a href="<?php echo base_url('Index/detailPesanan')."/".$kode_pemesan ?>">Pesanan</a> </li> -->
			</ul>
		</nav>
		<?php }else{?>
		<nav class="menu_nav">
			<ul class="menu_mm">
				<li class="menu_mm">
					<a href="<?php echo base_url("index/input_nomor_meja")?>">Silahkan Pilih Meja <i class="fa fa-angle-right" aria-hidden="true"></i></a>
				</li>
			</ul>
		</nav>
		<?php } ?>
		<div class="menu_extra">
			<div class="menu_social">
				<ul>
					<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
	
	<!-- Sidebar -->

	<div class="sidebar">

		<!-- Logo -->
		<div class="sidebar_logo">
			<a href="#"><div>Tegal<span> Jaya</span></div></a>
		</div>
<!-- Search -->
		<div class="search" style="margin-top: 10px;">
			<form action="<?php echo base_url("Index/makanan")?>" class="search_form" id="sidebar_search_form" method="post">
				<input type="text" class="search_input" placeholder="Search" name="search">
				<button type="submit" class="search_button"><i class="fa fa-search" aria-hidden="true"></i></button>
			</form>
		</div>
		<!-- Sidebar Navigation -->
		<?php  if ($this->session->userdata("kode_pemesan")!=""){?> 
		<nav class="sidebar_nav"  style="margin-top: 0px;">

			<?php 
				$kode_pemesan = $this->session->userdata("kode_pemesan");
				$this->db->where('kode_pemesan',$kode_pemesan);
				$row = $this->db->get('meja')->row();
			?>
			<ul>
				<li><a href="<?php echo base_url("index/makanan")?>">Menu<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
				<?php 
				$this->db->order_by("urutan", "asc");
					$getKategori = $this->db->get('kategori')->result();

					foreach ($getKategori as $key) {
					?>
						<li><a href="<?php echo base_url("index/makanan")."/".$key->id_kategori?>"><?php echo $key->kategori; ?><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
					<?php
					}

					// echo $this->session->userdata("nomor_meja");
				?>
			</ul>
		</nav>
				<hr style="border: thin solid #fff !important">
			<nav class="sidebar_nav" style="margin-top: 35px; ">
				<li>
					No Meja: <?php echo $row->no_meja; ?> | 
					<a href="<?php echo base_url('Index/batal').'/'.$row->id_meja?>">Batal</a>
				</li>
				<!-- <li><a href="<?php echo base_url('Index/detailPesanan')."/".$kode_pemesan ?>">Pesanan</a> </li> -->
			</ul>
		</nav>

		<hr style="border: thin solid #fff !important">
		<!-- Cart -->

		<?php 
			$jml = 0;
			$total = 0;
			foreach ($this->cart->contents() as $key) {
				$jml = $jml + $key['qty'];
				$total = $total + ($key['qty'] * $key['price']);
			}


		?>
		<div class="cart d-flex flex-row align-items-center justify-content-start" style="margin-top: 0px; margin-bottom: 1000px;">
			<div class="cart_icon"><a href="<?php echo base_url("Index/cart") ?>">
				<img src="<?php echo base_url('assets/user');?>/images/bag.png" alt="">
				<div class="cart_num"><?php echo $jml; ?></div>
			</a></div>
			<div class="cart_text"></div>
			<div class="cart_price">Rp. <?php echo $total; ?></div>
		</div>
	<?php }else{?>

		<nav class="sidebar_nav" style="margin-top: 35px; ">
			<ul>
				<li><a href="<?php echo base_url("index/input_nomor_meja")?>">Silahkan Pilih Meja<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
			</ul>
		</nav>
	<?php } ?>
	</div>