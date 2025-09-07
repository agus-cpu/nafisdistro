
<a href="<?php index(); ?>">
<?php btn_kembali(' KEMBALI'); ?>
</a>

<br><br>

<div class="content-box">
<div class="content-box-header" style="height: 39px">Detail
<h3 style="cursor: s-resize;"></h3></div>
<div class="content-box-content">
<table <?php tabel_in(100,'%',0,'center');  ?>>		
	<tbody>
	<tr class="event3">
		<td class="clleft" colspan="3">
			Detail data&nbsp;bank
		</td>
	</tr>	
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
				<td class="clleft" width="25%">id&nbsp;bank</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['id_bank']; ?></td>	
			   </tr>
			   
			   <tr>
				<td class="clleft" width="25%">nama&nbsp;bank</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['nama_bank']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">nama&nbsp;pemilik</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['nama_pemilik']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">rekening</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['rekening']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">foto&nbsp;logo&nbsp;bank</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><a href='../../../upload/<?php echo $data['foto_logo_bank']; ?>'><img onerror="this.src='<?php echo $imageerror; ?>'" width='250'  src='../../../upload/<?php echo $data['foto_logo_bank']; ?>'></a></td>	
			   </tr>

				
	
</tbody>
</table>
</div>
</div>