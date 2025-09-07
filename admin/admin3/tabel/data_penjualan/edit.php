
<a href="<?php index(); ?>">
<?php btn_kembali(' KEMBALI'); ?>
</a>

<br><br>

<div class="content-box">
<div class="content-box-header" style="height: 39px">Edit<h3></h3></div>
<form action="proses_update.php"  enctype="multipart/form-data"  method="post">
<div class="content-box-content">
<div id="postcustom">	
<table <?php tabel_in(100,'%',0,'center');  ?>>	
	<tbody>
	<?php

if (!isset($_GET['proses']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 
			$proses = decrypt(mysql_real_escape_string($_GET['proses']));
			$sql=mysql_query("SELECT * FROM data_penjualan where id_penjualan = '$proses'");
			$data=mysql_fetch_array($sql);
			?>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >id&nbsp;penjualan <font color="red">*</font></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="%typepertama%" name="id_penjualan" value="<?php echo $data['id_penjualan']; ?>" readonly  id="id_penjualan" required="required">		
				</td>
			   </tr>
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Kode&nbsp;Transaksi&nbsp;Penjualan <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="kode_transaksi_penjualan" id="kode_transaksi_penjualan" placeholder="Kode&nbsp;Transaksi&nbsp;Penjualan" value="<?php echo ($data['kode_transaksi_penjualan']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Tanggal&nbsp;Penjualan <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="date" name="tanggal_penjualan" id="tanggal_penjualan" placeholder="Tanggal&nbsp;Penjualan" value="<?php echo ($data['tanggal_penjualan']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Id&nbsp;Pelanggan <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<!--<select  class='' data-live-search='true' -->
<select  class='' data-live-search='true'  required="required" type="text" name="id_pelanggan" id="id_pelanggan" placeholder="Id&nbsp;Pelanggan" value="<?php echo ($data['id_pelanggan']); ?>">
<option value='<?php echo $data[id_pelanggan];?>'>- <?php echo $data[id_pelanggan];?> -</option><?php combo_database2('data_pelanggan','id_pelanggan','nama_pelanggan',''); ?>
</select>
		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Id&nbsp;Produk <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<!--<select  class='' data-live-search='true' -->
<select  class='' data-live-search='true'  required="required" type="text" name="id_produk" id="id_produk" placeholder="Id&nbsp;Produk" value="<?php echo ($data['id_produk']); ?>">
<option value='<?php echo $data[id_produk];?>'>- <?php echo $data[id_produk];?> -</option><?php combo_database2('data_produk','id_produk','nama_produk',''); ?>
</select>
		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Jumlah <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo ($data['jumlah']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Harga <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="number" name="harga" id="harga" placeholder="Harga" value="<?php echo ($data['harga']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Catatan <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<textarea class='ckeditor'    required="required" type="text" name="catatan" id="catatan" placeholder="Catatan" value="<?php echo ($data['catatan']); ?>">
<?php echo $data['catatan']?>
</textarea>
		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Status <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<select class='ckeditor'   required="required" type="enum" name="status" id="status" placeholder="Status" value="<?php echo ($data['status']); ?>">
<option value='<?php echo $data[status];?>'>- <?php echo $data[status];?> -</option><?php combo_enum('data_penjualan','status',''); ?>
</select>
		
				</td>
			   </tr>
			   
	</tbody>
</table>
<div class="content-box-content">
<center>
<?php btn_update(' UPDATE'); ?>
</center>
</div>		
</div>
</div>
</form>
