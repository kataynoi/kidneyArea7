<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

    public $year;
    public function __construct()
    {
        parent::__construct();
       /* if(!$this->session->userdata("username_".sys_id()))
            redirect(site_url('users/login'));*/
        $this->load->model('Base_data_model', 'base_data');
        $this->load->model('Dashboard_model', 'dash');
        $this->load->model('Basic_model', 'basic');
        $this->year=year()+543;
    }
	public function index()
	{
        $data['ckd']=$this->dash->get_ckd_dm_ht($this->year);
        $data['dmht']=$this->dash->get_dmht($this->year);
        //$data['ckd']='456456';
        //$data['prov']=$this->basic->get_province_area($this->area);
		$this->layout->view('pages/index_view',$data);
	}

    public function about()
    {
        $this->layout->view('pages/about_view');
    }
    public function get_office_total_by_amp(){
        $rs     =$this->base_data->get_office_total();
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