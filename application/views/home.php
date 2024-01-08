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
                            <li class="user user-menu">
                               <div class="text-center">
                                    <a href="<?= base_url('authenticate/signin'); ?>" class="btn btn-danger btn-lg">Accèder au système</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">NAVIGATION</li>
                        <li>
                            <a href="<?php echo site_url();?>">
                                <i class="fa fa-home"></i> <span>Accueil</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('authenticate/assujettis');?>">
                                <i class="fa fa-edit"></i> <span>Assujettis</span>
                            </a>
                        </li>
                    </ul>
                </section><!-- /.sidebar -->
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
        <script src="https://checkout.stripe.com/checkout.js"></script>
  
        <script type="text/javascript">
            
            function pay(amount) {
            var handler = StripeCheckout.configure({
                //acct_1O86QSCwyjazUF4c
                //https://dashboard.stripe.com/b/acct_1O86QSCwyjazUF4c
                key: 'pk_test_5f6jfFP2ZV5U9TXQYG0vtqFJ00eFVWNoRX', // pk_test_5f6jfFP2ZV5U9TXQYG0vtqFJ00eFVWNoRX
                locale: 'auto',
                token: function (token) {
                // You can access the token ID with `token.id`.
                // Get the token ID to your server-side code for use.
                console.log('Token Created!!');
                console.log(token)
                $('#token_response').html(JSON.stringify(token));
                $('#email').html(JSON.stringify(token.email));
                $('#cardid').html(JSON.stringify(amount));
        
                //alert('Payment created successfully');
        
                $.ajax({
                    url:"<?php echo base_url('authenticate/stripePayment'); ?>",
                    method: 'post',
                    data: { tokenId: token.id, amount: amount },
                    dataType: "json",
                    success: function( response ) {
                    console.log(response.data);
                    
                    $('#token_response').append( '<br />' + JSON.stringify(response.data));
                    }
                })
                }
            });
            
            handler.open({
                name: 'Patente Commerciale',
                description: 'Patente des activites commerciales',
                amount: amount * 100
            });
            }
        </script>
  </body>
  </html>