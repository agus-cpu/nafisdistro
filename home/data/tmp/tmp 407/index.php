<?php 
$url = "home/data/tmp/tmp 407/web/";
$komponen = "home/data/tmp/tmp 407/";
include 'home/include/all_include.php';
?>
<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Goggles a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link href="<?php echo $url; ?>css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="<?php echo $url; ?>css/login_overlay.css" rel='stylesheet' type='text/css' />
	<link href="<?php echo $url; ?>css/style6.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="<?php echo $url; ?>css/shop.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $url; ?>css/owl.carousel.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?php echo $url; ?>css/owl.theme.css" type="text/css" media="all">
	<link href="<?php echo $url; ?>css/style.css" rel='stylesheet' type='text/css' />
	<link href="<?php echo $url; ?>css/fontawesome-all.css" rel="stylesheet">
	<link href="<?php echo $url; ?>//fonts.googleapis.com/css?family=Inconsolata:400,700" rel="stylesheet">
	<link href="<?php echo $url; ?>//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet">
</head>

<body>
	<div class="banner-top container-fluid" id="home">
		<!-- header -->
		<header>
			<div class="row">
				<div class="col-md-3 top-info text-left mt-lg-4">
					<h6>Need Help ?</h6>
					<ul>
						<li>
							<i class="fas fa-phone"></i> Call</li>
						<li class="number-phone mt-3"><?php echo $telepon; ?></li>
					</ul>
				</div>
				<div class="col-md-6 logo-w3layouts text-center">
					<h1 class="logo-w3layouts">
						<a class="navbar-brand" href="<?php echo $url; ?>index.html">
							<?php echo $objek; ?> </a>
					</h1>
				</div>

				<div class="col-md-3 top-info-cart text-right mt-lg-4">
					<ul class="cart-inner-info">
						
						<!--<li class="galssescart galssescart2 cart cart box_1">
							<form action="?p=keranjang" method="post" class="last">
								<input type="hidden" name="cmd" value="_cart">
								<input type="hidden" name="display" value="1">
								<button class="top_googles_cart" type="submit" name="submit" value="">
									My Cart
									<i class="fas fa-cart-arrow-down"></i>
								</button>
							</form>
						</li>-->
					</ul>
					<!---->
					<div class="overlay-login text-left">
						<button type="button" class="overlay-close1">
							<i class="fa fa-times" aria-hidden="true"></i>
						</button>
						<div class="wrap">
							<h5 class="text-center mb-4">Login Now</h5>
							<div class="login p-5 bg-dark mx-auto mw-100">
								<form action="#" method="post">
									<div class="form-group">
										<label class="mb-2">Email address</label>
										<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required="">
										<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
									</div>
									<div class="form-group">
										<label class="mb-2">Password</label>
										<input type="password" class="form-control" id="exampleInputPassword1" placeholder="" required="">
									</div>
									<div class="form-check mb-2">
										<input type="checkbox" class="form-check-input" id="exampleCheck1">
										<label class="form-check-label" for="exampleCheck1">Check me out</label>
									</div>
									<button type="submit" class="btn btn-primary submit mb-4">Sign In</button>

								</form>
							</div>
							<!---->
						</div>
					</div>
					<!---->
				</div>
			</div>
			<div class="search">
				<div class="mobile-nav-button">
					
				</div>
				<!-- open/close -->
				<div class="overlay overlay-door">
					<button type="button" class="overlay-close">
						<i class="fa fa-times" aria-hidden="true"></i>
					</button>
					<form action="#" method="post" class="d-flex">
						<input class="form-control" type="search" placeholder="Search here..." required="">
						<button type="submit" class="btn btn-primary submit">
							<i class="fas fa-search"></i>
						</button>
					</form>

				</div>
				<!-- open/close -->
			</div>
			<label class="top-log mx-auto"></label>
			<nav class="navbar navbar-expand-lg navbar-light bg-light top-header mb-2">

				<button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						
					</span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav nav-mega mx-auto">
						<!-- MENU -->
