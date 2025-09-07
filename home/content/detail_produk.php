<?php function detail($tabel,$id,$nama,$foto,$kategori,$harga,$satuan,$pembayaran,$stok,$keterangan,$proses,$namatombol)
{
	
?>
<?php
$sql=mysql_query("SELECT * FROM $tabel where $nama = '".mysql_real_escape_string($proses)."'");
$data=mysql_fetch_array($sql);
$id_produk = $data[$id];
$count = mysql_num_rows($sql);

/*
if ($count<=0)
{
	?>
<script>
location.href = "index.php?p=home"; 
</script>

	<?php
}*/
?>

<script>
function proses()
{	
	var jumlah = document.getElementById("jumlah").value;
	var harga = document.getElementById("harga").value;
	var total = jumlah * harga;
	convertToRupiah(total);	
}

function convertToRupiah(angka)
{
	var rupiah = '';		
	var angkarev = angka.toString().split('').reverse().join('');
	for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
	document.getElementById("total").innerHTML = 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
}
</script>


	<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
			<div class="container">
				<div class="inner-sec-shop pt-lg-4 pt-3">
					<div class="row">
							<div class="col-lg-4 single-right-left ">
									<div class="grid images_3_of_2">
										<div class="flexslider1">
					
											<ul class="slides">
												<li data-thumb="admin/upload/<?php echo $data["$foto"];?>">
													<div class="thumb-image"> <img src="admin/upload/<?php echo $data["$foto"];?>" data-imagezoom="true" class="img-fluid" alt=" "> </div>
												</li>
												
											</ul>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<div class="col-lg-8 single-right-left simpleCart_shelfItem">
									<h3><?php echo ($data["$nama"]);?></h3>
									<p><span class="item_price"><?php echo rupiah($data["$harga"]);?></span>
									</p>
									
									<div class="description">
										<h5><?php echo $data["$keterangan"] ?></h5>
									
									</div>
									
										<div class="tab2">
					
												<div class="single_page">
													<div class="bootstrap-tab-text-grids">
													
													
													 <?php 
					 $action = $_GET['action'];
					 if ($action=="beli")
					 {
						 
					
	if (isset($_COOKIE["kodene"]))
	{
	}
	else
	{
		?>
		<script>
alert("MAAF ANDA BELUM LOGIN,SILAHKAN LOGIN TERLEBIH DAHULU");
location.href = "index.php?p=login"; </script>
		<?php
	}


						 
						 ?>
														<div class="add-review">
															<h4>Masukan Ke Keranjang</h4>
														 <form action="index.php">
					 <input type="hidden" value="produk" name="p">
					 <input type="hidden" value="simpan" name="action">
					 <input type="hidden" value="<?php echo encrypt($data["$id"]);?>" name="<?php echo $id;?>"><br>
					 <input type="hidden" value="<?php echo ($data["$harga"]);?>" name="harga" id="harga">
					 
					  <input type="hidden"  value="<?php echo $data["$stok"];?>" name="stok">
							
							
							
																	<input class="form-control"  style="width:100px; display:inline-grid" onchange="proses();" onkeypress="proses();" onclick="proses();" onkeydown="proses();" 
									 name="jumlah" id="jumlah" value="0" min="1" max="<?php echo $data["$stok"];?>"  type="number" required>&nbsp; &nbsp; &nbsp; <b id="total"></b>
																<br>
																Jumlah Stok : <?php echo $data["$stok"];?>
																<hr>
																<textarea name="catatan"></textarea>
																<Br>
																<Br>
    																<input type="submit" value="Masukan Ke Keranjang">
															</form>
														</div>
					 <?php } ?>
													</div>
					
												</div>
											</div>
											
								
								
								
								</div>
							
					</div>
				</div>
			</div>
				<!--<div class="container-fluid">-->
					<!--/slide-->
				<!--	<div class="slider-img mid-sec mt-lg-5 mt-2 px-lg-5 px-3">-->
						<!--//banner-sec-->
				<!--		<h3 class="tittle-w3layouts text-left my-lg-4 my-3">Featured Products</h3>-->
				<!--		<div class="mid-slider">-->
				<!--			<div class="owl-carousel owl-theme row">-->
				<!--				<div class="item">-->
				<!--					<div class="gd-box-info text-center">-->
				<!--						<div class="product-men women_two bot-gd">-->
				<!--							<div class="product-googles-info slide-img googles">-->
				<!--								<div class="men-pro-item">-->
				<!--									<div class="men-thumb-item">-->
				<!--										<img src="images/s5.jpg" class="img-fluid" alt="">-->
				<!--										<div class="men-cart-pro">-->
				<!--											<div class="inner-men-cart-pro">-->
				<!--												<a href="?p=produk" class="link-product-add-cart">Quick View</a>-->
				<!--											</div>-->
				<!--										</div>-->
														
												
				<!--									<div class="item-info-product">-->

				<!--										<div class="info-product-price">-->
				<!--											<div class="grid_meta">-->
				<!--												<div class="product_price">-->
				<!--													<h4>-->
				<!--													<?php echo $data["$nama"];?></a>-->
				<!--													</h4>-->
				<!--													<div class="grid-price mt-2">-->
				<!--														<span class="money "><?php echo rupiah($data["$harga"]);?></span>-->
				<!--													</div>-->
				<!--												</div>-->
																
				<!--											</div>-->
				<!--											<div class="googles single-item hvr-outline-out">-->
				<!--													<form action="#" method="post">-->
				<!--														<input type="hidden" name="cmd" value="_cart">-->
				<!--														<input type="hidden" name="add" value="1">-->
				<!--														<input type="hidden" name="googles_item" value="Royal Son Aviator">-->
				<!--														<input type="hidden" name="amount" value="425.00">-->
				<!--														<button type="submit" class="googles-cart pgoogles-cart">-->
				<!--															<i class="fas fa-cart-plus"></i>-->
				<!--														</button>-->
	
																		
				<!--													</form>-->
	
				<!--												</div>-->
				<!--										</div>-->

				<!--									</div>-->
				<!--								</div>-->
				<!--							</div>-->
				<!--						</div>-->
				<!--					</div>-->
				<!--				</div>-->
				<!--			</div>-->
				<!--		</div>-->
				<!--	</div>-->
					<!--//slider-->
				</div>
		</section>
	
<!--
<section class="w3l-contacts-8">
    <div class="contacts-9 section-gap py-5">
      <div class="container py-lg-5">
        <div class="row top-map">
          <div class="col-lg-6 partners">
            <div class="cont-details">
              <h3 class="hny-title mb-0"><span><?php echo $data["$nama"];?></span></h3>
              <p class="margin-top"></span> <a>
                 <?php echo ucwords($kategori);?></a></p>
             <p>Tersisa : <?php echo $data["$stok"];?> Buah</p>
           
            </div>
          
              <p><?php echo $data["$keterangan"];?></p>
          <Br>
          <Br>
		  <h3 class="hny-title mb-0"><?php echo rupiah($data["$harga"]);?><span></span></h3>
         
		  	 <form action="index.php">
					 <input type="hidden" value="produk" name="p">
					 <input type="hidden" value="simpan" name="action">
					 <input type="hidden" value="<?php echo encrypt($data["$id"]);?>" name="<?php echo $id;?>"><br>
					 <input type="hidden" value="<?php echo ($data["$harga"]);?>" name="harga" id="harga">
							
					 <?php 
					 $action = $_GET['action'];
					 if ($action=="beli")
					 {
						 
					
	if (isset($_COOKIE["kodene"]))
	{
	}
	else
	{
		?>
		<script>
alert("MAAF ANDA BELUM LOGIN,SILAHKAN LOGIN TERLEBIH DAHULU");
location.href = "index.php?p=login"; </script>
		<?php
	}


						 
						 ?>
						 <div class="single-music-chart d-flex align-items-center justify-content-between wow fadeInUp animated" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">

						<font color="white"> Form Pembelian </font>
						 
						 </div>
						 <Br>
						
					       <input type="hidden"  value="<?php echo $data["$stok"];?>" name="stok"><br>
							Jumlah : <input class="single-input" onchange="proses();" onkeypress="proses();" onclick="proses();" onkeydown="proses();" onkeypress="proses();" 
									 name="jumlah" id="jumlah" value="0" min="1" max="<?php echo $data["$stok"];?>"  type="number" required> 
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							Total Harga : <b id="total"></b>
							<br><br>
							Catatan : <br>
							<textarea  class="single-textarea" name="catatan">
							</textarea> <div class="music-price">
<button type="submit" class="btn razo-btn btn-2"><?php echo $namatombol;?></button>
</div>
						 
						 <Br>
						


				    <?php } ?>
						    </form></p>
                          
   </div>
		
          <div class="col-lg-6 map">
        <img  src="admin/upload/<?php echo $data["$foto"];?>" onerror="this.src='home/data/image/error/error.png'" style="display: inline; width: 100%;  opacity: 1;">
          </div>
	
        </div>
      </div>
    </div>
    </section>
-->


<section class="w3l-customers-sec-6">
	<div class="customers-sec-6-cintent py-5">
		<!-- /customers-->
		<div class="container py-lg-5">
				<h3 class="hny-title text-center mb-0 ">Customers <span>Love</span></h3>
				<p class="mb-5 text-center">What People Say About This Product</p>
			<div class="row customerhny my-lg-5 my-4">
				<div class="col-md-12">
					<div id="customerhnyCarousel" class="carousel slide" data-ride="carousel">

						<ol class="carousel-indicators">
							<li data-target="#customerhnyCarousel" data-slide-to="0" class="active"></li>
							
						</ol>
						<!-- Carousel items -->
						<div class="carousel-inner">

							<div class="carousel-item active" style="background : #f4f4f4; display : contents;">
								<div class="row">
								
<?php 
							
				
				$querytabel1="SELECT * FROM data_komentar where id_produk='$id_produk'";
				$proses1 = mysql_query($querytabel1);
				while ($data1 = mysql_fetch_array($proses1))
				  {
?>

									<div class="col-md-3">
										<div class="customer-info text-center">
											<div class="feedback-hny">
												<span class="fa fa-quote-left"></span>
												<p style="color : #ffffff;" class="feedback-para"><a style="color : black;" ><?php
	echo $data1['komentar'];
	?>.</a></p>
											</div>
											<div class="feedback-review mt-4">
												<img src="admin/upload/
	<?php
	echo $data1['foto'];
	?>" class="img-fluid" alt="">
												<h5><?php
	$idp = $data1['id_pelanggan'];
	
	echo baca_database("data_pelanggan","nama_pelanggan","select * from data_pelanggan where id_pelanggan='$idp'");
	?></h5>

											</div>
										</div>
									</div>
				  <?PHP } ?>
								</div>
								<!--.row-->
							</div>
							<!--.item-->

							

						</div>
						<!--.carousel-inner-->
					</div>
					<!--.Carousel-->

				</div>
			</div>
		</div>
	</div>
</section>



<?php } ?>