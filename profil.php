<?php if(empty($p)) { header("Location: index.php?p=home"); die(); } ?>

<br>
<center>
    <h2>
        PROFIL
    </h2>
</center>
<br>
<br>
<br>
					<?php
					$sql=mysql_query("SELECT * FROM data_profil");
					$data=mysql_fetch_array($sql);
					?>
					
			
	
	<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
		<div class="container-fluid">

			<div class="inner-sec-shop px-lg-4 px-3">
				<div class="about-content py-lg-5 py-3">
					<div class="row">

						<div class="col-lg-6 p-0">
							<img src="admin/upload/<?php echo $data['gambar'];?>" alt="Goggles" class="img-fluid">
						</div>
						<div class="col-lg-6 about-info">
							<h3 class="tittle-w3layouts text-left mb-lg-5 mb-3"><?php echo strtoupper($data['nama']); ?></h3>
							<p class="my-xl-4 my-lg-3 my-md-4 my-3"><?php echo ($data['deskripsi']) ?>
							</p>

							<a href="shop.html" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>

						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	
	
<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
		<div class="container">
			<h3 class="tittle-w3layouts text-center my-lg-4 my-4">Contact</h3>
			<div class="inner_sec">
				<p class="sub text-center mb-lg-5 mb-3">We love to discuss your idea</p>
				<div class="address row">

					<div class="col-lg-4 address-grid">
						<div class="row address-info">
							<div class="col-md-3 address-left text-center">
								<i class="far fa-map"></i>
							</div>
							<div class="col-md-9 address-right text-left">
								<h6>Address</h6>
								<p><?php echo $data['alamat']; ?>

								</p>
							</div>
						</div>

					</div>
					<div class="col-lg-4 address-grid">
						<div class="row address-info">
							<div class="col-md-3 address-left text-center">
								<i class="far fa-envelope"></i>
							</div>
							<div class="col-md-9 address-right text-left">
								<h6>Email</h6>
								<p>Email :
									<a href="mailto:<?php echo $data['email']; ?>"><?php echo $data['email']; ?></a>

								</p>
							</div>

						</div>
					</div>
					<div class="col-lg-4 address-grid">
						<div class="row address-info">
							<div class="col-md-3 address-left text-center">
								<i class="fas fa-mobile-alt"></i>
							</div>
							<div class="col-md-9 address-right text-left">
								<h6>Phone</h6>
								<p><?php echo $data['no_telepon']; ?></p>

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	

<!-- PROFIL -->

<br>
<br>
<br>