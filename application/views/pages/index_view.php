<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Dashboard <small>Statistics Overview</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge" id="ckd_total"><?php echo number_format($ckd->ckd_all);?></div>
                        <div>CKD</div>
                    </div>
                </div>
            </div>
            <a href="<?php echo site_url('patients/ckd')?>">
                <div class="panel-footer">
                    <span class="pull-left">รายละเอียด..</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge" id="dm_total"><?php echo number_format($dmht->dmht_all);?></div>
                        <div>DmHT total</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">รายละเอียด..</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge" id="ht_total">0</div>
                        <div>HT</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">รายละเอียด..</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-support fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge" id="ckd_dmht_total">0</div>
                        <div>CKD With DM OR HT</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Area Chart</h3>
            </div>
            <div class="panel-body">
                <div id="chart"></div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->


    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Tasks Panel</h3>
            </div>
            <div  id='chart2'>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> CKD All</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>จังหวัด</th>
                            <th> CKD </th>
                            <th> DM </th>
                            <th> HT </th>
                            <th> CKD With HTDM </th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td>มหาสารคาม</td>
                            <td><?php echo number_format($ckd->ckd_44);?></td>
                            <td></td>
                            <td></td><td></td>
                        </tr>
                        <tr>
                            <td>ขอนแก่น</td>
                            <td><?php echo number_format($ckd->ckd_40);?></td>
                            <td></td>
                            <td></td><td></td>
                        </tr>
                        <tr>
                            <td> ร้อยเอ็ด </td>
                            <td><?php echo number_format($ckd->ckd_45);?></td>
                            <td></td>
                            <td></td><td></td>
                        </tr>
                        <tr>
                            <td> กาฬสินธุ์ </td>
                            <td><?php echo number_format($ckd->ckd_46);?></td>
                            <td></td>
                            <td></td><td></td>
                        </tr>
                        <tr>
                            <td> รวม </td>
                            <td><?php echo number_format($ckd->ckd_40+$ckd->ckd_44+$ckd->ckd_46+$ckd->ckd_45);?></td>
                            <td></td>
                            <td></td><td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->

</div>
<script>
    var  ckd_40 = <?php echo $ckd->ckd_40; ?>;
    var  ckd_44 = <?php echo $ckd->ckd_44; ?>;
    var  ckd_45 = <?php echo $ckd->ckd_45; ?>;
    var  ckd_46 = <?php echo $ckd->ckd_46; ?>;
</script>
<script src="<?php echo base_url()?>assets/apps/js/dashboard.js" charset="utf-8"></script>
