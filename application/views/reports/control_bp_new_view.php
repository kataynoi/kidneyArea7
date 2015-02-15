<?php
/**
 * Created by JetBrains PhpStorm.
 * User: spiderman
 * Date: 25/11/2556
 * Time: 10:21 น.
 * To change this template use File | Settings | File Templates.
 */?>
<ul class="breadcrumb">
    <li><a href="<?php echo site_url()?>">หน้าหลัก </a></li>
    <li><a href="<?php echo site_url()."/reports/"?>">รายงาน</a></li>
    <li class="active">จำนวนผู้ป่วย  CKD Bp<130/80  Modify <span class='badge alert-danger'></span> <span class='badge alert-success'>ประมวล</span></li>
</ul>

<div class="navbar navbar-default">
    <form action="#" class="navbar-form">

        <select id="year" style="width: 180px;" class="form-control">
            <option>เลือกปี งบประมาณ</option>
            <?php
            $year=year();
            for($i=$year-3;$i<=$year;$i++){
                echo "<option value=".($i+543)."> ".($i+543)." </option>";
            }
            ?>

        </select>
        <label class="control-label"> จังหวัด </label>
        <select id="prov_code" style="width: 180px;" class="form-control">
            <option>เลือก จังหวัด</option>
            <?php
            foreach($prov as $v){
                echo '<option value='.$v->changwatcode.'>'.$v->changwatname.'</option>';
            }
            ?>

        </select>
        <div class="btn-group">
            <button type="button" class="btn btn-primary" id="btn_show">
                <i class="glyphicon glyphicon-search"></i> แสดง
            </button>
        </div>
    </form>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-fax fa-fw"></i></h3>
            </div>
            <div class="panel-body">
                <div id='chart'></div>
            </div>
        </div>
    </div>
</div>
<table class="table table-bordered " id='tbl_list'>
        <thead>
        <tr>
            <th rowspan="2">#</th>
            <th rowspan="2">ชื่อหน่วย</th>
            <th rowspan="2">จำนวน CKD </th>
             <th rowspan="2">จำนวน CKD ที่ได้รับการตรวจ BP </th>
             <th rowspan="2">ควบคุมระดับความดันโลหิตได้ดี</th>
            <th rowspan="2">ควบคุมระดับความดันโลหิตไม่ได้</th>

        </tr>

        </thead>
        <tbody>
        <tr>
            <td colspan="15">...</td>
        </tr>
        </tbody>
</table>
<ul class="pagination" id="main_paging"></ul>
<script type="text/javascript">
    $(function () {
        $('th').addClass('text-center');
    });
</script>
<script src="<?php echo base_url()?>assets/apps/js/reports.ckd.control_bp_new.js" charset="utf-8"></script>
<!--<script src="<?php /*echo base_url()*/?>assets/apps/js/basic.js" charset="utf-8"></script>-->
