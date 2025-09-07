<?php function produk($tabel,$id,$nama,$foto,$kategori,$harga,$jumlah,$namatombol)
{
    
?>

<div class="row">
<div class="col-md-10">
</div>
<div class="col-md-2">


<div class="search search-box">
 <form name="formcari" id="formcari" action="" method="get">
                     <input name="p" value="produk" id="page" type="hidden">
                    <input
                        name="Berdasarkan"
                        value="<?php echo $nama; ?>"
                        id="Berdasarkan"
                        type="hidden">
								<i class="fa fa-search searching-icon"></i>
								<div class="search-place">
									<input type="text" name="isi" value="" placeholder="Search">
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
								</div>	
</form>								
							</div>
							
							
			
</div>
</div>

<center>
<h2> Our Product
</h2>
</center>

<div class="products-area mt-100 sm-mt-80" style="margin-top : 40px">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<!--products-area start-->
					<div class="products-area">
						<div class="container">
						
							<div class="tab-content mt-25">
								<div id="home" class="tab-pane active">
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
					
			  $jmlstok = $data["jumlah"];
			?>

	<div class="col-lg-3 col-md-6 col-sm-12">
											<div class="single-product">
												<div class="product-thumb-sin">
													<a href="admin/upload/<?php echo $data[$foto];?>"><img src="admin/upload/<?php echo $data[$foto];?>" alt=""></a>
													<div class="product-action">
													<div class="container">
													<div class="row">
													<div class="col-md-6">
														<a href="index.php?p=produk&action=beli&Go=<?php echo $nama_link;?>" class="add-to-cart">
															<span>Beli</span>
														</a>
														
														</div>
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
										?>
                  
														<div class="col-md-6">
														<a href="index.php?p=produk&action=detail&Go=<?php echo $nama_link;?>" class="add-to-cart">
															<span>detail</span>
														</a>
													</div>
													
                    <?php } ?>
													</div>
													</div>
													</div>
												</div>
												<div class="product-text">
													<h4><a href="#"> <?php echo $data["$nama"];?> -  <?php echo $data["$kategori"];?></a></h4>
													<p class="product-price"> Stok :    <?php echo $jmlstok = $data["jumlah"];?></p>
													<span class="product-price"><?php echo rupiah($data["$harga"]);?></span>
												</div>
											</div>
										</div>
									
									
									
    
  
    <?php
			  
			  } ?>
	</div>
								</div>
							</div>
							
						</div>
					</div>
					<!--products-area end-->
				</div>
			</div>
		</div>
	</div>

<div class="col-md-12">
    <br>
    <br>
    <br>
    <br>
    <center><?php Pagination_font_end($page,$dataPerPage,$querypagination); ?></center>
</div>
<?php } ?>