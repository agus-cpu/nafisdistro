
<body>
	<a href="<?php index(); ?>?input=tambah">
	<?php btn_tambah('Tambah'); ?>
	</a>
	
	<a target="blank" href="cetak.php?berdasarkan=data_produk&jenis=xls&pakaiperperiode=<?php echo $status_pakaiperperiode;?>">
	<?php btn_export('Export Excel'); ?>
	</a>
	
	<a target="blank" href="cetak.php?berdasarkan=data_produk&jenis=print&pakaiperperiode=<?php echo $status_pakaiperperiode;?>">
	<?php btn_cetak('Cetak'); ?>
	</a>
	
	<a href="<?php index(); ?>">
	<?php btn_refresh('Refresh'); ?>
	</a>
	
	<br><br>
	
			<form name="formcari" id="formcari" action="" method="get">
				<fieldset> 
					<table>
						<tbody>
						<tr>
							<td>Berdasarkan</td>	
							<td>:</td>	
							<td>
							<!-- <input value="" name="Berdasarkan" id="Berdasarkan" > --> <select class="form-control show-tick" name="Berdasarkan" id="Berdasarkan">
								<?php
								$sql = "desc data_produk";
								$result = @mysql_query($sql);
								while($row = @mysql_fetch_array($result)){
									echo "<option id='idnya' name='berdasarkan' value=$row[0]>$row[0]</option>";
								}
								?>
							</select>							
							</td>
						</tr>

						<tr>
							<td>Pencarian</td>	
							<td>:</td>	
							<td>							
								<!--<input class="form-control" type="text" name="isi" value="" >--> <input  type="text" name="isi" value="" >
								<?php btn_cari('Cari'); ?>
							</td>
						</tr>
					</tbody>
					</table>									
				</fieldset>
			</form>

<div style="overflow-x:auto;">
<table <?php tabel(100,'%',1,'left');  ?> >
			<tr>								  
			   <th>Action</th>
			   <th>No</th>
			   <th>Id&nbsp;produk</th>
			   <th align="center" class="th_border cell"  >Nama&nbsp;produk</th>
<th align="center" class="th_border cell"  >Merk</th>
<th align="center" class="th_border cell"  >Kategori</th>
<th align="center" class="th_border cell"  >Jumlah</th>
<th align="center" class="th_border cell"  >Harga&nbsp;beli</th>
<th align="center" class="th_border cell"  >Harga&nbsp;jual</th>
<th align="center" class="th_border cell"  >Satuan</th>
<th align="center" class="th_border cell"  >Foto</th>
<th align="center" class="th_border cell"  >Keterangan</th>
<th align="center" class="th_border cell"  >Berat&nbsp;barang</th>

			</tr>
							 
			<tbody>
			<?php
				$no = 0;
				$startRow=($page-1)*$dataPerPage;
				$no = $startRow;
				
				if (isset($_GET['Berdasarkan']) && !empty($_GET['Berdasarkan']) && isset($_GET['isi']) && !empty($_GET['isi']))
				{
				$berdasarkan =  mysql_real_escape_string($_GET['Berdasarkan']);
				$isi =  mysql_real_escape_string($_GET['isi']);
				$querytabel="SELECT * FROM data_produk where $berdasarkan like '%$isi%'  LIMIT $startRow ,$dataPerPage";
				$querypagination="SELECT COUNT(*) AS total FROM data_produk where $berdasarkan like '%$isi%'";
				}
				else
				{
				$querytabel="SELECT * FROM data_produk  LIMIT $startRow ,$dataPerPage";
				$querypagination="SELECT COUNT(*) AS total FROM data_produk";
				}
				$proses = mysql_query($querytabel);
				while ($data = mysql_fetch_array($proses))
				  { ?>
               <tr class="event2">	
				  <td class="th_border cell" align="center" width="200">
						<table border="0">
							<tr>
								<td>
									<a href="<?php index(); ?>?input=detail&proses=<?= encrypt($data['id_produk']); ?>">
									<?php btn_detail('Detail'); ?></a>
								</td>
								<td>
									<a href="<?php index(); ?>?input=edit&proses=<?= encrypt($data['id_produk']); ?>">
									<?php btn_edit('Edit'); ?></a>
								</td>
								<td>
									<a href="<?php index(); ?>?input=hapus&proses=<?= encrypt($data['id_produk']); ?>">
									<?php btn_hapus('Hapus'); ?></a>
								</td>
							</tr>
						</table>
				  </td>
				  <td align="center" width="50"><?php $no = (($no +1) ) ; echo $no;  ?></td>
				  <td align="center"><?php echo $data['id_produk']; ?></td>

                 <td align="center"><?php echo ($data['nama_produk']); ?></td>
<td align="center"><?php echo ($data['merk']); ?></td>
<td align="center"><?php echo ($data['kategori']); ?></td>
<td align="center"><?php echo ($data['jumlah']); ?></td>
<td align="center"><?php echo (rupiah($data['harga_beli'])); ?></td>
<td align="center"><?php echo (rupiah($data['harga_jual'])); ?></td>
<td align="center"><?php echo (($data['satuan'])); ?></td>
<td align="center"><a href='../../../upload/<?php echo $data['foto']; ?>'><img onerror="this.src='<?php echo $imageerror; ?>'" width='50' height='30' src='../../../upload/<?php echo $data['foto']; ?>'></a></td>
<td align="center"><?php echo (substr($data['keterangan'],0,100)); ?></td>
<td align="center"><?php echo ($data['berat_barang']); ?></td>

               </tr>
			<?php } ?>
			</tbody>
</table>
</div>

<?php Pagination($page,$dataPerPage,$querypagination); ?>

</body>