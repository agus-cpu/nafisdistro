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



$query=mysql_query("insert into data_ongkir values (
'$id_ongkir'
 ,'$kurir'
 ,'$tujuan'
 ,'$biaya'

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