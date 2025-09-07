<?php 
$default_url = '../../../data/tmp/tmp 13';
$tema = '13-Bootstrap-Admin-Theme-3-master';
$url = $default_url.'/'.$tema;
include '../../../include/all_include.php'; 
include '../../../include/function/session.php';
?>
<head>
<link
    href="<?php echo $url; ?>/bootstrap/css/bootstrap.min.css"
    rel="stylesheet">
<link href="<?php echo $url; ?>/css/styles.css" rel="stylesheet">
<script
    type="text/javascript"
    src="<?php echo $default_url; ?>/txt/ckeditor/ckeditor.js"></script>
</head>
<body style="background-color: #eff0f3">
<div>
<div class="header" style="background-color:#5ccdc3">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <!-- Logo -->
                <div class="logo">
					
                    <h1>
					<img src="<?php echo $avatar;?>" width="30" alt="">
                        <font color="white"><?php echo ucwords($judul); ?></font>
                    </h1>
                </div>
            </div>
          
            <div class="col-md-2">
                <div class="navbar navbar-inverse" role="banner">
                    <nav
                        class="collapse navbar-collapse bs-navbar-collapse navbar-right"
                        role="navigation">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu animated fadeInUp">
                                    <li>
                                        <a href="<?php home();?>">home</a>
                                    </li>
                                    <li>
                                        <a href="<?php logout();?>">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-content" >
<div class="col-md-12" style="background-color: #eff0f3">
    <div class="row">
        <div class="col-md-2">
            <div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->

                    <!-- MENU -->
                    <?php
$m = new SimpleXMLElement('../../../include/settings/menu.xml', null, true);
foreach($m as $i){if($i->t == 's' ){
?>
                    <!-- SINGLE -->
                    <li class="current">
                        <a href="<?php echo $i->l;?>">
                            <i class="glyphicon glyphicon-edit"></i>
                            <?php echo $i->n;?></a>
                    </li>
                    <!-- /SINGLE -->
                <?php
}else if($i->t == 'm' ){ $idmenu = $i->id;
?>
                    <!-- MULTI -->
					
					
					<li class="submenu">
                         <a href="<?php echo $i->l;?>">
                            <i class="glyphicon glyphicon-list"></i> <?php echo $i->n;?>
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            
                       
                   
					

                    <?php
		$m1 = new SimpleXMLElement('../../../include/settings/menu.xml', null, true);
		foreach($m1 as $i1) {
		if($i1->s=="$idmenu" and $i1->t=="sm" ){
		?>
                    <li>
                        <a class="item" href="<?php echo $i1->l;?>">
                            <i class="<?php echo $i1->i;?>"></i>
                            <?php echo $i1->n;?></a>
                    </li>
                    <?php }} ?>
 </ul>
 </li>
 
                    <!-- /MULTI -->
                    <?php }} ?>
                    <!-- /MENU -->
</ul>
               
            </div>
        </div>
        <div class="col-md-10">

            <div class="row">
                <div class="col-md-12 panel-primary">
                    <div class="content-box-header panel-heading" style="background-color: #5ccdc3; border-color:#5ccdc3">
                        <div class="panel-title "></div>

                        <div class="panel-options">

                            <a href="<?php index(); ?>" data-rel="reload">
                                <i class="glyphicon glyphicon-refresh"></i>
                            </a>
                        </div>
                    </div>
                    <div class="content-box-large box-with-header">

                        <?php include 'halaman.php'; ?>
                        <br>

                        <br/><br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<footer style="background-color:#eff0f3">
    <div class="container" style="color : background-color: black">

        <div class="copy text-center" style="color:black">
            <?php echo $copyright; ?>
        </div>

    </div>
</footer>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- include all compiled plugins (below), or include individual files as needed
-->
<script src="<?php echo $url; ?>/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo $url; ?>/js/custom.js"></script>
</body>
</html>