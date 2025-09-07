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
$foto= upload('foto');
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
<script>location.href = "<?php index(); ?>?input=popup_tambah"; </script>
<?php
}
else
{
	echo "GAGAL DIPROSES";
}
?>