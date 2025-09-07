<?php include '../../../include/all_include.php';

function upload($namafile)
{
$foto = $_FILES[$namafile]['name'];
$tmp_file = $_FILES[$namafile]['tmp_name'];
$path = "../../../upload/".$foto;
move_uploaded_file($tmp_file, $path);
}

$id_pemesanan=$_POST['id_pemesanan'];
$kode_transaksi_penjualan=$_POST['kode_transaksi_penjualan'];
$tanggal_pemesanan=$_POST['tanggal_pemesanan'];
$total_bayar=$_POST['total_bayar'];
$tanggal_upload_bukti_pembayaran=$_POST['tanggal_upload_bukti_pembayaran'];
$foto_bukti_pembayaran=$_FILES['foto_bukti_pembayaran']['name']; upload('foto_bukti_pembayaran');
$no_telepon_penerima=$_POST['no_telepon_penerima'];
$alamat_pengiriman=$_POST['alamat_pengiriman'];
$tanggal_pengiriman=$_POST['tanggal_pengiriman'];
$nomor_resi=$_POST['nomor_resi'];



$query=mysql_query("insert into data_pemesanan values (
'$id_pemesanan'
 ,'$kode_transaksi_penjualan'
 ,'$tanggal_pemesanan'
 ,'$total_bayar'
 ,'$tanggal_upload_bukti_pembayaran'
 ,'$foto_bukti_pembayaran'
 ,'$no_telepon_penerima'
 ,'$alamat_pengiriman'
 ,'$tanggal_pengiriman'
 ,'$nomor_resi'

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