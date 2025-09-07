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
$harga_beli=$_POST['harga_beli'];
$harga_jual=$_POST['harga_jual'];
$foto=$_FILES['foto']['name']; if (empty($foto)){$foto = $_POST['foto1'];} else { $foto = upload('foto');};
$keterangan=$_POST['keterangan'];
$satuan=$_POST['satuan'];

$berat_barang=$_POST['berat_barang'];

$query=mysql_query("update data_produk set 
nama_produk='$nama_produk',
merk='$merk',
kategori='$kategori',
jumlah='$jumlah',
harga_beli='$harga_beli',
harga_jual='$harga_jual',
satuan='$satuan',
foto='$foto',
keterangan='$keterangan',

berat_barang='$berat_barang'
where id_produk='$id_produk' ") or die (mysql_error());

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