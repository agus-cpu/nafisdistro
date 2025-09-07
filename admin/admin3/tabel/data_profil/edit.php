
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
			$sql=mysql_query("SELECT * FROM data_profil where id_profil = '$proses'");
			$data=mysql_fetch_array($sql);
			?>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >id&nbsp;profil <font color="red">*</font></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="%typepertama%" name="id_profil" value="<?php echo $data['id_profil']; ?>" readonly  id="id_profil" required="required">		
				</td>
			   </tr>
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Nama <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="nama" id="nama" placeholder="Nama" value="<?php echo ($data['nama']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Gambar<span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<a href='../../../upload/<?php echo $data['gambar']; ?>'><img onerror="this.src='<?php echo $imageerror; ?>'" width='100' height='60' src='../../../upload/<?php echo $data['gambar']; ?>'></a>
				<br>
				<?php echo $data['gambar']; ?>
				<input type="hidden" name="gambar1" value="<?php echo $data['gambar']; ?>">
				<br>
				<input class=''    type="file" name="gambar" id="gambar" placeholder="Gambar" value="<?php echo ($data['gambar']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >No&nbsp;Telepon <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="no_telepon" id="no_telepon" placeholder="No&nbsp;Telepon" value="<?php echo ($data['no_telepon']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Email <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="email" id="email" placeholder="Email" value="<?php echo ($data['email']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Alamat <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<textarea class=''    required="required" type="text" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo ($data['alamat']); ?>">
<?php echo $data['alamat']?>
</textarea>
		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Deskripsi <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<textarea class='ckeditor'    required="required" type="text" name="deskripsi" id="deskripsi" placeholder="Deskripsi" value="<?php echo ($data['deskripsi']); ?>">
<?php echo $data['deskripsi']?>
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
