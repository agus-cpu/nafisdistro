<?php
$default_url = '../../../data/tmp/bootflat';
$url = $default_url.'/file';
include '../../../include/all_include.php';
include '../../../include/function/session.php';
?>
<link rel="stylesheet" href="<?php echo $url;?>/dist/css/site.min.css">
<link
    href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic"
    rel="stylesheet"
    type="text/css">
<script type="text/javascript" src="<?php echo $url;?>/dist/js/site.min.js"></script>
</head>
<body>
<!--nav-->
<nav role="navigation" class="navbar navbar-custom">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button
                data-target="#bs-content-row-navbar-collapse-5"
                data-toggle="collapse"
                class="navbar-toggle"
                type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand"><?php echo strtolower($judul); ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">

                <!-- <li class="disabled"><a href="#">Link</a></li> -->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo $siapa;?>
                        <b class="caret"></b>
                    </a>
                    <ul role="menu" class="dropdown-menu">
                        <li class="dropdown-header">Setting</li>
                        <li>
                            <a href="<?php home();?>">Home</a>
                        </li>
                        <li class="disabled">
                            <a href="<?php logout();?>">Signout</a>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<!--header-->
<div class="container-fluid">
    <!--documents-->
    <div class="row row-offcanvas row-offcanvas-left">
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
            <ul class="list-group panel">
                <li class="list-group-item">
                    <i class="glyphicon glyphicon-align-justify"></i>
                    <b>Menu
                        <?php echo $siapa;?></b>
                </li>

                <!-- MENU -->
                <?php
$m = new SimpleXMLElement('../../../include/settings/menu.xml', null, true);
foreach($m as $i){if($i->t == 's' ){
?>
                <!-- SINGLE -->
                <li class="list-group-item">
                    <a href="<?php echo $i->l;?>">
                        <i class="<?php echo $i->i;?>"></i>
                        <?php echo $i->n;?></a>
                </li>
                <!-- /SINGLE -->
            <?php
}else if($i->t == 'm' ){ $idmenu = $i->id;
?>
                <!-- MULTI -->

                <li>
                    <a
                        href="#demo<?php echo $i->id;?>"
                        class="list-group-item "
                        data-toggle="collapse">
                        <i class="<?php echo $i->i;?>"></i><?php echo $i->n;?>
                        <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <div class="collapse" id="demo<?php echo $i->id;?>">
                        <?php
		$m1 = new SimpleXMLElement('../../../include/settings/menu.xml', null, true);
		foreach($m1 as $i1) {
		if($i1->s=="$idmenu" and $i1->t=="sm" ){
		?>
                        <a href="<?php echo $i1->l;?>" class="list-group-item">
                            <i class="<?php echo $i1->i;?>"></i>
                            <?php echo $i1->n;?></a>
                        <?php }} ?>
                    </div>
                </li>
                <!-- /MULTI -->
                <?php }} ?>
                <!-- /MENU -->

            </ul>
        </div>
        <div class="col-xs-12 col-sm-9 content">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <a href="javascript:void(0);" class="toggle-sidebar">
                            <span
                                class="fa fa-angle-double-left"
                                data-toggle="offcanvas"
                                title="Maximize Panel"></span></a><?php tabelnomin();?></h3>
                </div>
                <div class="panel-body">

                    <?php include 'halaman.php'; ?>

                    <br>

                    <br>
                    <br>
                    <br>
                </div>
                <!-- panel body -->
            </div>
        </div>
        <!-- content -->
    </div>
</div>
<!--footer-->
<br>
<br>
<br>
<br>
<div class="site-footer">
    <div class="container">

        <div class="copyright clearfix">
            <p>
                <b><?php echo $copyright;?></b>
            </p>
        </div>
    </div>
</div>
</body>
</html>