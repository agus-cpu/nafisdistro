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



$query=mysql_query("insert into data_supplier values (
'$id_supplier'
 ,'$nama'
 ,'$alamat'
 ,'$email'
 ,'$no_telepon'

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