<?php
/**
 * Created by PhpStorm.
 * User: chenydf6v
 * Date: 2018/3/28
 * Time: 下午 11:32
 */

class PreLoged
{
    private $CI;

    public function __construct()
    {
        $this->CI =&get_instance();
        $this->CI->load->library('session');
        $this->CI->load->library('MY_Global_Vars');

        if($this->CI->session->userdata('referred_from')=='none'){
            $this->CI->session->set_userdata('referred_from', current_url());
        }
        
        
    }

    public function __destruct()
    {
        //echo "結束生命..<br>";
    }
    public function mainExecute()
    {

        $nowCtrl = $this->CI->uri->segment(1);
        $nowMethod = $this->CI->uri->segment(2);


        if($this->CI->my_global_vars->nowCurrentPage){

            //echo "<br>(維持原頁)<br> ";
            $this->CI->session->set_userdata('referred_from', '/'.$nowCtrl.'/'.$nowMethod);

        }else{

            //echo "<br>(請跳轉頁面)$referred_from<br> ";
            $referred_from = $this->CI->session->userdata('referred_from');
            redirect($referred_from, 'locate');

        }

    }

}