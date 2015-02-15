<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Patient model
 *
 * @author  Mr.Satit Rianpit <rianpit@yahoo.com>
 * @copyright   MKHO <http://mkho.moph.go.th>
 *
*/
class Reports_model extends CI_Model {

    public $hospcode;
    public $cup_code;
    public $provcode;
    public $year;


    public function get_reports_list($id){
        $rs = $this->db
            ->where('a.group',$id)
            ->get('reports a')
            ->result();
        return $rs;
    }
    public function get_ckd($id){
        $rs = $this->db
            ->where('a.group',$id)
            ->get('reports a')
            ->result();
        return $rs;
    }
    public function get_screen_ckd($year){
        $rs = $this->db
            ->select('a.*,b.changwatname as name')
            ->where('a.year',$year)
            ->join('cchangwat b','a.province_code=b.changwatcode')
            ->get('s_ckd_01_01 a')
            ->result();
        return $rs;
    }
    public function get_screen_ckd_by_prov($year,$provcode){
        $rs = $this->db
            ->select('a.*,b.hosname as name')
            ->where('a.year',$year)
            ->where('a.province_code',$provcode)
            ->join('chospital b','a.hcup=b.hoscode')
            ->get('s_hcup_ckd_01_01 a')
            ->result();
        return $rs;
    }
    // #### ckd_01_01
    public function get_new_ckd($year){
        $rs = $this->db
            ->select('a.*,b.changwatname as name')
            ->where('a.year',$year)
            ->join('cchangwat b','a.province_code=b.changwatcode')
            ->get('s_ckd_01_02 a')
            ->result();
        return $rs;
    }
    public function get_new_ckd_by_prov($year,$provcode){
        $rs = $this->db
            ->select('a.*,b.hosname as name')
            ->where('a.year',$year)
            ->where('a.province_code',$provcode)
            ->join('chospital b','a.hcup=b.hoscode')
            ->get('s_hcup_ckd_01_02 a')
            ->result();
        return $rs;
    }
    // #### ckd_01_02_orliginal
    public function get_control_bp_original($year){
        $rs = $this->db
            ->select('a.*,b.changwatname as name')
            ->where('a.year',$year)
            ->join('cchangwat b','a.province_code=b.changwatcode')
            ->get('s_ckd_02_02_01_original a')
            ->result();
        return $rs;
    }
    public function get_control_bp_original_by_prov($year,$provcode){
        $rs = $this->db
            ->select('a.*,b.hosname as name')
            ->where('a.year',$year)
            ->where('a.province_code',$provcode)
            ->join('chospital b','a.hcup=b.hoscode')
            ->get('s_hcup_ckd_02_02_01_original a')
            ->result();
        return $rs;
    }
    // #### ckd_01_02_Modify
    public function get_control_bp_modify($year){
        $rs = $this->db
            ->select('a.*,b.changwatname as name')
            ->where('a.year',$year)
            ->join('cchangwat b','a.province_code=b.changwatcode')
            ->get('s_ckd_02_02_01_modify a')
            ->result();
        return $rs;
    }
    public function get_control_bp_modify_by_prov($year,$provcode){
        $rs = $this->db
            ->select('a.*,b.hosname as name')
            ->where('a.year',$year)
            ->where('a.province_code',$provcode)
            ->join('chospital b','a.hcup=b.hoscode')
            ->get('s_hcup_ckd_02_02_01_modify a')
            ->result();
        return $rs;
    }
// #### ckd_02_02_02
    public function get_receive_drug($year){
        $rs = $this->db
            ->select('a.*,b.changwatname as name')
            ->where('a.year',$year)
            ->join('cchangwat b','a.province_code=b.changwatcode')
            ->get('s_ckd_02_02_02 a')
            ->result();
        return $rs;
    }
    public function get_receive_drug_by_prov($year,$provcode){
        $rs = $this->db
            ->select('a.*,b.hosname as name')
            ->where('a.year',$year)
            ->where('a.province_code',$provcode)
            ->join('chospital b','a.hcup=b.hoscode')
            ->get('s_hcup_ckd_02_02_02 a')
            ->result();
        return $rs;
    }
    // #### ckd_02_02_04
    public function get_control_hb($year){
        $rs = $this->db
            ->select('a.*,b.changwatname as name')
            ->where('a.year',$year)
            ->join('cchangwat b','a.province_code=b.changwatcode')
            ->get('s_ckd_02_02_04 a')
            ->result();
        return $rs;
    }
    public function get_control_hb_by_prov($year,$provcode){
        $rs = $this->db
            ->select('a.*,b.hosname as name')
            ->where('a.year',$year)
            ->where('a.province_code',$provcode)
            ->join('chospital b','a.hcup=b.hoscode')
            ->get('s_hcup_ckd_02_02_04 a')
            ->result();
        return $rs;
    }

