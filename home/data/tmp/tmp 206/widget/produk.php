<?php function produk($tabel,$id,$nama,$foto,$kategori,$harga,$stok,$namatombol)
{
    
?>

<div class="col-md-12">

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


<div class="products-area mt-100 sm-mt-80">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<!--products-area start-->
					<div class="products-area">
						<div class="container">
							<div class="row">
								<div class="col-sm-6">
									<div class="products-sort">
										<form>
											<label>Item Show :</label>
											<select>
												<option>12 Products</option>
												<option>8 Products</option>
												<option>4 Products</option>
											</select>
										</form>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="product-view-system pull-right" role="tablist">
										<!-- Nav tabs -->
										<ul class="nav nav-tabs">
											<li><a class="active" data-toggle="tab" href="#home"><i class="fa fa-th-large"></i></a></li>
											<li><a data-toggle="tab" href="#menu1"><i class="fa fa-th-list"></i></a></li>
										</ul>
										
									</div>
								</div>
							</div>
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
					
			  
			?>

    
	<div class="col-lg-3 col-md-6 col-sm-12">
											<div class="single-product">
												<div class="product-thumb-sin">
													<a href="#"><img src="admin/upload/<?php echo $data[$foto];?>" alt=""></a>
													<div class="product-action">
														<a href="#" class="add-to-cart">
															<span>Add to Cart</span>
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
										
														</a>
													</div>
												</div>
												<div class="product-text">
													<h4><a href="#"><?php echo $data["$nama"];?> - <?php echo $data["$kategori"];?></a></h4>
													<span class="product-price"><?php echo rupiah($data["$harga"]);?></span>
												</div>
											</div>
										</div>
										
										
										
    <div class="col-lg-4">
  <div class="pricing-box-alt">		
					<div class="pricing-terms">
                    <a
                        href="index.php?p=produk&action=beli&Go=<?php echo $nama_link;?>">
                        <img
                            width="350"
                            height="200"
							onerror="this.src='home/data/image/error/error.png'"
                            src="admin/upload/<?php echo $data[$foto];?>" alt="item4">
                    </a>
								</div>
								<div class="pricing-content">
								 <center>
                    
                    <?php echo $data["$nama"];?>
                    <br>
                    <font color="red">
                        <?php echo ucwords($kategori);?>
                        :
                        <?php echo $data["$kategori"];?>
                    </font>
                    <br>
                    <font color="green">
                        Stok :
                        <?php echo $jmlstok = $data["$stok"];?>
                    </font>
                    <br>
                    <b><?php echo rupiah($data["$harga"]);?></b>
                    <br>
                    <br>
                    <a
                        href="index.php?p=produk&action=detail&Go=<?php echo $nama_link;?>" class="btn btn-info">
                        Detail
                    </a>
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
                    <a
                        href="index.php?p=produk&action=beli&Go=<?php echo $nama_link;?>"class="btn btn-danger">

                        <?php echo $namatombol;?>
                    </a>
                    <?php } ?>
                    <br>
                    <br>
                </center>
								</div>
							
							</div></div>


    <?php
			  
			  } ?>
	</div>
								</div>
							
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="msk-pagination style-3 text-center mt-60 sm-mt-45 fix">
										<ul>
											<li><a href="#">Prev</a></li>
											<li class="active"><a href="#">1</a></li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li><a href="#">Next</a></li>
										</ul>
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
    <?php Pagination_font_end($page,$dataPerPage,$querypagination); ?>
    <br>
    <br>
</div>
<?php } ?>