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
    <li class="active" > จำนวนผู้ป่วยที่มีระดับ HbA1c < 7 % Original<span class='badge alert-danger'></span> <span class='badge alert-success'>ประมวล</span></li>
</ul>

<div class="navbar navbar-default">
    <form action="#" class="navbar-form">

        <select id="year" style="width: 180px;" class="form-control">
            <option value="">เลือกปี งบประมาณ</option>
            <?php
            $year=year();
            for($i=$year-3;$i<=$year;$i++){
                echo "<option value=".($i+543)."> ".($i+543)." </option>";
            }
            ?>

        </select>
        <label class="control-label"> จังหวัด </label>
        <select id="prov_code" style="width: 180px;" class="form-control">
            <option value="">เลือก จังหวัด</option>
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
<div class="alert alert-success">
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
    <div id='how_to' ></div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-fax fa-fw"></i> Chart </h3>
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
            <th >#</th>
            <th >ชื่อหน่วย</th>
            <th >จำนวน DM </th>
            <th >จำนวน DM ที่ด้รับการตรวจ HbA1c</th>
            <th > HbA1c < 7 % </th>
            <th > HbA1c > 7 %</th>

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
<script src="<?php echo base_url()?>assets/apps/js/reports.ckd.dm_hba1c.js" charset="utf-8"></script>
<!--<script src="<?php /*echo base_url()*/?>assets/apps/js/basic.js" charset="utf-8"></script>-->
