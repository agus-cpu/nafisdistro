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
$foto_logo_bank= upload('foto_logo_bank');



$query=mysql_query("insert into data_bank values (
'$id_bank'
 ,'$nama_bank'
 ,'$nama_pemilik'
 ,'$rekening'
 ,'$foto_logo_bank'

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