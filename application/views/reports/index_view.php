<ul class="breadcrumb" xmlns="http://www.w3.org/1999/html">
    <li><a href="<?php echo site_url()?>">หน้าหลัก</a> </li>
    <li class="active">รายงาน</li>
</ul>
<table class='table'>
    <thead>
        <th>#</th>
        <th> ชื่อรายงาน </th>
        <th> หมายเหตุ</th>
    </thead>
<tbody>
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: spiderman
 * Date: 30/5/2556
 * Time: 13:53 น.
 * To change this template use File | Settings | File Templates.
 */
$no=1;
foreach($reports_item as $r) {
    echo '<tr><td>'.$no.'</td><td> <a href="'.site_url($r->link).'">'.$r->name.'</td><td>'.$r->memo.'</td></tr>';
    $no++;
}
?></tbody>
</table>
<div class="flag flag-th" alt="Thailand" title="Thailand" data-rel="tooltip"></div>