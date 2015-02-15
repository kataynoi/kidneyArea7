<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Patients Controller
 *
 * @author  Mr.Satit Rianpit <rianpit@yahoo.com>
 * @copyright   MKHO <http://mkho.moph.go.th>
 *
 */

class Reports extends CI_Controller
{

    public $area;
    public $cup_code;
    public $provcode;
    public $user_level;
    public $year;




    public function __construct()
    {
        parent::__construct();
       /* if(!$this->session->userdata("username_".sys_id()))
            redirect(site_url('users/login'));*/

        $this->hospcode = $this->session->userdata('hospcode');
        $this->cup_code = $this->session->userdata('cup_code');
        $this->provcode = $this->session->userdata('provcode');
        $this->amp_code = $this->session->userdata('amp_code');
        $this->user_level = $this->session->userdata('user_level');
        $this->year=$this->session->userdata('year');
        $this->area=area();
       /* if($this->user_level == '0')
            redirect(site_url('admin'));*/


        $this->load->model('Patient_model', 'patient');
        $this->load->model('Basic_model', 'basic');
        $this->load->model('Reports_model', 'reports');

        $this->patient->hospcode = $this->hospcode;
        $this->patient->cup_code = $this->cup_code;
        $this->patient->provid = $this->provcode;
        $this->patient->year = $this->year;

    }

    public function index()
    {
        $this->basic->set_page_view('reports/index');
        $this->session->set_userdata('status','online', 1);
        $data['reports_item']  = $this->reports->get_reports_list('1');
        $this->layout->view('reports/index_view', $data);
    }

 // CKD_01_01
    public function screen_ckd()
    {
        $this->basic->set_page_view('reports/screen_ckd');
        //$this->session->set_userdata('status','online', 1);
        //$data['cup']=$this->basic->get_cup($this->provcode);
        $data['prov']=$this->basic->get_province_area($this->area);
        $this->layout->view('reports/screen_ckd_view', $data);
    }
    public function get_screen_ckd()
    {
        $year=$this->input->post('year');
        $prov=$this->input->post('prov_code');

        if(!empty($year) && empty($prov)){
            $rs = $this->reports->get_screen_ckd($year);
        }else if(!empty($year) && !empty($prov)){
            $rs = $this->reports->get_screen_ckd_by_prov($year,$prov);

        }

        $rows = json_encode($rs);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }
  // CKD_s_ckd_01_02
    public function new_ckd()
    {
        $this->basic->set_page_view('reports/new_ckd');
        //$this->session->set_userdata('status','online', 1);
        $data['prov']=$this->basic->get_province_area($this->area);
        $this->layout->view('reports/new_ckd_view', $data);
    }
    public function get_new_ckd()
    {
        $year=$this->input->post('year');
        $prov=$this->input->post('prov_code');

        if(!empty($year) && empty($prov)){
            $rs = $this->reports->get_new_ckd($year);
        }else if(!empty($year) && !empty($prov)){
            $rs = $this->reports->get_new_ckd_by_prov($year,$prov);

        }

        $rows = json_encode($rs);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }


// s_hcup_ckd_02_02_01_original
    public function control_bp()
    {
        $this->basic->set_page_view('reports/control_bp');
        //$this->session->set_userdata('status','online', 1);
        //$data['cup']=$this->basic->get_cup($this->provcode);
        $data['prov']=$this->basic->get_province_area($this->area);
        $this->layout->view('reports/control_bp_view', $data);
    }
    public function get_control_bp_original()
    {
        $year=$this->input->post('year');
        $prov=$this->input->post('prov_code');

        if(!empty($year) && empty($prov)){
            $rs = $this->reports->get_control_bp_original($year);
        }else if(!empty($year) && !empty($prov)){
            $rs = $this->reports->get_control_bp_original_by_prov($year,$prov);
        }

        $rows = json_encode($rs);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }

