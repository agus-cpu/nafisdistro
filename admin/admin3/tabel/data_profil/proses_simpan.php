<?php include '../../../include/all_include.php';

if (!isset($_POST['id_profil']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 


$id_profil=$_POST['id_profil'];
$nama=$_POST['nama'];
$gambar= upload('gambar');
$no_telepon=$_POST['no_telepon'];
$email=$_POST['email'];
$alamat=$_POST['alamat'];
$deskripsi=$_POST['deskripsi'];



$query=mysql_query("insert into data_profil values (
'$id_profil'
 ,'$nama'
 ,'$gambar'
 ,'$no_telepon'
 ,'$email'
 ,'$alamat'
 ,'$deskripsi'

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