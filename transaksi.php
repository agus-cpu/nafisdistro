<?php if(empty($p)) { header("Location: index.php?=home"); die(); } ?>

<br>
<center><h2> TRANSAKSI</h2></center>
<br>

<?php
if (!isset($_GET['action']))
{	
		//TAMPIL
		transaksi("data_penjualan","id_penjualan","data_produk","id_produk","nama_produk","foto","harga","jumlah","id_pelanggan","TRANSAKSI","kode_transaksi_penjualan","tanggal_penjualan");
}
else
{
	$action = $_GET['action'];
	if ($action=="cek_resi")
	{
		//CEK RESI DAN KONFIRMASI
		?>		
		
		<center>
		<h2>
		Nomor Resi Anda : <?php $kode = $_GET['proses']; echo baca_database("data_pemesanan","nomor_resi","select * from data_pemesanan where kode_transaksi_penjualan ='$kode'")?>
		<br>
		KURIR : <?php echo baca_database("data_pemesanan","kurir","select * from data_pemesanan where kode_transaksi_penjualan ='$kode'")?>
		</h2>
		<br><br>
		<a target="blank" href="https://cekresi.com?noresi= <?php $kode = $_GET['proses']; echo baca_database("data_pemesanan","nomor_resi","select * from data_pemesanan where kode_transaksi_penjualan ='$kode'")?>" class="btn btn-primary" > Website Cek resi</a>
		<br><br>
		
		<?php 
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
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
		<div class="content-box">
		<div class="content-box-header" style="height: 39px"><h3></h3></div>
		<h2>Konfirmasi Barang Telah Diterima </h2>
		<form action="index.php?p=transaksi&action=konfirmasi" enctype="multipart/form-data"  method="post">
		<div class="content-box-content">
		<div id="postcustom">	
		<table <?php tabel_in(100,'%',0,'center');  ?>>		
			<tbody>
					   <br>
						<input type="hidden" readonly value="<?php echo $id_komentar_otomatis;?>" name="id_komentar" placeholder="id_komentar" 		id="id_komentar" required="required">		
						<input type="hidden" name="id_produk" value="<?php echo $_GET['proses'];?>" id="id_produk" placeholder="id&nbsp;produk" 		required="required">
						<input type="hidden" name="id_pelanggan" id="id_pelanggan" value="<?php echo baca_session('id');?>"placeholder="id&nbsp;		pelanggan" required="required">
			</tbody>
		</table>
		<div class="content-box-content">
		<center>
		<?php btn_simpan(' KONFIRMASI'); ?>
		</center>
		</div>		
		</div>
		</div>
		</form>
		</div>
				</center>


	<?php
	}
	else if ($action=="upload_bukti")
	{
		//UPLOAD BUKTI
		?>
		
		
			<?php 
		$kode = $_GET['proses'];
		$berapa = $_GET['berapa'];
		$ongkir = baca_database("","biaya_ongkir","select * from data_pemesanan where kode_transaksi_penjualan='$kode'")
		?>
		
		
		<center>
		    <?php  $kategori = baca_database('','kategori_pembayaran',"select * from data_kategori_pembayaran where kode_transaksi_pembayaran='$kode'"); 
		    if($kategori=="bpjs") {  ?>
	
	
	
	
		<h2> UPLOAD BPJS </h2>
	
	
	
	
	
	
			<h3>TOTAL PEMBAYARAN : <?php echo rupiah($berapa + $ongkir);?></h3>
		
		Pembayaran akan ditanggung oleh BPJS Silahkan Upload Kartu BPJS Kamu
		<br>
		 
				   </tr>
		</center>
		<br>
		<form action="index.php?p=transaksi&action=simpan_bukti" enctype="multipart/form-data"  method="post">
		<center>
		<br>
		<hr>
		<h3> KONFIRMASI UPLOAD KARTU BPJS </h3>
		<h3>
		 
		</center>	
<center>		
<table>
<tr>
<td>
</td>
<td>
		<Br>
<input hidden name="nama_bank" value="bpjs" required> 
		
		</td>
		</tr>
</table>		
		</center>

<br>
				
		</h3>
	<center>
		<h3> Foto Kartu BPJS

		<input type="file" name="foto_bukti_transfer"></h3>
		<input type="hidden" name="jumlah" value="<?php echo ($_GET['berapa']);?>">
		<input type="hidden" name="kode_transaksi" value="<?php echo $_GET['proses'];?>">
		<br>
		<input type="submit" value="KIRIM BUKTI PEMBAYARAN" class="btn btn-danger">
		</center>
		
		
		
		
		</form>
	<?php } else { ?> 	<h2> UPLOAD BUKTI </h2>
	
		<h3>TOTAL PEMBAYARAN : <?php echo rupiah($berapa + $ongkir);?></h3>
		
		SIlahkan Transfer Pembayaran Ke rekening : 
		<br>
		<?php
				$sql=mysql_query("SELECT * FROM data_bank");
				while ($data = mysql_fetch_array($sql))
					  { ?>
				  <br>
				  <b> Nama Bank : <?php echo $data['nama_bank']; ?> </b><br>
				   A.n : <?php echo $data['nama_pemilik']; ?> <br>
				   No Rekening :<?php echo $data['rekening']; ?> <br>
				   <img onerror="this.src='home/data/image/error/error.png'" width='100' height='60' src='admin/upload/<?php echo $data['foto_logo_bank']; ?>'>
				   <br>
					  <?php } ?>
				   </tr>
		</center>
		<br>
		<form action="index.php?p=transaksi&action=simpan_bukti" enctype="multipart/form-data"  method="post">
		<center>
		<br>
		<hr>
		<h3> KONFIRMASI UPLOAD BUKTI </h3>
		<h3>
		<!--<br>-->
		<!--Nama Bank -->
		<!--<Br>-->
		</center>	
<center>		
<!--	-->
		</center>

<br>
				
		</h3>
	<center>
		<h3> Foto Bukti Transfer

		<input type="file" name="foto_bukti_transfer"></h3>
		<input type="hidden" name="jumlah" value="<?php echo ($_GET['berapa']);?>">
		<input type="hidden" name="kode_transaksi" value="<?php echo $_GET['proses'];?>">
		<br>
		<input type="submit" value="KIRIM BUKTI PEMBAYARAN" class="btn btn-danger">
		</center>
		
		
		
		
		</form>
		<br>
		<br>
		<br>
		
		<?php
		} }
		else if ($action=="simpan_bukti")
	{
		//SIMPAN  BUKTI	 	

		function upload_home($namafile)
	{
	$time = time();
	$acak = rand(10000, 99999);
	$foto = $time."-".$acak."-".$_FILES[$namafile]['name'];
	$tmp_file = $_FILES[$namafile]['tmp_name'];
	$path = "admin/upload/".$foto;
	global $ekstensi_dilarang;
	$nama = $_FILES[$namafile]['name'];
	$x = explode('.', $nama);
	$ekstensi = strtolower(end($x));	
	if(in_array($ekstensi, $ekstensi_dilarang) === false)
	{
		move_uploaded_file($tmp_file, $path);
		return $foto;
	}
	else
	{
		?>
		<script>
		alert("EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN");
		window.history.back(); 
		</script>
		<?php
		die();
	}
}

		$kode_transaksi_penjualan=$_POST['kode_transaksi'];
		$nama_bank=$_POST['nama_bank'];
		$rekening=baca_database("","rekening","select * from data_bank where nama_bank='$nama_bank'");
		$tanggal_upload_bukti_pembayaran=date('Y-m-d');
		$foto_bukti_pembayaran=upload_home('foto_bukti_transfer');
		$query=mysql_query("update data_pemesanan set 
		nama_bank='$nama_bank',
		rekening='$rekening',
		tanggal_upload_bukti_pembayaran='$tanggal_upload_bukti_pembayaran',
		foto_bukti_pembayaran='$foto_bukti_pembayaran'
		where kode_transaksi_penjualan='$kode_transaksi_penjualan' ") or die (mysql_error());
		$query=mysql_query("update data_penjualan set 
		status='menunggu_konfirmasi'
		where kode_transaksi_penjualan='$kode_transaksi_penjualan' ") or die (mysql_error());
		if($query){
		?>
		<script>location.href = "index.php?p=transaksi"; </script>
		<?php
		}
		else
		{
			echo "GAGAL DIPROSES";
		}
		
	}
	else if ($action=="batal")
	{
		//BATAL PEMESANAN
		$querytabel="SELECT * FROM data_penjualan where kode_transaksi_penjualan='".mysql_real_escape_string($_GET['proses'])."'";
		$proses = mysql_query($querytabel);
		while ($data = mysql_fetch_array($proses))
		{ 
		$id_produk = (substr($data['id_produk'],0,100)); 
		$jumlah = (substr($data['jumlah'],0,100)); 
		$stok =  baca_database("data_produk","jumlah","select * from data_produk where id_produk='$id_produk'");
		$sekarang = $stok +$jumlah;	
		$query=mysql_query("update data_produk set jumlah='$sekarang' where id_produk='$id_produk' ") or die(mysql_error());	
		}  
		$query=mysql_query("delete from data_penjualan where kode_transaksi_penjualan='".mysql_real_escape_string($_GET['proses'])."'");  
		if($query){
		?>
		<script> alert("Pemesanan Dibatalkan"); location.href = "<?php index(); ?>?p=transaksi"; </script>
		<?php
		}
		else
		{
		echo "GAGAL DIPROSES";
		}
	}
	
	else if ($action=="konfirmasi")
	{
		//KONFIRMASI
		$id_produk=$_POST['id_produk'];
		$query=mysql_query("update data_penjualan set 
		status='selesai'
		where kode_transaksi_penjualan='$id_produk' ") or die (mysql_error());
		if($query){
		?>
		<script>location.href = "index.php?p=transaksi"; </script>
		<?php
		}
		else
		{
			echo "GAGAL DIPROSES";
		}

	}
	else if ($action=="testimoni")
	{
		function upload_home($namafile)
	{
	$time = time();
	$acak = rand(10000, 99999);
	$foto = $time."-".$acak."-".$_FILES[$namafile]['name'];
	$tmp_file = $_FILES[$namafile]['tmp_name'];
	$path = "admin/upload/".$foto;
	global $ekstensi_dilarang;
	$nama = $_FILES[$namafile]['name'];
	$x = explode('.', $nama);
	$ekstensi = strtolower(end($x));	
	if(in_array($ekstensi, $ekstensi_dilarang) === false)
	{
		move_uploaded_file($tmp_file, $path);
		return $foto;
	}
	else
	{
		?>
		<script>
		alert("EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN");
		window.history.back(); 
		</script>
		<?php
		die();
	}
	}

		$id_komentar=$_POST['id_komentar'];
$id_produk=$_POST['id_produk'];
$id_pelanggan=decrypt($_POST['id_pelanggan']);
$foto=upload_home('foto');
$komentar=$_POST['komentar'];



$query=mysql_query("insert into data_komentar values (
'$id_komentar'
 ,'$id_produk'
 ,'$id_pelanggan'
 ,'$foto'
 ,'$komentar'

)");

if($query){
?>
<script>
alert("Komentar telah dikirim.");
location.href = "index.php?p=transaksi"; </script>
<?php
}
else
{
	echo "GAGAL DIPROSES";
}

	}
	else 
	{
	}
}
	
 ?>

  <div class="col-md-12">
  <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
</div>







