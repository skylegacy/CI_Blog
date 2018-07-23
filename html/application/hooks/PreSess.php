<?php
/**
 * Created by PhpStorm.
 * User: chenydf6v
 * Date: 2018/3/24
 * Time: 下午 11:01
 */

class PreSess
{
     private $CI;

     private $urlCtrl;
     private $urlMethod;

     private $acl_path;
     private $urlMatch;

     private $ViewInfo;

     public function __construct()
     {
         $this->CI =&get_instance();
         $this->CI->config->load('routes');
         $this->CI->load->library('form_validation');
         $this->CI->load->library('session');
         $this->CI->load->library('MY_Global_Vars');
         $this->CI->load->helper('url');
         //$reqPath=$_SERVER['PHP_SELF'];


         $arr = explode('/',$_SERVER['REQUEST_URI']);
         $arr = array_slice($arr,1,count($arr));

         if(count($arr)==1){
            //echo "arr is empty <br>";
             $this->urlCtrl=null;
             $this->urlMethod=null;
         }else{
             $this->urlCtrl=$arr[0];
             $this->urlMethod=$arr[1];
         }
         $this->checkSessionAcl();

     }

     private function checkSessionAcl()
     {

         $acl_list=$this->CI->config->item('acl');

         $this->ViewInfo = array(
             'hasSess' =>'none',
             'myPath'  =>'none',
             'urlMatch'=> NULL
         );

         if(!$this->CI->session->has_userdata('user_id')){

             $UserSessData = array(
                 'user_id'    =>'none',
                 'user_pass'  =>'none',
                 'user_role'  =>'guest',
                 'logged_in'  => FALSE,
                 'referred_from' => 'none',
                 'user_ip_addr' => 'none'
             );

             $this->ViewInfo['hasSess']="沒有session";
             $this->CI->session->set_userdata($UserSessData);
             $role=$this->CI->session->userdata('user_role');
             $this->acl_path = $acl_list[$role];

         }else{

             $this->ViewInfo['hasSess']="有session";
             $this->ViewInfo['myPath']=$this->CI->session->userdata('user_role');
             $role=$this->CI->session->userdata('user_role');
             $this->acl_path = $acl_list[$role];
         }
         
          $newIp = $this->CI->my_global_vars->getIpUniform();
          $this->CI->session->set_userdata('user_ip_addr',$newIp);
         //echo "符合路徑";

     }

     public function filter()
     {
         if(isset($this->urlCtrl)&&isset($this->urlMethod)){

             //print_r($this->acl_path);

             $patternA = '/'.$this->urlCtrl.'/i';
             $patternB = '/'.$this->urlMethod.'/i';

             $Confirm_A=false;
             $Confirm_B=false;

             foreach($this->acl_path as $key_A => $value) {

                 if (preg_match($patternA,$key_A)){

                     foreach ($this->acl_path[$key_A] as $key_B){

                         if(preg_match($patternB,$key_B)){

                             $Confirm_B=true;
                             //echo 'find_method: '.$key_B.' / ';
                             //確認方法

                         }else if(!$Confirm_B){
                             $Confirm_B=false;
                             //查無方法
                         }
                     }

                     $Confirm_A = true;
                     //echo 'find_ctrl: '.$key_A.' / ';
                     //確認路由

                 }else if(!$Confirm_A&&!$Confirm_B){
                     $Confirm_A=false;
                     //查無路由
                 }

             }

             if((!$Confirm_A&&!$Confirm_B)||($Confirm_A&&!$Confirm_B)){


                 // echo "<br>(請跳轉頁面)<br>";

                 $this->urlMatch=FALSE;

             }else{

                 //echo uri_string();
                 //echo "<br>(維持原頁)<br>";

                 $this->urlMatch=TRUE;

             }
         }

         //設置全局參數
         $this->CI->my_global_vars->nowCurrentPage=$this->urlMatch;

         $this->ViewInfo['urlMatch']=$this->urlMatch;
         $this->CI->load->vars($this->ViewInfo);

     }


}