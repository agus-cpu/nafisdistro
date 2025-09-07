<?php if(empty($p)) { header("Location: index.php?=home"); die(); } ?>

<br>
<br>
<center><h2> KERANJANG BELANJA </h2></center>
<br>
<br>
	
<?php
if (!isset($_GET['action']))
{	
	//TAMPIL
	keranjang_belanja("Produk","data_penjualan","id_penjualan","data_produk","id_produk","nama_produk","foto","harga","jumlah","id_pelanggan","KERANJANG BELANJA","ya","PROSES PEMBAYARAN");
}
else
{
	$action = $_GET['action'];
	if ($action == "update")
	{
		//UPDATE
		 $max = $_GET['max'];
		 $jumlah = $_GET['jumlah'];
		 $id_produknya = $_GET['id'];
		 $s = $max - $jumlah;
		 $id_penjualan =  mysql_real_escape_string(decrypt($_GET['proses']));
		
		$query=mysql_query("update data_produk set jumlah='$s' where id_produk='$id_produknya'") or die (mysql_error());
		$query=mysql_query("update data_penjualan set jumlah='".mysql_real_escape_string($_GET['jumlah'])."'
		where id_penjualan='$id_penjualan'");
		?>
		<script> alert ("Jumlah Berhasil diubah"); location.href = "index.php?p=keranjang"; </script>
		<?php
	}
	elseif ($action == "delete")
	{
		//DELETE
		$jml = $_GET['jumlah'];
		$id_produk = $_GET['id_produk'];
		$sekarang =  baca_database("","jumlah","select * from data_produk where id_produk='$id_produk'");
		$sekarang = $sekarang + $jml;
		$query=mysql_query("update data_produk set 
		jumlah='$sekarang'
		where id_produk='$id_produk'") or die (mysql_error());
		$query=mysql_query("delete from data_penjualan where id_penjualan='".mysql_real_escape_string($_GET['proses'])."'");
		?>
		<script>
		alert ("Berhasil Dihapus");
		location.href = "index.php?p=keranjang";
		</script>
		<?php
	}
	elseif ($action == "selesai")
	{
		//CHECKOUT


		function autonumber($id_terakhir, $panjang_kode, $panjang_angka) {
			$kode = substr($id_terakhir, 0, $panjang_kode);
			$angka = substr($id_terakhir, $panjang_kode, $panjang_angka);
			$angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);
			$id_baru = $kode.$angka_baru;
			return $id_baru;
		}
		$cek = mysqli_query($con_mysqli,"SELECT * FROM data_pemesanan");
		$rowcek = mysqli_num_rows($cek);
		if ($rowcek > 0) {
			$id_pemesanan = mysqli_query($con_mysqli,"SELECT max(id_pemesanan) as id_pemesanan FROM data_pemesanan");
			$data_pemesanan = mysqli_fetch_array($id_pemesanan);
			$id_pemesanan_akhir = $data_pemesanan['id_pemesanan'];
			$id_pemesanan_otomatis = autonumber($id_pemesanan_akhir, 3, 3); 
			}else{
			$kodedepan = strtoupper('data_pemesanan');
			$kodedepan = str_replace("DATA_","",$kodedepan);
			$kodedepan = str_replace("DATA","",$kodedepan);
			$kodedepan = str_replace("TABEL_","",$kodedepan);
			$kodedepan = str_replace("TABEL","",$kodedepan);
			$kodedepan = str_replace("TABLE_","",$kodedepan);
			$kodedepan = strtoupper(substr($kodedepan,0,3));
			$id_pemesanan_otomatis = $kodedepan."001";	
		}


		$ids= decrypt($_COOKIE['kodene']);
		$kode = date("Ymdhis");

		$id_pemesanan = $id_pemesanan_otomatis;
		$kode_transaksi_penjualan = $kode;
		$tanggal_pemesanan=date('Y-m-d');
		$total_bayar=$_GET['sub_total'];
		$pembayaran=$_GET['pembayaran'];
		$nama_bank="";
		$rekening="";
		$kurir=$_GET['kurir'];
		$tujuan=$_GET['tujuan'];
		$biaya_ongkir=$_GET['biaya_pengiriman'];
		$tanggal_upload_bukti_pembayaran="";
		$foto_bukti_pembayaran="";
		$no_telepon_penerima=$_GET['no_telepon_penerima'];
		$alamat_pengiriman=$_GET['alamat_pengiriman'];
		$tanggal_pengiriman="";
		$nomor_resi="";
		
        $query=mysql_query("insert into data_kategori_pembayaran values (
			'$id_pemesanan'
			 ,'$pembayaran'
			 ,'$kode_transaksi_penjualan' 
			)");
			
		$query=mysql_query("insert into data_pemesanan values (
			'$id_pemesanan'
			 ,'$kode_transaksi_penjualan'
			 ,'$tanggal_pemesanan'
			 ,'$total_bayar'
			 ,'$nama_bank'
			 ,'$rekening'
			 ,'$kurir'
			 ,'$tujuan'
			 ,'$biaya_ongkir'
			 ,'$tanggal_upload_bukti_pembayaran'
			 ,'$foto_bukti_pembayaran'
			 ,'$no_telepon_penerima'
			 ,'$alamat_pengiriman'
			 ,'$tanggal_pengiriman'
			 ,'$nomor_resi'	
			)");


		$query=mysql_query("update data_penjualan set 
		kode_transaksi_penjualan='$kode'
		where status='proses' and id_pelanggan='$ids'") or die (mysql_error());
		$query=mysql_query("update data_penjualan set 
		status='pemesanan'
		where kode_transaksi_penjualan='$kode'") or die (mysql_error());
		?>
		<script>location.href = "index.php?p=transaksi"; </script>
		<?php
	}
}

 ?>
  <div class="col-md-12">
  <br><br><br><br><br><br><br><br>
  </div>

