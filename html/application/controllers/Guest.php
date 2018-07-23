<?php
/**
 * Created by PhpStorm.
 * User: chenydf6v
 * Date: 2018/3/24
 * Time: 下午 01:08
 */

class Guest extends CI_Controller
{
    private $CI;

    public function __construct()
    {
        parent::__construct();
        $this->CI=&get_instance();
        $this->CI->load->helper('url');
        $this->CI->config->item('base_url');
    }

    public function func1()
    {
        $data['baselocate']=trim(APPPATH,'\\');
        //$this->load->view('header');
        
        $this->load->view('guest',$data);
        $this->load->view('foot');
    }

    public function func2()
    {
        $data['baselocate']=trim(APPPATH,'\\');
        //$this->load->view('header');
        $this->load->view('guest2',$data);
        $this->load->view('foot');
    }
}