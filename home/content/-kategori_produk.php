
<?php function kategori($tabel,$id,$nama,$foto,$kategori,$harga,$stok,$namatombol)
{
?>




<div class="event-search-area section-padding-80">
<div class="container">
<div class="row">
<div class="col-12">
<div class="event-search-content">
<form action="" class="search-form">
<div class="row align-items-end">



<input name="p" value="kategori" id="page" type="hidden">
					<input name="Berdasarkan" value="<?php echo $kategori; ?>" id="Berdasarkan" type="hidden">
					<tr>
					<td>Kategori&nbsp; &nbsp; </td>	
					<td>:&nbsp; &nbsp; </td>	
					<td>
						<select  type="enum" name="isi"  style="width:50%" class="form-control" id="isi" placeholder="SIP" required="required">
<option></option> <?php echo combo_database('data_kategori','kategori','') ?>
</select>	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 


						<?php
						if (isset($_GET['Berdasarkan']))
						{
							
							?> <Br>
							<Br>
							<div class="col-sm-6 col-lg-3">
<div class="form-group text-right">
<br>
<br>
							<a  class="read-more btn"> Cari </a>
							</div>
							</div>
							
							<div class="col-sm-6 col-lg-3">
<div class="form-group text-right">
							<a href="index.php?p=kategori" class="read-more btn">
							Reset
							</a>
							</div></div>
							<?php
						}
						else
						{
							?>
							<a  class="read-more btn"> Cari </a>
							<?php
							
							
						}
						?> 
					</td>
					</tr>

</div>
</form>
</div>
</div>
</div>
</div>
</div>

<section class="w3l-ecommerce-main">
	<!-- /products-->
	<div class="ecom-contenthny py-5" style="padding-top: 0rem !important;">
		<div class="container py-lg-5">
			<h3 class="hny-title mb-0 text-center">Shop With <span>Us</span></h3>
			<p class="text-center">Handpicked Favourites just for you</p>
			<!-- /row-->
			<div class="ecom-products-grids row mt-lg-5 mt-3">
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
					
			  
			?>

    <div class="col-lg-3 col-6 product-incfhny mt-4">
					<div class="product-grid2 transmitv">
						<div class="product-image2">
							<a href="#">
								<img  style="height:250px;"  class="pic-1 img-fluid" onerror="this.src='home/data/image/error/error.png'"
                            src="admin/upload/<?php echo $data[$foto];?>" >
								<img  style="height:250px;"  class="pic-2 img-fluid" onerror="this.src='home/data/image/error/error.png'"
                            src="admin/upload/<?php echo $data[$foto];?>" >
							</a>
							<ul class="social">
									<li><a href= "index.php?p=produk&action=detail&Go=<?php echo $nama_link;?>" data-tip="Quick View"><span class="fa fa-eye"></span></a></li>


<?php if ($jmlstok <=0)
										{
											?>
                    <a onclick="alert('Maaf Stok Tidak Cukup');" class="btn btn-danger">
                        <?php echo $namatombol;?>
                    </a>
                <?php
										}
										else
										{
										?><br>
										<br> 
										
										
									<li><a href= "index.php?p=produk&action=beli&Go=<?php echo $nama_link;?>" data-tip="Add to Cart"><span class="fa fa-shopping-bag"></span></a>
									</li>
									
										<?php } ?>
							</ul>
							<div class="transmitv single-item">
							
									<button type="submit" class="transmitv-cart ptransmitv-cart add-to-cart">
										<?php echo $data["$kategori"];?>
									</button>
								
							</div>
						</div>
						<div class="product-content">
							<h3 class="title"><a href="index.php?p=produk&action=beli&Go=<?php echo $nama_link;?>"> <?php echo $nama_data;?> </a></h3>
							<span class="price"><?php echo rupiah($data["$harga"]);?></span>
							<p><?php echo $jmlstok = $data["$stok"];?></p>
						</div>
					</div>
				</div>
			
			
			
	
    <?php
			  
			  } ?>
	</div>
			<!-- //row-->
		</div>
	</div>
</section>

<div class="col-md-12">
<br>
<center><?php Pagination_font_end($page,$dataPerPage,$querypagination); ?></center>

<br>
<br>
<br>
</div>
<?php } ?>
