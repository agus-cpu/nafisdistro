
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
			$sql=mysql_query("SELECT * FROM data_pemesanan where id_pemesanan = '".mysql_real_escape_string($_GET['proses'])."'");
			$data=mysql_fetch_array($sql);
			?>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >id&nbsp;pemesanan <font color="red">*</font></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="%typepertama%" name="id_pemesanan" value="<?php echo $data['id_pemesanan']; ?>" readonly  id="id_pemesanan" required="required">		
				</td>
			   </tr>
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >kode&nbsp;transaksi&nbsp;penjualan <span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<!--<select  class='' data-live-search='true' -->
<input readonly   required="required" type="text" name="kode_transaksi_penjualan" id="kode_transaksi_penjualan" placeholder="kode&nbsp;transaksi&nbsp;penjualan" value="<?php echo $data['kode_transaksi_penjualan']; ?>">
</td>
</tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >tanggal&nbsp;pengiriman <span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input  required="required" type="date" name="tanggal_pengiriman" id="tanggal_pengiriman" placeholder="tanggal&nbsp;pengiriman" value="<?php echo $data['tanggal_pengiriman']; ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >nomor&nbsp;resi <span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input  required="required" type="text" name="nomor_resi" id="nomor_resi" placeholder="nomor&nbsp;resi" value="<?php echo $data['nomor_resi']; ?>">


		
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