<?php
$m = new SimpleXMLElement('home/include/settings/menu.xml', null, true);
foreach($m as $i){if($i->t == 's' ){
?>
<!-- SINGLE -->
		<?php $apa = $i->n;
		if ($apa=="Login")
		{
			if ((isset($_COOKIE["kodene"])) && (isset($_COOKIE["token_user"])))
			{
				$kodene = decrypt($_COOKIE["kodene"]);
				$ip = $_SERVER['REMOTE_ADDR']; 
				$useragent = $_SERVER['HTTP_USER_AGENT'];
				$token = sha1($ip.$useragent.$key);
				$token = crypt($token, $key);
				if ($_COOKIE['token_user'] == $token)
				{
					$token = "ada";
				}
				else
				{
					$token = "";
				}
				$kode = cek_database("","","","select * from data_pelanggan where id_pelanggan='$kodene'");
			}
			else
			{
				$token = "";
				$kode ="";
			}
			if ($kode=="ada" && $token=="ada")
			{
			?>
			<!--
			<li class="nav-item"> <a class="nav-link" href="index.php?p=login&action=akun">Akun</a> </li>
			-->
			<li class="nav-item"> <a class="nav-link" href="index.php?p=login&action=logout">Logout</a> </li>
			<?php	 
			}
			else
			{
			?>
			<li class="nav-item"> <a class="nav-link" href="index.php?p=login&action=logout"><?php echo $i->n;?></a> </li>
			<?php
			}
		}
		else
		{
		?>
		 <li class="nav-item"> <a class="nav-link" href="<?php echo $i->l;?>"><?php echo $i->n;?></a> </li>
		<?php } ?>
<!-- /SINGLE -->
<?php
}else if($i->t == 'm' ){ $idmenu = $i->id;
?>
<!-- MULTI -->
		<li  class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $i->n;?><b class="caret hidden"></b></a>
		<ul class="dropdown-menu agile_short_dropdown">
		<?php
		$m1 = new SimpleXMLElement('home/include/settings/menu.xml', null, true);
		foreach($m1 as $i1) {
		if($i1->s=="$idmenu" and $i1->t=="sm" ){
		?>
			<li><li>
			<a class="item" onclick="window.location = '<?php echo $i1->l;?>'">
			<?php echo $i1->n;?></a>
			</li></li>
		<?php }} ?>
		</ul>
		</li>
<!-- /MULTI -->
		<?php }} ?>
