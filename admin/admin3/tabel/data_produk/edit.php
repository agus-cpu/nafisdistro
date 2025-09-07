
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
			$sql=mysql_query("SELECT * FROM data_produk where id_produk = '$proses'");
			$data=mysql_fetch_array($sql);
			?>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >id&nbsp;produk <font color="red">*</font></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="%typepertama%" name="id_produk" value="<?php echo $data['id_produk']; ?>" readonly  id="id_produk" required="required">		
				</td>
			   </tr>
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Nama&nbsp;Produk <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="nama_produk" id="nama_produk" placeholder="Nama&nbsp;Produk" value="<?php echo ($data['nama_produk']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Merk <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="merk" id="merk" placeholder="Merk" value="<?php echo ($data['merk']); ?>"> 
				</td>
			   </tr>
			   
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Kategori <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td> 
<select   required="required" type="text" name="kategori" id="kategori" placeholder="Kategori" value="<?php echo ($data['kategori']); ?>">
<option value='<?php echo $data[kategori];?>'>- <?php echo $data[kategori];?> -</option><?php combo_database('data_kategori','kategori',''); ?>
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
				<label >Satuan <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<!--<select  class='' data-live-search='true' -->
<select   required="required" type="text" name="satuan" id="satuan" placeholder="satuan" value="<?php echo ($data['satuan']); ?>">
<option value='<?php echo $data[satuan];?>'>- <?php echo $data[satuan];?> -</option><?php combo_database('data_satuan','satuan',''); ?>
</select> 
				</td>
			   </tr>
			   
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Foto<span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<a href='../../../upload/<?php echo $data['foto']; ?>'><img onerror="this.src='<?php echo $imageerror; ?>'" width='100' height='60' src='../../../upload/<?php echo $data['foto']; ?>'></a>
				<br>
				<?php echo $data['foto']; ?>
				<input type="hidden" name="foto1" value="<?php echo $data['foto']; ?>">
				<br>
				<input class=''    type="file" name="foto" id="foto" placeholder="Foto" value="<?php echo ($data['foto']); ?>"> 
				</td>
			   </tr>
			   
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Keterangan <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<textarea class='ckeditor'    required="required" type="text" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo ($data['keterangan']); ?>">
<?php echo $data['keterangan']?></textarea>
		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Berat&nbsp;Barang <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="berat_barang" id="berat_barang" placeholder="Berat&nbsp;Barang" value="<?php echo ($data['berat_barang']); ?>">


		
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