    // s_hcup_ckd_02_02_01_Modify
    public function control_bp_new()
    {
        $this->basic->set_page_view('reports/control_bp');
        //$this->session->set_userdata('status','online', 1);
        //$data['cup']=$this->basic->get_cup($this->provcode);
        $data['prov']=$this->basic->get_province_area($this->area);
        $this->layout->view('reports/control_bp_new_view', $data);
    }
    public function get_control_bp_modify()
    {
        $year=$this->input->post('year');
        $prov=$this->input->post('prov_code');

        if(!empty($year) && empty($prov)){
            $rs = $this->reports->get_control_bp_modify($year);
        }else if(!empty($year) && !empty($prov)){
            $rs = $this->reports->get_control_bp_modify_by_prov($year,$prov);
        }

        $rows = json_encode($rs);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }

// ## s_hcup_ckd_02_02_02
    public function receive_drug()
    {
        $this->basic->set_page_view('reports/receive_drug');
        //$this->session->set_userdata('status','online', 1);
        //$data['cup']=$this->basic->get_cup($this->provcode);
        $data['prov']=$this->basic->get_province_area($this->area);
        $this->layout->view('reports/receive_drug_view', $data);
    }

    public function get_receive_drug()
    {
        $year=$this->input->post('year');
        $prov=$this->input->post('prov_code');

        if(!empty($year) && empty($prov)){
            $rs = $this->reports->get_receive_drug($year);
        }else if(!empty($year) && !empty($prov)){
            $rs = $this->reports->get_receive_drug_by_prov($year,$prov);
        }

        $rows = json_encode($rs);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }
// s_hcup_ckd_02_02_04
    public function hb()
    {
        $this->basic->set_page_view('reports/hb');
        //$this->session->set_userdata('status','online', 1);
        //$data['cup']=$this->basic->get_cup($this->provcode);
        $data['prov']=$this->basic->get_province_area($this->area);
        $this->layout->view('reports/hb_view', $data);
    }

    public function get_control_hb()
    {
        $year=$this->input->post('year');
        $prov=$this->input->post('prov_code');

        if(!empty($year) && empty($prov)){
            $rs = $this->reports->get_control_hb($year);
        }else if(!empty($year) && !empty($prov)){
            $rs = $this->reports->get_control_hb_by_prov($year,$prov);
        }

        $rows = json_encode($rs);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }

// s_hcup_ckd_02_02_05_original
    public function dm_hba1c()
    {
        $this->basic->set_page_view('reports/dm_hba1c');
        //$this->session->set_userdata('status','online', 1);
        //$data['cup']=$this->basic->get_cup($this->provcode);
        $data['prov']=$this->basic->get_province_area($this->area);
        $this->layout->view('reports/dm_hba1c_view', $data);
    }
    public function get_control_hba1c_original()
    {
        $year=$this->input->post('year');
        $prov=$this->input->post('prov_code');

        if(!empty($year) && empty($prov)){
            $rs = $this->reports->get_dm_hba1c_original($year);
        }else if(!empty($year) && !empty($prov)){
            $rs = $this->reports->get_dm_hba1c_original_by_prov($year,$prov);
        }

        $rows = json_encode($rs);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }

    public function dm_hba1c_new()
    {
        $this->basic->set_page_view('reports/dm_hba1c');
        //$this->session->set_userdata('status','online', 1);
        //$data['cup']=$this->basic->get_cup($this->provcode);
        $data['prov']=$this->basic->get_province_area($this->area);
        $this->layout->view('reports/dm_hba1c_new_view', $data);
    }
    public function get_control_hba1c_modify()
    {
        $year=$this->input->post('year');
        $prov=$this->input->post('prov_code');

        if(!empty($year) && empty($prov)){
            $rs = $this->reports->get_dm_hba1c_modify($year);
        }else if(!empty($year) && !empty($prov)){
            $rs = $this->reports->get_dm_hba1c_modify_by_prov($year,$prov);
        }

        $rows = json_encode($rs);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }
// s_hcup_ckd_02_02_06_original
    public function ldl()
    {
        $this->basic->set_page_view('reports/ldl');
        //$this->session->set_userdata('status','online', 1);
        //$data['cup']=$this->basic->get_cup($this->provcode);
        $data['prov']=$this->basic->get_province_area($this->area);
        $this->layout->view('reports/ldl_view', $data);
    }

