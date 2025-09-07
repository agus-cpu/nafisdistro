<?php include '../../../include/all_include.php';

if (!isset($_POST['id_produk']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 


$id_produk=$_POST['id_produk'];
$nama_produk=$_POST['nama_produk'];
$merk=$_POST['merk'];
$kategori=$_POST['kategori'];
$jumlah=$_POST['jumlah'];
$satuan=$_POST['satuan'];
$harga_beli=$_POST['harga_beli'];
$harga_jual=$_POST['harga_jual'];
$foto= upload('foto');
$keterangan=$_POST['keterangan'];
$berat_barang=$_POST['berat_barang'];



$query=mysql_query("insert into data_produk values (
'$id_produk'
 ,'$nama_produk'
 ,'$merk'
 ,'$kategori'
 ,'$jumlah'
 ,'$harga_beli'
 ,'$harga_jual'
 ,'$satuan'
 ,'$foto'
 ,'$keterangan'
 ,'$berat_barang'

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