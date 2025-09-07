<?php include '../../../include/all_include.php';

if (!isset($_POST['id_bank']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 

$id_bank=$_POST['id_bank'];
$nama_bank=$_POST['nama_bank'];
$nama_pemilik=$_POST['nama_pemilik'];
$rekening=$_POST['rekening'];

$foto_logo_bank=$_POST['foto_logo_bank'];

$query=mysql_query("update data_bank set 
nama_bank='$nama_bank',
nama_pemilik='$nama_pemilik',
rekening='$rekening',

foto_logo_bank='$foto_logo_bank'
where id_bank='$id_bank' ") or die (mysql_error());

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