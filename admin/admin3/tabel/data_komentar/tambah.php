<?php 

//KODE OTOMATIS	 	
function autonumber($id_terakhir, $panjang_kode, $panjang_angka) {
	$kode = substr($id_terakhir, 0, $panjang_kode);
	$angka = substr($id_terakhir, $panjang_kode, $panjang_angka);
	$angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);
	$id_baru = $kode.$angka_baru;
	return $id_baru;
}
$cek = mysqli_query($con_mysqli,"SELECT * FROM data_komentar");
$rowcek = mysqli_num_rows($cek);
if ($rowcek > 0) {
	$id_komentar = mysqli_query($con_mysqli,"SELECT max(id_komentar) as id_komentar FROM data_komentar");
	$data_komentar = mysqli_fetch_array($id_komentar);
	$id_komentar_akhir = $data_komentar['id_komentar'];
	$id_komentar_otomatis = autonumber($id_komentar_akhir, 3, 3); 
	}else{
	$kodedepan = strtoupper('data_komentar');
	$kodedepan = str_replace("DATA_","",$kodedepan);
	$kodedepan = str_replace("DATA","",$kodedepan);
	$kodedepan = str_replace("TABEL_","",$kodedepan);
	$kodedepan = str_replace("TABEL","",$kodedepan);
	$kodedepan = str_replace("TABLE_","",$kodedepan);
	$kodedepan = strtoupper(substr($kodedepan,0,3));
	$id_komentar_otomatis = $kodedepan."001";	
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
				<label >id&nbsp;komentar <span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="readonly" readonly value="<?php echo $id_komentar_otomatis;?>" name="id_komentar" placeholder="id_komentar" id="id_komentar" required="required">		
				</td>
			   </tr>
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Id&nbsp;Produk <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class='' type="text" name="id_produk" id="id_produk" placeholder="Id&nbsp;Produk" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Id&nbsp;Pelanggan <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class='' type="text" name="id_pelanggan" id="id_pelanggan" placeholder="Id&nbsp;Pelanggan" required="required">

		
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
				<label >Komentar <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<textarea class='ckeditor'  type="text" name="komentar" id="komentar" placeholder="Komentar" required="required">

</textarea>		
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