    public function get_control_ldl_original()
    {
        $year=$this->input->post('year');
        $prov=$this->input->post('prov_code');

        if(!empty($year) && empty($prov)){
            $rs = $this->reports->get_ldl_original($year);
        }else if(!empty($year) && !empty($prov)){
            $rs = $this->reports->get_ldl_original_by_prov($year,$prov);
        }
        $rows = json_encode($rs);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }
// s_hcup_ckd_02_02_06_modify
    public function ldl_new()
    {
        $this->basic->set_page_view('reports/ldl');
        //$this->session->set_userdata('status','online', 1);
        //$data['cup']=$this->basic->get_cup($this->provcode);
        $data['prov']=$this->basic->get_province_area($this->area);
        $this->layout->view('reports/ldl_new_view', $data);
    }

    public function get_control_ldl_modify()
    {
        $year=$this->input->post('year');
        $prov=$this->input->post('prov_code');

        if(!empty($year) && empty($prov)){
            $rs = $this->reports->get_ldl_modify($year);
        }else if(!empty($year) && !empty($prov)){
            $rs = $this->reports->get_ldl_modify_by_prov($year,$prov);
        }
        $rows = json_encode($rs);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }

    // s_hcup_ckd_02_02_07
    public function serumK()
    {
        $this->basic->set_page_view('reports/serumK');
        //$this->session->set_userdata('status','online', 1);
        //$data['cup']=$this->basic->get_cup($this->provcode);
        $data['prov']=$this->basic->get_province_area($this->area);
        $this->layout->view('reports/serumK_view', $data);
    }
    public function get_control_serumK()
    {
        $year=$this->input->post('year');
        $prov=$this->input->post('prov_code');

        if(!empty($year) && empty($prov)){
            $rs = $this->reports->get_serumK($year);
        }else if(!empty($year) && !empty($prov)){
            $rs = $this->reports->get_serumK_by_prov($year,$prov);
        }
        $rows = json_encode($rs);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }

    // s_hcup_ckd_02_02_08 SerumHCO3
    public function serumHCO3()
    {
        $this->basic->set_page_view('reports/serumHCO3');
        //$this->session->set_userdata('status','online', 1);
        //$data['cup']=$this->basic->get_cup($this->provcode);
        $data['prov']=$this->basic->get_province_area($this->area);
        $this->layout->view('reports/serumHCO3_view', $data);
    }
    public function get_control_serumHCO3()
    {
        $year=$this->input->post('year');
        $prov=$this->input->post('prov_code');

        if(!empty($year) && empty($prov)){
            $rs = $this->reports->get_serumHCO3($year);
        }else if(!empty($year) && !empty($prov)){
            $rs = $this->reports->get_serumHCO3_by_prov($year,$prov);
        }
        $rows = json_encode($rs);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }

    // ckd_02_02_09 urineprotein
    public function urineprotein()
    {
        $this->basic->set_page_view('reports/urineprotein');
        //$this->session->set_userdata('status','online', 1);
        //$data['cup']=$this->basic->get_cup($this->provcode);
        $data['prov']=$this->basic->get_province_area($this->area);
        $this->layout->view('reports/urineprotein_view', $data);
    }

    public function get_test_urineprotein_original()
    {
        $year=$this->input->post('year');
        $prov=$this->input->post('prov_code');

        if(!empty($year) && empty($prov)){
            $rs = $this->reports->get_test_urineprotein_original($year);
        }else if(!empty($year) && !empty($prov)){
            $rs = $this->reports->get_test_urineprotein_original_by_prov($year,$prov);
        }
        $rows = json_encode($rs);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }

