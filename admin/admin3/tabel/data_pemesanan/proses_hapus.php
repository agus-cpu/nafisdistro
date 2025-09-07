<?php include '../../../include/all_include.php';

die();
$kode_transaksi_penjualan=$_GET['kode_transaksi_penjualan'];

$query=mysql_query("update data_penjualan set 
status='dibatalkan'
where kode_transaksi_penjualan='$kode_transaksi_penjualan' ") or die (mysql_error());

$query=mysql_query("delete from data_pemesanan where id_pemesanan='".mysql_real_escape_string($_GET['proses'])."'");

if($query){
?>
<script>location.href = "<?php index(); ?>?input=popup_hapus"; </script>
<?php
}
else
{
	echo "GAGAL DIPROSES";
}
?>