<table class="table table-hover">
    <thead>
        <th>sdfsdf</th>
        <th></th>
        <th>sdfsdf</th>
        <th>sdfsdf</th>
        <th>sdfsdf</th>
    </thead>
    <tbody>

    <select id="prov_code" style="width: 180px;" class="form-control">
    <option>เลือก จังหวัด</option>
    <?php
    foreach($prov as $v){
        echo '<option value='.$v->changwatcode.'>'.$v->changwatname.'</option>';
    }
    ?>

    </select>
    </tbody>
</table>
<a class="btn btn-info"> <i class="fa fa-save fa-2x" ></i> <?php echo $t;?></a>