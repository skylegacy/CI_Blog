<?php
/**
 * Created by PhpStorm.
 * User: chenydf6v
 * Date: 2018/3/24
 * Time: 下午 03:44
 */

class LogCheck extends CI_Controller
{
     private $shdMem;
     public function __construct()
     {
         parent::__construct();
         $this->load->library('session');
         $this->load->library('MY_Global_Vars');
         $this->load->library('MY_Shard_Mem');
         
         $this->shdMem = new MY_Shard_Mem;
         $this->shdMem->genConnect();
         $this->shdMem->initTempIpArray();
     }

     public function login()
     {
       
         $data['title']='LogIn';
         $this->load->view('header');
         $this->load->view('login',$data);
         
     }

     public function logout()
     {
         
         $nowip=$this->session->userdata('user_ip_addr');
         $nowid=$this->session->userdata('user_id');
       
         
         $this->shdMem->deleIDtoTempArray($nowid);
        // $this->shdMem->deleIDtoTempArray('');
        
         
         $this->session->set_userdata('user_role','guest');
         $this->session->set_userdata('logged_in',FALSE);
         $this->load->view('header');
         $this->load->view('logout');
         $this->load->view('foot');

         redirect('/LogCheck/login','location');
     }
}