<?php include '../../../include/all_include.php';

if (!isset($_POST['id_ongkir']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 

$id_ongkir=$_POST['id_ongkir'];
$kurir=$_POST['kurir'];
$tujuan=$_POST['tujuan'];

$biaya=$_POST['biaya'];

$query=mysql_query("update data_ongkir set 
kurir='$kurir',
tujuan='$tujuan',

biaya='$biaya'
where id_ongkir='$id_ongkir' ") or die (mysql_error());

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