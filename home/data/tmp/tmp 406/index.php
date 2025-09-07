<?php 
$url = "home/data/tmp/tmp 406/ogani/";
$komponen = "home/data/tmp/tmp 406/";
include 'home/include/all_include.php';
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    <!-- Google Font -->
    <link href= "https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo $url; ?>css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $url; ?>css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $url; ?>css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $url; ?>css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $url; ?>css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $url; ?>css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $url; ?>css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $url; ?>css/style.css" type="text/css">
</head>

<body>
<?php  $id_pelanggan = decrypt($_COOKIE["kodene"]); ?>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href= "#"><img src="admin/data/image/logo/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                
                <li><a href= "?p=keranjang"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
          
            <div class="header__top__right__auth">
                <a href= "?p=profil pelanggan"><i class="fa fa-user"></i> Akun</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
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
		<ul class="header__menu__dropdown">
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
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href= "#"><i class="fa fa-facebook"></i></a>
            <a href= "#"><i class="fa fa-twitter"></i></a>
            <a href= "#"><i class="fa fa-linkedin"></i></a>
            <a href= "#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> <?php echo $email;?></li>
                <li><i class="fa fa-phone"></i> <?php echo $telepon;?></li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> <?php echo $email;?></li>
                                <li><i class="fa fa-phone"></i> <?php echo $telepon;?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href= "#"><i class="fa fa-facebook"></i></a>
                                <a href= "#"><i class="fa fa-twitter"></i></a>
                                <a href= "#"><i class="fa fa-linkedin"></i></a>
                                <a href= "#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                         
                            <div class="header__top__right__auth">
                                <a href= "?p=profil pelanggan"><i class="fa fa-user"></i> Akun</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-1">
                    <div class="header__logo">
                        <a href="<?php echo $url; ?>./index.html"><img src="admin/data/image/logo/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <nav class="header__menu">
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
		<ul class="header__menu__dropdown">
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
                <div class="col-lg-1">
                    <div class="header__cart">
                        <ul>
                            
                            <li><a href= "?p=keranjang"><i class="fa fa-shopping-bag"></i> 
							
							
								<?php if (isset($_COOKIE["kodene"]))
		{
			$ids= decrypt($_COOKIE['kodene']);
			
			?> 
			
				 <span class="total-count"><?php echo baca_database('','total',"SELECT SUM(jumlah) as total FROM data_penjualan WHERE id_pelanggan = '$id_pelanggan' AND STATUS='proses'"); ?></span>
			
			<?php
			
		} else { ?>
							
								
								<?php } ?>
								
								</a></li>
                        </ul>
						
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
	
	<?php if(isset($_GET['p']) && ($_GET['p'] =="Home" or $_GET['p'] =="home")) { ?>
			
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
             
                <div class="col-lg-12">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            	<form name="formcari" id="formcari" action="" method="get">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
								
								
								
									
									<input name="p" value="produk" id="page" type="hidden">
					<input name="Berdasarkan" value="<?php echo nama_produk; ?>" id="Berdasarkan" type="hidden">
                                <input type="text" name="isi" id="isi" value="" placeholder="What do yo u need?">
								
								<?php
									$isi = $_GET['isi'];
									
						if (isset($_GET['Berdasarkan']))
						{
							//btn_cari('Cari');
							?>
                            
                        <?php
						}
						else
						{
							?>

                            <?php
							//btn_cari('Cari');
							
						}
						?>
					
                                <button type="submit" href="?p=produk&Berdasarkan=<?php echo nama_produk; ?>&isi=<?php echo $isi;?>" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5><?php echo $telepon;?></h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
					
					
			  
                    <div class="hero__item set-bg" data-setbg="<?php echo $slide_a1;?>">
                        <div class="hero__text">
                            <span style="color:white;">Selamat Datang</span>
                            <h2>Apotek Thehok Farma</h2>
                            <p style="color:white;">Melayani anda dengan sepenuh hati untuk kesehatan yang terbaik bagi anda</p>
                            <a href= "?p=produk" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
				
				  
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
<br>
    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
				
				
								<?php 
							
				
				$querytabel1="SELECT * FROM data_kategori";
				$proses1 = mysql_query($querytabel1);
				while ($data1 = mysql_fetch_array($proses1))
				  {
$id_kategori= $data1['id_kategori'];
			  ?>
			  
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="home/data/image/background/apa.jpg">
                            <h5><a href= "#"><?php echo $data1['kategori'];?></a></h5>
                        </div>
                    </div>
					
				  <?php } ?>
                 </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
  <!--  <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
							
															<?php 
							
				
				$querytabel1="SELECT * FROM data_kategori";
				$proses1 = mysql_query($querytabel1);
				while ($data1 = mysql_fetch_array($proses1))
				  {
$id_kategori= $data1['id_kategori'];
			  ?>
			  
                            <li data-filter=".<?php echo $kategori = $data1['kategori'];?>"><?php echo $data1['kategori'];?></li>
				  <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
			<?php 
							
				
				$querytabel1="SELECT * FROM data_produk inner join data_kategori on data_kategori.id_kategori=data_produk.id_kategori where kategori='$kategori'";
				$proses1 = mysql_query($querytabel1);
				while ($data1 = mysql_fetch_array($proses1))
				  {
$id_kategori= $data1['id_kategori'];
			  ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix <?php echo $data1['kategori'];?>">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?php echo $url; ?>img/featured/feature-1.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href= "#"><i class="fa fa-heart"></i></a></li>
                                <li><a href= "#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href= "#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href= "#"> <?php echo $data1['kategori'];?></a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
				  <?php } ?>
             </div>
        </div>
    </section>
    <!-- Featured Section End -->
<br>
<br>
<br>
<br>
    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
               <?php 
							
				
				$querytabel1="SELECT * FROM data_medium_banner";
				$proses1 = mysql_query($querytabel1);
				while ($data1 = mysql_fetch_array($proses1))
				  {
$id_medium_banner= $data1['id_medium_banner'];
			  ?>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="admin/upload/<?php	echo $data1['foto'];	?>" width='100%' height='300' alt="">
                    </div>
                </div>
				  <?php } ?>
				
            </div>
        </div>
    </div>
    <!-- Banner End -->
<Br>
<Br>
    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
							
							<?php 
							
								$dataPerPage = 3;
			
					$no = 0;
				$startRow=($page-1)*$dataPerPage;
				$no = $startRow;
				
				
				$querytabel1="SELECT * FROM data_produk LIMIT $startRow ,$dataPerPage";
				$proses1 = mysql_query($querytabel1);
				while ($data1 = mysql_fetch_array($proses1))
				  {
$data_produk= $data1['data_produk'];
			  ?>
			  
                                <a href= "#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="admin/upload/<?php echo $data1['foto'];?>" width='100' height='100' alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo $data1['nama_produk'];?></h6>
                                        <span><?php echo rupiah($data1['harga_jual']);?></span>
                                    </div>
                                </a>
								
								
								<?php } ?>
                                 </div>
                            <div class="latest-prdouct__slider__item">
							
														<?php 
							
								$dataPerPage = 3;
			
					$no = 3;
				$startRow=($page-1)*$dataPerPage;
				$no = $startRow;
				
				
				$querytabel1="SELECT * FROM data_produk LIMIT 3 ,$dataPerPage";
				$proses1 = mysql_query($querytabel1);
				while ($data1 = mysql_fetch_array($proses1))
				  {
$data_produk= $data1['data_produk'];
			  ?>
			  
                                <a href= "#" class="latest-product__item">
								
                                    <div class="latest-product__item__pic">
                                        <img src="admin/upload/<?php echo $data1['foto'];?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                         <h6><?php echo $data1['nama_produk'];?></h6>
                                        <span><?php echo rupiah($data1['harga_jual']);?></span>
                                    </div>
                                </a>
								
				  <?php } ?>
                             </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                             
	<?php 
					
								$dataPerPage = 3;
			
					$no = 0;
				$startRow=($page-1)*$dataPerPage;
				$no = $startRow;
						
				
				$querytabel2="SELECT * FROM data_pemesanan inner join data_penjualan on data_pemesanan.kode_transaksi_penjualan = data_penjualan.kode_transaksi_penjualan inner join data_produk ON data_produk.id_produk 
= data_penjualan.id_produk 
GROUP BY data_penjualan.id_produk ORDER BY sum(data_penjualan.jumlah) desc LIMIT $startRow ,$dataPerPage";
				$proses2 = mysql_query($querytabel2);
				while ($data2 = mysql_fetch_array($proses2))
				  {
					  
					  					  
$id_produk= $data2['id_produk'];
$nama = baca_database('','nama_produk',"select * from data_produk where id_produk = '$id_produk'");

					   $nama_data = $data[$nama];
                    $nama_link = str_replace('-', 'x~x',$nama_data);
					$nama_link = str_replace(' ', '-',$nama_link);
					  
			  ?>
			  
                                <a href= "#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="admin/upload/<?php echo $data2['foto'];?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo baca_database('','nama_produk',"select * from data_produk where id_produk = '$id_produk'"); ?></h6>
                                        <span><?php echo baca_database('','jumlah',"select data_penjualan.jumlah AS jumlah from data_penjualan inner join data_produk on data_produk.id_produk = data_penjualan.id_produk where data_produk.id_produk = '$id_produk' and data_penjualan.status ='selesai'"); ?></span>
                                    </div>
                                </a>
				  <?php } ?>   
								
								</div>
                            <div class="latest-prdouct__slider__item">
                               
<?php 
					
								$dataPerPage = 3;
			
					$no = 3;
				$startRow=($page-1)*$dataPerPage;
				$no = $startRow;
						
				
				$querytabel2="SELECT * FROM data_pemesanan inner join data_penjualan on data_pemesanan.kode_transaksi_penjualan = data_penjualan.kode_transaksi_penjualan inner join data_produk ON data_produk.id_produk 
= data_penjualan.id_produk 
GROUP BY data_penjualan.id_produk ORDER BY sum(data_penjualan.jumlah) desc LIMIT 3 ,$dataPerPage";
				$proses2 = mysql_query($querytabel2);
				while ($data2 = mysql_fetch_array($proses2))
				  {
					  
					  					  
$id_produk= $data2['id_produk'];
$nama = baca_database('','nama_produk',"select * from data_produk where id_produk = '$id_produk'");

					   $nama_data = $data[$nama];
                    $nama_link = str_replace('-', 'x~x',$nama_data);
					$nama_link = str_replace(' ', '-',$nama_link);
					  
			  ?>

							   <a href= "#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="admin/upload/<?php echo $data2['foto'];?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo baca_database('','nama_produk',"select * from data_produk where id_produk = '$id_produk'"); ?></h6>
                                        <span><?php echo baca_database('','jumlah',"select data_penjualan.jumlah AS jumlah from data_penjualan inner join data_produk on data_produk.id_produk = data_penjualan.id_produk where data_produk.id_produk = '$id_produk' and data_penjualan.status ='selesai'"); ?></span>
                                    </div>
                                </a>
				  <?php } ?>
							</div>
                        </div>
                    </div>
                </div>
               </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
   
	<?php } else{ ?>
	

<section class="breadcrumb-section set-bg" data-setbg="home/data/image/content/breadcrumb.jpg" style="background-image: url(<?php echo $url; ?>&quot;home/data/image/content/breadcrumb.jpg&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2><?php echo $objek; ?></h2>
                        <div class="breadcrumb__option">
                            <a href="?p=home">Home </a>
                            <span><?php echo ucwords($_GET['p']) ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
		
	<?php } ?>

	<?php include 'halaman.php';?>
	
    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                    <div class="footer__widget">
					  <h6>Contact</h6>
                      </div>
                        <ul>
                            <li>Address: <?php echo $alamat;?></li>
                            <li>Phone: <?php echo $telepon;?></li>
                            <li>Email: <?php echo $email;?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href= "?p=profil">About Us</a></li>
                            <li><a href= "?p=panduan">Information</a></li>
                            <li><a href= "?p=berita">Blog</a></li>
                        </ul>
                        <ul>
                            <li><a href= "?p=produk">produk</a></li>
                            <li><a href= "?p=keranjang">shoping cart</a></li>
                            <li><a href= "?p=transaksi">check out</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                       <center> <h6><?php echo $objek; ?></h6>
                          <div class="footer__about__logo">
                            <a href="<?php echo $url; ?>./index.html"><img src="admin/data/image/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
 
  
  <center><?php echo $copyright;?></center>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                   
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="<?php echo $url; ?>js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo $url; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $url; ?>js/jquery.nice-select.min.js"></script>
    <script src="<?php echo $url; ?>js/jquery-ui.min.js"></script>
    <script src="<?php echo $url; ?>js/jquery.slicknav.js"></script>
    <script src="<?php echo $url; ?>js/mixitup.min.js"></script>
    <script src="<?php echo $url; ?>js/owl.carousel.min.js"></script>
    <script src="<?php echo $url; ?>js/main.js"></script>



</body>

</html>