<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: spiderman
 * Date: 18/11/2556
 * Time: 11:10 น.
 * To change this template use File | Settings | File Templates.
 */

class Dashboard_model extends CI_Model
{
    public function get_ckd_dm_ht($year)
    {
        $rs = $this->db
        ->select('SUM(ckd_all) as ckd_all,SUM(IF(province_code="44",ckd_all,0) ) as ckd_44,SUM(IF(province_code="40",ckd_all,0) ) as ckd_40,SUM(IF(province_code="46",ckd_all,0) ) as ckd_46,SUM(IF(province_code="45",ckd_all,0) ) as ckd_45',false)
        ->where('year',$year)
        ->get('s_ckd_02_02_01_modify')
        ->row();
        return $rs;
    }
    public function get_dmht($year)
    {
        $rs = $this->db
        ->select('SUM(dmht) as dmht_all',false)
        ->where('year',$year)
        ->get('s_ckd_01_01')
        ->row();
        return $rs;
    }


}

/* End of file base_data_model.php */