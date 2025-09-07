
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
			$sql=mysql_query("SELECT * FROM data_pelanggan where id_pelanggan = '$proses'");
			$data=mysql_fetch_array($sql);
			?>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >id&nbsp;pelanggan <font color="red">*</font></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="%typepertama%" name="id_pelanggan" value="<?php echo $data['id_pelanggan']; ?>" readonly  id="id_pelanggan" required="required">		
				</td>
			   </tr>
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Nama&nbsp;Pelanggan <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="nama_pelanggan" id="nama_pelanggan" placeholder="Nama&nbsp;Pelanggan" value="<?php echo ($data['nama_pelanggan']); ?>">


		
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
				<label >Jenis&nbsp;Kelamin <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<select class='ckeditor'   required="required" type="enum" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis&nbsp;Kelamin" value="<?php echo ($data['jenis_kelamin']); ?>">
<option value='<?php echo $data[jenis_kelamin];?>'>- <?php echo $data[jenis_kelamin];?> -</option><?php combo_enum('data_pelanggan','jenis_kelamin',''); ?>
</select>
		
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
				<label >Username <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="username" id="username" placeholder="Username" value="<?php echo ($data['username']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >password Lama<span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   type="password" name="password_lama" id="password_lama" placeholder="password lama" value="">
				<input  type="hidden" name="password_validasi" id="password_validasi" placeholder="password_validasi" value="<?php echo encrypt($data['password']);?>">
				<br>Masukkan password Lama untuk Validasi, Kosongkan jika tidak ingin mengganti password
				</td>
			   </tr>
			   
			    <tr>
				<td width="25%" class="leftrowcms">					
				<label >password Baru<span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''    type="password" name="password" id="password" placeholder="password baru" value="">
				<br>Kosongkan jika tidak ingin mengganti password
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
