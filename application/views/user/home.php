<?php $this->load->view("user/header") ?>
<!--banner-->
<div class="home">
		
		<!-- Home Slider -->
		<div class="home_slider_container">
			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Slide --> 
				<div class="owl-item">
					<div class="background_image" style="background-image:url(<?php echo base_url('assets/user');?>/images/img.jpg)"></div>
					<div class="home_content_container">
						<div class="home_content">
							<div class="home_discount d-flex flex-row align-items-end justify-content-start">
								<!-- <div class="home_discount_num"></div>
								<div class="home_discount_text"></div> -->
							</div>
							<div class="home_title" style="color: black !important"><h1>Selamat Datang</h1></div>
							<!-- <div class="button button_1 home_button trans_200"><a href="categories.html">Shop NOW!</a></div> -->
						</div>s
					</div>
				</div>

				<!-- Slide -->
				<div class="owl-item">
					<div class="background_image" style="background-image:url(<?php echo base_url('assets/user');?>/images/img2.jpg)"></div>
					<div class="home_content_container">
						<div class="home_content">
							<div class="home_discount d-flex flex-row align-items-end justify-content-start">
								<!-- <div class="home_discount_num"></div>
								<div class="home_discount_text"></div> --> 
							</div>
							<!-- <div class="home_title"></div>
							<<div class="button button_1 home_button trans_200"><a 
							href="categories.html"></a></div> -->
						</div>
					</div>
				</div>

				<!-- Slide -->
				<div class="owl-item">
					<div class="background_image" style="background-image:url(<?php echo base_url('assets/user');?>/images/img3.jpg)"></div>
					<div class="home_content_container">
						<div class="home_content">
							<div class="home_discount d-flex flex-row align-items-end justify-content-start">
								<!-- <div class="home_discount_num"></div>
								<div class="home_discount_text"></div> -->
							</div>
							<div class="home_title"></div>
							<!-- <div class="button button_1 home_button trans_200"><a 
							href="categories.html"></a></div> -->
						</div>
					</div>
				</div>

			</div>
				
			<!-- Home Slider Navigation -->
			<div class="home_slider_nav home_slider_prev trans_200"><div class=" d-flex flex-column align-items-center justify-content-center"><img src="<?php echo base_url('assets/user');?>/images/prev.png" alt=""></div></div>
			<div class="home_slider_nav home_slider_next trans_200"><div class=" d-flex flex-column align-items-center justify-content-center"><img src="<?php echo base_url('assets/user');?>/images/next.png" alt=""></div></div>

		</div>
	</div>
	<!--//footer-->
<?php $this->load->view("user/footer")?>