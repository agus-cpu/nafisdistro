<?php include '../../../include/all_include.php';



$id_pemesanan=$_POST['id_pemesanan'];
$kode_transaksi_penjualan=$_POST['kode_transaksi_penjualan'];
$tanggal_pengiriman=$_POST['tanggal_pengiriman'];
$nomor_resi=$_POST['nomor_resi'];

$query=mysql_query("update data_pemesanan set 
kode_transaksi_penjualan='$kode_transaksi_penjualan',
tanggal_pengiriman='$tanggal_pengiriman',

nomor_resi='$nomor_resi'
where id_pemesanan='$id_pemesanan' ") or die (mysql_error());



$query=mysql_query("update data_penjualan set 
status='pengiriman'
where kode_transaksi_penjualan='$kode_transaksi_penjualan' ") or die (mysql_error());
if($query){
?>
<script>location.href = "<?php index(); ?>?input=popup_edit"; </script>
<?php
}
else
{
	echo "GAGAL DIPROSES";
}
?>