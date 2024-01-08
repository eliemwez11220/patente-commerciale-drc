<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Patente Commerciale Municipale</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap.min.css');?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/font-awesome.min.css');?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Datetimepicker -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap-datetimepicker.min.css');?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/AdminLTE.min.css');?>">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/_all-skins.min.css');?>">
    </head>
    
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini">PCM</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">PATENTE</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                   <?php if (!empty($this->session->avatar)) { ?>
                                         <img src="<?php echo base_url() . trim($this->session->avatar); ?>" class="img-circle" alt="User Image"
                                         style="border-radius: 10px!important; height: 35px; width: 40px;"/>
                                 <?php } else { ?>
                                  <img src="<?php echo base_url(); ?>global/img/avatars/avatar.png"
                                        alt="Avatar" class="img-circle" style="border-radius: 10px!important; height: 35px; width: 40px;"/>
                                <?php } ?>

                                    <span class="hidden-xs">
                                        <?= $this->session->fullname; ?>
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                   <?php if (!empty($this->session->avatar)) { ?>
                                         <img src="<?php echo base_url() . trim($this->session->avatar); ?>" class="img-circle" alt="User Image">
                                 <?php } else { ?>
                                  <img src="<?php echo base_url(); ?>global/img/avatars/avatar.png"
                                        alt="Avatar" class="img-circle"/>
                                <?php } ?>

                                    <p>
                                        <?= $this->session->fullname; ?> - <?= $this->session->fonction; ?>
                                        <small><?= $this->session->role; ?></small>
                                    </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?= base_url('user/account'); ?>" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?= base_url('dashboard/logOut'); ?>" class="btn btn-danger btn-flat">Déconnexion</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">

                            <?php if (!empty($this->session->avatar)) { ?>
                             <img src="<?php echo base_url() . trim($this->session->avatar); ?>"
                                alt="Avatar" 
                                   style="border-radius: 10px!important; height: 50px; width: 50px;"/>
                                 <?php } else { ?>
                                  <img src="<?php echo base_url(); ?>global/img/avatars/avatar.png"
                                        alt="Avatar" class="img-circle" style="border-radius: 10px!important;"/>
                                <?php } ?>

                        </div>
                        <div class="pull-left info">
                            <p><?= $this->session->fullname; ?></p>
                            <a href="<?= base_url('user/account'); ?>" class="text-capitalize"><i class="fa fa-circle text-success"></i> <?= $this->session->fonction; ?></a>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">MAIN NAVIGATION</li>
                        <li>
                            <a href="<?php echo site_url();?>">
                                <i class="fa fa-dashboard"></i> <span>Tableau de bord</span>
                            </a>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-address-card-o"></i> <span>Identification </span>
                            </a>
                            <ul class="treeview-menu">
								
								<li>
                                    <a href="<?php echo site_url('client/index');?>"><i class="fa fa-list-ul"></i> Contribuables</a>
                                </li>
                                <li class="active">
                                    <a href="<?php echo site_url('fiche/index');?>"><i class="fa fa-plus"></i> Déclarations</a>
                                </li>
							</ul>
                        </li>
					
						<li>
                            <a href="#">
                                <i class="fa fa-bank"></i> <span>Perception</span>
                            </a>
                            <ul class="treeview-menu">
							
								<li>
                                    <a href="<?php echo site_url('note/index');?>"><i class="fa fa-list-ul"></i> Notes Perception</a>
                                </li>
                                <li class="active">
                                    <a href="<?php echo site_url('paiement/index');?>"><i class="fa fa-plus"></i> Paiements</a>
                                </li>
							</ul>
                        </li>
						
						 <?php if($this->session->role == "admin"){ ?>
                        <li>
                            <a href="#">
                                <i class="fa fa-address-book-o"></i> <span>Administration</span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="active">
                                    <a href="<?php echo site_url('user/add');?>"><i class="fa fa-plus"></i> Nouveau compte</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('user/index');?>"><i class="fa fa-list-ul"></i> Utilisateurs</a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">
                    <?php                    
                    if(isset($_view) && $_view)
                        $this->load->view($_view);
                    ?>                    
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <strong>Created By <a href="https://ditotase.com/">ditotase</a></strong>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab">
                    </div>
                    <!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                    <!-- /.tab-pane -->
                    
                </div>
            </aside>
            <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 2.2.3 -->
        <script src="<?php echo site_url('resources/js/jquery-2.2.3.min.js');?>"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo site_url('resources/js/bootstrap.min.js');?>"></script>
        <!-- FastClick -->
        <script src="<?php echo site_url('resources/js/fastclick.js');?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo site_url('resources/js/app.min.js');?>"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo site_url('resources/js/demo.js');?>"></script>
        <!-- DatePicker -->
        <script src="<?php echo site_url('resources/js/moment.js');?>"></script>
        <script src="<?php echo site_url('resources/js/bootstrap-datetimepicker.min.js');?>"></script>
        <script src="<?php echo site_url('resources/js/global.js');?>"></script>
    </body>
</html>
