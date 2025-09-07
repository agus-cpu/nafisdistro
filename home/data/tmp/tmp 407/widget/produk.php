<?php function produk($tabel,$id,$nama,$foto,$kategori,$harga,$kategori_bayar,$stok,$namatombol)
{
    
?>

<!--<div class="col-md-12">

    <br><br>
    <form name="formcari" id="formcari" action="" method="get">
        <fieldset>
            <table>
                <tbody>
                    <input name="p" value="produk" id="page" type="hidden">
                    <input
                        name="Berdasarkan"
                        value="<?php echo $nama; ?>"
                        id="Berdasarkan"
                        type="hidden">
                    <tr>
                        <td>Pencarian</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="isi" value="">
                            <?php
						if (isset($_GET['Berdasarkan']))
						{
							btn_cari('Cari');
							?>
                            <a class="btn btn-primary" href="index.php?p=produk">
                                Reset
                            </a>
                        <?php
						}
						else
						{
							?>

                            <?php
							btn_cari('Cari');
							
						}
						?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
    </form>
    <br>
</div>
-->
<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
			<div class="container-fluid">
				<div class="inner-sec-shop px-lg-4 px-3">
					<h3 class="tittle-w3layouts my-lg-4 mt-3">New Arrivals for you </h3>
					<div class="row">
					
					
					<div class="side-bar col-lg-3">
							<div class="search-hotel">
								<h3 class="agileits-sear-head">Search Here..</h3>
								<form action="#" method="post">
										<input class="form-control" type="search" name="search" placeholder="Search here..." required="">
										<button class="btn1">
												<i class="fas fa-search"></i>
										</button>
										<div class="clearfix"> </div>
									</form>
							</div>
							<!-- price range -->
						
							<!-- //price range -->
							<!--preference -->
							<div class="left-side">
								<h3 class="agileits-sear-head">Deal Offer On</h3>
								<ul>
								<li>
								<a href="?p=produk" class="span">Semua</a>
									
								</li>
								  <?php
		  
				$querykategori="select * from data_kategori";		
				$proseskategori = mysql_query($querykategori);
				while ($datakategori = mysql_fetch_array($proseskategori))
				  { 
			  
		  ?>
									<li>
									
										<a href="?p=produk&Berdasarkan=kategori&isi=<?php echo $datakategori['kategori'];?>" class="span"><?php echo $datakategori['kategori']; ?></a>
									</li>
								
				  <?php } ?>
								</ul>
							</div>
							<!-- reviews -->
							<!-- //reviews -->
							<!-- deals -->
							
							<bR>
							<bR>
							<div class="deal-leftmk left-side">
								<h3 class="agileits-sear-head">Our New Product</h3>
								<BR>
								  <?php
		  
				$querykategori="select * from data_produk LIMIT 0,5";		
				$proseskategori = mysql_query($querykategori);
				while ($datakategori = mysql_fetch_array($proseskategori))
				  { 
			  
		  ?>
								<div class="special-sec1">
									<div class="img-deals">
										<img src="admin/upload/<?php echo $datakategori['foto'];?>" alt="">
									</div>
									<div class="img-deal1">
										<h3><?php echo $datakategori['nama_produk'];?></h3>
										<a href="single.html"><?php echo $datakategori['harga'];?></a>
									</div>
									<div class="clearfix"></div>
								</div>
				  <?php } ?>
							</div>
							<!-- //deals -->
						</div>
						
						



<div class="left-ads-display col-lg-9">
							<div class="wrapper_top_shop">
								<div class="row">
										<div class="col-md-6 shop_left">
												<img src="<?php echo $url; ?>images/banner3.jpg" alt="">
												<h6>40% off</h6>
											</div>
											<div class="col-md-6 shop_right">
												<img src="<?php echo $url; ?>images/banner4.jpg" alt="">
												<h6>50% off</h6>
											</div>
						
								</div>
								<div class="row">
								
<?php
				if (isset($_GET['page']) && !empty($_GET['page'])){ $page = (int)$_GET['page']; }
				else { $page = 1; }
				if (isset($_GET['perPage']) && !empty($_GET['perPage'])){ $dataPerPage = (int)$_GET['perPage']; }
				else { $dataPerPage = 12; }
				
				
				$no = 0;
				$startRow=($page-1)*$dataPerPage;
				$no = $startRow;
				
				if (isset($_GET['Berdasarkan']) && !empty($_GET['Berdasarkan']) && isset($_GET['isi']) && !empty($_GET['isi']))
				{
				$berdasarkan = $_GET['Berdasarkan'];
				$isi = $_GET['isi'];
				$querytabel="SELECT * FROM $tabel where $berdasarkan like '%$isi%'  LIMIT $startRow ,$dataPerPage";
				$querypagination="SELECT COUNT(*) AS total FROM $tabel where $berdasarkan like '%$isi%'";
				}
				else
				{
				$querytabel="SELECT * FROM $tabel  LIMIT $startRow ,$dataPerPage";
				$querypagination="SELECT COUNT(*) AS total FROM $tabel";
				}
				$proses = mysql_query($querytabel);
				while ($data = mysql_fetch_array($proses))
				  { 
                    $nama_data = $data[$nama];
                    $nama_link = str_replace('-', 'x~x',$nama_data);
					 $nama_link = str_replace(' ', '-',$nama_link);
					
$id_produk= $data['id_produk'];				
			  
 //$nama = baca_database('','nama_produk',"select * from data_produk where id_produk = '$id_produk'");
  $jmlstok = $data["$stok"];
			?>
			
			
			<div class="col-md-4 product-men women_two shop-gd">
										<div class="product-googles-info googles">
											<div class="men-pro-item">
												<div class="men-thumb-item">
													<img src="admin/upload/<?php echo $data[$foto];?>" style="width:500px; height:200px" class="img-fluid" alt="">
													<div class="men-cart-pro">
														<div class="inner-men-cart-pro">
															<a href="index.php?p=produk&action=detail&Go=<?php echo $nama_link;?>" class="link-product-add-cart">Quick View</a>
														</div>
													</div>
												
												</div>
												<div class="item-info-product">
													<div class="info-product-price">
														<div class="grid_meta">
															<div class="product_price">
																<h4>
																	<a href="#"><?php echo $data[$nama];?></a>
																</h4>
																<h6>
															<a>	Stok : <?php echo $jmlstok = $data["$stok"];?></a>
																</h6>
																<div class="grid-price mt-2">
																	<span class="money "><?php echo  rupiah( $data["$harga"]);?></span>
																</div>
															</div>
															
														</div>
														
														
<?php if ($jmlstok <=0)
										{
											?>
                    <a onclick="alert('Maaf Stok Tidak Cukup');">
                        Maaf, Stok Habis
                    </a>
                <?php
										}
										else
										{
										?>
													<a href="index.php?p=produk&action=beli&Go=<?php echo $nama_link;?>" class="googles single-item hvr-outline-out">
													
													<br>
															<i class="fas fa-cart-plus"></i>
															
														</a>
														
										<?php } ?>
													</div>
													<div class="clearfix"></div>
												</div>
											</div>
										</div>
									</div>
								
								

    <?php
			  
			  } ?>
	</div>
							</div>
						</div>
						<!--//product right-->
					</div>
					<!--//slider-->
				</div>
			</div>
		</section>

<div class="col-md-12">
    <br>
   <center> <?php Pagination_font_end($page,$dataPerPage,$querypagination); ?> </center>

</div>
<?php } ?>