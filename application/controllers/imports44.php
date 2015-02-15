<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Imports44 extends CI_Controller {


    public $prov_server;
    public $provcode;
    public $n_year;
    public $level;

    public function __construct()
    {

        parent::__construct();
       /* if(!$this->session->userdata("username_".sys_id()))
            redirect(site_url('users/login'));*/
        ini_set('MAX_EXECUTION_TIME', -1);
        $this->load->model('Base_data_model', 'base_data');
        $this->load->model('Import_model', 'import');
        $this->provcode='45';
        $this->n_year=year();
        $this->prov_server=prov_server($this->provcode);

        if(!isset)){

        }
        $this->level = $this->session->userdata('import');

      for($i=2557;$i<2558;$i++)
      {
        switch($this->level){
            case 1 :
                $this->get_import_ckd_01_01($i);
                $this->get_import_ckd_01_02($i);
                $this->get_import_ckd_02_02_01_original($i);
            break;
            case 2 :
                $this->get_import_ckd_02_02_01_modify($i);
                $this->get_import_ckd_02_02_02($i);
                $this->get_import_ckd_02_02_04($i);
                break;
            case 3 :
                $this->get_import_ckd_02_02_05_original($i);
                $this->get_import_ckd_02_02_05_modify($i);
                $this->get_import_ckd_02_02_06_original($i);
                break;
            case 4 :
                $this->get_import_ckd_02_02_06_modify($i);
                $this->get_import_ckd_02_02_07($i);
                $this->get_import_ckd_02_02_08($i);
                break;
            case 5 :
                $this->get_import_ckd_02_02_09_original($i);
                $this->get_import_ckd_02_02_09_modify($i);
                $this->get_import_ckd_02_02_10($i);
                break;
            case 6 :
                $this->get_import_ckd_02_02_11($i);
                $this->get_import_ckd_02_02_12($i);
                $this->get_import_ckd_02_02_13_stage3($i);
                break;
            case 7 :
                $this->get_import_ckd_02_02_13_stage4($i);
                $this->get_import_ckd_02_02_13_stage5($i);
                $this->get_import_ckd_02_02_15($i);
                break;
            case 8 :
                $this->get_import_hcup_ckd_01_01($i);
                $this->get_import_hcup_ckd_01_02($i);
                $this->get_import_hcup_ckd_02_02_01_original($i);
                break;
            case 9 :
                $this->get_import_hcup_ckd_02_02_01_modify($i);
                $this->get_import_hcup_ckd_02_02_02($i);
                $this->get_import_hcup_ckd_02_02_04($i);
                break;
            case 10 :
                $this->get_import_hcup_ckd_02_02_05_original($i);
                $this->get_import_hcup_ckd_02_02_05_modify($i);
                $this->get_import_hcup_ckd_02_02_06_original($i);
                break;
            case 11 :
                $this->get_import_hcup_ckd_02_02_06_modify($i);
                $this->get_import_hcup_ckd_02_02_07($i);
                $this->get_import_hcup_ckd_02_02_08($i);
                break;
            case 12 :
                $this->get_import_hcup_ckd_02_02_09_original($i);
                $this->get_import_hcup_ckd_02_02_09_modify($i);
                $this->get_import_hcup_ckd_02_02_10($i);
                break;
            case 13 :
                $this->get_import_hcup_ckd_02_02_11($i);
                $this->get_import_hcup_ckd_02_02_12($i);
                $this->get_import_hcup_ckd_02_02_13_stage3($i);
                break;
            case 14 :
                $this->get_import_hcup_ckd_02_02_13_stage4($i);
                $this->get_import_hcup_ckd_02_02_13_stage5($i);
                $this->get_import_hcup_ckd_02_02_15($i);
                break;
            default :

                break;

        }




      }
    }
	/*public function index()
	{
		$this->load->view('pages/index_view');
	}*/
    public function refresh()
	{
        header("Refresh:0");
	}
