<?php 

//KODE OTOMATIS	 	
function autonumber($id_terakhir, $panjang_kode, $panjang_angka) {
	$kode = substr($id_terakhir, 0, $panjang_kode);
	$angka = substr($id_terakhir, $panjang_kode, $panjang_angka);
	$angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);
	$id_baru = $kode.$angka_baru;
	return $id_baru;
}
$cek = mysqli_query($con_mysqli,"SELECT * FROM data_produk");
$rowcek = mysqli_num_rows($cek);
if ($rowcek > 0) {
	$id_produk = mysqli_query($con_mysqli,"SELECT max(id_produk) as id_produk FROM data_produk");
	$data_produk = mysqli_fetch_array($id_produk);
	$id_produk_akhir = $data_produk['id_produk'];
	$id_produk_otomatis = autonumber($id_produk_akhir, 3, 3); 
	}else{
	$kodedepan = strtoupper('data_produk');
	$kodedepan = str_replace("DATA_","",$kodedepan);
	$kodedepan = str_replace("DATA","",$kodedepan);
	$kodedepan = str_replace("TABEL_","",$kodedepan);
	$kodedepan = str_replace("TABEL","",$kodedepan);
	$kodedepan = str_replace("TABLE_","",$kodedepan);
	$kodedepan = strtoupper(substr($kodedepan,0,3));
	$id_produk_otomatis = $kodedepan."001";	
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
				<label >id&nbsp;produk <span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="readonly" readonly value="<?php echo $id_produk_otomatis;?>" name="id_produk" placeholder="id_produk" id="id_produk" required="required">		
				</td>
			   </tr>
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Nama&nbsp;Produk <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class='' type="text" name="nama_produk" id="nama_produk" placeholder="Nama&nbsp;Produk" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Merk <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class='' type="text" name="merk" id="merk" placeholder="Merk" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Kategori <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
			 
<input autocomplete="" list="KATEGORI"  type="text" name="kategori" id="kategori" placeholder="Kategori" required="required">
<datalist id="KATEGORI"><?php combo_database('data_kategori','kategori',''); ?>
</datalist>		
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
				<label >Satuan <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<!--<select  class='' data-live-search='true' -->
<select  type="text" name="satuan" id="satuan" placeholder="Satuan" required="required">
<option></option><?php combo_database('data_satuan','satuan',''); ?>
</select>		
				</td>
			   </tr>
			   
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Foto <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''  type="file" name="foto" id="foto" placeholder="Foto" required="required"> 
				</td>
			   </tr>
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Keterangan <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<textarea class='ckeditor'  type="text" name="keterangan" id="keterangan" placeholder="Keterangan" required="required"></textarea>		
				</td>
			   </tr>
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Berat&nbsp;Barang <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class='' type="text" name="berat_barang" id="berat_barang" placeholder="Berat&nbsp;Barang" required="required">

		
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
