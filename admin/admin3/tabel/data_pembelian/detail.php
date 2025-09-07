
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
			Detail data&nbsp;pembelian
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
			$sql=mysql_query("SELECT * FROM data_pembelian where id_pembelian = '$proses'");
			$data=mysql_fetch_array($sql);
			?>
			   <tr>
				<td class="clleft" width="25%">id&nbsp;pembelian</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['id_pembelian']; ?></td>	
			   </tr>
			   
			   <tr>
				<td class="clleft" width="25%">kode&nbsp;transaksi&nbsp;pembelian</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['kode_transaksi_pembelian']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">tanggal&nbsp;pembelian</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo (format_indo($data['tanggal_pembelian'])); ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">id&nbsp;supplier</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['id_supplier']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">Nama</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo baca_database("", "nama", " select * from data_supplier where id_supplier ='$data[id_supplier]'") ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">id&nbsp;produk</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['id_produk']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">Nama Produk</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo baca_database("", "nama_produk", " select * from data_produk where id_produk ='$data[id_produk]'") ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">jumlah</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['jumlah']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">harga&nbsp;beli</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo (rupiah($data['harga_beli'])); ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">harga&nbsp;jual</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo (rupiah($data['harga_jual'])); ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">status</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['status']; ?></td>	
			   </tr>

				
	
</tbody>
</table>
</div>
</div>