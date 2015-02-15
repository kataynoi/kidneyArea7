<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Basic model
 *
 * @author  Mr.Satit Rianpit <rianpit@yahoo.com>
 * @copyright   MKHO <http://mkho.moph.go.th>
 *
 */

class Basic_model extends CI_Model
{
    public function get_province_area($area)
    {
        $rs = $this->db
            ->where('zonecode',$area)
            ->get('cchangwat')
            ->result();

        return $rs;
    }
    public function get_office_list_by_amp($amp)
    {
        $rs = $this->db
            ->where('distid',$amp)
            ->get('co_office')
            ->result();

        return $rs;
    }
    public function get_office_list_by_cup($id)
    {
        $rs = $this->db
            ->where('cup_code',$id)
            ->get('co_office')
            ->result();

        return $rs;
    }
public function get_chronic_group()
    {
        $rs = $this->db
            ->get('co_diseasechronic')
            ->result();

        return $rs;
    }


    public function encode($txt){
        $en=base64_encode(md5(md5($txt).'84c9aef34f7bc237'));
        return $en;
    }
    public function get_cup()
    {   $arr_in=array('05','06','07');
        $rs = $this->db
            ->where_in('off_type',$arr_in)
            ->get('co_office')
            ->result();
        return $rs;
    }
    public function get_amp($prov_code){
        $rs = $this->db
            ->where('provid', $prov_code)
            ->get('co_district')
            ->result();
        return $rs;
    }
    public function get_what_new()
    {
        $rs = $this->db
            ->limit(25)
            ->order_by('create_date','DESC')
            ->get('what_new')
            ->result();

        return $rs;
    }
    public function get_vaccine()
    {
        $rs = $this->db
            ->order_by('vaccode')
            ->get('co_vaccine')
            ->result();

        return $rs;
    }
    public function get_last_prc($prc){
        $rs=$this->db
            ->select('MAX(date_time) as max',false)
            ->where('prc_name',$prc)
            ->get('prc_run_time')
            ->row();
        return $rs->max;
}
    public function get_subdistrict_list($amp)
    {

        $rs = $this->db
            ->where('distid',$amp)
            ->get('co_subdistrict')
            ->result();

        return $rs;
    }
    public function get_village_list($tmb)
    {

        $rs = $this->db
            ->where('subdistid',$tmb)
            ->get('co_village')
            ->result();

        return $rs;
    }
    public function get_village_base($hospcode)
    {

        $rs = $this->db
            ->select('a.*,b.subdistname,c.distname')
            ->where('a.hospcode',$hospcode)
            ->join('co_subdistrict b ' ,'a.subdistid = b.subdistid')
            ->join('co_district c ' ,'a.distid = c.distid')
            ->get('co_village a')
            ->result();

        return $rs;
    }

    public function get_person($cid){
        $rs = $this->db
            ->select('a.*')
            ->where('a.cid',$cid)
            ->get('person a')
            ->result();

        return $rs;
    }
    public  function get_off_name($id){
        $rs = $this->db
            ->where('off_id',$id)
            ->get('co_office')
            ->row();

        return count($rs) > 0 ? $rs->off_name : '-';
    }
    public  function get_cid($hospcode,$pid){
        $rs = $this->hdc
            ->where('HOSPCODE',$hospcode)
            ->where('PID',$pid)
            ->get('person')
            ->row();

        return count($rs) > 0 ? $rs->CID : '';
    }
    public  function get_person_off_id($cid,$hospcode){
        $rs = $this->hdc
            ->where('HOSPCODE',$hospcode)
            ->where('CID',$cid)
            ->get('person')
            ->row();

        return count($rs) > 0 ? true : false;
    } public  function get_vaccine_name($id){
        $rs = $this->db

            ->where('vaccode',$id)
            ->get('co_vaccine')
            ->row();

        return count($rs) > 0 ? $rs->vacname : '-';
    }public  function get_person_name($id){
        $rs = $this->db

            ->where('cid',$id)
            ->get('person')
            ->row();

        return count($rs) > 0 ? $rs->PTNAME : '-';
    } public  function set_page_view($pagename){
        $user_id=$this->session->userdata('user_id');
        $rs = $this->db
            ->set('user_id',$user_id)
            ->set('date_view',date('Y-m-d H:i:s'))
            ->set('page_name',$pagename)
            ->insert('page_view');
        return $rs;
    }
    public function get_address($hospcode,$cid){
        $rs= $this->db
            ->select('CHANGWAT,AMPUR,TAMBON,VILLAGE,HOUSE_NO')
            ->where('HOSPCODE',$hospcode)
            ->where('cid',$cid)
            ->get('person')
            ->row();
        $tam_name=$this->get_subdist_name($rs->CHANGWAT.$rs->AMPUR.$rs->TAMBON);
        $address=count($rs) > 0 ? $rs->HOUSE_NO.' ม.'.$rs->VILLAGE.' ต.'.$tam_name : '-';
        return $address;
    }
    public function get_subdist_name($id){
        $rs= $this->db
            ->where('subdistid',$id)
            ->get('co_subdistrict')
            ->row();
    return count($rs) > 0 ? $rs->subdistname : '-';

    }
    public function get_diseasename($icd10){
        $rs= $this->db
            ->where('mapdisease',$icd10)
            ->get('co_disease')
            ->row();
    return count($rs) > 0 ? $rs->diseasename .'<br>['.$rs->diseasenamethai.']' : '-';

    }

    public function get_procedname($icd9){
        $rs= $this->db
            ->where('diseasecode',$icd9)
            ->get('co_diseaseproced')
            ->row();
    return count($rs) > 0 ? $rs->diseasename_en .'<br>['.$rs->diseasefullname.']' : '-';

    }
    public function get_diag_visit($hospcode,$seq){
        $rs= $this->db
            ->select('a.DIAGCODE,b.diseasename,a.DIAGTYPE,b.diseasenamethai')
            ->where('HOSPCODE',$hospcode)
            ->where('SEQ',$seq)
            ->order_by('a.DIAGTYPE')
            ->join('co_disease b','a.DIAGCODE=b.mapdisease')
            ->get('person_service_diag a')

            ->result();
        return $rs;
    }
    public function get_drug_visit($hospcode,$seq){
        $rs= $this->db
            //->select('a.DIAGCODE,b.diseasename,a.DIAGTYPE,b.diseasenamethai')
            ->where('HOSPCODE',$hospcode)
            ->where('SEQ',$seq)
            ->get('person_service_drug_opd a')

            ->result();
        return $rs;
    }
    public function get_proced_visit($hospcode,$seq){
        $rs= $this->db
            ->select('a.PROCED,b.diseasefullname')
            ->where('HOSPCODE',$hospcode)
            ->where('SEQ',$seq)
            ->join('co_diseaseproced b','a.PROCED=b.diseasecode','LEFT')
            ->get('person_service_proced_opd a')

            ->result();
        return $rs;
    }
}

/* End of file basic_model.php */
/* Location: ./application/models/basic_model.php */