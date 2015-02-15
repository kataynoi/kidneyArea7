<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Admins Controller
 *
 * @author  Mr.Phanpichit Keawmong <thait-rex@hotmail.com>
 * @copyright
 *
 */

class Admin extends CI_Controller
{
    public $hospcode;
    public $hserv;
    public $amp_code;
    public $user_level;


    public function __construct()
    {
        parent::__construct();
    if(!$this->session->userdata("username_".sys_id()))
            redirect(site_url('users/login'));
        $this->user_level = $this->session->userdata('user_level');
        if($this->user_level != 0)
            redirect(site_url('users/login'));
        $this->layout->setLayout('admin_layout');
        $this->hospcode = $this->session->userdata('hospcode');
        $this->amp_code = $this->session->userdata('amp_code');

        if($this->user_level == '1')
            redirect(site_url('changwat'));

        if($this->user_level == '2')
            redirect(site_url('ampur'));

        $this->load->model('Admin_model', 'admin');
        $this->load->model('Basic_model', 'basic');

        $this->admin->hospcode = $this->hospcode;
        $this->admin->hserv = $this->hserv;

    }

    public function index()
    {
        $this->basic->set_page_view('admin');
        $this->layout->view('admin/index_view');
    }

    public function import_all()
{
        $data['hserv']=$this->basic->get_hserv_list('44');
        $this->layout->view('patients/import_all_view',$data);
}
    public function surveillance()
{
        $data['hserv']=$this->basic->get_hserv_list('44');
        $this->layout->view('patients/surveillance_view',$data);
}

    public function get_list()
    {
        $start = $this->input->post('start');
        $stop = $this->input->post('stop');

        $s = $this->input->post('s');
        $e = $this->input->post('e');

        $s = to_mysql_date($s);
        $e = to_mysql_date($e);

        $p = $this->input->post('p');
        $n = $this->input->post('n');

        $start = empty($start) ? 0 : $start;
        $stop = empty($stop) ? 25 : $stop;

        $limit = (int) $stop - (int) $start;

        $by_date = $s && $e;

        if(!$by_date && !empty($p) && empty($n))
        {
            $rs = $this->patient->get_list_by_ptstatus($this->hospcode, $p, $start, $limit);
        }
        else if(!$by_date && empty($p) && !empty($n))
        {
            $rs = $this->patient->get_list_by_nation($this->hospcode, $n, $start, $limit);
        }
        else if(!$by_date && !empty($p) && !empty($n))
        {
            $rs = $this->patient->get_list_by_ptstatus_nation($this->hospcode, $p, $n, $start, $limit);
        }
        else if($by_date && empty($p) && empty($n))
        {
            $rs = $this->patient->get_list_by_date($this->hospcode, $s, $e, $start, $limit);
        }
        else if($by_date && !empty($p) && empty($n))
        {
            $rs = $this->patient->get_list_by_date_ptstatus($this->hospcode, $s, $e, $p, $start, $limit);
        }
        else if($by_date && empty($p) && !empty($n))
        {
            $rs = $this->patient->get_list_by_date_nation($this->hospcode, $s, $e, $n, $start, $limit);
        }
        else if($by_date && !empty($p) && !empty($n))
        {
            $rs = $this->patient->get_list_by_date_ptstatus_nation($this->hospcode, $s, $e, $p, $n, $start, $limit);
        }
        else
        {
            $rs = $this->patient->get_list($this->hospcode, $start, $limit);
        }

        if($rs)
        {
            $arr_result = array();

            foreach($rs as $r)
            {
                $obj = new stdClass();

                $obj->e0        = $r->e0_hosp;
                $obj->e1        = $r->e1_hosp;

                $obj->id        =$r->id;
                $obj->name      = $r->name;
                $obj->hn        = $r->hn;
                $obj->cid       = $r->cid;
                $obj->datesick  = to_thai_date($r->datesick);
                $obj->address   = $r->address . ' ' . get_address($r->addrcode);
                $obj->diag      = $r->icd10 . ' ' . $this->basic->get_diagname($r->icd10);
                $obj->code506   = $r->disease . ' ' . $this->basic->get_code506name($r->disease);
                $obj->nation    = get_nation_nhso_name($r->nation);
                $obj->ptstatus  = $r->result;

                $obj->latlng 	= !empty($r->latitude) && !empty($r->longtitude) ? '1' : '0';

                $arr_result[] = $obj;
            }

            $rows = json_encode($arr_result);
            $json = '{"success": true, "rows": '.$rows.'}';
        }
        else
        {
            $json = '{"success": false, "msg": "ไม่มีข้อมูล."}';
        }

        render_json($json);
    }

