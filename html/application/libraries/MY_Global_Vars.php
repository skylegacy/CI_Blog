<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: chenydf6v
 * Date: 2018/3/27
 * Time: 下午 09:47
 */

class MY_Global_Vars
{


    public $nowCurrentPage;
    public $onLineList ;
    public $prevUri;

    public function __construct()
    {
        $this->nowCurrentPage=false;
        $this->prevUri='none';

    }
    
    public function getIpUniform()
    {
        $ipS=null;
        
       if (!empty($_SERVER["HTTP_CLIENT_IP"])){
           $ipS = $_SERVER["HTTP_CLIENT_IP"];
           $ipUn = "HTTP_CLIENT_IP";
       }elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
           $ipS = $_SERVER["HTTP_X_FORWARDED_FOR"];
           $ipUn = "HTTP_X_FORWARDED_FOR";
       }else{
           $ipS = $_SERVER["REMOTE_ADDR"];
           $ipUn = "REMOTE_ADDR";
       }
       
       return $ipS;
    }


}