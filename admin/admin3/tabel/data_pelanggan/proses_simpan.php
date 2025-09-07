<?php include '../../../include/all_include.php';

if (!isset($_POST['id_pelanggan']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 


$id_pelanggan=$_POST['id_pelanggan'];
$nama_pelanggan=$_POST['nama_pelanggan'];
$alamat=$_POST['alamat'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$no_telepon=$_POST['no_telepon'];
$email=$_POST['email'];
$username=$_POST['username'];
$password= md5($_POST['password']);



$query=mysql_query("insert into data_pelanggan values (
'$id_pelanggan'
 ,'$nama_pelanggan'
 ,'$alamat'
 ,'$jenis_kelamin'
 ,'$no_telepon'
 ,'$email'
 ,'$username'
 ,'$password'

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