<?php include '../../../include/all_include.php';

if (!isset($_POST['id_satuan']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 


$id_satuan=$_POST['id_satuan'];
$satuan=$_POST['satuan'];



$query=mysql_query("insert into data_satuan values (
'$id_satuan'
 ,'$satuan'

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