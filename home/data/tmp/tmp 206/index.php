<?php 
$url = "home/data/tmp/tmp 206/Garden-Lawn-Landscaping-Bootstrap4-Template/";
$komponen = "home/data/tmp/tmp 206/";
include 'home/include/all_include.php';
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Garden - Home One</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="manifest" href="<?php echo $url; ?>site.html">
	<link rel="apple-touch-icon" href="<?php echo $url; ?>icon.html">
	<!-- Place favicon.ico in the root directory -->

	<!-- bootstrap v4.0.0 -->
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/bootstrap.min.css">
	<!-- fontawesome-icons css -->
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/font-awesome.min.css">
	<!-- themify-icons css -->
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/themify-icons.css">
	<!-- elegant css -->
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/elegant.css">
	<!-- meanmenu css -->
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/meanmenu.min.css">
	<!-- animate css -->
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/animate.css">
	<!-- venobox css -->
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/venobox.css">
	<!-- jquery-ui.min css -->
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/jquery-ui.min.css">
	<!-- slick css -->
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/slick.css">
	<!-- slick-theme css -->
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/slick-theme.css">
	<!-- helper css -->
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/helper.css">
	<!-- style css -->
	<link rel="stylesheet" href="<?php echo $url; ?>style.css">
	<!-- responsive css -->
	<link rel="stylesheet" href="<?php echo $url; ?>assets/css/responsive.css">
</head>