    public function get_list_total()
    {
        $p = $this->input->post('p');
        $n = $this->input->post('n');

        $s = $this->input->post('s');
        $e = $this->input->post('e');

        $s = to_mysql_date($s);
        $e = to_mysql_date($e);

        $by_date = $s && $e;

        if(!$by_date && !empty($p) && empty($n))
        {
            $total = $this->patient->get_list_total_by_ptstatus($this->hospcode, $p);
        }
        else if(!$by_date && empty($p) && !empty($n))
        {
            $total = $this->patient->get_list_total_by_nation($this->hospcode, $n);
        }
        else if(!$by_date && !empty($p) && !empty($n))
        {
            $total = $this->patient->get_list_total_by_ptstatus_nation($this->hospcode, $p, $n);
        }
        else if($by_date && empty($p) && empty($n))
        {
            $total = $this->patient->get_list_total_by_date($this->hospcode, $s, $e);
        }
        else if($by_date && !empty($p) && empty($n))
        {
            $total = $this->patient->get_list_total_by_date_ptstatus($this->hospcode, $s, $e, $p);
        }
        else if($by_date && empty($p) && !empty($n))
        {
            $total = $this->patient->get_list_total_by_date_nation($this->hospcode, $s, $e, $n);
        }
        else if($by_date && !empty($p) && !empty($n))
        {
            $total = $this->patient->get_list_total_by_date_ptstatus_nation($this->hospcode, $s, $e, $p, $n);
        }
        else
        {
            $total = $this->patient->get_list_total($this->hospcode);
        }


        $json = '{"success": true, "total": '.$total.'}';
        render_json($json);
    }

    public function get_list_total_filter()
    {
        $s = $this->input->post('s');
        $e = $this->input->post('e');

        $s = to_mysql_date($s);
        $e = to_mysql_date($e);

        $p = $this->input->post('p');

        if(empty($p))
        {
            $total = $this->patient->get_list_total_filter($this->hospcode, $s, $e);
        }
        else
        {
            $total = $this->patient->get_list_total_filter_by_ptstatus($this->hospcode, $s, $e, $p);
        }


        $json = '{"success": true, "total": '.$total.'}';
        render_json($json);
    }

    public function get_list_filter()
    {
        $start = $this->input->post('start');
        $stop = $this->input->post('stop');
        $p = $this->input->post('p');

        $s = $this->input->post('s');
        $e = $this->input->post('e');

        $s = to_mysql_date($s);
        $e = to_mysql_date($e);

        $start = empty($start) ? 0 : $start;
        $stop = empty($stop) ? 25 : $stop;

        $limit = (int) $stop - (int) $start;

        if(empty($p))
        {
            $rs = $this->patient->get_list_filter($this->hospcode, $s, $e, $start, $limit);
        }
        else
        {
            $rs = $this->patient->get_list_filter_by_ptstatus($this->hospcode, $s, $e, $start, $limit, $p);
        }


        if($rs)
        {
            $arr_result = array();

            foreach($rs as $r)
            {
                $obj = new stdClass();

                $obj->e0        = $r->e0_hosp;
                $obj->e1        = $r->e1_hosp;

                $obj->id        = $r->id;
                $obj->name      = $r->name;
                $obj->cid       = $r->cid;
                $obj->hn        = $r->hn;
                $obj->datesick  = to_thai_date($r->datesick);
                $obj->address   = $r->address . ' ' . get_address($r->addrcode);
                $obj->diag      = $r->icd10 . ' ' . $this->basic->get_diagname($r->icd10);
                $obj->code506   = $r->disease . ' ' . $this->basic->get_code506name($r->disease);
                $obj->nation    = get_nation_nhso_name($r->nation);
                $obj->ptstatus  = $r->result;

                $arr_result[] = $obj;
            }

            $rows = json_encode($arr_result);
            $json = '{"success": true, "rows": '.$rows.'}';
        }
        else
        {
            $json = '{"success": false, "msg": "ไม่มีข้อมูล."}';
        }

        render_json($json);
    }