    // ckd_02_02_09 urineprotein_new
    public function urineprotein_new()
    {
        $this->basic->set_page_view('reports/urineprotein_new');
        //$this->session->set_userdata('status','online', 1);
        //$data['cup']=$this->basic->get_cup($this->provcode);
        $data['prov']=$this->basic->get_province_area($this->area);
        $this->layout->view('reports/urineprotein_new_view', $data);
    }

    public function get_test_urineprotein_modify()
    {
        $year=$this->input->post('year');
        $prov=$this->input->post('prov_code');

        if(!empty($year) && empty($prov)){
            $rs = $this->reports->get_test_urineprotein_modify($year);
        }else if(!empty($year) && !empty($prov)){
            $rs = $this->reports->get_test_urineprotein_modify_by_prov($year,$prov);
        }
        $rows = json_encode($rs);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }

    // ckd_02_02_10 upcr_test
    public function upcr()
    {
        $this->basic->set_page_view('reports/upcr');
        //$this->session->set_userdata('status','online', 1);
        //$data['cup']=$this->basic->get_cup($this->provcode);
        $data['prov']=$this->basic->get_province_area($this->area);
        $this->layout->view('reports/upcr_view', $data);
    }

    public function get_test_upcr()
    {
        $year=$this->input->post('year');
        $prov=$this->input->post('prov_code');

        if(!empty($year) && empty($prov)){
            $rs = $this->reports->get_test_upcr($year);
        }else if(!empty($year) && !empty($prov)){
            $rs = $this->reports->get_test_upcr_by_prov($year,$prov);
        }
        $rows = json_encode($rs);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }

    // ckd_02_02_10 upcr_control
    public function upcr_control()
    {
        $this->basic->set_page_view('reports/upcr');
        //$this->session->set_userdata('status','online', 1);
        //$data['cup']=$this->basic->get_cup($this->provcode);
        $data['prov']=$this->basic->get_province_area($this->area);
        $this->layout->view('reports/upcr_control_view', $data);
    }

    public function get_control_upcr()
    {
        $year=$this->input->post('year');
        $prov=$this->input->post('prov_code');

        if(!empty($year) && empty($prov)){
            $rs = $this->reports->get_control_upcr($year);
        }else if(!empty($year) && !empty($prov)){
            $rs = $this->reports->get_control_upcr_by_prov($year,$prov);
        }
        $rows = json_encode($rs);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }

    // ckd_02_02_12  Control_serumPO4
    public function serumPO4()
    {
        $this->basic->set_page_view('reports/serumPO4');
        //$this->session->set_userdata('status','online', 1);
        //$data['cup']=$this->basic->get_cup($this->provcode);
        $data['prov']=$this->basic->get_province_area($this->area);
        $this->layout->view('reports/serumpo4_view', $data);
    }
    public function get_control_serumPO4()
    {
        $year=$this->input->post('year');
        $prov=$this->input->post('prov_code');

        if(!empty($year) && empty($prov)){
            $rs = $this->reports->get_control_serumPO4($year);
        }else if(!empty($year) && !empty($prov)){
            $rs = $this->reports->get_control_serumPO4_by_prov($year,$prov);
        }
        $rows = json_encode($rs);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }

    // ckd_02_02_12  Control_iPTH3

    public function iPTH_3()
    {
        $this->basic->set_page_view('reports/iPTH_3');
        //$this->session->set_userdata('status','online', 1);
        //$data['cup']=$this->basic->get_cup($this->provcode);
        $data['prov']=$this->basic->get_province_area($this->area);
        $this->layout->view('reports/iPTH_3_view', $data);
    }
    public function get_control_iPTH3()
    {
        $year=$this->input->post('year');
        $prov=$this->input->post('prov_code');

        if(!empty($year) && empty($prov)){
            $rs = $this->reports->get_control_iPTH3($year);
        }else if(!empty($year) && !empty($prov)){
            $rs = $this->reports->get_control_iPTH3_by_prov($year,$prov);
        }
        $rows = json_encode($rs);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }


    public function iPTH_4()
    {
        $this->basic->set_page_view('reports/iPTH_4');
        //$this->session->set_userdata('status','online', 1);
        //$data['cup']=$this->basic->get_cup($this->provcode);
        $data['prov']=$this->basic->get_province_area($this->area);
        $this->layout->view('reports/iPTH_4_view', $data);
    }
    public function get_control_iPTH4()
    {
        $year=$this->input->post('year');
        $prov=$this->input->post('prov_code');

        if(!empty($year) && empty($prov)){
            $rs = $this->reports->get_control_iPTH4($year);
        }else if(!empty($year) && !empty($prov)){
            $rs = $this->reports->get_control_iPTH4_by_prov($year,$prov);
        }
        $rows = json_encode($rs);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }

    public function iPTH_5()
{
    $this->basic->set_page_view('reports/iPTH_5');
    //$this->session->set_userdata('status','online', 1);
    //$data['cup']=$this->basic->get_cup($this->provcode);
    $data['prov']=$this->basic->get_province_area($this->area);
    $this->layout->view('reports/iPTH_5_view', $data);
}
    public function get_control_iPTH5()
    {
        $year=$this->input->post('year');
        $prov=$this->input->post('prov_code');

        if(!empty($year) && empty($prov)){
            $rs = $this->reports->get_control_iPTH5($year);
        }else if(!empty($year) && !empty($prov)){
            $rs = $this->reports->get_control_iPTH5_by_prov($year,$prov);
        }
        $rows = json_encode($rs);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }



















    public function get_dm_total()
    {
    if($this->user_level=='1'){
        $rs = $this->patient->get_dm_total_by_prov($this->provcode);
    }else if($this->user_level=='2'){
        $rs = $this->patient->get_dm_total_by_cup($this->provcode);
    }
    $json = '{"success": true, "total": '.$rs->total.'}';
        render_json($json);
    }

    public function get_ht_total()
    {
    if($this->user_level=='1'){
        $rs = $this->patient->get_ht_total_by_prov($this->provcode);
    }
    $json = '{"success": true, "total": '.$rs->total.'}';
        render_json($json);

    }
    public function get_ckd_total()
    {
    if($this->user_level=='1'){
        $rs = $this->patient->get_ckd_total_by_prov($this->provcode);
    }
    $json = '{"success": true, "total": '.$rs->total.'}';
        render_json($json);
    }
    public function get_ckd_dmht_total()
    {
    if($this->user_level=='1'){
        $rs = $this->patient->get_ckd_dmht_total_by_prov($this->provcode);
    }
    $json = '{"success": true, "total": '.$rs->total.'}';
        render_json($json);
    }


    public function get_ckd (){
        $items=$this->input->post('items');
        $cupcode=$items['cupcode'];
        $hospcode=$items['hospcode'];
        $s=to_mysql_date_dash($items['date_start']);
        $e=to_mysql_date_dash($items['date_end']);
        if(empty($cupcode) && empty($hospcode)){
            $rs = $this->reports->get_ckd_by_prov($this->provcode,$s,$e);
        }else if(!empty($cupcode) && empty($hospcode)){
            $rs = $this->reports->get_ckd_by_cup($this->provcode,$s,$e,$cupcode);
        }else if(!empty($cupcode) && !empty($hospcode)){
            $rs = $this->reports->get_ckd_by_hospcode($this->provcode,$s,$e,$hospcode);
        }
        $rows = json_encode($rs);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }
















}

/* End of file patients.php */
/* Location: ./application/controllers/patients.php */