<?php 

//KODE OTOMATIS	 	
function autonumber($id_terakhir, $panjang_kode, $panjang_angka) {
	$kode = substr($id_terakhir, 0, $panjang_kode);
	$angka = substr($id_terakhir, $panjang_kode, $panjang_angka);
	$angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);
	$id_baru = $kode.$angka_baru;
	return $id_baru;
}
$cek = mysqli_query($con_mysqli,"SELECT * FROM data_satuan");
$rowcek = mysqli_num_rows($cek);
if ($rowcek > 0) {
	$id_satuan = mysqli_query($con_mysqli,"SELECT max(id_satuan) as id_satuan FROM data_satuan");
	$data_satuan = mysqli_fetch_array($id_satuan);
	$id_satuan_akhir = $data_satuan['id_satuan'];
	$id_satuan_otomatis = autonumber($id_satuan_akhir, 3, 3); 
	}else{
	$kodedepan = strtoupper('data_satuan');
	$kodedepan = str_replace("DATA_","",$kodedepan);
	$kodedepan = str_replace("DATA","",$kodedepan);
	$kodedepan = str_replace("TABEL_","",$kodedepan);
	$kodedepan = str_replace("TABEL","",$kodedepan);
	$kodedepan = str_replace("TABLE_","",$kodedepan);
	$kodedepan = strtoupper(substr($kodedepan,0,3));
	$id_satuan_otomatis = $kodedepan."001";	
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
				<label >id&nbsp;satuan <span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="readonly" readonly value="<?php echo $id_satuan_otomatis;?>" name="id_satuan" placeholder="id_satuan" id="id_satuan" required="required">		
				</td>
			   </tr>
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Satuan <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class='' type="text" name="satuan" id="satuan" placeholder="Satuan" required="required">

		
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