    public function  get_hserv(){
        $prov_code=$this->input->post('prov_id');
        $rs = $this->basic->get_hserv_list($prov_code);
        $json = $rs ? '{"success": true, "rows": '.json_encode($rs).'}' : '{"success": false, "msg": "ไม่พบข้อมูล"}';

        render_json($json);
    }
    public function get_import()
    {
        $s = $this->input->post('s');
        $e = $this->input->post('e');

        $s = to_mysql_date($s);
        $e = to_mysql_date($e);

        $start = $this->input->post('start');
        $stop = $this->input->post('stop');

        $start = empty($start) ? 0 : $start;
        $stop = empty($stop) ? 25 : $stop;

        $limit = (int) $stop - (int) $start;

        $rs = $this->patient->get_import($s, $e, $start, $limit);

        $json = $rs ? '{"success": true, "rows": '.json_encode($rs).'}' : '{"success": false, "msg": "ไม่พบข้อมูล"}';

        render_json($json);
    }

    public function get_import_total()
    {
        $s = $this->input->post('s');
        $e = $this->input->post('e');
        $off_id = $this->input->post('off_id');

        $s = to_mysql_date($s);
        $e = to_mysql_date($e);

        $total = $this->patient->get_import_total($s, $e, $off_id);
        $json = '{"success": true, "total": '.$total.'}';

        render_json($json);
    }

    public function get_import_list()
    {
        if($this->input->is_ajax_request())
        {
            $s = $this->input->post('s');
            $e = $this->input->post('e');
            $off_id=$this->input->post('off_id');
            if(!$off_id){
                $off_id=$this->hserv;
            }
            $s_string = to_string_date($s);
            $e_string = to_string_date($e);

            $url = 'http://203.157.185.7/mis/hdc_webservice/index.php/epidem?date_start='.$s_string.'&date_end='.$e_string.'&hospcode=' . $off_id;
            //$url = 'http://localhost/hdc_webservice/index.php/epidem?date_start='.$s_string.'&date_end='.$e_string.'&hospcode=' . $this->hospcode;
            //echo $url;
            $data = file_get_contents($url);

            if($data)
            {
                $num_rows=0;
                $rows = json_decode($data);
                foreach($rows->rows as $r)
                {
                    //check exist and approve
                    $is_duplicate = $this->patient->check_duplicate_tmp($r->HOSPCODE, $r->DIAGCODE, $r->CID, $r->DATE_SERV);
                    //$is_duplicate=false;
                    if(!$is_duplicate)
                    {
                        //new record
                        $this->patient->insert_tmp($r);
                        $num_rows++;

                    }
                    else
                    {
                        $is_approve = $this->patient->check_tmp_approve_status($r->HOSPCODE,$r->DIAGCODE, $r->CID, $r->DATE_SERV);
                        if(!$is_approve)
                        {
                            $date_update_tmp = $this->patient->get_tmp_date_update($r->HOSPCODE,$r->DIAGCODE, $r->CID,$r->DATE_SERV);
                            if($date_update_tmp < $r->D_UPDATE)
                            {
                                //update
                                $this->patient->update_tmp($data);
                            }
                        }
                    }
                }

                $json = '{"success": true,"num_rows":'.$num_rows.'}';
            }
            else
            {
                $json = '{"success": false, "msg": "ไม่พบข้อมูล."}';
            }
            render_json($json);
        }
        else
        {
            show_error('Not ajax.', 404);
        }
    }


