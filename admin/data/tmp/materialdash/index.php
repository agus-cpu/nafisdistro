<?php 
    $url = '../../../data/tmp/materialdash/file/';
    include '../../../include/all_include.php';
    include '../../../include/function/session.php'; 
	?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link
    rel="stylesheet"
    href="<?php echo $url;?>assets/vendors/mdi/css/materialdesignicons.min.css">
<link rel="stylesheet" href="<?php echo $url;?>assets/vendors/css/vendor.bundle.base.css">
<link
    rel="stylesheet"
    href="<?php echo $url;?>assets/vendors/flag-icon-css/css/flag-icon.min.css">
<link
    rel="stylesheet"
    href="<?php echo $url;?>assets/vendors/jvectormap/jquery-jvectormap.css">
<link rel="stylesheet" href="<?php echo $url;?>assets/css/demo/style.css">
<link rel="shortcut icon" href="<?php echo $url;?>assets/images/favicon.png"/>
</head>
<body>
<script src="<?php echo $url;?>assets/js/preloader.js"></script>
<div class="body-wrapper">
    <aside class="mdc-drawer mdc-drawer--dismissible mdc-drawer--open">
        <div class="mdc-drawer__header">
            <a href="" class="brand-logo">
            <font color="white"><?php echo ucwords($judul);?></font>
            </a>
        </div>
        <div class="mdc-drawer__content">
            <div class="user-info">
                <p class="name">Selamat Datang</p>
                
                <p class="email">User : <?php echo ucwords($siapa);?></p>
            </div>
            <div class="mdc-list-group">
                <nav class="mdc-list mdc-drawer-menu">
                  

                <!-- MENU -->
                <?php
