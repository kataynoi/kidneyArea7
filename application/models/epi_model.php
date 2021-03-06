<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Report model
 *
 * @author  Mr.Satit Rianpit <rianpit@yahoo.com>
 * @copyright   MKHO <http://mkho.moph.go.th>
 *
 */

class Epi_model extends CI_Model
{
    public $hospcode;
    public $year;


    public function get_vaccine($s,$e,$vaccode)
    {
        $rs = $this->db
            ->select(' c.distid as id,c.distname as name,count(*) as time,count(DISTINCT a.CID) as total ',false)
            ->select(' SUM(IF(a.HOSPCODE=a.VACCINEPLACE,1,0)) as in_hos,SUM(IF(a.HOSPCODE!=a.VACCINEPLACE,1,0)) as out_hos',false)
            ->join('co_office b','a.HOSPCODE=b.off_id')
            ->join('co_district c' ,'b.distid=c.distid')
            ->where('a.VACCINETYPE',$vaccode)
            ->where("DATE_FORMAT(a.DATE_SERV,'%Y-%m-%d') BETWEEN '".$s."' AND '".$e."'",'',FALSE)
            ->where(' sex IN(1,2) AND TYPEAREA IN (1,3) AND DISCHARGE = 9 AND NATION = 099','',false)
            ->group_by('b.distid')
            ->get('person_epi a')
            ->result();
        return $rs;
    }
    public function get_vaccine_by_amp($s,$e,$vaccode,$amp)
    {
        $rs = $this->db
            ->select(' b.off_id as id,b.off_name as name,count(*) as time,count(DISTINCT a.CID) as total ',false)
            ->select(' SUM(IF(a.HOSPCODE=a.VACCINEPLACE,1,0)) as in_hos,SUM(IF(a.HOSPCODE!=a.VACCINEPLACE,1,0)) as out_hos',false)
            ->join('co_office b','a.HOSPCODE=b.off_id')
            ->where('a.VACCINETYPE',$vaccode)
            ->where('b.distid',$amp)
            ->where("DATE_FORMAT(a.DATE_SERV,'%Y-%m-%d') BETWEEN '".$s."' AND '".$e."'",'',FALSE)
            ->where(' sex IN(1,2) AND TYPEAREA IN (1,3) AND DISCHARGE = 9 AND NATION = 099','',false)
            ->group_by('b.off_id')
            ->get('person_epi a')
            ->result();
        return $rs;
    }
    public function get_vaccine_by_hospcode($s,$e,$vaccode,$hospcode,$start,$limit)
    {
        $rs = $this->db
            ->select(' a.CID as id,a.PTNAME as name,count(*) as time,count(DISTINCT a.CID) as total ',false)
            ->select(' SUM(IF(a.HOSPCODE=a.VACCINEPLACE,1,0)) as in_hos,SUM(IF(a.HOSPCODE!=a.VACCINEPLACE,1,0)) as out_hos',false)
            ->join('co_office b','a.HOSPCODE=b.off_id')
            ->where('a.VACCINETYPE',$vaccode)
            ->where('a.HOSPCODE',$hospcode)
            ->where("DATE_FORMAT(a.DATE_SERV,'%Y-%m-%d') BETWEEN '".$s."' AND '".$e."'",'',FALSE)
            ->where(' sex IN(1,2) AND TYPEAREA IN (1,3) AND DISCHARGE = 9 AND NATION = 099','',false)
            ->group_by('a.CID')
            ->limit($start,$limit)
            ->get('person_epi a')
            ->result();
        return $rs;
    }
    public function get_vaccine_by_hospcode_total($s,$e,$vaccode,$hospcode)
    {
        $rs = $this->db
            ->where('a.VACCINETYPE',$vaccode)
            ->where(array('a.HOSPCODE'=>$hospcode))
            ->where("DATE_FORMAT(a.DATE_SERV,'%Y-%m-%d') BETWEEN '".$s."' AND '".$e."'",'',FALSE)
            ->where(' sex IN(1,2) AND TYPEAREA IN (1,3) AND DISCHARGE = 9 AND NATION = 099','',false)
            //->group_by('a.CID')
            ->count_all_results('person_epi a');
        //echo $this->provis->last_query();
        return $rs ? $rs : 0;
    }
    public function get_cover_vaccine1_total($as,$ae,$hospcode)
    {
        $rs = $this->db
            ->where(array('a.HOSPCODE'=>$hospcode))
            ->where("a.AGE BETWEEN '".$as."' AND '".$ae."'",'',FALSE)
            ->where(' SEX IN(1,2) AND TYPEAREA IN (1,3) AND DISCHAR = 9 AND NATION = 099','',false)
            //->group_by('a.CID')
            ->count_all_results('person a');
        //echo $this->provis->last_query();
        return $rs ? $rs : 0;
    }

    public function get_cover_vaccine1($as,$ae,$hospcode,$start,$limit)
    {
       $sql="SELECT a.HOSPCODE,a.PTNAME,a.AGE,a.MONTH,a.CID,c.distid,count(DISTINCT a.cid) as target,
DATE_FORMAT(SUM(IF(b.VACCINETYPE='010',b.DATE_SERV,NULL)),'%Y-%m-%d') as BCG,
DATE_FORMAT(SUM(IF(b.VACCINETYPE='093',b.DATE_SERV,NULL)),'%Y-%m-%d') as DTPHB3,
DATE_FORMAT(SUM(IF(b.VACCINETYPE='083',b.DATE_SERV,NULL)),'%Y-%m-%d') as OPV3,
DATE_FORMAT(SUM(IF(b.VACCINETYPE='061',b.DATE_SERV,NULL)),'%Y-%m-%d') as MMR,
DATE_FORMAT(SUM(IF(b.VACCINETYPE='034',b.DATE_SERV,NULL)),'%Y-%m-%d') as DTP4,
DATE_FORMAT(SUM(IF(b.VACCINETYPE='084',b.DATE_SERV,NULL)),'%Y-%m-%d') as OPV4,
DATE_FORMAT(SUM(IF(b.VACCINETYPE='052',b.DATE_SERV,NULL)),'%Y-%m-%d') as JE2,
DATE_FORMAT(SUM(IF(b.VACCINETYPE='035',b.DATE_SERV,NULL)),'%Y-%m-%d') as DTP5,
DATE_FORMAT(SUM(IF(b.VACCINETYPE='085',b.DATE_SERV,NULL)),'%Y-%m-%d') as OPV5,
DATE_FORMAT(SUM(IF(b.VACCINETYPE='053',b.DATE_SERV,NULL)),'%Y-%m-%d') as JE3


FROM person a
LEFT JOIN person_epi b ON a.cid=b.CID
JOIN co_office c ON a.HOSPCODE=c.off_id
WHERE a.HOSPCODE='".$hospcode."' AND a.AGE BETWEEN '".$as."' AND '".$ae."'
AND a.TYPEAREA in ('1','3')
GROUP BY a.CID
ORDER BY a.AGE,a.month LIMIT ".$start.",".$limit."";
        $rs=$this->db->query($sql)->result();
        return $rs;
    }

}
/* End of file basic_model.php */
/* Location: ./application/models/basic_model.php */