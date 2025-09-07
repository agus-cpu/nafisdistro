
<a href="<?php index(); ?>">
<?php btn_kembali(' KEMBALI'); ?>
</a>
<?php
 $id = $_GET['proses'];

 $kode_transaksi_penjualan = baca_database("","kode_transaksi_penjualan","select * from data_pemesanan where id_pemesanan='$id'");
?>
<br><br>


<div style="overflow-x:auto;">
<table <?php tabel(100,'%',1,'left');  ?> >
			<tr>								  
			  
			   <th>No</th>
			   <th>Id&nbsp;penjualan</th>
			   <th align="center" class="th_border cell"  >Kode&nbsp;transaksi&nbsp;penjualan</th>
<th align="center" class="th_border cell"  >Tanggal&nbsp;penjualan</th>
<th align="center" class="th_border cell"  >Id&nbsp;pelanggan</th>
<th align="center" class="th_border cell"  >Nama Pelanggan</th>
<th align="center" class="th_border cell"  >Id&nbsp;produk</th>
<th align="center" class="th_border cell"  >Nama Produk</th>
<th align="center" class="th_border cell"  >Jumlah</th>
<th align="center" class="th_border cell"  >Harga</th>
<th align="center" class="th_border cell"  >Catatan</th>
<th align="center" class="th_border cell"  >Status</th>

			</tr>
							 
			<tbody>
			<?php
				$no = 0;
				$startRow=($page-1)*$dataPerPage;
				$no = $startRow;
				
				if (isset($_GET['Berdasarkan']) && !empty($_GET['Berdasarkan']) && isset($_GET['isi']) && !empty($_GET['isi']))
				{
				$berdasarkan =  mysql_real_escape_string($_GET['Berdasarkan']);
				$isi =  mysql_real_escape_string($_GET['isi']);
				$querytabel="SELECT * FROM data_penjualan where $berdasarkan like '%$isi%'  LIMIT $startRow ,$dataPerPage";
				$querypagination="SELECT COUNT(*) AS total FROM data_penjualan where $berdasarkan like '%$isi%'";
				}
				else
				{
				$querytabel="SELECT * FROM data_penjualan where kode_transaksi_penjualan='$kode_transaksi_penjualan'";
				$querypagination="SELECT COUNT(*) AS total FROM data_penjualan";
				}
				$proses = mysql_query($querytabel);
				while ($data = mysql_fetch_array($proses))
				  { ?>
               <tr class="event2">	
				  
				  <td align="center" width="50"><?php $no = (($no +1) ) ; echo $no;  ?></td>
				  <td align="center"><?php echo $data['id_penjualan']; ?></td>

                 <td align="center"><?php echo ($data['kode_transaksi_penjualan']); ?></td>
<td align="center"><?php echo (format_indo($data['tanggal_penjualan'])); ?></td>
<td align="center"><?php echo ($data['id_pelanggan']); ?></td>
<td align="center"><?php echo baca_database("", "nama_pelanggan", " select * from data_pelanggan where id_pelanggan ='$data[id_pelanggan]'") ?></td>
<td align="center"><?php echo ($data['id_produk']); ?></td>
<td align="center"><?php echo baca_database("", "nama_produk", " select * from data_produk where id_produk ='$data[id_produk]'") ?></td>
<td align="center"><?php echo ($data['jumlah']); ?></td>
<td align="center"><?php echo (rupiah($data['harga'])); ?></td>
<td align="center"><?php echo (substr($data['catatan'],0,100)); ?></td>
<td align="center"><?php echo ($data['status']); ?></td>

               </tr>
			<?php } ?>
			</tbody>
</table>
</div>