    public function get_tmp_detail()
    {
        if($this->input->is_ajax_request())
        {
            $id = $this->input->post('id');
            if(!empty($id))
            {
                $rs = $this->patient->get_tmp_detail($id);
                if($rs)
                {
                    $obj = new stdClass();

                    $obj->id            = $rs->id;
                    $obj->name          = $rs->name;
                    $obj->lname         = $rs->lname;
                    $obj->birth         = to_thai_date($rs->birth);
                    $obj->age           = get_current_age($rs->birth);
                    $obj->sex           = $rs->sex;
                    $obj->cid           = $rs->cid;
                    $obj->hn            = $rs->hn;
                    $obj->mstatus       = $rs->mstatus;
                    $obj->nation        = $rs->nation;
                    $obj->occupation    = $rs->occupation_new;
                    $obj->date_serv     = to_thai_date($rs->date_serv);
                    $obj->ptstatus      = $rs->ptstatus;
                    $obj->date_death    = to_thai_date($rs->date_death);
                    $obj->ptstatus_code = $rs->ptstatus;
                    $obj->illdate       = to_thai_date($rs->illdate);
                    $obj->illchangwat   = $rs->illchangwat;
                    $obj->illampur      = $rs->illampur;
                    $obj->illtambon     = $rs->illtambon;
                    $obj->illmoo        = strlen($rs->illvillage) < 2 ? '0' . $rs->illvillage : $rs->illvillage;
                    $obj->illhouse      = $rs->illhouse;
                    $obj->diagcode      = $rs->diagcode;
                    $obj->diagname      = $this->basic->get_diagname($rs->diagcode);
                    $obj->code506       = $rs->code506;
                    $obj->code506_name  = $this->basic->get_code506name($obj->code506);
                    $obj->complication  = $rs->complication;
                    $obj->organism      = $rs->organism;
                    $obj->date_report   = get_current_thai_date();
                    $obj->date_record   = get_current_thai_date();

                    $json = $rs ? '{"success": "true", "rows": ' . json_encode($obj) . '}' : '{"success": false, "msg": "ไม่พบข้อมูล"}';
                }
                else
                {
                    $json = '{"success": false, "msg": "ไม่พบข้อมูล"}';
                }
            }
            else
            {
                $json = '{"success": false, "msg": "ไม่พบรายการ"}';
            }

            render_json($json);
        }
        else
        {
            show_error('Not ajax.', 404);
        }
    }
    public function get_e0_detail()
    {
        if($this->input->is_ajax_request())
        {
            $id = $this->input->post('id');
            if(!empty($id))
            {
                $rs = $this->patient->get_e0_detail($id);
                if($rs)
                {
                    $obj = new stdClass();

                    $obj->id            = $rs->id;
                    $obj->disease       = $rs->disease;
                    $obj->name          = $rs->name;
                    $obj->birth         = to_thai_date($rs->birth);
                    $obj->age           = get_current_age($rs->birth);
                    $obj->sex           = $rs->sex;
                    $obj->cid           = $rs->cid;
                    $obj->hn            = $rs->hn;
                    $obj->mstatus       = $rs->marietal;
                    $obj->nation        = $rs->nation;
                    $obj->nmepat       = $rs->nmepat;
                    $obj->occupation    = $rs->occupat;
                    $obj->date_serv     = to_thai_date($rs->datesick);
                    $obj->ptstatus      = $rs->result;
                    $obj->date_death    = to_thai_date($rs->datedeath);
                    $obj->ptstatus_code = $rs->result;
                    $obj->illdate       = to_thai_date($rs->datedefine);
                    $obj->patient_type  = $rs->type;
                    $obj->service_place = $rs->hospital;
                    $obj->school        = $rs->school;
                    $obj->school_class  = $rs->class;
                    $obj->address_type  = $rs->metropol;

                    $obj->chw = substr($rs->addrcode, 0, 2);
                    $obj->amp = substr($rs->addrcode, 2, 2);
                    $obj->tmb = substr($rs->addrcode, 4, 2);
                    $obj->moo = substr($rs->addrcode, 6, 2);

                    //$chw_name = $this->basic->get_province_name($chw);
                    //$amp_name = $this->basic->get_ampur_name($chw, $amp);
                    //$tmb_name = $this->basic->get_tmb_name($chw, $amp, $tmb);
                    //$moo_name = $this->basic->get_moo_name($chw, $amp, $tmb, $moo);

                    //$obj->chw_name  = $chw_name;
                    //$obj->amp_name  = $amp_name;
                    //$obj->tmb_name  = $tmb_name;
                    //$obj->moo_name  = $moo_name;
                    $obj->address   = $rs->address;
                    $obj->soi       = $rs->soi;
                    $obj->road      = $rs->road;

                    $obj->code506       = $rs->disease;
                    $obj->diagname      = $this->basic->get_diagname($rs->icd10);
                    $obj->diagcode      = $rs->icd10;
                    $obj->office_id     =$rs->office_id;
                    $obj->complication  = $rs->complica;
                    $obj->organism      = $rs->organism;
                    $obj->date_report   = to_thai_date($rs->datereach);
                    $obj->date_record   = to_thai_date($rs->daterecord);

                    $json = $rs ? '{"success": "true", "rows": ' . json_encode($obj) . '}' : '{"success": false, "msg": "ไม่พบข้อมูล"}';
                }
                else
                {
                    $json = '{"success": false, "msg": "ไม่พบข้อมูล"}';
                }
            }
            else
            {
                $json = '{"success": false, "msg": "ไม่พบรายการ"}';
            }

            render_json($json);
        }
        else
        {
            show_error('Not ajax.', 404);
        }
    }

