<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public $hospcode;
    public $cup_code;
    public $provid;
    public $amp_code;
    public $user_level;
    public $year;
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata("username_".sys_id()))
            redirect(site_url('users/login'));
        $this->hospcode = $this->session->userdata('hospcode');
        $this->cup_code = $this->session->userdata('cup_code');
        $this->provid = $this->session->userdata('provid');
        $this->amp_code = $this->session->userdata('amp_code');
        $this->user_level = $this->session->userdata('user_level');
        $this->year=$this->session->userdata('year');

        $this->load->model('Patient_model', 'patient');
        $this->load->model('Dashboard_model', 'dash');
    }
	public function index()
	{
		$this->layout->view('pages/index_view');
	}

    public function about()
    {
        $this->layout->view('pages/about_view');
    }
    public function get_dm_total(){
        $rs     =$this->patient->get_dm_total();
        $json = '{"success": true, "rows": '.json_encode($rs).'}';
        render_json($json);
    }
    public function get_meter_ncdscreen(){
        $year=$this->input->post('year');
        $rs     =$this->dash->get_meter_ncdscreen($year);
        $json = '{"success": true, "rows": '.json_encode($rs).'}';
        render_json($json);
    } public function get_meter_z133(){
        $year=$this->input->post('year');
        $rs     =$this->dash->get_meter_z133($year);
        $json = '{"success": true, "rows": '.json_encode($rs).'}';
        render_json($json);
    }public function get_meter_z131(){
        $year=$this->input->post('year');
        $rs     =$this->dash->get_meter_z131($year);
        $json = '{"success": true, "rows": '.json_encode($rs).'}';
        render_json($json);
    }public function get_meter_z136_z138(){
        $year=$this->input->post('year');
        $rs     =$this->dash->get_meter_z136_z138($year);
        $json = '{"success": true, "rows": '.json_encode($rs).'}';
        render_json($json);
    }
}

/* End of file pages.php */
/* Location: ./application/controllers/pages.php */