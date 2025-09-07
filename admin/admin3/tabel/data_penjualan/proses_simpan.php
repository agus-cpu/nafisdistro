<?php include '../../../include/all_include.php';

if (!isset($_POST['id_penjualan']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 


$id_penjualan=$_POST['id_penjualan'];
$kode_transaksi_penjualan=$_POST['kode_transaksi_penjualan'];
$tanggal_penjualan=$_POST['tanggal_penjualan'];
$id_pelanggan=$_POST['id_pelanggan'];
$id_produk=$_POST['id_produk'];
$jumlah=$_POST['jumlah'];
$harga=$_POST['harga'];
$catatan=$_POST['catatan'];
$status=$_POST['status'];



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

if($query){
?>
<script>location.href = "<?php index(); ?>?input=popup_tambah"; </script>
<?php
}
else
{
	echo "GAGAL DIPROSES";
}
?>