<!-- /MENU -->
					</ul>

				</div>
			</nav>
		</header>
		<!-- //header -->
		<!-- banner -->
		
		<?php if(isset($_GET['p']) && ($_GET['p'] =="Home" or $_GET['p'] =="home")) { ?>
		<div class="banner">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<div class="carousel-item active">
						<div class="carousel-caption text-center">
							<h3>Toko Wulan
								<span>Belanja ya disini aja</span>
							</h3>
							<a href="?p=produk" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>
						</div>
					</div>
					<div class="carousel-item item2">
						<div class="carousel-caption text-center">
							<h3>Toko Wulan
								<span>Belanja ya disini aja</span>
							</h3>
							<a href="?p=produk" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>

						</div>
					</div>
					<div class="carousel-item item3">
						<div class="carousel-caption text-center">
							<h3>Toko Wulan
								<span>Belanja ya disini aja</span>
							</h3>
							<a href="?p=produk" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>

						</div>
					</div>
					<div class="carousel-item item4">
						<div class="carousel-caption text-center">
							<h3>Toko Wulan
								<span>Belanja ya disini aja</span>
							</h3>
							<a href="?p=produk" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>
						</div>
					</div>
				</div>
				<a class="carousel-control-prev" href= "#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href= "#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
			<!--//banner -->
		</div>
	</div>
	<!--//banner-sec-->
	<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
		<div class="container-fluid">
			<div class="inner-sec-shop px-lg-4 px-3">
				<h3 class="tittle-w3layouts my-lg-4 my-4">Belanja ya disini aja</h3>
				<div class="row">
					<!-- /womens -->
					          <?php 
							
				
				$querytabel2="SELECT * FROM data_produk LIMIT 0,6";
				$proses2 = mysql_query($querytabel2);
				while ($data2 = mysql_fetch_array($proses2))
				  {
$id_produk= $data2['id_produk'];
$judul= $data2['nama_produk'];
$jmlstok= $data2['jumlah'];

			  ?>
					<div class="col-md-3 product-men women_two">
						<div class="product-googles-info googles">
							<div class="men-pro-item">
								<div class="men-thumb-item">
									<img src="<?php echo $url; ?>images/s1.jpg" class="img-fluid" alt="">
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="?p=produk&action=detail&Go=<?php echo $judul; ?>" class="link-product-add-cart">Quick View</a>
										</div>
									</div>
								
								</div>
								<div class="item-info-product">
									<div class="info-product-price">
										<div class="grid_meta">
											<div class="product_price">
												<h4>
													<a href="<?php echo $url; ?>single.html"><?php echo $judul ?></a>
												</h4>
												<div class="grid-price mt-2">
													<span class="money"> <?php echo rupiah($data2['harga_jual']); ?></span>
												</div>
											</div>
											
										</div>
										
<?php if ($jmlstok <=0)
										{
											?>
                    <a onclick="alert('Maaf Stok Tidak Cukup');" >
                        <?php echo $namatombol;?>
                    </a>
                <?php
										}
										else
										{
										?><br>
										<br> 
										
										<div class="googles single-item hvr-outline-out">
											<form action="#" method="post">
												<input type="hidden" name="cmd" value="_cart">
												<input type="hidden" name="add" value="1">
												<input type="hidden" name="googles_item" value="Farenheit">
												<input type="hidden" name="amount" value="575.00">
												<button type="submit" class="googles-cart pgoogles-cart">
													<i class="fas fa-cart-plus"></i>
												</button>

												
											</form>

										</div>
										
										<?php } ?>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
				
				 
			
				
		<?php }?>
			</div>
			
				<!-- //womens -->
				<!-- /mens -->
			
				<!--//row-->
				<!--/meddle-->
				<div class="row">
					<div class="col-md-12 middle-slider my-4">
						<div class="middle-text-info ">

<BR>
<BR>
<BR>
<BR>
<BR>
							<h3 class="tittle-w3layouts two text-center my-lg-4 mt-3">Let's Shop Here</h3>
<!--<div class="simply-countdown-custom" id="simply-countdown-custom"></div> -->

						</div>
					</div>
				</div>
				
				
				<!-- //testimonials -->
				<div class="row galsses-grids pt-lg-5 pt-3">
					<div class="col-lg-6 galsses-grid-left">
						<figure class="effect-lexi">
							<img src="<?php echo $url; ?>images/banner4.jpg" alt="" class="img-fluid">
							<figcaption>
								<h3>Women's Style
									<span>Pick</span>
								</h3>
								<p> Express your style now.</p>
							</figcaption>
						</figure>
					</div>
					<div class="col-lg-6 galsses-grid-left">
						<figure class="effect-lexi">
							<img src="<?php echo $url; ?>images/banner1.jpg" alt="" class="img-fluid">
							<figcaption>
								<h3>Man's Style
									<span>Pick</span>
								</h3>
								<p>Express your style now.</p>
							</figcaption>
						</figure>
					</div>
				</div>
				<!-- /grids -->
		
			</div>
		</div>
	</section>
	<!-- about -->
	
	  <?php }else {?>
	  
	  
	  <div class="banner_inner">
			<div class="services-breadcrumb">
				<div class="inner_breadcrumb">

					<ul class="short">
						<li>
							<a href="index.html">Home</a>
							<i>|</i>
						</li>
						<li><?php echo str_replace("_"," ",ucwords($_GET['p']));?></li>
					</ul>
				</div>
			</div>

		</div>
		
	 <?php } ?>
	<?php include 'halaman.php';?>
	
	<!--footer -->
	<footer class="py-lg-5 py-3">
		<div class="container-fluid px-lg-5 px-3">
			<div class="row footer-top-w3layouts">
			
			<div class="col-lg-3 footer-grid-w3ls">
			<div class="footer-title">
						<h3>Profil</h3>
					</div>
					<img src="admin/data/image/logo/logo.png" width="100%" />
				</div>
				
				
				<div class="col-lg-3 footer-grid-w3ls">
					<div class="footer-title">
						<h3>Little About Us</h3>
					</div>
					<div class="footer-text">
						<p>Belanjalah disini di Toko Wulan</p>
						
					</div>
				</div>
					<div class="col-lg-3 footer-grid-w3ls">
					<div class="footer-title">
						<h3>Quick Links</h3>
					</div>
					<ul class="links">
						<li>
							<a href="?p=home">Home</a>
						</li>
						<li>
							<a href="?p=profil">About</a>
						</li>
						<li>
							<a href="?p=panduan">Guides</a>
						</li>
						<li>
							<a href="?p=produk">Shop</a>
						</li>
					
					</ul>
				</div>
				<div class="col-lg-3 footer-grid-w3ls">
					<div class="footer-title">
						<h3>Get in touch</h3>
					</div>
					<div class="contact-info">
						<h4>Location :</h4>
						<p><?php echo $alamat; ?>.</p>
						<div class="phone">
							<h4>Contact :</h4>
							<p>Phone : <?php echo $telepon; ?></p>
							<p>Email :
								<a href="<?php echo $url; ?>mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
							</p>
						</div>
					</div>
				</div>
			
				
			</div>
			<div class="copyright-w3layouts mt-4">
				<p class="copy-right text-center ">
				<?php echo $copyright; ?>
				</p>
			</div>
		</div>
	</footer>
	<!-- //footer -->

	<!--jQuery-->
	<script src="<?php echo $url; ?>js/jquery-2.2.3.min.js"></script>
	<!-- newsletter modal -->
	<!-- Modal -->
	<!-- Modal -->
	
	<script>
		$(document).ready(function () {
			$("#myModal").modal();
		});
	</script>
	<!-- // modal -->

	<!--search jQuery-->
	<script src="<?php echo $url; ?>js/modernizr-2.6.2.min.js"></script>
	<script src="<?php echo $url; ?>js/classie-search.js"></script>
	<script src="<?php echo $url; ?>js/demo1-search.js"></script>
	<!--//search jQuery-->
	<!-- cart-js -->
	<script src="<?php echo $url; ?>js/minicart.js"></script>
	<script>
		googles.render();

		googles.cart.on('googles_checkout', function (evt) {
			var items, len, i;

			if (this.subtotal() > 0) {
				items = this.items();

				for (i = 0, len = items.length; i < len; i++) {}
			}
		});
	</script>
	<!-- //cart-js -->
	<script>
		$(document).ready(function () {
			$(".button-log a").click(function () {
				$(".overlay-login").fadeToggle(200);
				$(this).toggleClass('btn-open').toggleClass('btn-close');
			});
		});
		$('.overlay-close1').on('click', function () {
			$(".overlay-login").fadeToggle(200);
			$(".button-log a").toggleClass('btn-open').toggleClass('btn-close');
			open = false;
		});
	</script>
	<!-- carousel -->
	<!-- Count-down -->
	<script src="<?php echo $url; ?>js/simplyCountdown.js"></script>
	<link href="<?php echo $url; ?>css/simplyCountdown.css" rel='stylesheet' type='text/css' />
	<script>
		var d = new Date();
		simplyCountdown('simply-countdown-custom', {
			year: d.getFullYear(),
			month: d.getMonth() + 2,
			day: 25
		});
	</script>
	<!--// Count-down -->
	<script src="<?php echo $url; ?>js/owl.carousel.js"></script>
	<script>
		$(document).ready(function () {
			$('.owl-carousel').owlCarousel({
				loop: true,
				margin: 10,
				responsiveClass: true,
				responsive: {
					0: {
						items: 1,
						nav: true
					},
					600: {
						items: 2,
						nav: false
					},
					900: {
						items: 3,
						nav: false
					},
					1000: {
						items: 4,
						nav: true,
						loop: false,
						margin: 20
					}
				}
			})
		})
	</script>

	<!-- //end-smooth-scrolling -->


	<!-- dropdown nav -->
	<script>
		$(document).ready(function () {
			$(".dropdown").hover(
				function () {
					$('.dropdown-menu', this).stop(true, true).slideDown("fast");
					$(this).toggleClass('open');
				},
				function () {
					$('.dropdown-menu', this).stop(true, true).slideUp("fast");
					$(this).toggleClass('open');
				}
			);
		});
	</script>
	<!-- //dropdown nav -->
  <script src="<?php echo $url; ?>js/move-top.js"></script>
    <script src="<?php echo $url; ?>js/easing.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 900);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            /*
            						var defaults = {
            							  containerID: 'toTop', // fading element id
            							containerHoverID: 'toTopHover', // fading element hover id
            							scrollSpeed: 1200,
            							easingType: 'linear' 
            						 };
            						*/

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <!--// end-smoth-scrolling -->

	<script src="<?php echo $url; ?>js/bootstrap.js"></script>
	<!-- js file -->
</body>

</html>