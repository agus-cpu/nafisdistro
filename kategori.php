<?php if(empty($p)) { header("Location: index.php?=home"); die(); } ?>


<br>
<center><h2> PRODUK PER KATEGORI </h2></center>
<br>

<?php
	kategori("data_produk","id_produk","nama_produk","foto","kategori","harga_jual","jumlah","Beli");
?>









