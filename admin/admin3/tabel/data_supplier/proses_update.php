<?php include '../../../include/all_include.php';

if (!isset($_POST['id_supplier']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 

$id_supplier=$_POST['id_supplier'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$email=$_POST['email'];

$no_telepon=$_POST['no_telepon'];

$query=mysql_query("update data_supplier set 
nama='$nama',
alamat='$alamat',
email='$email',

no_telepon='$no_telepon'
where id_supplier='$id_supplier' ") or die (mysql_error());

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