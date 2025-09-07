<?php 

//KODE OTOMATIS	 	
function autonumber($id_terakhir, $panjang_kode, $panjang_angka) {
	$kode = substr($id_terakhir, 0, $panjang_kode);
	$angka = substr($id_terakhir, $panjang_kode, $panjang_angka);
	$angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);
	$id_baru = $kode.$angka_baru;
	return $id_baru;
}
$cek = mysqli_query($con_mysqli,"SELECT * FROM data_pemesanan");
$rowcek = mysqli_num_rows($cek);
if ($rowcek > 0) {
	$id_pemesanan = mysqli_query($con_mysqli,"SELECT max(id_pemesanan) as id_pemesanan FROM data_pemesanan");
	$data_pemesanan = mysqli_fetch_array($id_pemesanan);
	$id_pemesanan_akhir = $data_pemesanan['id_pemesanan'];
	$id_pemesanan_otomatis = autonumber($id_pemesanan_akhir, 3, 3); 
	}else{
	$kodedepan = strtoupper('data_pemesanan');
	$kodedepan = str_replace("DATA_","",$kodedepan);
	$kodedepan = str_replace("DATA","",$kodedepan);
	$kodedepan = str_replace("TABEL_","",$kodedepan);
	$kodedepan = str_replace("TABEL","",$kodedepan);
	$kodedepan = str_replace("TABLE_","",$kodedepan);
	$kodedepan = strtoupper(substr($kodedepan,0,3));
	$id_pemesanan_otomatis = $kodedepan."001";	
}

?>

<a href="<?php index(); ?>">
<?php btn_kembali(' KEMBALI'); ?>
</a>	

<br><br>

<div class="content-box">
<div class="content-box-header" style="height: 39px">Tambah<h3></h3></div>
<form action="proses_simpan.php" enctype="multipart/form-data"  method="post">
<div class="content-box-content">
<div id="postcustom">	
<table <?php tabel_in(100,'%',0,'center');  ?>>		
	<tbody>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >id&nbsp;pemesanan <span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="readonly" readonly value="<?php echo $id_pemesanan_otomatis;?>" name="id_pemesanan" placeholder="id_pemesanan" id="id_pemesanan" required="required">		
				</td>
			   </tr>
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >kode&nbsp;transaksi&nbsp;penjualan <span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<!--<select  class='' data-live-search='true' -->
<select  type="text" name="kode_transaksi_penjualan" id="kode_transaksi_penjualan" placeholder="kode&nbsp;transaksi&nbsp;penjualan" required="required">
<?php combo_database('data_penjualan','kode_transaksi_penjualan',''); ?>
</select>		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >tanggal&nbsp;pemesanan <span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input value="<?php echo tanggal_otomatis(); ?>"  type="date" name="tanggal_pemesanan" id="tanggal_pemesanan" placeholder="tanggal&nbsp;pemesanan" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >total&nbsp;bayar <span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="number" name="total_bayar" id="total_bayar" placeholder="total&nbsp;bayar" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >tanggal&nbsp;upload&nbsp;bukti&nbsp;pembayaran <span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="date" name="tanggal_upload_bukti_pembayaran" id="tanggal_upload_bukti_pembayaran" placeholder="tanggal&nbsp;upload&nbsp;bukti&nbsp;pembayaran" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >foto&nbsp;bukti&nbsp;pembayaran <span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="file" name="foto_bukti_pembayaran" id="foto_bukti_pembayaran" placeholder="foto&nbsp;bukti&nbsp;pembayaran" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >no&nbsp;telepon&nbsp;penerima <span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="number" name="no_telepon_penerima" id="no_telepon_penerima" placeholder="no&nbsp;telepon&nbsp;penerima" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >alamat&nbsp;pengiriman <span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<textarea class='ckeditor'  type="textarea" name="alamat_pengiriman" id="alamat_pengiriman" placeholder="alamat&nbsp;pengiriman" required="required">

</textarea>		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >tanggal&nbsp;pengiriman <span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input value="<?php echo tanggal_otomatis(); ?>"  type="date" name="tanggal_pengiriman" id="tanggal_pengiriman" placeholder="tanggal&nbsp;pengiriman" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >nomor&nbsp;resi <span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="text" name="nomor_resi" id="nomor_resi" placeholder="nomor&nbsp;resi" required="required">

		
				</td>
			   </tr>
			   
	</tbody>
</table>
<div class="content-box-content">
<center>
<?php btn_simpan(' SIMPAN'); ?>
</center>
</div>		
</div>
</div>
</form>
