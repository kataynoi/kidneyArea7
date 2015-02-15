<ul class="breadcrumb">
    <li><a href="<?php echo  site_url() ?>">หน้าหลัก </a></li>
    <li class="active"> เปลี่ยนรหัสผ่าน.</li>
</ul>
<?php
if($alert!=''){
    echo $alert;
}else{
?>
<div class="panel panel-default">
    <div class="panel-heading"><i class="glyphicon glyphicon-refresh"></i> เปลี่ยนรหัสผ่าน : Change Password</div>
    <div class="panel-body text-center">
        <form  class="form-horizontal" action=">" method="post">
            <!--<div class="row">
                <label class="col col-lg-2 control-label">รหัสผ่านเดิม </label>

                <div class="col col-lg-3">
                    <input type="text" id="oldPass" class="form-control"
                           placeholder="รหัสผ่านเดิม">
                </div>
            </div>
            <br>-->
            <div class='row'>
                <label class="col col-lg-2 control-label">Username </label>
                <div class="col col-lg-3">
                   <strong><?php echo $username;?></strong>
                </div>
            </div>
            <div class="row">
                <label class="col col-lg-2 control-label">รหัสผ่านใหม่</label>
                <div class="col col-lg-3">
                    <input type="password" id="newPass" name='newpassword' class="form-control"
                           placeholder="รหัสผ่านใหม่">
                </div>
            </div>
            <br>
            <div class="row">
                <label class="col col-lg-2 control-label">ยืนยันรหัสผ่านใหม่</label>
                <div class="col col-lg-3">
                    <input type="password" id="rePass" class="form-control"
                           placeholder="ยืนยันรหัสผ่านใหม่">
                    <input type="hidden" id="user_id" class="form-control" value="<?php echo $id?>">
                </div>
            </div>
        </form>
    </div>
    <div class="panel-footer">

        <button type="button" class="btn btn-primary" id="btn_save_pass">
            <i class="glyphicon glyphicon-floppy-save"></i> บันทึก
        </button>
    </div>
</div>
<script src="<?php echo base_url()?>assets/apps/js/users.js" charset="utf-8"></script>
<?php }?>