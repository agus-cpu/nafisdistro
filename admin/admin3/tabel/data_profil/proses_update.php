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
$gambar=$_FILES['gambar']['name']; if (empty($gambar)){$gambar = $_POST['gambar1'];} else { $gambar = upload('gambar');};
$no_telepon=$_POST['no_telepon'];
$email=$_POST['email'];
$alamat=$_POST['alamat'];

$deskripsi=$_POST['deskripsi'];

$query=mysql_query("update data_profil set 
nama='$nama',
gambar='$gambar',
no_telepon='$no_telepon',
email='$email',
alamat='$alamat',

deskripsi='$deskripsi'
where id_profil='$id_profil' ") or die (mysql_error());

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