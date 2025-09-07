
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
			$sql=mysql_query("SELECT * FROM data_ongkir where id_ongkir = '$proses'");
			$data=mysql_fetch_array($sql);
			?>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >id&nbsp;ongkir <font color="red">*</font></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="%typepertama%" name="id_ongkir" value="<?php echo $data['id_ongkir']; ?>" readonly  id="id_ongkir" required="required">		
				</td>
			   </tr>
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Kurir <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="kurir" id="kurir" placeholder="Kurir" value="<?php echo ($data['kurir']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Tujuan <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="tujuan" id="tujuan" placeholder="Tujuan" value="<?php echo ($data['tujuan']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Biaya <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="number" name="biaya" id="biaya" placeholder="Biaya" value="<?php echo ($data['biaya']); ?>">


		
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