    public function remove_tmp()
    {
        if($this->input->is_ajax_request())
        {
            $id = $this->input->post('id');
            if(!empty($id))
            {
                $rs = $this->patient->remove_tmp($id);

                $json = $rs ? '{"success": true}' : '{"success": false, "msg": "ไม่สามารถลบรายการได้"}';
            }
            else
            {
                $json = '{"success": false, "msg": "ไม่พบรหัสที่ต้องการลบ"}';
            }

            render_json($json);
        }
        else
        {
            show_error('Not ajax.', 404);
        }
    }
    public function do_import()
    {
        $items = $this->input->post('items');

        if(!empty($items))
        {
            foreach($items as $i)
            {
                $e0 = ($this->pa->get_e0_sso($this->amp_code)) + 1;
                $e1 = ($this->ampur->get_e1_sso($this->amp_code, $i['code506'])) + 1;

                $this->ampur->do_approve($i['id'], $e0, $e1);
            }

            $json = '{"success": true}';
        }
        else
        {
            $json = '{"success": false, "msg": "ไม่พบรหัสที่ต้องการลบ"}';
        }

        render_json($json);
    }
    /*
        public function do_import()
        {
            if($this->input->is_ajax_request())
            {
                $id = $this->input->post('id');
                if(!empty($id))
                {
                    foreach($id as $i)
                    {
                        $rs = $this->patient->update_tmp_record_status($i);
                    }

                    $json = $rs ? '{"success": true}' : '{"success": false, "msg": "ไม่สามารถนำเข้ารายการได้"}';
                }
                else
                {
                    $json = '{"success": false, "msg": "ไม่พบรหัสที่ต้องการลบ"}';
                }

                render_json($json);
            }
            else
            {
                show_error('Not ajax.', 404);
            }
        }*/

    public function get_waiting_list_total()
    {
        $p = $this->input->post('p');

        if(empty($p))
        {
            $rs = $this->patient->get_waiting_list_total($this->hospcode);
        }
        else
        {
            $rs = $this->patient->get_waiting_list_total_by_ptstatus($this->hospcode, $p);
        }

        $json = '{"success": true, "total": ' . $rs . '}';
        render_json($json);
    }

    public function get_waiting_list()
    {
        $start = $this->input->post('start');
        $stop = $this->input->post('stop');

        $start = empty($start) ? 0 : $start;
        $stop = empty($stop) ? 25 : $stop;

        $limit = (int) $stop - (int) $start;

        $p = $this->input->post('p');

        if(empty($p))
        {
            $rs = $this->patient->get_waiting_list($this->hospcode, $start, $limit);
        }
        else
        {
            $rs = $this->patient->get_waiting_list_by_ptstatus($this->hospcode, $p, $start, $limit);
        }

        $json = $rs ? '{"success": true, "rows": ' . json_encode($rs) . '}' : '{"success": false, "msg": "ไม่พบรายการ"}';
        render_json($json);
    }

