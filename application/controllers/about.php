<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: spiderman
 * Date: 13/11/2556
 * Time: 11:20 น.
 * To change this template use File | Settings | File Templates.
 */


class About extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Basic_model', 'basic');
    }

    public function index()
    {

        $data['prov']=$this->basic->get_province_area(7);
        $data['t']="SAVE";
        $this->layout->view('pages/test',$data);

    }
    public function index2()
    {

        $data['prov']=$this->basic->get_province_area(7);
        $data['t']="SAVE";
        $this->layout->view('pages/test',$data);

    }


}
