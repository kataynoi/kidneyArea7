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
    <li class="active">จำนวนผู้ป่วย  CKD รายใหม่ <span class='badge alert-danger'></span> <span class='badge alert-success'>ประมวล</span></li>
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
<table class="table table-bordered " id='tbl_list_dmht'>
        <thead>
        <tr>
            <th rowspan="3">#</th>
            <th rowspan="3">ชื่อหน่วย</th>
            <th rowspan="3">จำนวน DM/HT เก่า</th>
            <th colspan="12">DM HT รายใหม่</th>
        </tr>
        <tr>
            <th colspan="3" id='year1'><?php echo (year()+543)-1;?></th>
            <th colspan="9"  id='year2'><?php echo (year()+543);?></th>
        </tr>
        <tr>
            <th>ต.ค</th>
            <th>พ.ย</th>
            <th>ธ.ค</th>
            <th>ม.ค</th>
            <th>ก.พ</th>
            <th>มี.ค</th>
            <th>เม.ษ</th>
            <th>พ.ค</th>
            <th>มิ.ย</th>
            <th>ก.ค</th>
            <th>ส.ค</th>
            <th>ก.ย.</th>
        </tr>

        </thead>
        <tbody>
        <tr>
            <td colspan="15">...</td>
        </tr>
        </tbody>
</table>

<table class="table table-bordered " id='tbl_list_ckd'>
        <thead>
        <tr>
            <th rowspan="3">#</th>
            <th rowspan="3">ชื่อหน่วย</th>
            <th rowspan="3">จำนวน CKD เก่า</th>
            <th colspan="12">CKD รายใหม่</th>
        </tr>
        <tr>
            <th colspan="3" id='year1'><?php echo (year()+543)-1;?></th>
            <th colspan="9"  id='year2'><?php echo (year()+543);?></th>
        </tr>
        <tr>
            <th>ต.ค</th>
            <th>พ.ย</th>
            <th>ธ.ค</th>
            <th>ม.ค</th>
            <th>ก.พ</th>
            <th>มี.ค</th>
            <th>เม.ษ</th>
            <th>พ.ค</th>
            <th>มิ.ย</th>
            <th>ก.ค</th>
            <th>ส.ค</th>
            <th>ก.ย.</th>
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
<script src="<?php echo base_url()?>assets/apps/js/reports.ckd.new_ckd.js" charset="utf-8"></script>
<!--<script src="<?php /*echo base_url()*/?>assets/apps/js/basic.js" charset="utf-8"></script>-->
