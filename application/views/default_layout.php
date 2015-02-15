<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> ระบบรายงาน ตัวชี้วัดโรคไต เขตบริการสุขภาพที่ 7 </title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url()?>assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <!--<link href="<?php /*echo base_url()*/?>assets/css/sb-admin.css" rel="stylesheet">-->
    <link href="<?php echo base_url()?>assets/css/freeow/freeow.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/apps/css/app.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/sb-admin.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo base_url()?>assets/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!-- jQuery Version 1.11.0 -->

    <script src="<?php echo base_url()?>assets/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->

    <script src="<?php echo base_url()?>assets/js/underscore.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/underscore.string.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.maskedinput.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.numeric.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.blockUI.js"></script>
    <script src="<?php echo base_url()?>assets/js/numeral.min.js"></script>
    <script src="<?php echo base_url()?>assets/apps/js/apps.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.freeow.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/highchart/highcharts.js"></script>


    <script type="text/javascript" charset="utf-8">
        var site_url = '<?php echo site_url()?>';
        var base_url = '<?php echo base_url()?>';
        var url_44 = '<?php echo prov_server(44)?>';
        var url_40 = '<?php echo prov_server(40)?>';
        var url_45 = '<?php echo prov_server(45)?>';
        var url_46 = '<?php echo prov_server(46)?>';
        var provname = '<?php echo provname()?>';
        var nowyear = '<?php echo year()?>';
        var off_id = '<?php echo $this->session->userdata('hospcode')?>';
        var user_level = '<?php echo $this->session->userdata('user_level')?>';
        var csrf_token = '<?php echo $this->security->get_csrf_hash(); ?>';
    </script>


</head>
<body data-twttr-rendered="true">
<!--<style>
        /* Move down content because we have a fixed navbar that is 50px tall */
    body {
        padding-top: 55px;
        padding-bottom: 20px;
    }

        /* Set widths on the navbar form inputs since otherwise they're 100% wide */
    .navbar-form input[type="text"],
    .navbar-form input[type="password"] {
        width: 180px;
    }

        /* Wrapping element */
        /* Set some basic padding to keep content from hitting the edges */
    .body-content {
        padding-left: 15px;
        padding-right: 15px;
    }

        /* Responsive: Portrait tablets and up */
    @media screen and (min-width: 768px) {
        /* Let the jumbotron breathe */
        .jumbotron {
            margin-top: 20px;
        }
        /* Remove padding from wrapping element since we kick in the grid classes here */
        .body-content {
            padding: 0;
        }
    }
</style>-->
<div id="freeow" class="freeow freeow-bottom-right"></div>
<div class="navbar navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url()?>">Health Area 7 CKD Reports</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About : เกี่ยวกับเรา</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('reports')?>">Reports</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('Errors')?>"> Error </a>
                    </li>
                </ul>
                </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
</div>
<div class="container">
        <?php echo $content_for_layout?>
</div>




</body>
</html>
