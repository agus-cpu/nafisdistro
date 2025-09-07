<body>

  <a target="blank" href="cetak.php?berdasarkan=data_pemesanan&jenis=xls&pakaiperperiode=<?php echo $status_pakaiperperiode; ?>">
    <?php btn_export('Export Excel'); ?>
  </a>

  <a target="blank" href="cetak.php?berdasarkan=data_pemesanan&jenis=print&pakaiperperiode=<?php echo $status_pakaiperperiode; ?>">
    <?php btn_cetak('Cetak'); ?>
  </a>

  <a href="<?php index(); ?>">
    <?php btn_refresh('Refresh'); ?>
  </a>

  <br><br>

  <form name="formcari" id="formcari" action="" method="get">
    <fieldset>
      <table>
        <tbody>
          <tr>
            <td>Berdasarkan</td>
            <td>:</td>
            <td>
              <!-- <input value="" name="Berdasarkan" id="Berdasarkan" > --> <select class="form-control show-tick" name="Berdasarkan" id="Berdasarkan">
                <?php
                $sql = "desc data_pemesanan";
                $result = @mysql_query($sql);
                while ($row = @mysql_fetch_array($result)) {
                  echo "<option name='berdasarkan' value=$row[0]>$row[0]</option>";
                }
                ?>
              </select>
            </td>
          </tr>

          <tr>
            <td>Pencarian</td>
            <td>:</td>
            <td>
              <!--<input class="form-control" type="text" name="isi" value="" >--> <input type="text" name="isi" value="">
              <?php btn_cari('Cari'); ?>
            </td>
          </tr>
        </tbody>
      </table>
    </fieldset>
  </form>

  <div style="overflow-x:auto;">
    <table <?php tabel(100, '%', 1, 'left');  ?>>
      <tr>
        <th>Action</th>
        <th>No</th>
        <th>Id&nbsp;pemesanan</th>
        <th align="center" class="th_border cell">Kode&nbsp;transaksi&nbsp;penjualan</th>
        <th align="center" class="th_border cell">Tanggal&nbsp;pemesanan</th>
        <th align="center" class="th_border cell">Total&nbsp;bayar</th>
        <th align="center" class="th_border cell">Tanggal&nbsp;upload&nbsp;bukti&nbsp;pembayaran</th>
        <th align="center" class="th_border cell">Foto&nbsp;bukti&nbsp;pembayaran</th>
        <th align="center" class="th_border cell">No&nbsp;telepon&nbsp;penerima</th>
        <th align="center" class="th_border cell">Alamat&nbsp;pengiriman</th>
        <th align="center" class="th_border cell">Tanggal&nbsp;pengiriman</th>
        <th align="center" class="th_border cell">Nomor&nbsp;resi</th>

      </tr>

      <tbody>
        <?php
        $no = 0;
        $startRow = ($page - 1) * $dataPerPage;
        $no = $startRow;

        if (isset($_GET['Berdasarkan']) && !empty($_GET['Berdasarkan']) && isset($_GET['isi']) && !empty($_GET['isi'])) {
          $berdasarkan = $_GET['Berdasarkan'];
          $isi = $_GET['isi'];
          $querytabel = "SELECT * FROM data_pemesanan where $berdasarkan like '%$isi%' ORDER BY nomor_resi = '' DESC  LIMIT $startRow ,$dataPerPage";
          $querypagination = "SELECT COUNT(*) AS total FROM data_pemesanan where $berdasarkan like '%$isi%'";
        } else {
          $querytabel = "SELECT * FROM data_pemesanan ORDER BY nomor_resi = '' DESC  LIMIT $startRow ,$dataPerPage";
          $querypagination = "SELECT COUNT(*) AS total FROM data_pemesanan";
        }
        $proses = mysql_query($querytabel);
        while ($data = mysql_fetch_array($proses)) { ?>
          <tr class="event2">
            <td class="th_border cell" align="center" width="200">
              <table border="0">
                <tr>
                  <td>
                    <a href="<?php index(); ?>?input=detail&proses=<?php echo $data['id_pemesanan']; ?>">
                      <?php btn_detail('Detail'); ?></a>
                  </td>
                  <td>
                    <?php $cekresi = $data['nomor_resi'];

                    if (empty($cekresi)) {
                    ?>
                      <a href="<?php index(); ?>?input=edit&proses=<?php echo $data['id_pemesanan']; ?>">
                        <?php btn_edit('Konfirmasi'); ?></a>

                    <?php } else {
                      echo "telah dikonfirmasi ";
                    }
                    ?>
                  </td>
                  <!--
								<td>
									<a href="<?php index(); ?>?input=hapus&proses=<?php echo $data['id_pemesanan']; ?>&kode_transaksi_penjualan=<?php echo (substr($data['kode_transaksi_penjualan'], 0, 100)); ?>">
									<?php btn_hapus('Batal Pemesanan'); ?></a>
								</td>
								-->
                </tr>
              </table>
            </td>
            <td align="center" width="50"><?php $no = (($no + 1));
                                          echo $no;  ?></td>
            <td align="center"><?php echo $data['id_pemesanan']; ?></td>

            <td align="center"><?php echo (substr($data['kode_transaksi_penjualan'], 0, 100)); ?></td>
            <td align="center"><?php echo (format_indo($data['tanggal_pemesanan'])); ?></td>
            <td align="center"><?php rupiah($data['biaya_ongkir'] + ($data['total_bayar'])); ?></td>
            <td align="center"><?php echo format_indo($data['tanggal_upload_bukti_pembayaran']); ?></td>
            <td align="center"><a href='../../../upload/<?php echo $data['foto_bukti_pembayaran']; ?>'><img onerror="this.src='<?php echo $imageerror; ?>'" width='50' height='30' src='../../../upload/<?php echo $data['foto_bukti_pembayaran']; ?>'></a></td>
            <td align="center"><?php echo ($data['no_telepon_penerima']); ?></td>
            <td align="center"><?php echo (substr($data['alamat_pengiriman'], 0, 100)); ?></td>
            <td align="center"><?php echo (format_indo($data['tanggal_pengiriman'])); ?></td>
            <td align="center"><?php echo (substr($data['nomor_resi'], 0, 100)); ?></td>

          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <?php Pagination($page, $dataPerPage, $querypagination); ?>

</body>