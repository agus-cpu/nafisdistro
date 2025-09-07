
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
			$sql=mysql_query("SELECT * FROM data_bank where id_bank = '$proses'");
			$data=mysql_fetch_array($sql);
			?>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >id&nbsp;bank <font color="red">*</font></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="%typepertama%" name="id_bank" value="<?php echo $data['id_bank']; ?>" readonly  id="id_bank" required="required">		
				</td>
			   </tr>
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Nama&nbsp;Bank <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="nama_bank" id="nama_bank" placeholder="Nama&nbsp;Bank" value="<?php echo ($data['nama_bank']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Nama&nbsp;Pemilik <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="nama_pemilik" id="nama_pemilik" placeholder="Nama&nbsp;Pemilik" value="<?php echo ($data['nama_pemilik']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Rekening <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="rekening" id="rekening" placeholder="Rekening" value="<?php echo ($data['rekening']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Foto&nbsp;Logo&nbsp;Bank<span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<a href='../../../upload/<?php echo $data['foto_logo_bank']; ?>'><img onerror="this.src='<?php echo $imageerror; ?>'" width='100' height='60' src='../../../upload/<?php echo $data['foto_logo_bank']; ?>'></a>
				<br>
				<?php echo $data['foto_logo_bank']; ?>
				<input type="hidden" name="foto_logo_bank1" value="<?php echo $data['foto_logo_bank']; ?>">
				<br>
				<input class=''    type="file" name="foto_logo_bank" id="foto_logo_bank" placeholder="Foto&nbsp;Logo&nbsp;Bank" value="<?php echo ($data['foto_logo_bank']); ?>">


		
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
