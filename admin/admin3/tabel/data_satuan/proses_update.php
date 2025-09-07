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

$query=mysql_query("update data_satuan set 

satuan='$satuan'
where id_satuan='$id_satuan' ") or die (mysql_error());

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