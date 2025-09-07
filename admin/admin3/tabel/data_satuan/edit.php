
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
			$sql=mysql_query("SELECT * FROM data_satuan where id_satuan = '$proses'");
			$data=mysql_fetch_array($sql);
			?>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >id&nbsp;satuan <font color="red">*</font></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="%typepertama%" name="id_satuan" value="<?php echo $data['id_satuan']; ?>" readonly  id="id_satuan" required="required">		
				</td>
			   </tr>
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Satuan <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="satuan" id="satuan" placeholder="Satuan" value="<?php echo ($data['satuan']); ?>">


		
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