# import รายจังหวัด
    public function get_import_ckd_01_01($year='2557')
    {

        $url = $this->prov_server."ckd_01_01.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $rows = json_decode($data);

                $this->import->import_ckd_01_01($rows,$year,$rows->province_code);
        }
    }
    public function get_import_ckd_01_02($year='2557')
    {

        $url = $this->prov_server."ckd_01_02.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $rows = json_decode($data);

                $this->import->import_ckd_01_02($rows,$year,$rows->province_code);
        }
    }
    public function get_import_ckd_02_02_01_original($year='2557')
    {

        $url = $this->prov_server."ckd_02_02_01_original.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $rows = json_decode($data);

                $this->import->import_ckd_02_02_01_original($rows,$year,$rows->province_code);
        }
    }
    public function get_import_ckd_02_02_01_modify($year='2557')
    {

        $url = $this->prov_server."ckd_02_02_01_modify.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $rows = json_decode($data);

                $this->import->import_ckd_02_02_01_modify($rows,$year,$rows->province_code);
        }
    }
    public function get_import_ckd_02_02_02($year='2557')
    {

        $url = $this->prov_server."ckd_02_02_02.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $rows = json_decode($data);

                $this->import->import_ckd_02_02_02($rows,$year,$rows->province_code);
        }
    }
    public function get_import_ckd_02_02_04($year='2557')
    {

        $url = $this->prov_server."ckd_02_02_04.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $rows = json_decode($data);

            $this->import->import_ckd_02_02_04($rows,$year,$rows->province_code);
        }
    }
    public function get_import_ckd_02_02_05_original($year='2557')
    {

        $url = $this->prov_server."ckd_02_02_05_original.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $rows = json_decode($data);

            $this->import->import_ckd_02_02_05_original($rows,$year,$rows->province_code);
        }
    }
    public function get_import_ckd_02_02_05_modify($year='2557')
    {

        $url = $this->prov_server."ckd_02_02_05_modify.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $rows = json_decode($data);

            $this->import->import_ckd_02_02_05_modify($rows,$year,$rows->province_code);
        }
    }
    public function get_import_ckd_02_02_06_original($year='2557')
    {

        $url = $this->prov_server."ckd_02_02_06_original.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $rows = json_decode($data);

            $this->import->import_ckd_02_02_06_original($rows,$year,$rows->province_code);
        }
    }
    public function get_import_ckd_02_02_06_modify($year='2557')
    {

        $url = $this->prov_server."ckd_02_02_06_modify.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $rows = json_decode($data);

            $this->import->import_ckd_02_02_06_modify($rows,$year,$rows->province_code);
        }
    }
    public function get_import_ckd_02_02_07($year='2557')
    {

        $url = $this->prov_server."ckd_02_02_07.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $rows = json_decode($data);

            $this->import->import_ckd_02_02_07($rows,$year,$rows->province_code);
        }
    }
    public function get_import_ckd_02_02_08($year='2557')
    {

        $url = $this->prov_server."ckd_02_02_08.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $rows = json_decode($data);

            $this->import->import_ckd_02_02_08($rows,$year,$rows->province_code);
        }
    }
    public function get_import_ckd_02_02_09_original($year='2557')
    {

        $url = $this->prov_server."ckd_02_02_09_original.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $rows = json_decode($data);

            $this->import->import_ckd_02_02_09_original($rows,$year,$rows->province_code);
        }
    }
    public function get_import_ckd_02_02_09_modify($year='2557')
    {

        $url = $this->prov_server."ckd_02_02_09_modify.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $rows = json_decode($data);

            $this->import->import_ckd_02_02_09_modify($rows,$year,$rows->province_code);
        }
    }
    public function get_import_ckd_02_02_10($year='2557')
    {

        $url = $this->prov_server."ckd_02_02_10.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $rows = json_decode($data);

            $this->import->import_ckd_02_02_10($rows,$year,$rows->province_code);
        }
    }
    public function get_import_ckd_02_02_11($year='2557')
    {

        $url = $this->prov_server."ckd_02_02_11.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $rows = json_decode($data);

            $this->import->import_ckd_02_02_11($rows,$year,$rows->province_code);
        }
    }
    public function get_import_ckd_02_02_12($year='2557')
    {

        $url = $this->prov_server."ckd_02_02_12.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $rows = json_decode($data);

            $this->import->import_ckd_02_02_12($rows,$year,$rows->province_code);
        }
    }
    public function get_import_ckd_02_02_13_stage3($year='2557')
    {

        $url = $this->prov_server."ckd_02_02_13_stage3.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $rows = json_decode($data);

            $this->import->import_ckd_02_02_13_stage3($rows,$year,$rows->province_code);
        }
    }
    public function get_import_ckd_02_02_13_stage4($year='2557')
    {

        $url = $this->prov_server."ckd_02_02_13_stage4.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $rows = json_decode($data);

            $this->import->import_ckd_02_02_13_stage4($rows,$year,$rows->province_code);
        }
    }
    public function get_import_ckd_02_02_13_stage5($year='2557')
    {

        $url = $this->prov_server."ckd_02_02_13_stage5.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $rows = json_decode($data);

            $this->import->import_ckd_02_02_13_stage5($rows,$year,$rows->province_code);
        }
    }
    public function get_import_ckd_02_02_15($year='2557')
    {

        $url = $this->prov_server."ckd_02_02_15.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $rows = json_decode($data);

            $this->import->import_ckd_02_02_15($rows,$year,$rows->province_code);
        }
    }







