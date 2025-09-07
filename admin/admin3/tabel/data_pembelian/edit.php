
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
			$sql=mysql_query("SELECT * FROM data_pembelian where id_pembelian = '$proses'");
			$data=mysql_fetch_array($sql);
			?>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >id&nbsp;pembelian <font color="red">*</font></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="%typepertama%" name="id_pembelian" value="<?php echo $data['id_pembelian']; ?>" readonly  id="id_pembelian" required="required">		
				</td>
			   </tr>
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Kode&nbsp;Transaksi&nbsp;Pembelian <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="kode_transaksi_pembelian" id="kode_transaksi_pembelian" placeholder="Kode&nbsp;Transaksi&nbsp;Pembelian" value="<?php echo ($data['kode_transaksi_pembelian']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Tanggal&nbsp;Pembelian <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="date" name="tanggal_pembelian" id="tanggal_pembelian" placeholder="Tanggal&nbsp;Pembelian" value="<?php echo ($data['tanggal_pembelian']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Id&nbsp;Supplier <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<!--<select  class='' data-live-search='true' -->
<select  class='' data-live-search='true'  required="required" type="text" name="id_supplier" id="id_supplier" placeholder="Id&nbsp;Supplier" value="<?php echo ($data['id_supplier']); ?>">
<option value='<?php echo $data[id_supplier];?>'>- <?php echo $data[id_supplier];?> -</option><?php combo_database2('data_supplier','id_supplier','nama',''); ?>
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
				<label >Harga&nbsp;Beli <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="number" name="harga_beli" id="harga_beli" placeholder="Harga&nbsp;Beli" value="<?php echo ($data['harga_beli']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Harga&nbsp;Jual <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="number" name="harga_jual" id="harga_jual" placeholder="Harga&nbsp;Jual" value="<?php echo ($data['harga_jual']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Status <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<select class='ckeditor'   required="required" type="enum" name="status" id="status" placeholder="Status" value="<?php echo ($data['status']); ?>">
<option value='<?php echo $data[status];?>'>- <?php echo $data[status];?> -</option><?php combo_enum('data_pembelian','status',''); ?>
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
