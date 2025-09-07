<?php include '../../../include/all_include.php';

if (!isset($_POST['id_pembelian']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 


$id_pembelian=$_POST['id_pembelian'];
$kode_transaksi_pembelian=$_POST['kode_transaksi_pembelian'];
$tanggal_pembelian=$_POST['tanggal_pembelian'];
$id_supplier=$_POST['id_supplier'];
$id_produk=$_POST['id_produk'];
$jumlah=$_POST['jumlah'];
$harga_beli=$_POST['harga_beli'];
$harga_jual=$_POST['harga_jual'];
$status=$_POST['status'];



$query=mysql_query("insert into data_pembelian values (
'$id_pembelian'
 ,'$kode_transaksi_pembelian'
 ,'$tanggal_pembelian'
 ,'$id_supplier'
 ,'$id_produk'
 ,'$jumlah'
 ,'$harga_beli'
 ,'$harga_jual'
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