<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href= "https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  	<!--header-area start-->
  	<header class="header-area">
		<!--header-top-->
	  	<div class="header-top d-none d-sm-block">
	  		<div class="container">
	  			<div class="row align-items-center">
	  				<div class="col-sm-9">
	  					<div class="contact-info">
	  						<ul>
								<?php 
							
				
				$querytabel1="SELECT * FROM data_profil LIMIT 0,8";
				$proses1 = mysql_query($querytabel1);
				while ($data1 = mysql_fetch_array($proses1))
				  {
$id_profil= $data1['id_profil'];
			  ?>
			  
	  							<li><i class="fa fa-phone"></i><?php echo $data1['no_telepon']; ?> <span>|</span></li>
	  							<li><i class="fa fa-home"></i><?php echo $data1['alamat']; ?> <span>|</span></li>
	  							<li><i class="fa fa-time"></i>Monday - Saturday: 7.AM - 5.PM</li>
								
				  <?php } ?>
	  						</ul>
	  					</div>
	  				</div>
	  				<div class="col-sm-3">
						<div class="social-icons pull-right">
							<a href= "#"><i class="fa fa-facebook"></i></a>
							<a href= "#"><i class="fa fa-twitter"></i></a>
							<a href= "#"><i class="fa fa-instagram"></i></a>
							<a href= "#"><i class="fa fa-youtube"></i></a>
							<a href= "#"><i class="fa fa-skype"></i></a>
						</div>
					</div>
	  			</div>
	  		</div>
	  	</div>
		<!--header-bottom-->
		<div id="sticker" class="header-bottom">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-sm-2">
						<div class="logo">
							<a href="<?php echo $url; ?>index.html"><img src="<?php echo $url; ?>assets/images/logo.png" alt="logo"></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="mainmenu text-center">
							<nav>
								<ul>
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
							</nav>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="search-and-cart">
							<!--search-box-->
							<div class="search search-box">
								<i class="fa fa-search searching-icon"></i>
								<div class="search-place">
									<input type="text" placeholder="Search" />
								</div>							
							</div>	
							<!--shopping-cart-->
							<div class="cart-link">
								<a href="<?php echo $url; ?>javascript:void(0);">
									<i class="fa fa-shopping-cart"></i>
									<span>2</span>
								</a>
								<ul class="list-none cart-dropdown">
									<li>
										<div class="mini-cart-thumb">
											<a href= "#"><img src="<?php echo $url; ?>assets/images/cart/1.jpg" alt="" /></a>
										</div>
										<div class="mini-cart-heading">
											<h5><a href= "#">Aloe vera - herbal</a></h5>
											<span>2 x $140.00</span>
										</div>
										<div class="mini-cart-remove">
											<button><i class="fa fa-trash-o" aria-hidden="true"></i></button>
										</div>
									</li>
									<li>
										<div class="mini-cart-thumb">
											<a href= "#"><img src="<?php echo $url; ?>assets/images/cart/2.jpg" alt="" /></a>
										</div>
										<div class="mini-cart-heading">
											<h5><a href= "#">Haworthia Wide Zebra</a></h5>
											<span>1 x $100.00</span>
										</div>		  		                              
										<div class="mini-cart-remove">
											<button><i class="fa fa-trash-o" aria-hidden="true"></i></button>
										</div>
									</li>
									<li>
										<div class="mini-cart-thumb">
											<a href= "#"><img src="<?php echo $url; ?>assets/images/cart/3.jpg" alt="" /></a>
										</div>
										<div class="mini-cart-heading">
											<h5><a href= "#">Echeveria Succulent</a></h5>
											<span>1 x $100.00</span>
										</div>		  		                              
										<div class="mini-cart-remove">
											<button><i class="fa fa-trash-o" aria-hidden="true"></i></button>
										</div>
									</li>
									<li>
										<div class="mini-cart-total">
											<h5>Total: $280.00</h5>
										</div>
										<div class="mini-cart-checkout">
											<a href="<?php echo $url; ?>checkout.html">Checkout</a>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
  	</header>
  	<!--header-area end-->
	
	<?php if(isset($_GET['p']) && ($_GET['p'] =="Home" or $_GET['p'] =="home")) { ?>


	<!--banner-area start-->
	<div class="banner-area bg-1 overlay"  style= "background : url(<?php echo $slide_a1; ?>)">
		<div class="container">
			<div class="row align-items-center height-800 pb-111">
				<div class="col-sm-12">
					<div class="banner-text text-center">
						<h2>Toko Sumber Rezeki</h2>
						<p class="mt-30">Toko Tanaman Hias Sumber Rezeki Jambi 
						<br>
						Menyediakan berbagai macam tanaman dan juga Properti untuk Tanaman</p>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--banner-area end-->
	
	<!--service-area start-->
	<div class="service-area mt-minus-100 sm-mt-80">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6 col-sm-12">
					<div class="sin-service">
						<img src="<?php echo $url; ?>assets/images/promo/1.jpg" alt="promo">
						<h3>Planting & Garden Care</h3>
						<p>We Planting much plant for decoration your garden.</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12">
					<div class="sin-service">
						<img src="<?php echo $url; ?>assets/images/promo/2.jpg" alt="promo">
						<h3>Decoration Your Garden</h3>
						<p>Decoration your garden with much plan and another flower.</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 d-lg-block d-md-none">
					<div class="sin-service">
						<img src="<?php echo $url; ?>assets/images/promo/3.jpg" alt="promo">
						<h3>Design & Renovation</h3>
						<p>We Design your Gaden for your event and your moment.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--service-area end-->
	
	<!--about-area start-->
	<div class="about-area mt-85 sm-mt-30">
		<div class="container">
			<div class="row">
				<div class="col-md-8 offset-md-2 col-sm-12">
					<div class="section-title">
						<h2>Little About Us</h2>
						<p>Kami Menjual Berbagai Macam Tanaman Hias untuk kalian.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--about-area end-->
	
	
	<!--cta-area start-->
	<div class="cta-area mt-100 sm-mt-80">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-8">
					<div class="cta-text">
					<?php 
							
				
				$querytabel1="SELECT * FROM data_profil LIMIT 0,8";
				$proses1 = mysql_query($querytabel1);
				while ($data1 = mysql_fetch_array($proses1))
				  {
$id_profil= $data1['id_profil'];
			  ?>
						<h3>Live help number <span><?php echo $data1['no_telepon']; ?></span></h3>
						<p>Call Us Now When You Have Any Gardening Question.</p>
				  <?php } ?>
					</div>
				</div>
				<div class="col-md-4">
					<a href= "#" class="btn-common cta-btn width-190 pull-right">Contact Now</a>
				</div>
			</div>
		</div>
	</div>
	<!--cta-area end-->
	
	<!--blog-area start-->
		<?php } else{ ?>
		
		<div class="page-banner-area bg-6">
		<div class="container">
			<div class="row align-items-center height-400">
				<div class="col-lg-12">
					<div class="page-banner-text text-center">
						<h2><?php echo str_replace("_"," ",ucwords($_GET['p']));?></h2>
						<ul class="site-breadcrumb text-black">
							<li><a href="#">Home</a> <span>&gt;</span></li>
							<li><?php echo str_replace("_"," ",ucwords($_GET['p']));?></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
		
		
		<?php } ?>
		
			<?php include 'halaman.php';?>
					


	<!--footer-area start-->
	<footer class="footer-area">
		<!--footer-top-->
		<div class="footer-widgets">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-sm-6">
						<div class="footer-widget">
							<h4>About Store</h4>
							<div class="about-widget">
								<p>Berawal dari Usaha tanaman Kecil kini telah menjadi usaha tanaman yang besar hingga.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="footer-widget">
							<h4>Information Contact</h4>
							<div class="twitter-feed">
								<ul class="list-none">
									<?php 
							
				
				$querytabel1="SELECT * FROM data_profil LIMIT 0,8";
				$proses1 = mysql_query($querytabel1);
				while ($data1 = mysql_fetch_array($proses1))
				  {
$id_profil= $data1['id_profil'];
			  ?>
									<li>
										<ul class="list-none inline-list">
											<li><a href= "#"><i class="fa fa-envelope"></i><?php echo $data1['email']; ?></a> <span></span></li>
											
										</ul>   
										
									</li>
									<li>
										<ul class="list-none inline-list">
										<li><a href= "#"><i class="fa fa-phone"></i><?php echo $data1['no_telepon']; ?></a> <span></span></li>
											
										</ul>   
										</li>
									
									<li>
										<ul class="list-none inline-list">
											<li><a href= "#"><i class="fa fa-map-marker"></i><?php echo $data1['alamat']; ?></a> <span></span></li>
											
										</ul>   
										
									</li>
				  <?php } ?>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="footer-widget">
							<h4><center>Our Logo</center></h4>
							<div class="instagram-imgages">
								<img src="admin/data/image/logo/pepek.png" >
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="footer-widget">
							<h4>Working Hours</h4>
							<div class="work-hours">
								<ul class="list-none">
									<li>Monday <span>07:00-17:00</span></li>
									<li>Tuesday <span>07:00-17:00</span></li>
									<li>Wednesday <span>07:00-17:00</span></li>
									<li>Thursday <span>07:00-17:00</span></li>
									<li>Friday <span>07:00-17:00</span></li>
									<li>Saturday <span>07:00-17:00</span></li>
									<li>Sunday <span>CLOSE</span></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--footer copyright-->
		<div class="footer-copyright">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<p><a href="<?php echo $url; ?>templatespint.net">Templates Point</a></p>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!--footer-area end-->
  
	<!-- modernizr js -->
	<script src="<?php echo $url; ?>assets/js/vendor/modernizr-3.6.0.min.js"></script>
	<!-- jquery-1.12.0 version -->
	<script src="<?php echo $url; ?>assets/js/vendor/jquery-1.12.0.min.js"></script>
	<!-- bootstra.min js -->
	<script src="<?php echo $url; ?>assets/js/bootstrap.min.js"></script>
	<!-- meanmenu js -->
	<script src="<?php echo $url; ?>assets/js/jquery.meanmenu.min.js"></script>
	<!-- easing js -->
	<script src="<?php echo $url; ?>assets/js/jquery.easing.min.js"></script>
	<!---venobox-js-->
	<script src="<?php echo $url; ?>assets/js/venobox.min.js"></script>
	<!---slick-js-->
	<script src="<?php echo $url; ?>assets/js/slick.min.js"></script>
	<!---waypoints-js-->
	<script src="<?php echo $url; ?>assets/js/waypoints.js"></script>
	<!---counterup-js-->
	<script src="<?php echo $url; ?>assets/js/jquery.counterup.min.js"></script>
	<!---isotop-js-->
	<script src="<?php echo $url; ?>assets/js/isotope.pkgd.min.js"></script>
	<!-- jquery-ui js -->
	<script src="<?php echo $url; ?>assets/js/jquery-ui.min.js"></script>
	<!-- jquery.countdown js -->
	<script src="<?php echo $url; ?>assets/js/jquery.countdown.min.js"></script>
	<!-- plugins js -->
	<script src="<?php echo $url; ?>assets/js/plugins.js"></script>
	<!-- main js -->
	<script src="<?php echo $url; ?>assets/js/main.js"></script>
	
</body>

</html>