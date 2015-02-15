s<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Patient model
 *
 * @author  Mr.Satit Rianpit <rianpit@yahoo.com>
 * @copyright   MKHO <http://mkho.moph.go.th>
 *
*/
class Import_model extends CI_Model {

#import Province
    public function import_ckd_01_01($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('how_to', $data->how_to)
            ->set('province_code',$prov_code)
            ->set('dmht', $data->dmht)
            ->set('year', $year)
            ->set('m10', $data->m10)
            ->set('m11', $data->m11)
            ->set('m12', $data->m12)
            ->set('m01', $data->m01)
            ->set('m02', $data->m02)
            ->set('m03', $data->m03)
            ->set('m04', $data->m04)
            ->set('m05', $data->m05)
            ->set('m06', $data->m06)
            ->set('m07', $data->m07)
            ->set('m08', $data->m08)
            ->set('m09', $data->m09)
            ->replace('s_ckd_01_01');
        return $rs;
    }
    public function import_ckd_01_02($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('how_to', $data->how_to)
            ->set('province_code',$prov_code)
            ->set('dmht_before', $data->dmht_before)
            ->set('year', $year)
            ->set('dmht_new_m10', $data->dmht_new_m10)
            ->set('dmht_new_m11', $data->dmht_new_m11)
            ->set('dmht_new_m12', $data->dmht_new_m12)
            ->set('dmht_new_m01', $data->dmht_new_m01)
            ->set('dmht_new_m02', $data->dmht_new_m02)
            ->set('dmht_new_m03', $data->dmht_new_m03)
            ->set('dmht_new_m04', $data->dmht_new_m04)
            ->set('dmht_new_m05', $data->dmht_new_m05)
            ->set('dmht_new_m06', $data->dmht_new_m06)
            ->set('dmht_new_m07', $data->dmht_new_m07)
            ->set('dmht_new_m08', $data->dmht_new_m08)
            ->set('dmht_new_m09', $data->dmht_new_m09)
            ->set('ckd_before', $data->ckd_before)
            ->set('ckd_new_m10', $data->ckd_new_m10)
            ->set('ckd_new_m11', $data->ckd_new_m11)
            ->set('ckd_new_m12', $data->ckd_new_m12)
            ->set('ckd_new_m01', $data->ckd_new_m01)
            ->set('ckd_new_m02', $data->ckd_new_m02)
            ->set('ckd_new_m03', $data->ckd_new_m03)
            ->set('ckd_new_m04', $data->ckd_new_m04)
            ->set('ckd_new_m05', $data->ckd_new_m05)
            ->set('ckd_new_m06', $data->ckd_new_m06)
            ->set('ckd_new_m07', $data->ckd_new_m07)
            ->set('ckd_new_m08', $data->ckd_new_m08)
            ->set('ckd_new_m09', $data->ckd_new_m09)
            ->replace('s_ckd_01_02');
        return $rs;
    }
    public function import_ckd_02_02_01_original($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('how_to', $data->how_to)
            ->set('province_code',$prov_code)
            ->set('ckd_all', $data->ckd_all)
            ->set('year', $year)
            ->set('ckd_bp', $data->ckd_bp)
            ->set('ckd_bp_ok', $data->ckd_bp_ok)
            ->set('ckd_bp_not_ok', $data->ckd_bp_not_ok)
            ->replace('s_ckd_02_02_01_original');
        return $rs;
    }
    public function import_ckd_02_02_01_modify($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('how_to', $data->how_to)
            ->set('province_code',$prov_code)
            ->set('ckd_all', $data->ckd_all)
            ->set('year', $year)
            ->set('ckd_bp', $data->ckd_bp)
            ->set('ckd_bp_ok', $data->ckd_bp_ok)
            ->set('ckd_bp_not_ok', $data->ckd_bp_not_ok)
            ->replace('s_ckd_02_02_01_modify');
        return $rs;
    }
    public function import_ckd_02_02_02($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('how_to', $data->how_to)
            ->set('province_code',$prov_code)
            ->set('ckd_all', $data->ckd_all)
            ->set('year', $year)
            ->set('ckd_recieve_drug', $data->ckd_recieve_drug)
            ->set('ckd_not_recieve_drug', $data->ckd_not_recieve_drug)
            ->set('remark', $data->remark)
            ->replace('s_ckd_02_02_02');
        return $rs;
    }
    public function import_ckd_02_02_04($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('how_to', $data->how_to)
            ->set('province_code',$prov_code)
            ->set('ckd_all', $data->ckd_all)
            ->set('year', $year)
            ->set('ckd_hb', $data->ckd_hb)
            ->set('ckd_hb_ok', $data->ckd_hb_ok)
            ->set('ckd_hb_not_ok', $data->ckd_hb_not_ok)
            ->replace('s_ckd_02_02_04');
        return $rs;
    }
    public function import_ckd_02_02_05_original($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('how_to', $data->how_to)
            ->set('province_code',$prov_code)
            ->set('dm_all', $data->dm_all)
            ->set('year', $year)
            ->set('dm_hba1c', $data->dm_hba1c)
            ->set('dm_hba1c_ok', $data->dm_hba1c_ok)
            ->set('dm_hba1c_not_ok', $data->dm_hba1c_not_ok)
            ->replace('s_ckd_02_02_05_original');
        return $rs;
    }
    public function import_ckd_02_02_05_modify($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('how_to', $data->how_to)
            ->set('province_code',$prov_code)
            ->set('dm_all', $data->dm_all)
            ->set('year', $year)
            ->set('dm_hba1c', $data->dm_hba1c)
            ->set('dm_hba1c_ok', $data->dm_hba1c_ok)
            ->set('dm_hba1c_not_ok', $data->dm_hba1c_not_ok)
            ->replace('s_ckd_02_02_05_modify');
        return $rs;
    }
    public function import_ckd_02_02_06_modify($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('how_to', $data->how_to)
            ->set('province_code',$prov_code)
            ->set('ckd_all', $data->ckd_all)
            ->set('year', $year)
            ->set('ckd_ldl', $data->ckd_ldl)
            ->set('ckd_ldl_ok', $data->ckd_ldl_ok)
            ->set('ckd_ldl_not_ok', $data->ckd_ldl_not_ok)
            ->replace('s_ckd_02_02_06_modify');
        return $rs;
    }
    public function import_ckd_02_02_06_original($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('how_to', $data->how_to)
            ->set('province_code',$prov_code)
            ->set('ckd_all', $data->ckd_all)
            ->set('year', $year)
            ->set('ckd_ldl', $data->ckd_ldl)
            ->set('ckd_ldl_ok', $data->ckd_ldl_ok)
            ->set('ckd_ldl_not_ok', $data->ckd_ldl_not_ok)
            ->replace('s_ckd_02_02_06_original');
        return $rs;
    }
    public function import_ckd_02_02_07($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('how_to', $data->how_to)
            ->set('province_code',$prov_code)
            ->set('ckd_all', $data->ckd_all)
            ->set('year', $year)
            ->set('ckd_k', $data->ckd_k)
            ->set('ckd_k_ok', $data->ckd_k_ok)
            ->set('ckd_k_not_ok', $data->ckd_k_not_ok)
            ->replace('s_ckd_02_02_07');
        return $rs;
    }
    public function import_ckd_02_02_08($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('how_to', $data->how_to)
            ->set('province_code',$prov_code)
            ->set('ckd_all', $data->ckd_all)
            ->set('year', $year)
            ->set('ckd_tco2', $data->ckd_tco2)
            ->set('ckd_tco2_ok', $data->ckd_tco2_ok)
            ->set('ckd_tco2_not_ok', $data->ckd_tco2_not_ok)
            ->replace('s_ckd_02_02_08');
        return $rs;
    }
    public function import_ckd_02_02_09_original($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('how_to', $data->how_to)
            ->set('province_code',$prov_code)
            ->set('ckd_all', $data->ckd_all)
            ->set('year', $year)
            ->set('ckd_uprotein_test', $data->ckd_uprotein_test)
            ->set('ckd_uprotein_not_test', $data->ckd_uprotein_not_test)
            ->replace('s_ckd_02_02_09_original');
        return $rs;
    }
    public function import_ckd_02_02_09_modify($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('how_to', $data->how_to)
            ->set('province_code',$prov_code)
            ->set('ckd_all', $data->ckd_all)
            ->set('year', $year)
            ->set('ckd_uprotein_test', $data->ckd_uprotein_test)
            ->set('ckd_uprotein_not_test', $data->ckd_uprotein_not_test)
            ->replace('s_ckd_02_02_09_modify');
        return $rs;
    }
    public function import_ckd_02_02_10($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('how_to', $data->how_to)
            ->set('province_code',$prov_code)
            ->set('ckd_all', $data->ckd_all)
            ->set('year', $year)
            ->set('ckd_upcr_test', $data->ckd_upcr_test)
            ->set('ckd_upcr_not_test', $data->ckd_upcr_not_test)
            ->replace('s_ckd_02_02_10');
        return $rs;
    }
    public function import_ckd_02_02_11($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('how_to', $data->how_to)
            ->set('province_code',$prov_code)
            ->set('ckd_all', $data->ckd_all)
            ->set('year', $year)
            ->set('ckd_upcr', $data->ckd_upcr)
            ->set('ckd_upcr_ok', $data->ckd_upcr_ok)
            ->set('ckd_upcr_not_ok', $data->ckd_upcr_not_ok)
            ->replace('s_ckd_02_02_11');
        return $rs;
    }
    public function import_ckd_02_02_12($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('how_to', $data->how_to)
            ->set('province_code',$prov_code)
            ->set('ckd_all', $data->ckd_all)
            ->set('year', $year)
            ->set('ckd_po4', $data->ckd_po4)
            ->set('ckd_po4_ok', $data->ckd_po4_ok)
            ->set('ckd_po4_not_ok', $data->ckd_po4_not_ok)
            ->replace('s_ckd_02_02_12');
        return $rs;
    }
    public function import_ckd_02_02_13_stage3($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('how_to', $data->how_to)
            ->set('province_code',$prov_code)
            ->set('result_all', $data->result_all)
            ->set('year', $year)
            ->set('result_ok', $data->result_ok)
            ->set('result_not_ok', $data->result_not_ok)
            ->replace('s_ckd_02_02_13_stage3');
        return $rs;
    }
    public function import_ckd_02_02_13_stage4($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('how_to', $data->how_to)
            ->set('province_code',$prov_code)
            ->set('result_all', $data->result_all)
            ->set('year', $year)
            ->set('result_ok', $data->result_ok)
            ->set('result_not_ok', $data->result_not_ok)
            ->replace('s_ckd_02_02_13_stage4');
        return $rs;
    }
    public function import_ckd_02_02_13_stage5($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('how_to', $data->how_to)
            ->set('province_code',$prov_code)
            ->set('result_all', $data->result_all)
            ->set('year', $year)
            ->set('result_ok', $data->result_ok)
            ->set('result_not_ok', $data->result_not_ok)
            ->replace('s_ckd_02_02_13_stage5');
        return $rs;
    }
    public function import_ckd_02_02_15($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('how_to', $data->how_to)
            ->set('province_code',$prov_code)
            ->set('ckd_all', $data->ckd_all)
            ->set('year', $year)
            ->set('diag_ok', $data->diag_ok)
            ->set('diag_not_ok', $data->diag_not_ok)
            ->replace('s_ckd_02_02_15');
        return $rs;
    }






