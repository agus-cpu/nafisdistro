<?php if(empty($p)) { header("Location: index.php?=home"); die(); } ?>

<br>
<div class="col-md-12">
<?php
if (!isset($_GET['action']))
{	
	//TAMPIL PRODUK
	produk("data_produk","id_produk","nama_produk","foto","kategori","harga_jual","kategori_pembayaran","jumlah","Beli");
}
else
{
	$action = $_GET['action'];
	if ($action == "detail" || $action == "beli")
	{
		//DETAIL
		$nama_data = $_GET['Go'];
		$nama_link = str_replace('-', ' ',$nama_data);
		$nama_link = str_replace('x~x', '-',$nama_link);
		detail("data_produk","id_produk","nama_produk","foto","kategori","harga_jual","satuan","kategori_pembayaran","jumlah","keterangan",$nama_link,"Beli");
	}
	elseif ($action == "simpan")
	{

		function autonumber($id_terakhir, $panjang_kode, $panjang_angka) {
	$kode = substr($id_terakhir, 0, $panjang_kode);
	$angka = substr($id_terakhir, $panjang_kode, $panjang_angka);
	$angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);
	$id_baru = $kode.$angka_baru;
	return $id_baru;
}
$cek = mysqli_query($con_mysqli,"SELECT * FROM data_penjualan");
$rowcek = mysqli_num_rows($cek);
if ($rowcek > 0) {
	$id_penjualan = mysqli_query($con_mysqli,"SELECT max(id_penjualan) as id_penjualan FROM data_penjualan");
	$data_penjualan = mysqli_fetch_array($id_penjualan);
	$id_penjualan_akhir = $data_penjualan['id_penjualan'];
	$id_penjualan_otomatis = autonumber($id_penjualan_akhir, 3, 3); 
	}else{
	$kodedepan = strtoupper('data_penjualan');
	$kodedepan = str_replace("DATA_","",$kodedepan);
	$kodedepan = str_replace("DATA","",$kodedepan);
	$kodedepan = str_replace("TABEL_","",$kodedepan);
	$kodedepan = str_replace("TABEL","",$kodedepan);
	$kodedepan = str_replace("TABLE_","",$kodedepan);
	$kodedepan = strtoupper(substr($kodedepan,0,3));
	$id_penjualan_otomatis = $kodedepan."001";	
}

		

$id_penjualan=$id_penjualan_otomatis;
$kode_transaksi_penjualan=decrypt($_COOKIE['kodene']);
$tanggal_penjualan=date('Y-m-d');
$id_pelanggan= decrypt($_COOKIE['kodene']);
$id_produk=decrypt($_GET['id_produk']);
$jumlah=$_GET['jumlah'];
$harga=$_GET['harga'];
$catatan=$_GET['catatan'];
$status="proses";

$stok=$_GET['stok'];
$stoksekarang = $stok - $jumlah;
$query=mysql_query("update data_produk set 
jumlah='$stoksekarang'
where id_produk='$id_produk' ") or die (mysql_error());

$query=mysql_query("insert into data_penjualan values (
'$id_penjualan'
 ,'$kode_transaksi_penjualan'
 ,'$tanggal_penjualan'
 ,'$id_pelanggan'
 ,'$id_produk'
 ,'$jumlah'
 ,'$harga'
 ,'$catatan'
 ,'$status'

)");


?>
		<script>
		location.href = "index.php?p=keranjang";
		</script>
		<?php
	
	}
}

 ?>
 <br>
 <br>
 <br>
 <br>
 <br>
</div>
 <div class="col-md-12">
  <br>
 <br>
 <br>
 <br>
 <br>
</div>