    // #### ckd_02_02_05_original
    public function get_dm_hba1c_original($year){
        $rs = $this->db
            ->select('a.*,b.changwatname as name')
            ->where('a.year',$year)
            ->join('cchangwat b','a.province_code=b.changwatcode')
            ->get('s_ckd_02_02_05_original a')
            ->result();
        return $rs;
    }
    public function get_dm_hba1c_original_by_prov($year,$provcode){
        $rs = $this->db
            ->select('a.*,b.hosname as name')
            ->where('a.year',$year)
            ->where('a.province_code',$provcode)
            ->join('chospital b','a.hcup=b.hoscode')
            ->get('s_hcup_ckd_02_02_05_original a')
            ->result();
        return $rs;
    }

    // #### ckd_02_02_05_modify
    public function get_dm_hba1c_modify($year){
        $rs = $this->db
            ->select('a.*,b.changwatname as name')
            ->where('a.year',$year)
            ->join('cchangwat b','a.province_code=b.changwatcode')
            ->get('s_ckd_02_02_05_modify a')
            ->result();
        return $rs;
    }
    public function get_dm_hba1c_modify_by_prov($year,$provcode){
        $rs = $this->db
            ->select('a.*,b.hosname as name')
            ->where('a.year',$year)
            ->where('a.province_code',$provcode)
            ->join('chospital b','a.hcup=b.hoscode')
            ->get('s_hcup_ckd_02_02_05_modify a')
            ->result();
        return $rs;
    }
    // #### ckd_02_02_06_original
    public function get_ldl_original($year){
        $rs = $this->db
            ->select('a.*,b.changwatname as name')
            ->where('a.year',$year)
            ->join('cchangwat b','a.province_code=b.changwatcode')
            ->get('s_ckd_02_02_06_original a')
            ->result();
        return $rs;
    }
    public function get_ldl_original_by_prov($year,$provcode){
        $rs = $this->db
            ->select('a.*,b.hosname as name')
            ->where('a.year',$year)
            ->where('a.province_code',$provcode)
            ->join('chospital b','a.hcup=b.hoscode')
            ->get('s_hcup_ckd_02_02_06_original a')
            ->result();
        return $rs;
    }

    // #### ckd_02_02_06_modify
    public function get_ldl_modify($year){
        $rs = $this->db
            ->select('a.*,b.changwatname as name')
            ->where('a.year',$year)
            ->join('cchangwat b','a.province_code=b.changwatcode')
            ->get('s_ckd_02_02_06_modify a')
            ->result();
        return $rs;
    }
    public function get_ldl_modify_by_prov($year,$provcode){
        $rs = $this->db
            ->select('a.*,b.hosname as name')
            ->where('a.year',$year)
            ->where('a.province_code',$provcode)
            ->join('chospital b','a.hcup=b.hoscode')
            ->get('s_hcup_ckd_02_02_06_modify a')
            ->result();
        return $rs;
    }

    // #### ckd_02_02_07  SerumK
    public function get_SerumK($year){
        $rs = $this->db
            ->select('a.*,b.changwatname as name')
            ->where('a.year',$year)
            ->join('cchangwat b','a.province_code=b.changwatcode')
            ->get('s_ckd_02_02_07 a')
            ->result();
        return $rs;
    }
    public function get_SerumK_by_prov($year,$provcode){
        $rs = $this->db
            ->select('a.*,b.hosname as name')
            ->where('a.year',$year)
            ->where('a.province_code',$provcode)
            ->join('chospital b','a.hcup=b.hoscode')
            ->get('s_hcup_ckd_02_02_07 a')
            ->result();
        return $rs;
    }

// #### ckd_02_02_08  SerumHCO3
    public function get_SerumHCO3($year){
        $rs = $this->db
            ->select('a.*,b.changwatname as name')
            ->where('a.year',$year)
            ->join('cchangwat b','a.province_code=b.changwatcode')
            ->get('s_ckd_02_02_08 a')
            ->result();
        return $rs;
    }
    public function get_SerumHCO3_by_prov($year,$provcode){
        $rs = $this->db
            ->select('a.*,b.hosname as name')
            ->where('a.year',$year)
            ->where('a.province_code',$provcode)
            ->join('chospital b','a.hcup=b.hoscode')
            ->get('s_hcup_ckd_02_02_08 a')
            ->result();
        return $rs;
    }

// #### ckd_02_02_09  SerumHCO3
    public function get_test_urineprotein_original($year){
        $rs = $this->db
            ->select('a.*,b.changwatname as name')
            ->where('a.year',$year)
            ->join('cchangwat b','a.province_code=b.changwatcode')
            ->get('s_ckd_02_02_09_original a')
            ->result();
        return $rs;
    }
    public function get_test_urineprotein_original_by_prov($year,$provcode){
        $rs = $this->db
            ->select('a.*,b.hosname as name')
            ->where('a.year',$year)
            ->where('a.province_code',$provcode)
            ->join('chospital b','a.hcup=b.hoscode')
            ->get('s_hcup_ckd_02_02_09_original a')
            ->result();
        return $rs;
    }

