
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
			$sql=mysql_query("SELECT * FROM data_komentar where id_komentar = '$proses'");
			$data=mysql_fetch_array($sql);
			?>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >id&nbsp;komentar <font color="red">*</font></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="%typepertama%" name="id_komentar" value="<?php echo $data['id_komentar']; ?>" readonly  id="id_komentar" required="required">		
				</td>
			   </tr>
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Id&nbsp;Produk <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="id_produk" id="id_produk" placeholder="Id&nbsp;Produk" value="<?php echo ($data['id_produk']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Id&nbsp;Pelanggan <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="id_pelanggan" id="id_pelanggan" placeholder="Id&nbsp;Pelanggan" value="<?php echo ($data['id_pelanggan']); ?>">


		
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
				<label >Komentar <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<textarea class='ckeditor'    required="required" type="text" name="komentar" id="komentar" placeholder="Komentar" value="<?php echo ($data['komentar']); ?>">
<?php echo $data['komentar']?>
</textarea>
		
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
