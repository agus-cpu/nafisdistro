<?php 

//KODE OTOMATIS	 	
function autonumber($id_terakhir, $panjang_kode, $panjang_angka) {
	$kode = substr($id_terakhir, 0, $panjang_kode);
	$angka = substr($id_terakhir, $panjang_kode, $panjang_angka);
	$angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);
	$id_baru = $kode.$angka_baru;
	return $id_baru;
}
$cek = mysqli_query($con_mysqli,"SELECT * FROM data_pembelian");
$rowcek = mysqli_num_rows($cek);
if ($rowcek > 0) {
	$id_pembelian = mysqli_query($con_mysqli,"SELECT max(id_pembelian) as id_pembelian FROM data_pembelian");
	$data_pembelian = mysqli_fetch_array($id_pembelian);
	$id_pembelian_akhir = $data_pembelian['id_pembelian'];
	$id_pembelian_otomatis = autonumber($id_pembelian_akhir, 3, 3); 
	}else{
	$kodedepan = strtoupper('data_pembelian');
	$kodedepan = str_replace("DATA_","",$kodedepan);
	$kodedepan = str_replace("DATA","",$kodedepan);
	$kodedepan = str_replace("TABEL_","",$kodedepan);
	$kodedepan = str_replace("TABEL","",$kodedepan);
	$kodedepan = str_replace("TABLE_","",$kodedepan);
	$kodedepan = strtoupper(substr($kodedepan,0,3));
	$id_pembelian_otomatis = $kodedepan."001";	
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
				<label >id&nbsp;pembelian <span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="readonly" readonly value="<?php echo $id_pembelian_otomatis;?>" name="id_pembelian" placeholder="id_pembelian" id="id_pembelian" required="required">		
				</td>
			   </tr>
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Kode&nbsp;Transaksi&nbsp;Pembelian <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class='' type="text" name="kode_transaksi_pembelian" id="kode_transaksi_pembelian" placeholder="Kode&nbsp;Transaksi&nbsp;Pembelian" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Tanggal&nbsp;Pembelian <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input  class='' value="<?php echo tanggal_otomatis(); ?>"  type="date" name="tanggal_pembelian" id="tanggal_pembelian" placeholder="Tanggal&nbsp;Pembelian" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Id&nbsp;Supplier <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<!--<select  class='' data-live-search='true' -->
<select class='' data-live-search='true' type="text" name="id_supplier" id="id_supplier" placeholder="Id&nbsp;Supplier" required="required">
<option></option><?php combo_database2('data_supplier','id_supplier','nama',''); ?>
</select>		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Id&nbsp;Produk <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<!--<select  class='' data-live-search='true' -->
<select class='' data-live-search='true' type="text" name="id_produk" id="id_produk" placeholder="Id&nbsp;Produk" required="required">
<option></option><?php combo_database2('data_produk','id_produk','nama_produk',''); ?>
</select>		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Jumlah <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class='' type="text" name="jumlah" id="jumlah" placeholder="Jumlah" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Harga&nbsp;Beli <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input  class=''  type="number" name="harga_beli" id="harga_beli" placeholder="Harga&nbsp;Beli" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Harga&nbsp;Jual <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input  class=''  type="number" name="harga_jual" id="harga_jual" placeholder="Harga&nbsp;Jual" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Status <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<!--<select  class='' data-live-search='true' -->
<select  type="enum" name="status" id="status" placeholder="Status" required="required">
<option></option><?php combo_enum('data_pembelian','status',''); ?>
</select>		
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