 #iImport Hcup
    public function import_hcup_ckd_01_01($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('province_code',$prov_code)
            ->set('hcup', $data->hcup)
            ->set('dmht', $data->dmht)
            ->set('year', $year)
            ->set('m10', $data->m10)
            ->set('m11', $data->m11)
            ->set('m12', $data->m12)
            ->set('m01', $data->m01)
            ->set('m02', $data->m02)
            ->set('m03', $data->m03)
            ->set('m04', $data->m04)
            ->set('m05', $data->m05)
            ->set('m06', $data->m06)
            ->set('m07', $data->m07)
            ->set('m08', $data->m08)
            ->set('m09', $data->m09)
            ->replace('s_hcup_ckd_01_01');
        return $rs;
    }
    public function import_hcup_ckd_01_02($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('province_code',$prov_code)
            ->set('hcup', $data->hcup)
            ->set('dmht_before', $data->dmht_before)
            ->set('year', $year)
            ->set('dmht_new_m10', $data->dmhtm10)
            ->set('dmht_new_m11', $data->dmhtm11)
            ->set('dmht_new_m12', $data->dmhtm12)
            ->set('dmht_new_m01', $data->dmhtm01)
            ->set('dmht_new_m02', $data->dmhtm02)
            ->set('dmht_new_m03', $data->dmhtm03)
            ->set('dmht_new_m04', $data->dmhtm04)
            ->set('dmht_new_m05', $data->dmhtm05)
            ->set('dmht_new_m06', $data->dmhtm06)
            ->set('dmht_new_m07', $data->dmhtm07)
            ->set('dmht_new_m08', $data->dmhtm08)
            ->set('dmht_new_m09', $data->dmhtm09)
            ->set('ckd_before', $data->ckd_before)
            ->set('ckd_new_m10', $data->ckdm10)
            ->set('ckd_new_m11', $data->ckdm11)
            ->set('ckd_new_m12', $data->ckdm12)
            ->set('ckd_new_m01', $data->ckdm01)
            ->set('ckd_new_m02', $data->ckdm02)
            ->set('ckd_new_m03', $data->ckdm03)
            ->set('ckd_new_m04', $data->ckdm04)
            ->set('ckd_new_m05', $data->ckdm05)
            ->set('ckd_new_m06', $data->ckdm06)
            ->set('ckd_new_m07', $data->ckdm07)
            ->set('ckd_new_m08', $data->ckdm08)
            ->set('ckd_new_m09', $data->ckdm09)
            ->replace('s_hcup_ckd_01_02');
        return $rs;
    }
    public function import_hcup_ckd_02_02_01_original($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('province_code',$prov_code)
            ->set('hcup', $data->hcup)
            ->set('ckd_all', $data->ckd_all)
            ->set('year', $year)
            ->set('ckd_bp', $data->ckd_bp)
            ->set('ckd_bp_ok', $data->ckd_bp_ok)
            ->set('ckd_bp_not_ok', $data->ckd_bp_not_ok)
            ->replace('s_hcup_ckd_02_02_01_original');
        return $rs;
    }
    public function import_hcup_ckd_02_02_01_modify($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('province_code',$prov_code)
            ->set('hcup', $data->hcup)
            ->set('ckd_all', $data->ckd_all)
            ->set('year', $year)
            ->set('ckd_bp', $data->ckd_bp)
            ->set('ckd_bp_ok', $data->ckd_bp_ok)
            ->set('ckd_bp_not_ok', $data->ckd_bp_not_ok)
            ->replace('s_hcup_ckd_02_02_01_modify');
        return $rs;
    }
    public function import_hcup_ckd_02_02_02($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('province_code',$prov_code)
            ->set('hcup', $data->hcup)
            ->set('ckd_all', $data->ckd_all)
            ->set('year', $year)
            ->set('ckd_recieve_drug', $data->ckd_recieve_drug)
            ->set('ckd_not_recieve_drug', $data->ckd_not_recieve_drug)
            ->replace('s_hcup_ckd_02_02_02');
        return $rs;
    }
    public function import_hcup_ckd_02_02_04($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('province_code',$prov_code)
            ->set('hcup', $data->hcup)
            ->set('ckd_all', $data->ckd_all)
            ->set('year', $year)
            ->set('ckd_hb', $data->ckd_hb)
            ->set('ckd_hb_ok', $data->ckd_hb_ok)
            ->set('ckd_hb_not_ok', $data->ckd_hb_not_ok)
            ->replace('s_hcup_ckd_02_02_04');
        return $rs;
    }
    public function import_hcup_ckd_02_02_05_original($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('province_code',$prov_code)
            ->set('hcup', $data->hcup)
            ->set('dm_all', $data->dm_all)
            ->set('year', $year)
            ->set('dm_hba1c', $data->dm_hba1c)
            ->set('dm_hba1c_ok', $data->dm_hba1c_ok)
            ->set('dm_hba1c_not_ok', $data->dm_hba1c_not_ok)
            ->replace('s_hcup_ckd_02_02_05_original');
        return $rs;
    }
    public function import_hcup_ckd_02_02_05_modify($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('province_code',$prov_code)
            ->set('hcup', $data->hcup)
            ->set('dm_all', $data->dm_all)
            ->set('year', $year)
            ->set('dm_hba1c', $data->dm_hba1c)
            ->set('dm_hba1c_ok', $data->dm_hba1c_ok)
            ->set('dm_hba1c_not_ok', $data->dm_hba1c_not_ok)
            ->replace('s_hcup_ckd_02_02_05_modify');
        return $rs;
    }
    public function import_hcup_ckd_02_02_06_modify($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('province_code',$prov_code)
            ->set('hcup', $data->hcup)
            ->set('ckd_all', $data->ckd_all)
            ->set('year', $year)
            ->set('ckd_ldl', $data->ckd_ldl)
            ->set('ckd_ldl_ok', $data->ckd_ldl_ok)
            ->set('ckd_ldl_not_ok', $data->ckd_ldl_not_ok)
            ->replace('s_hcup_ckd_02_02_06_modify');
        return $rs;
    }
    public function import_hcup_ckd_02_02_06_original($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('province_code',$prov_code)
            ->set('hcup', $data->hcup)
            ->set('ckd_all', $data->ckd_all)
            ->set('year', $year)
            ->set('ckd_ldl', $data->ckd_ldl)
            ->set('ckd_ldl_ok', $data->ckd_ldl_ok)
            ->set('ckd_ldl_not_ok', $data->ckd_ldl_not_ok)
            ->replace('s_hcup_ckd_02_02_06_original');
        return $rs;
    }
    public function import_hcup_ckd_02_02_07($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('province_code',$prov_code)
            ->set('hcup', $data->hcup)
            ->set('ckd_all', $data->ckd_all)
            ->set('year', $year)
            ->set('ckd_k', $data->ckd_k)
            ->set('ckd_k_ok', $data->ckd_k_ok)
            ->set('ckd_k_not_ok', $data->ckd_k_not_ok)
            ->replace('s_hcup_ckd_02_02_07');
        return $rs;
    }
    public function import_hcup_ckd_02_02_08($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('province_code',$prov_code)
            ->set('hcup', $data->hcup)
            ->set('ckd_all', $data->ckd_all)
            ->set('year', $year)
            ->set('ckd_tco2', $data->ckd_tco2)
            ->set('ckd_tco2_ok', $data->ckd_tco2_ok)
            ->set('ckd_tco2_not_ok', $data->ckd_tco2_not_ok)
            ->replace('s_hcup_ckd_02_02_08');
        return $rs;
    }
    public function import_hcup_ckd_02_02_09_original($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('province_code',$prov_code)
            ->set('hcup', $data->hcup)
            ->set('ckd_all', $data->ckd_all)
            ->set('year', $year)
            ->set('ckd_uprotein_test', $data->ckd_uprotein_test)
            ->set('ckd_uprotein_not_test', $data->ckd_uprotein_not_test)
            ->replace('s_hcup_ckd_02_02_09_original');
        return $rs;
    }
    public function import_hcup_ckd_02_02_09_modify($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('province_code',$prov_code)
            ->set('hcup', $data->hcup)
            ->set('ckd_all', $data->ckd_all)
            ->set('year', $year)
            ->set('ckd_uprotein_test', $data->ckd_uprotein_test)
            ->set('ckd_uprotein_not_test', $data->ckd_uprotein_not_test)
            ->replace('s_hcup_ckd_02_02_09_modify');
        return $rs;
    }
    public function import_hcup_ckd_02_02_10($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('province_code',$prov_code)
            ->set('hcup', $data->hcup)
            ->set('ckd_all', $data->ckd_all)
            ->set('year', $year)
            ->set('ckd_upcr_test', $data->ckd_upcr_test)
            ->set('ckd_upcr_not_test', $data->ckd_upcr_not_test)
            ->replace('s_hcup_ckd_02_02_10');
        return $rs;
    }
    public function import_hcup_ckd_02_02_11($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('province_code',$prov_code)
            ->set('hcup', $data->hcup)
            ->set('ckd_all', $data->ckd_all)
            ->set('year', $year)
            ->set('ckd_upcr', $data->ckd_upc)
            ->set('ckd_upcr_ok', $data->ckd_upcr_ok)
            ->set('ckd_upcr_not_ok', $data->ckd_upcr_not_ok)
            ->replace('s_hcup_ckd_02_02_11');
        return $rs;
    }
    public function import_hcup_ckd_02_02_12($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('province_code',$prov_code)
            ->set('hcup', $data->hcup)
            ->set('ckd_all', $data->ckd_all)
            ->set('year', $year)
            ->set('ckd_po4', $data->ckd_po4)
            ->set('ckd_po4_ok', $data->ckd_po4_ok)
            ->set('ckd_po4_not_ok', $data->ckd_po4_not_ok)
            ->replace('s_hcup_ckd_02_02_12');
        return $rs;
    }
    public function import_hcup_ckd_02_02_13_stage3($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('province_code',$prov_code)
            ->set('hcup', $data->hcup)
            ->set('result_all', $data->result_all)
            ->set('year', $year)
            ->set('result_ok', $data->result_ok)
            ->set('result_not_ok', $data->result_not_ok)
            ->replace('s_hcup_ckd_02_02_13_stage3');
        return $rs;
    }
    public function import_hcup_ckd_02_02_13_stage4($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('province_code',$prov_code)
            ->set('hcup', $data->hcup)
            ->set('result_all', $data->result_all)
            ->set('year', $year)
            ->set('result_ok', $data->result_ok)
            ->set('result_not_ok', $data->result_not_ok)
            ->replace('s_hcup_ckd_02_02_13_stage4');
        return $rs;
    }
    public function import_hcup_ckd_02_02_13_stage5($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('province_code',$prov_code)
            ->set('hcup', $data->hcup)
            ->set('result_all', $data->result_all)
            ->set('year', $year)
            ->set('result_ok', $data->result_ok)
            ->set('result_not_ok', $data->result_not_ok)
            ->replace('s_hcup_ckd_02_02_13_stage5');
        return $rs;
    }
    public function import_hcup_ckd_02_02_15($data,$year,$prov_code)
    {
        $rs = $this->db
            ->set('province_code',$prov_code)
            ->set('hcup', $data->hcup)
            ->set('ckd_all', $data->ckd_all)
            ->set('year', $year)
            ->set('diag_ok', $data->diag_ok)
            ->set('diag_not_ok', $data->diag_not_ok)
            ->replace('s_hcup_ckd_02_02_15');
        return $rs;
    }
}
/* End of file patient_model.php */
/* Location: ./applcation/models/patient_model.php */