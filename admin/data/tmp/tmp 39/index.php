<?php
$url = '../../../data/tmp/tmp 39/39-AdminBSBMaterialDesign-master/';
include '../../../include/all_include.php';
include '../../../include/function/session.php';
?>
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
<link href="<?php echo $url; ?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo $url; ?>plugins/node-waves/waves.css" rel="stylesheet" />
<link href="<?php echo $url; ?>plugins/animate-css/animate.css" rel="stylesheet" />
<link href="<?php echo $url; ?>plugins/morrisjs/morris.css" rel="stylesheet" />
<link href="<?php echo $url; ?>css/style.css" rel="stylesheet">
<link href="<?php echo $url; ?>css/themes/all-themes.css" rel="stylesheet" />
<link href="../../../data/30-gretong_admin_panel/css/font-awesome.css" rel="stylesheet">


<style>
  .btn.dropdown-toggle.btn-default {
    display: none;
  }
</style>
</head>

<body class="theme-red">
  <div class="page-loader-wrapper">
    <div class="loader">
      <div class="preloader">
        <div class="spinner-layer pl-red">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
      </div>
      <p>Please wait...</p>
    </div>
  </div>
  <div class="overlay"></div>

  <div class="search-bar">
    <div class="search-icon">
      <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
      <i class="material-icons">close</i>
    </div>
  </div>
  <!-- #END# Search Bar -->
  <!-- Top Bar -->
  <nav class="navbar">
    <div class="container-fluid">
      <div class="navbar-header">
        <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
        <a href="javascript:void(0);" class="bars"></a>
        <a class="navbar-brand" href="index.html"><?php echo $judul; ?></a>
      </div>
      <div class="collapse navbar-collapse" id="navbar-collapse">

        <ul class="nav navbar-nav navbar-right">
          <!-- Call Search -->
          <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
          <!-- #END# Call Search -->
          <!-- Notifications -->
          <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
              <i class="material-icons">notifications</i>
              <span class="label-count"><?php echo baca_database('', 'a', "select count(data_penjualan.jumlah) as a from data_pemesanan inner join data_penjualan on data_pemesanan.kode_transaksi_penjualan = 
                            data_penjualan.kode_transaksi_penjualan where data_penjualan.status='menunggu_konfirmasi'"); ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">NOTIFICATIONS</li>
              <?php $querytabel = "SELECT * FROM data_pemesanan inner join data_penjualan on data_pemesanan.kode_transaksi_penjualan = 
                            data_penjualan.kode_transaksi_penjualan where data_penjualan.status='menunggu_konfirmasi'";
              $proses = mysql_query($querytabel);
              while ($data = mysql_fetch_array($proses)) {
                $ktp = $data['kode_transaksi_penjualan'];
                $pem = $data['id_pemesanan'];
              ?>
                <li class="body">
                  <div class="slimScrollDiv">
                    <ul class="menu">


                      <li style="overflow: hidden;width: auto;height: auto;">
                        <a href="../data_pemesanan/index.php?input=edit&proses=<?php echo $pem ?>" class=" waves-effect waves-block">
                          <div class="icon-circle bg-cyan">

                            <i class="material-icons">add_shopping_cart</i>
                          </div>

                          <?php
                          $awal  = strtotime($data['tanggal_upload_bukti_pembayaran']);
                          $akhir =  date('Y-m-d');  //sekarang 
                          $tanggal_lahir  = strtotime('1989-01-18');
                          $sekarang    = time(); // Waktu sekarang
                          $diff   = $sekarang - $awal;
                          'umur anda adalah ' . floor($diff / (60 * 60 * 24 * 365)) . ' Tahun'; // Umur anda dalam hitungan tahun
                          $harinya = floor($diff / (60 * 60 * 24)); // Umur anda dalam hitungan hari
                          ?>

                          <div class="menu-info">
                            <h4><?php $idp = $data['id_pelanggan'];
                                echo baca_database('', 'a', "select sum(jumlah) as a from data_penjualan where kode_transaksi_penjualan='$ktp'"); ?> Produk Dipesan</h4>
                            <p> <?php $skrng = date('Y-m-d');
                                $selisih = $Skrng - $data['tanggal_pemesanan']; ?>
                              <i class="material-icons">access_time</i> <?php echo $harinya; ?> Hari Lalu
                            </p>
                          </div>
                        </a>
                      </li>

                    </ul>

                    <div class="slimScrollBar" style="background: rgba(0, 0, 0, 0.5); width: 4px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 0px; z-index: 99; right: 1px;"></div>
                    <div class="slimScrollRail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">
                    </div>
                  </div>
                </li>
              <?php  } ?>
              <li class="footer">
                <a href="../data_pemesanan/index.php" class=" waves-effect waves-block">View All Notifications</a>
              </li>
            </ul>
          </li>
          <li class="dropdown">

            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
              <i class="material-icons">supervised_user_circle</i>

            </a>
            <ul class="dropdown-menu">
              <li class="header"><?php echo $siapa; ?></li>

              <li class="footer">
                <a href="<?php logout(); ?>">Logout</a>
              </li>
            </ul>
          </li>
          <!-- #END# Notifications -->
          <!-- Tasks -->
          <!-- #END# Tasks -->
          <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
        </ul>

















      </div>
    </div>
  </nav>
  <!-- #Top Bar -->
  <section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
      <!-- User Info -->
      <div class="user-info">
        <div class="image">
          <img src="<?php echo $avatar; ?>" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
          <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $siapa; ?></div>
          <div class="email">Form Login
            <?php echo $siapa; ?></div>
          <div class="btn-group user-helper-dropdown">
            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
            <ul class="dropdown-menu pull-right">
              <li>
                <a href="../home/index.php">
                  <i class="material-icons">person</i>Home</a>
              </li>
              <li>
                <a href="<?php logout(); ?>">
                  <i class="material-icons">input</i>Sign Out</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- #User Info -->
      <!-- Menu -->
      <div class="menu">
        <ul class="list">
          <li class="header">MAIN MENU</li>

          <!-- MENU -->
          <?php
          $m = new SimpleXMLElement('../../../include/settings/menu.xml', null, true);
          foreach ($m as $i) {
            if ($i->t == 's') {
          ?>
              <!-- SINGLE -->
              <li>
                <a href="<?php echo $i->l; ?>">
                  <i class="<?php echo $i->i; ?>"></i>
                  <span><?php echo $i->n; ?></span>
                  <div class="clearfix"></div>
                </a>
              </li>
              <!-- /SINGLE -->
            <?php
            } else if ($i->t == 'm') {
              $idmenu = $i->id;
            ?>
              <!-- MULTI -->
              <li id="menu-academico">
                <a href="#" class="menu-toggle waves-effect waves-block">
                  <i class="<?php echo $i->i; ?>"></i>
                  <span><?php echo $i->n; ?></span>
                  <span class="fa fa-angle-right" style="float: right"></span>
                  <div class="clearfix"></div>
                </a>
                <ul id="menu-academico-sub" class="ml-menu">
                  <?php
                  $m1 = new SimpleXMLElement('../../../include/settings/menu.xml', null, true);
                  foreach ($m1 as $i1) {
                    if ($i1->s == "$idmenu" and $i1->t == "sm") {
                  ?>
                      <li>
                        <a class="waves-effect waves-block" href="<?php echo $i1->l; ?>">
                          <i class="<?php echo $i1->i; ?>"></i>
                          &nbsp;&nbsp;&nbsp;<?php echo $i1->n; ?></a>
                      </li>
                  <?php }
                  } ?>
                </ul>
              </li>
              <!-- /MULTI -->
          <?php }
          } ?>
          <!-- /MENU -->

        </ul>
      </div>
      <!-- #Menu -->
      <!-- Footer -->
      <div class="legal">
        <div class="copyright">
          <a href="javascript:void(0);"><?php echo $judul ?></a>.
        </div>
        <div class="version">
          <?php echo $copyright; ?>
        </div>
      </div>
      <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
      <ul class="nav nav-tabs tab-nav-right" role="tablist">
        <li role="presentation" class="active">
          <a href="#skins" data-toggle="tab">SKINS</a>
        </li>
        <li role="presentation">
          <a href="#settings" data-toggle="tab">SETTINGS</a>
        </li>
      </ul>
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
          <ul class="demo-choose-skin">
            <li data-theme="red" class="active">
              <div class="red"></div>
              <span>Red</span>
            </li>
            <li data-theme="pink">
              <div class="pink"></div>
              <span>Pink</span>
            </li>
            <li data-theme="purple">
              <div class="purple"></div>
              <span>Purple</span>
            </li>
            <li data-theme="deep-purple">
              <div class="deep-purple"></div>
              <span>Deep Purple</span>
            </li>
            <li data-theme="indigo">
              <div class="indigo"></div>
              <span>Indigo</span>
            </li>
            <li data-theme="blue">
              <div class="blue"></div>
              <span>Blue</span>
            </li>
            <li data-theme="light-blue">
              <div class="light-blue"></div>
              <span>Light Blue</span>
            </li>
            <li data-theme="cyan">
              <div class="cyan"></div>
              <span>Cyan</span>
            </li>
            <li data-theme="teal">
              <div class="teal"></div>
              <span>Teal</span>
            </li>
            <li data-theme="green">
              <div class="green"></div>
              <span>Green</span>
            </li>
            <li data-theme="light-green">
              <div class="light-green"></div>
              <span>Light Green</span>
            </li>
            <li data-theme="lime">
              <div class="lime"></div>
              <span>Lime</span>
            </li>
            <li data-theme="yellow">
              <div class="yellow"></div>
              <span>Yellow</span>
            </li>
            <li data-theme="amber">
              <div class="amber"></div>
              <span>Amber</span>
            </li>
            <li data-theme="orange">
              <div class="orange"></div>
              <span>Orange</span>
            </li>
            <li data-theme="deep-orange">
              <div class="deep-orange"></div>
              <span>Deep Orange</span>
            </li>
            <li data-theme="brown">
              <div class="brown"></div>
              <span>Brown</span>
            </li>
            <li data-theme="grey">
              <div class="grey"></div>
              <span>Grey</span>
            </li>
            <li data-theme="blue-grey">
              <div class="blue-grey"></div>
              <span>Blue Grey</span>
            </li>
            <li data-theme="black">
              <div class="black"></div>
              <span>Black</span>
            </li>
          </ul>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="settings">
          <div class="demo-settings">
            <p>GENERAL SETTINGS</p>
            <ul class="setting-list">
              <li>
                <span>Report Panel Usage</span>
                <div class="switch">
                  <label><input type="checkbox" checked="checked">
                    <span class="lever"></span></label>
                </div>
              </li>
              <li>
                <span>Email Redirect</span>
                <div class="switch">
                  <label><input type="checkbox">
                    <span class="lever"></span></label>
                </div>
              </li>
            </ul>
            <p>SYSTEM SETTINGS</p>
            <ul class="setting-list">
              <li>
                <span>Notifications</span>
                <div class="switch">
                  <label><input type="checkbox" checked="checked">
                    <span class="lever"></span></label>
                </div>
              </li>
              <li>
                <span>Auto Updates</span>
                <div class="switch">
                  <label><input type="checkbox" checked="checked">
                    <span class="lever"></span></label>
                </div>
              </li>
            </ul>
            <p>ACCOUNT SETTINGS</p>
            <ul class="setting-list">
              <li>
                <span>Offline</span>
                <div class="switch">
                  <label><input type="checkbox">
                    <span class="lever"></span></label>
                </div>
              </li>
              <li>
                <span>Location Permission</span>
                <div class="switch">
                  <label><input type="checkbox" checked="checked">
                    <span class="lever"></span></label>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </aside>
    <!-- #END# Right Sidebar -->
  </section>

  <section class="content">
    <div class="container-fluid">

      <div class="row clearfix">
        <!-- Task Info -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="header">
              <h2><?PHP tabelnomin(); ?>
              </h2>
              <ul class="header-dropdown m-r--5">
                <li class="dropdown">
                  <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">more_vert</i>
                  </a>
                  <ul class="dropdown-menu pull-right">
                    <li>
                      <a href="index.php">Refresh</a>
                    </li>
                    <li>
                      <a href="../home/">Back To Home</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
            <div class="body">

              <?php include 'halaman.php'; ?>
            </div>
          </div>
        </div>

      </div>
  </section>

  <script src="<?php echo $url; ?>plugins/jquery/jquery.min.js"></script>
  <script src="<?php echo $url; ?>plugins/bootstrap/js/bootstrap.js"></script>
  <script src="<?php echo $url; ?>plugins/bootstrap-select/js/bootstrap-select.js"></script>
  <script src="<?php echo $url; ?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
  <script src="<?php echo $url; ?>plugins/node-waves/waves.js"></script>
  <script src="<?php echo $url; ?>plugins/jquery-countto/jquery.countTo.js"></script>
  <script src="<?php echo $url; ?>plugins/raphael/raphael.min.js"></script>
  <script src="<?php echo $url; ?>plugins/morrisjs/morris.js"></script>
  <script src="<?php echo $url; ?>plugins/chartjs/Chart.bundle.js"></script>
  <script src="<?php echo $url; ?>plugins/flot-charts/jquery.flot.js"></script>
  <script src="<?php echo $url; ?>plugins/flot-charts/jquery.flot.resize.js"></script>
  <script src="<?php echo $url; ?>plugins/flot-charts/jquery.flot.pie.js"></script>
  <script src="<?php echo $url; ?>plugins/flot-charts/jquery.flot.categories.js"></script>
  <script src="<?php echo $url; ?>plugins/flot-charts/jquery.flot.time.js"></script>
  <script src="<?php echo $url; ?>plugins/jquery-sparkline/jquery.sparkline.js"></script>
  <script src="<?php echo $url; ?>js/admin.js"></script>
  <script src="<?php echo $url; ?>js/pages/index.js"></script>
  <script src="<?php echo $url; ?>js/demo.js"></script>
  
 
</body>

</html>