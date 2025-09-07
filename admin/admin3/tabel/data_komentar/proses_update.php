<?php include '../../../include/all_include.php';

if (!isset($_POST['id_komentar']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 

$id_komentar=$_POST['id_komentar'];
$id_produk=$_POST['id_produk'];
$id_pelanggan=$_POST['id_pelanggan'];
$foto=$_FILES['foto']['name']; if (empty($foto)){$foto = $_POST['foto1'];} else { $foto = upload('foto');};

$komentar=$_POST['komentar'];

$query=mysql_query("update data_komentar set 
id_produk='$id_produk',
id_pelanggan='$id_pelanggan',
foto='$foto',

komentar='$komentar'
where id_komentar='$id_komentar' ") or die (mysql_error());

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