    public function save()
    {
        if($this->input->is_ajax_request())
        {
            $data = $this->input->post('data');
            if(!empty($data))
            {
                //check exist
                $is_exist = $this->patient->check_e0_exist($this->hospcode,$data['hn'],to_mysql_date($data['date_serv']), $data['diagcode']);

                if(!$is_exist)
                {

                    $data['e0_hosp']    = ( $this->get_e0_hosp( $this->hospcode ) ) + 1;
                    $data['e1_hosp']    = ( $this->get_e1_hosp( $this->hospcode, $data['code506'] ) ) + 1;

                    $data['amp_code']   = $this->amp_code;
                    $data['addrcode']   = $data['changwat'] . $data['ampur'] . $data['tambon'] . $data['moo'];

                    $age = get_current_age( to_mysql_date( $data['birth'] ) );

                    $data['agey'] = $age['year'];
                    $data['agem'] = $age['month'];
                    $data['aged'] = $age['day'];

                    $data['hserv'] = $this->hserv;

                    $rs = $this->patient->save( $data );

                    if($rs)
                    {
                        //update status
                        $this->patient->updat_waiting_status( $data['id'], '2' );
                        $json = '{"success": true}';
                    }
                    else
                    {
                        $json = '{"success": false, "msg": "ไม่สามารถบันทึกรายการได้"}';
                    }
                }
                else
                {
                    $json = '{"success": false, "msg": "รายการซ้ำ"}';
                }

            }
            else
            {
                $json = '{"success": false, "msg": "ไม่พบข้อมูลที่ต้องการบันทึก"}';
            }

            render_json($json);
        }
        else
        {
            show_error('No ajax.', 404);
        }
    }
    /*    public function save_e0()
        {
            if($this->input->is_ajax_request())
            {
                $data = $this->input->post('data');
                if(!empty($data))
                {
                        $data['e0'] = ($this->get_e0())+1;
                        $data['e1'] = ($this->get_e1($data['code506']))+1;
                        //$data['e0_sso'] = ($this->get_e0_sso($this->amp_code))+1;
                        //$data['e1_sso'] = ($this->get_e1_sso($this->amp_code, $data['code506']))+1;


                        $rs = $this->patient->save_e0($data);

                        if($rs)
                        {
                            //update status
                            //$this->patient->updat_waiting_status($data['id'], '2');
                            $json = '{"success": true}';
                        }
                        else
                        {
                            $json = '{"success": false, "msg": "ไม่สามารถบันทึกรายการได้"}';
                        }
                }
                else
                {
                    $json = '{"success": false, "msg": "ไม่พบข้อมูลที่ต้องการบันทึก"}';
                }
                render_json($json);
            }
            else
            {
                show_error('No ajax.', 404);
            }
        }*/

    public function get_e0()
    {
        $rs=$this->patient->get_e0();
        return $rs->e0_max;
    }
    public function get_e1($code506)
    {
        $rs=$this->patient->get_e1($code506);
        return $rs->e1_max;
    }

    public function get_e0_hosp($hospcode)
    {
        $rs=$this->patient->get_e0_hosp($hospcode);
        return $rs->e0_hosp_max;
    }
    public function get_e1_hosp($hospcode,$code506)
    {
        $rs=$this->patient->get_e1_hosp($hospcode,$code506);
        return $rs->e1_hosp_max;
    }

    public function search()
    {
        $query = $this->input->post('q');

        if(empty($query) || strlen($query) < 2)
        {
            $json = '{"success": false, "msg": "กรุณาระบุคำค้นหา"}';
        }
        else
        {
            $rs = $this->patient->search($this->hospcode, $query);

            if($rs)
            {
                $arr_result = array();

                foreach($rs as $r)
                {
                    $obj = new stdClass();

                    $obj->e0        = $r->e0_hosp;
                    $obj->e1        = $r->e1_hosp;

                    $obj->id        =$r->id;
                    $obj->name      = $r->name;
                    $obj->hn        = $r->hn;
                    $obj->cid       = $r->cid;
                    $obj->datesick  = to_thai_date($r->datesick);
                    $obj->address   = $r->address . ' ' . get_address($r->addrcode);
                    $obj->diag      = $r->icd10 . ' ' . $this->basic->get_diagname($r->icd10);
                    $obj->code506   = $r->disease . ' ' . $this->basic->get_code506name($r->disease);
                    $obj->nation    = get_nation_nhso_name($r->nation);
                    $obj->ptstatus  = $r->result;

                    $arr_result[] = $obj;
                }

                $rows = json_encode($arr_result);
                $json = '{"success": true, "rows": '.$rows.'}';
            }
            else
            {
                $json = '{"success": false, "msg": "ไม่มีข้อมูล."}';
            }
        }
        render_json($json);
    }
    public function member()
    {
        //$this->layout->setLayout('default_layout');
        $this->basic->set_page_view('member');
        $this->layout->view('admin/all_users_view');
    }

}

/* End of file patients.php */
/* Location: ./application/controllers/patients.php */