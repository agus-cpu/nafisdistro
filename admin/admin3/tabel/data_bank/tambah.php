<?php 

//KODE OTOMATIS	 	
function autonumber($id_terakhir, $panjang_kode, $panjang_angka) {
	$kode = substr($id_terakhir, 0, $panjang_kode);
	$angka = substr($id_terakhir, $panjang_kode, $panjang_angka);
	$angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);
	$id_baru = $kode.$angka_baru;
	return $id_baru;
}
$cek = mysqli_query($con_mysqli,"SELECT * FROM data_bank");
$rowcek = mysqli_num_rows($cek);
if ($rowcek > 0) {
	$id_bank = mysqli_query($con_mysqli,"SELECT max(id_bank) as id_bank FROM data_bank");
	$data_bank = mysqli_fetch_array($id_bank);
	$id_bank_akhir = $data_bank['id_bank'];
	$id_bank_otomatis = autonumber($id_bank_akhir, 3, 3); 
	}else{
	$kodedepan = strtoupper('data_bank');
	$kodedepan = str_replace("DATA_","",$kodedepan);
	$kodedepan = str_replace("DATA","",$kodedepan);
	$kodedepan = str_replace("TABEL_","",$kodedepan);
	$kodedepan = str_replace("TABEL","",$kodedepan);
	$kodedepan = str_replace("TABLE_","",$kodedepan);
	$kodedepan = strtoupper(substr($kodedepan,0,3));
	$id_bank_otomatis = $kodedepan."001";	
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
				<label >id&nbsp;bank <span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="readonly" readonly value="<?php echo $id_bank_otomatis;?>" name="id_bank" placeholder="id_bank" id="id_bank" required="required">		
				</td>
			   </tr>
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Nama&nbsp;Bank <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class='' type="text" name="nama_bank" id="nama_bank" placeholder="Nama&nbsp;Bank" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Nama&nbsp;Pemilik <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class='' type="text" name="nama_pemilik" id="nama_pemilik" placeholder="Nama&nbsp;Pemilik" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Rekening <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class='' type="text" name="rekening" id="rekening" placeholder="Rekening" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Foto&nbsp;Logo&nbsp;Bank <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''  type="file" name="foto_logo_bank" id="foto_logo_bank" placeholder="Foto&nbsp;Logo&nbsp;Bank" required="required">

		
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