$m = new SimpleXMLElement('../../../include/settings/menu.xml', null, true);
foreach($m as $i){if($i->t == 's' ){
?>
                    <!-- SINGLE -->

                   

                    <div class="mdc-list-item mdc-drawer-item">
                        <a class="mdc-drawer-link" href="<?php echo $i->l;?>">
                            <i
                                class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                                >track_changes</i>
                                <?php echo $i->n;?>
                        </a>
                    </div>


                    <!-- /SINGLE -->
                <?php
}else if($i->t == 'm' ){ $idmenu = $i->id;
?>
                    <!-- MULTI -->

             

                    <div class="mdc-list-item mdc-drawer-item">
                        <a
                            class="mdc-expansion-panel-link"
                            href="#"
                            data-toggle="expansionPanel"
                            data-target="ui-sub-menu">
                            <i
                                class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                                aria-hidden="true">dashboard</i>
                                <?php echo $i->n;?>
                            <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                        </a>
                        <div class="mdc-expansion-panel" id="ui-sub-menu">
                            <nav class="mdc-list mdc-drawer-submenu">

                            <?php
                        $m1 = new SimpleXMLElement('../../../include/settings/menu.xml', null, true);
                        foreach($m1 as $i1) {
                        if($i1->s=="$idmenu" and $i1->t=="sm" ){
                        ?>
                           
                                <div class="mdc-list-item mdc-drawer-item">
                                    <a class="mdc-drawer-link" href="<?php echo $i1->l;?>">
                                    <?php echo $i1->n;?>
                                    </a>
                                </div>


                                <?php }} ?>


                             
                            </nav>
                        </div>
                    </div>
                   



                   

                    <!-- /MULTI -->
                    <?php }} ?>
                    <!-- /MENU -->



                    
                   
                 
                </nav>
            </div>
        
            <div class="mdc-card premium-card">
                <div class="d-flex align-items-center">
                    <div class="mdc-card icon-card box-shadow-0">
                        <i class="mdi mdi-shield-outline"></i>
                    </div>
                    <div>
                        <p class="mt-0 mb-1 ml-2 font-weight-bold tx-12"><?php echo $judul;?></p>
                    
                    </div>
                </div>
                <p class="tx-8 mt-3 mb-1">Klik tombol dibawah untuk </p>
                <p class="tx-8 mb-3">Kembali Logout dari website.</p>
                <a
                    href="<?php logout();?>"
                    >
                    <span class="mdc-button mdc-button--raised mdc-button--white">Logout Web</span>
                </a>
            </div>
        </div>
    </aside>
    <!-- partial -->
    <div class="main-wrapper mdc-drawer-app-content">
        <!-- partial:partials/_navbar.html -->
        <header class="mdc-top-app-bar">
            <div class="mdc-top-app-bar__row">
                <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
                    <button
                        class="material-icons mdc-top-app-bar__navigation-icon mdc-icon-button sidebar-toggler">menu</button>
                    <span class="mdc-top-app-bar__title">Selamat Datang</span>
                    <form>
                    <div
                        class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon search-text-field d-none d-md-flex">
                        <i class="material-icons mdc-text-field__icon">search</i>
                        <input type="hidden" value="id" name="Berdasarkan">
                        <input name="isi" class="mdc-text-field__input" id="text-field-hero-input">
                        <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                                <label for="text-field-hero-input" class="mdc-floating-label">Search..</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                        </div>
                    </div>
                    </form>
                </div>
                <div
                    class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end mdc-top-app-bar__section-right">
                    <div class="menu-button-container menu-profile d-none d-md-block">
                        <button class="mdc-button mdc-menu-button">
                            <span class="d-flex align-items-center">
                                <span class="figure">
                                    <img src="<?php echo $logo;?>" alt="user" class="user">
                                </span>
                                <span class="user-name"><?php echo ucwords($siapa);?></span>
                            </span>
                        </button>
                        <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                          
                        </div>
                    </div>
                    <div class="divider d-none d-md-block"></div>
                    <div class="menu-button-container d-none d-md-block">
                        <button class="mdc-button mdc-menu-button">
                            <i class="mdi mdi-settings"></i>
                        </button>
                        <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                            <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                                <li class="mdc-list-item" role="menuitem">
                                    <div class="item-thumbnail item-thumbnail-icon-only">
                                        <i class="mdi mdi-alert-circle-outline text-primary"></i>
                                    </div>
                                    <div
                                        class="item-content d-flex align-items-start flex-column justify-content-center">
                                        
                                        <a href="../home/"><h6 class="item-subject font-weight-normal">Home</h6></a>
                                    </div>
                                </li>
                                <li class="mdc-list-item" role="menuitem">
                                    <div class="item-thumbnail item-thumbnail-icon-only">
                                        <i class="mdi mdi-progress-download text-primary"></i>
                                    </div>
                                    <div
                                        class="item-content d-flex align-items-start flex-column justify-content-center">
                                        <a href="<?php logout();?>"><h6 class="item-subject font-weight-normal">Logout</h6></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                  
                </div>
            </div>
        </header>
        <!-- partial -->
        <div class="page-wrapper mdc-toolbar-fixed-adjust">
            <main class="content-wrapper">
                <div class="mdc-layout-grid">
                    <div class="mdc-layout-grid__inner">
                       
                       
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                            <div class="mdc-card">
                                <div class="d-flex justify-content-between">
                                    <h4 class="card-title mb-0"><?php tabelnomin();?></h4>
                                    
                                    <div>
                                        <i class="material-icons refresh-icon">refresh</i>
                                        <i class="material-icons options-icon ml-2">more_vert</i>
                                    </div>
                                </div>
                                
                                <div class="mdc-layout-grid__inner mt-2">
                                    <div
                                        class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12 mdc-layout-grid__cell--span-8-tablet">
                                        <div class="table-responsive">
                                            <hr>
                                            <?php include 'halaman.php';?>


                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </main>
            <!-- partial:partials/_footer.html -->
            <footer>
                <div class="mdc-layout-grid">
                    <div class="mdc-layout-grid__inner">
                        <div
                            class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                            <span class="text-center text-sm-left d-block d-sm-inline-block tx-14">
                            
                            <?php echo $copyright;?>

                            </span>
                        </div>
                        <div
                            class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop d-flex justify-content-end">
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center tx-14">Free
                            <?php echo $judul;?></span>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- partial -->
        </div>
    </div>
</div>
<!-- plugins:js -->
<script src="<?php echo $url;?>assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="<?php echo $url;?>assets/vendors/chartjs/Chart.min.js"></script>
<script src="<?php echo $url;?>assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
<script src="<?php echo $url;?>assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="<?php echo $url;?>assets/js/material.js"></script>
<script src="<?php echo $url;?>assets/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="<?php echo $url;?>assets/js/dashboard.js"></script>
<!-- End custom js for this page-->
</body>
</html>