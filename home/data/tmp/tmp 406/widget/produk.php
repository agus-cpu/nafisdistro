<?php function produk($tabel,$id,$nama,$foto,$kategori,$harga,$stok,$namatombol)
{
    
?>

<div class="col-md-12">
<center>
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
                        </div> </center>
    <br>
</div>

<section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Kategori</h4>
                            <ul>
                                   <?php 
							
				
				$querytabel1="SELECT * FROM data_kategori";
				$proses1 = mysql_query($querytabel1);
				while ($data1 = mysql_fetch_array($proses1))
				  {
$id_kategori= $data1['id_kategori'];
			  ?>
			  <?php  $oke = baca_database('','kategori',"select * From data_kategori where id_kategori='$id_kategori'"); ?>
									<li><a href= "?p=kategori&Berdasarkan=kategori&isi=<?php echo $oke ?>" VALUE="<?php echo $oke ?>"><?php echo $oke = baca_database('','kategori',"select * From data_kategori where id_kategori='$id_kategori'"); ?></a>
									
									</li>
				  <?php } ?>
                            </ul>
                        </div>
                       <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest Products</h4>
                                <div class="latest-product__slider owl-carousel owl-loaded owl-drag">
                                    
                                    
                                <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-787px, 0px, 0px); transition: all 1.2s ease 0s; width: 1575px;"><div class="owl-item cloned" style="width: 262.5px;"><div class="latest-prdouct__slider__item">
                                 
		<?php 
							
								$dataPerPage = 3;
			
					$no = 0;
				$startRow=($page-1)*$dataPerPage;
				$no = $startRow;
				
				
				$querytabel2="SELECT * FROM data_produk LIMIT 0 ,$dataPerPage";
				$proses2 = mysql_query($querytabel2);
				while ($data2 = mysql_fetch_array($proses2))
				  {
$data_produk= $data2['data_produk'];
			  ?>
			  
			  
			
                         
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="admin/upload/<?php echo $data2['foto'];?>" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6><?php echo $data2['nama_produk'];?></h6>
                                                <span><?php echo rupiah($data2['harga_jual']);?></span>
                                            </div>
                                        </a>
<?php } ?>
										
                                    </div></div>
									
									
									<div class="owl-item cloned" style="width: 262.5px;"><div class="latest-prdouct__slider__item">
                           
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
			  
			  
			  						   
										
										 <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="admin/upload/<?php echo $data1['foto'];?>" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6><?php echo $data1['nama_produk'];?></h6>
                                                <span><?php echo rupiah($data1['harga_jual']);?></span>
                                            </div>
                                        </a>
                                     
				  <?php } ?>
				  
									 </div></div>
									 <!--
									 <div class="owl-item" style="width: 262.5px;"><div class="latest-prdouct__slider__item">

			  <?php 
							
								$dataPerPage = 3;
			
					$no = 0;
				$startRow=($page-1)*$dataPerPage;
				$no = $startRow;
				
				
				$querytabel2="SELECT * FROM data_produk LIMIT 0 ,$dataPerPage";
				$proses2 = mysql_query($querytabel2);
				while ($data2 = mysql_fetch_array($proses2))
				  {
$data_produk= $data2['data_produk'];
			  ?>
			  
                                       <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="admin/upload/<?php echo $data3['foto'];?>" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6><?php echo $data3['nama_produk'];?></h6>
                                                <span><?php echo rupiah($data3['harga_jual']);?></span>
                                            </div>
                                        </a>
										
				  <?php } ?>
                                     </div></div>
									 
									 <div class="owl-item active" style="width: 262.5px;"><div class="latest-prdouct__slider__item">
                                    									 
 <?php 
							
								$dataPerPage = 3;
			
					$no = 0;
				$startRow=($page-1)*$dataPerPage;
				$no = $startRow;
				
				
				$querytabel2="SELECT * FROM data_produk LIMIT 0 ,$dataPerPage";
				$proses2 = mysql_query($querytabel2);
				while ($data2 = mysql_fetch_array($proses2))
				  {
$data_produk= $data2['data_produk'];
			  ?>
			  
			  
			      <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="admin/upload/<?php echo $data3['foto'];?>" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6><?php echo $data3['nama_produk'];?></h6>
                                                <span><?php echo rupiah($data3['harga_jual']);?></span>
                                            </div>
                                        </a>
				  <?php } ?> </div></div> -->
									
									</div></div><div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><span class="fa fa-angle-left"><span></span></span></button><button type="button" role="presentation" class="owl-next"><span class="fa fa-angle-right"><span></span></span></button></div><div class="owl-dots disabled"></div></div>
                            </div>
                        </div>
                    </div>
                </div>
                
				                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Sale Off</h2>
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
					
			  
			?>
<?php  $jmlstok = $data["$stok"];?>
    
	
	 <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="admin/upload/<?php echo $data[$foto];?>" style="background-image: url(&quot;admin/upload/<?php echo $data[$foto];?>&quot;);">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="index.php?p=produk&action=detail&Go=<?php echo $nama_link;?>"><i class="fa fa-info"></i></a></li>
                                       <?php if ($jmlstok <=0)
										{
											?>
                    <a onclick="alert('Maaf Stok Tidak Cukup');">
                      <i class="fa fa-shopping-cart"></i></a>
                    </a>
                <?php
										}
										else
										{
										?>
                                        <li><a href="index.php?p=produk&action=beli&Go=<?php echo $nama_link;?>"><i class="fa fa-shopping-cart"></i></a></li>
										 <?php } ?>
                                    </ul>
                                </div>
								
								<div class="product__discount__item__text">
                                            <span><?php echo $data["$kategori"];?></span>
                                            <h5><a href="#"><?php echo $data["$nama"];?></a></h5>
											<p>Tersisa <b><?php echo ($data["$stok"]);?></b> Produk</p>
                                            <div class="product__item__price"><?php echo rupiah($data["$harga"]);?></div>
                                        </div>
										
                             
                            </div>
                        </div>
	
    <?php
			  
			  } ?>
</div>
</div>
</section>

<div class="col-md-12">
 <center>   <?php Pagination_font_end($page,$dataPerPage,$querypagination); ?> </center>
</div>
<?php } ?>