# Import ราย Cup
    public function get_import_hcup_ckd_01_01($year='2557')
    {

        $url = $this->prov_server."sum_hcup_ckd_01_01.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);
        if($data)
        {
            $num_rows=0;
            $rows = json_decode($data);
            foreach($rows->row as $r)
            {
                $this->import->import_hcup_ckd_01_01($r,$year,$rows->province_code);
                $num_rows++;
            }
        }
    }
    public function get_import_hcup_ckd_01_02($year='2557')
    {

        $url = $this->prov_server."sum_hcup_ckd_01_02.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $num_rows=0;
            $rows = json_decode($data);
            foreach($rows->row as $r)
            {
            $this->import->import_hcup_ckd_01_02($r,$year,$rows->province_code);
                $num_rows++;
            }
        }
    }
    public function get_import_hcup_ckd_02_02_01_original($year='2557')
    {

        $url = $this->prov_server."sum_hcup_ckd_02_02_01_original.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $num_rows=0;
            $rows = json_decode($data);
            foreach($rows->row as $r)
            {
            $this->import->import_hcup_ckd_02_02_01_original($r,$year,$rows->province_code);
                $num_rows++;
            }
        }
    }
    public function get_import_hcup_ckd_02_02_01_modify($year='2557')
    {

        $url = $this->prov_server."sum_hcup_ckd_02_02_01_modify.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $num_rows=0;
            $rows = json_decode($data);
            foreach($rows->row as $r)
            {
                $this->import->import_hcup_ckd_02_02_01_modify($r,$year,$rows->province_code);
                $num_rows++;
            }
        }
    }
    public function get_import_hcup_ckd_02_02_02($year='2557')
    {

        $url = $this->prov_server."sum_hcup_ckd_02_02_02.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $num_rows=0;
            $rows = json_decode($data);
            foreach($rows->row as $r)
            {
            $this->import->import_hcup_ckd_02_02_02($r,$year,$rows->province_code);
                $num_rows++;
            }
        }
    }
    public function get_import_hcup_ckd_02_02_04($year='2557')
    {

        $url = $this->prov_server."sum_hcup_ckd_02_02_04.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $num_rows=0;
            $rows = json_decode($data);
            foreach($rows->row as $r)
            {
            $this->import->import_hcup_ckd_02_02_04($r,$year,$rows->province_code);
                $num_rows++;
            }
        }
    }
    public function get_import_hcup_ckd_02_02_05_original($year='2557')
    {

        $url = $this->prov_server."sum_hcup_ckd_02_02_05_original.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $num_rows=0;
            $rows = json_decode($data);
            foreach($rows->row as $r)
            {
            $this->import->import_hcup_ckd_02_02_05_original($r,$year,$rows->province_code);
                $num_rows++;
            }
        }
    }
    public function get_import_hcup_ckd_02_02_05_modify($year='2557')
    {

        $url = $this->prov_server."sum_hcup_ckd_02_02_05_modify.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $num_rows=0;
            $rows = json_decode($data);
            foreach($rows->row as $r)
            {

            $this->import->import_hcup_ckd_02_02_05_modify($r,$year,$rows->province_code);

                $num_rows++;
            }
        }
    }
    public function get_import_hcup_ckd_02_02_06_original($year='2557')
    {

        $url = $this->prov_server."sum_hcup_ckd_02_02_06_original.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $num_rows=0;
            $rows = json_decode($data);
            foreach($rows->row as $r)
            {

            $this->import->import_hcup_ckd_02_02_06_original($r,$year,$rows->province_code);
                $num_rows++;
            }
        }
    }
    public function get_import_hcup_ckd_02_02_06_modify($year='2557')
    {

        $url = $this->prov_server."sum_hcup_ckd_02_02_06_modify.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $num_rows=0;
            $rows = json_decode($data);
            foreach($rows->row as $r)
            {
            $this->import->import_hcup_ckd_02_02_06_modify($r,$year,$rows->province_code);
            $num_rows++;
            }
        }
    }
    public function get_import_hcup_ckd_02_02_07($year='2557')
    {

        $url = $this->prov_server."sum_hcup_ckd_02_02_07.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $num_rows=0;
            $rows = json_decode($data);
            foreach($rows->row as $r)
            {
            $this->import->import_hcup_ckd_02_02_07($r,$year,$rows->province_code);
                $num_rows++;
            }
        }
    }
    public function get_import_hcup_ckd_02_02_08($year='2557')
    {

        $url = $this->prov_server."sum_hcup_ckd_02_02_08.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $num_rows=0;
            $rows = json_decode($data);
            foreach($rows->row as $r)
            {
            $this->import->import_hcup_ckd_02_02_08($r,$year,$rows->province_code);
                $num_rows++;
            }
        }
    }
    public function get_import_hcup_ckd_02_02_09_original($year='2557')
    {

        $url = $this->prov_server."sum_hcup_ckd_02_02_09_original.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $num_rows=0;
            $rows = json_decode($data);
            foreach($rows->row as $r)
            {
                $this->import->import_hcup_ckd_02_02_09_original($r,$year,$rows->province_code);
                $num_rows++;
            }
        }
    }
    public function get_import_hcup_ckd_02_02_09_modify($year='2557')
    {

        $url = $this->prov_server."sum_hcup_ckd_02_02_09_modify.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $num_rows=0;
            $rows = json_decode($data);
            foreach($rows->row as $r)
            {
                $this->import->import_hcup_ckd_02_02_09_modify($r,$year,$rows->province_code);
                $num_rows++;
            }
        }
    }
    public function get_import_hcup_ckd_02_02_10($year='2557')
    {

        $url = $this->prov_server."sum_hcup_ckd_02_02_10.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $num_rows=0;
            $rows = json_decode($data);
            foreach($rows->row as $r)
            {
            $this->import->import_hcup_ckd_02_02_10($r,$year,$rows->province_code);
                $num_rows++;
            }
        }
    }
    public function get_import_hcup_ckd_02_02_11($year='2557')
    {

        $url = $this->prov_server."sum_hcup_ckd_02_02_11.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $num_rows=0;
            $rows = json_decode($data);
            foreach($rows->row as $r)
            {
            $this->import->import_hcup_ckd_02_02_11($r,$year,$rows->province_code);
                $num_rows++;
            }
        }
    }
    public function get_import_hcup_ckd_02_02_12($year='2557')
    {

        $url = $this->prov_server."sum_hcup_ckd_02_02_12.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $num_rows=0;

            $rows = json_decode($data);
            foreach($rows->row as $r)
            {
            $this->import->import_hcup_ckd_02_02_12($r,$year,$rows->province_code);
                $num_rows++;

        }}
    }
    public function get_import_hcup_ckd_02_02_13_stage3($year='2557')
    {

        $url = $this->prov_server."sum_hcup_ckd_02_02_13_stage3.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $num_rows=0;
            $rows = json_decode($data);
            foreach($rows->row as $r)
            {

            $this->import->import_hcup_ckd_02_02_13_stage3($r,$year,$rows->province_code);
                $num_rows++;

            }
        }
    }
    public function get_import_hcup_ckd_02_02_13_stage4($year='2557')
    {

        $url = $this->prov_server."sum_hcup_ckd_02_02_13_stage4.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $num_rows=0;
            $rows = json_decode($data);
            foreach($rows->row as $r)
            {

                $this->import->import_hcup_ckd_02_02_13_stage4($r,$year,$rows->province_code);
                $num_rows++;

            }
        }
    }
    public function get_import_hcup_ckd_02_02_13_stage5($year='2557')
    {

        $url = $this->prov_server."sum_hcup_ckd_02_02_13_stage5.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $num_rows=0;
            $rows = json_decode($data);
            foreach($rows->row as $r)
            {

                $this->import->import_hcup_ckd_02_02_13_stage5($r,$year,$rows->province_code);
                $num_rows++;

            }
        }
    }
    public function get_import_hcup_ckd_02_02_15($year='2557')
    {

        $url = $this->prov_server."sum_hcup_ckd_02_02_15.php?year=".$year;
        echo $url; //exit();
        $data = file_get_contents($url);

        if($data)
        {
            $num_rows=0;
            $rows = json_decode($data);
            foreach($rows->row as $r)
            {
                $this->import->import_hcup_ckd_02_02_15($r,$year,$rows->province_code);
                $num_rows++;
            }
        }
    }
}


/* End of file pages.php */
/* Location: ./application/controllers/pages.php */