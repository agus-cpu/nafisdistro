
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
			Detail data&nbsp;produk
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
			$sql=mysql_query("SELECT * FROM data_produk where id_produk = '$proses'");
			$data=mysql_fetch_array($sql);
			?>
			   <tr>
				<td class="clleft" width="25%">id&nbsp;produk</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['id_produk']; ?></td>	
			   </tr>
			   
			   <tr>
				<td class="clleft" width="25%">nama&nbsp;produk</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['nama_produk']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">merk</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['merk']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">kategori</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['kategori']; ?></td>	
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
				<td class="clleft" width="25%">satuan&nbsp;jual</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo (($data['satuan'])); ?></td>	
			   </tr>			   
<tr>
				<td class="clleft" width="25%">foto</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><a href='../../../upload/<?php echo $data['foto']; ?>'><img onerror="this.src='<?php echo $imageerror; ?>'" width='250'  src='../../../upload/<?php echo $data['foto']; ?>'></a></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">keterangan</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo (substr($data['keterangan'],0,100)); ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">berat&nbsp;barang</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['berat_barang']; ?></td>	
			   </tr>

				
	
</tbody>
</table>
</div>
</div>