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

$password_validasi=decrypt($_POST['password_validasi']); 
$password_lama=MD5($_POST['password_lama']);
$password=($_POST['password']);
if ($password_lama=="" or $password=="")
{
		$password=decrypt($_POST['password_validasi']);
}
else
{
		if ($password_lama==$password_validasi)
		{
			$password=MD5($_POST['password']);
		}
		else
		{
			?>
				<script>
				alert("password Lama tidak sesuai, Gagal Mengganti password.");
				window.history.back(); </script>
			<?php
			die();
		}
}

$query=mysql_query("update data_pelanggan set 
nama_pelanggan='$nama_pelanggan',
alamat='$alamat',
jenis_kelamin='$jenis_kelamin',
no_telepon='$no_telepon',
email='$email',
username='$username',

password='$password'
where id_pelanggan='$id_pelanggan' ") or die (mysql_error());

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