    // #### ckd_02_02_09_modify  SerumHCO3
    public function get_test_urineprotein_modify($year){
        $rs = $this->db
            ->select('a.*,b.changwatname as name')
            ->where('a.year',$year)
            ->join('cchangwat b','a.province_code=b.changwatcode')
            ->get('s_ckd_02_02_09_modify a')
            ->result();
        return $rs;
    }
    public function get_test_urineprotein_modify_by_prov($year,$provcode){
        $rs = $this->db
            ->select('a.*,b.hosname as name')
            ->where('a.year',$year)
            ->where('a.province_code',$provcode)
            ->join('chospital b','a.hcup=b.hoscode')
            ->get('s_hcup_ckd_02_02_09_modify a')
            ->result();
        return $rs;
    }

// #### ckd_02_02_10  urcr_test
    public function get_test_upcr($year){
        $rs = $this->db
            ->select('a.*,b.changwatname as name')
            ->where('a.year',$year)
            ->join('cchangwat b','a.province_code=b.changwatcode')
            ->get('s_ckd_02_02_10 a')
            ->result();
        return $rs;
    }
    public function get_test_upcr_by_prov($year,$provcode){
        $rs = $this->db
            ->select('a.*,b.hosname as name')
            ->where('a.year',$year)
            ->where('a.province_code',$provcode)
            ->join('chospital b','a.hcup=b.hoscode')
            ->get('s_hcup_ckd_02_02_10 a')
            ->result();
        return $rs;
    }

// #### ckd_02_02_11  urcr_Control
    public function get_control_upcr($year){
        $rs = $this->db
            ->select('a.*,b.changwatname as name')
            ->where('a.year',$year)
            ->join('cchangwat b','a.province_code=b.changwatcode')
            ->get('s_ckd_02_02_11 a')
            ->result();
        return $rs;
    }
    public function get_control_upcr_by_prov($year,$provcode){
        $rs = $this->db
            ->select('a.*,b.hosname as name')
            ->where('a.year',$year)
            ->where('a.province_code',$provcode)
            ->join('chospital b','a.hcup=b.hoscode')
            ->get('s_hcup_ckd_02_02_11 a')
            ->result();
        return $rs;
    }

// #### ckd_02_02_12  urcr_serumPO4
    public function get_control_serumPO4($year){
        $rs = $this->db
            ->select('a.*,b.changwatname as name')
            ->where('a.year',$year)
            ->join('cchangwat b','a.province_code=b.changwatcode')
            ->get('s_ckd_02_02_12 a')
            ->result();
        return $rs;
    }
    public function get_control_serumPO4_by_prov($year,$provcode){
        $rs = $this->db
            ->select('a.*,b.hosname as name')
            ->where('a.year',$year)
            ->where('a.province_code',$provcode)
            ->join('chospital b','a.hcup=b.hoscode')
            ->get('s_hcup_ckd_02_02_12 a')
            ->result();
        return $rs;
    }
// #### ckd_02_02_13  iPTH3
    public function get_control_iPTH3($year){
        $rs = $this->db
            ->select('a.*,b.changwatname as name')
            ->where('a.year',$year)
            ->join('cchangwat b','a.province_code=b.changwatcode')
            ->get('s_ckd_02_02_13_stage3 a')
            ->result();
        return $rs;
    }
    public function get_control_iPTH3_by_prov($year,$provcode){
        $rs = $this->db
            ->select('a.*,b.hosname as name')
            ->where('a.year',$year)
            ->where('a.province_code',$provcode)
            ->join('chospital b','a.hcup=b.hoscode')
            ->get('s_hcup_ckd_02_02_13_stage3 a')
            ->result();
        return $rs;
    }

    // #### ckd_02_02_13  iPTH4
    public function get_control_iPTH4($year){
        $rs = $this->db
            ->select('a.*,b.changwatname as name')
            ->where('a.year',$year)
            ->join('cchangwat b','a.province_code=b.changwatcode')
            ->get('s_ckd_02_02_13_stage4 a')
            ->result();
        return $rs;
    }
    public function get_control_iPTH4_by_prov($year,$provcode){
        $rs = $this->db
            ->select('a.*,b.hosname as name')
            ->where('a.year',$year)
            ->where('a.province_code',$provcode)
            ->join('chospital b','a.hcup=b.hoscode')
            ->get('s_hcup_ckd_02_02_13_stage4 a')
            ->result();
        return $rs;
    }

// #### ckd_02_02_13  iPTH5
    public function get_control_iPTH5($year){
        $rs = $this->db
            ->select('a.*,b.changwatname as name')
            ->where('a.year',$year)
            ->join('cchangwat b','a.province_code=b.changwatcode')
            ->get('s_ckd_02_02_13_stage5 a')
            ->result();
        return $rs;
    }
    public function get_control_iPTH5_by_prov($year,$provcode){
        $rs = $this->db
            ->select('a.*,b.hosname as name')
            ->where('a.year',$year)
            ->where('a.province_code',$provcode)
            ->join('chospital b','a.hcup=b.hoscode')
            ->get('s_hcup_ckd_02_02_13_stage5 a')
            ->result();
        return $rs;
    }




}

/* End of file patient_model.php */
/* Location: ./applcation/models/patient_model.php */