<?php
/**
 * Created by PhpStorm.
 * User: chenydf6v
 * Date: 2018/3/24
 * Time: 下午 02:58
 */

class Users extends CI_Controller
{
    private $shdMem;
    private $ipContainer;
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->model('user_model');
        $this->load->library('MY_BrdCrub');
        $this->load->library('session');
        $this->load->library('MY_Global_Vars');
        $this->load->library('MY_Shard_Mem');
        $this->load->library('parser');
 
        $this->shdMem = new MY_Shard_Mem;
        $this->shdMem->genConnect();
        $this->shdMem->initTempIpArray();
   
        
    }
    /*  for AJAX  */
    public function DeleItem()
    {
        $arr = array('status'=>'未接收到json','pass'=>true);
        
        //接收id,tb_name 
        $TbName=$this->input->post('tbname');
        $TbID=$this->input->post('id');

        if(!empty($TbName)){
            
            $this->user_model->deleteItem_MemberInfo($TbID);
            $arr['status']='已刪除一筆資料 id: '.$TbID;
            $arr['delid']=$TbID;
        }
        
        header('Content-Type: application/json');
        echo json_encode( $arr );
    }
    /*  for AJAX  */
    public function UpdateItem()
    {
        $id = $this->input->post('id');
        $sqlData = array(
            'member_ac' => $this->input->post('member_ac'),
            'member_pw' => base64_encode($this->input->post('member_pw')),
            'fk_member_auth' => $this->input->post('authority'),
            'email' => $this->input->post('email'),
            'member_name' => $this->input->post('member_name')
        );
        
        $status = '修改成功';
        $condit = true;
        foreach($sqlData as $key => $value){
            if(empty($value)){
                $status='資訊不可為空';
                $condit = false;
                break;
            } 
        }
        
        if($condit==true){
            $this->user_model->updateItem_MemberInfo($id,$sqlData);
            $status = 'SQL已傳遞,資料修改成功';
        }
        $arr = array('status'=>$status,'pass'=>$condit);

        header('Content-Type: application/json');
        echo json_encode( $arr );
        
    }
    /*  for AJAX  */
    public function CreateItem()
    {
       $sqlData = array(
            'member_ac' => $this->input->post('member_ac'),
            'member_pw' => base64_encode($this->input->post('member_pw')),
            'fk_member_auth' => $this->input->post('authority'),
            'email' => $this->input->post('email'),
            'member_name' => $this->input->post('member_name')
        );
        
        $status = '新增成功';
        $condit = true;
        foreach($sqlData as $key => $value){
            if(empty($value)){
                $status='資訊不可為空';
                $condit = false;
                break;
            } 
        }
        
        if($condit==true){
            $res=$this->user_model->createItem_MemberInfo($sqlData);
            $status = $res['status'];
        }
   
        $arr = array('status'=>$status,'pass'=>$condit);
        header('Content-Type: application/json');
        echo json_encode( $arr );
    }
    
    public function Create()
    {
        $this->load->view('header');
        $this->load->view('banner');
        $data['bpath']=$this->my_brdcrub->output();
        $this->load->view('brdcrub',$data);

        $data = array(
            'method_name'=>'新增',
            'temp_contrl' => $this->uri->segment(1),
            'temp_method' => $this->uri->segment(2),
            'sql_result'=>array(
             array(
                'member_ac' => '',
                'member_pw' => '',
                'fk_member_auth' => '',
                'email' => '',
                'member_name' => '',
                'chebox_result' => $this->user_model->readSum_authur()
                )
            )
        );
        $data['result']= $this->uri->segment(3)?'有結果集':'沒有結果集';
        $data['formPath']='Users/CreateItem';
        
        $this->parser->parse('member_info_item', $data);
        $this->load->view('foot');
    }
    
    public function Update()
    {
        $this->load->view('header');
        $this->load->view('banner');
        $data['bpath']=$this->my_brdcrub->output();
        $this->load->view('brdcrub',$data);
        
        
        $data = array(
            'method_name'=>'修改',
            'temp_contrl' => $this->uri->segment(1),
            'temp_method' => $this->uri->segment(2)
           
        );
       //解析第三個參數為 資料表名+ID
       if($this->uri->segment(3)){
            preg_match('/(^[a-z]+)(\d+$)/', $this->uri->segment(3), $matches);
            //預置數據ID
            $data['hidden_input']=$matches[2];
            //$matches[1]  資料表名欄
            //$matches[2]   資料表id欄
            $data['sql_result'] = $this->user_model->readItem_MemberInfo($matches[1],$matches[2]);
       } 
       for($i=0;$i<count($data['sql_result']);$i++){
           $data['sql_result'][$i]['chebox_result']=$this->user_model->readSum_authur();
       }
       
       $data['result']= $this->uri->segment(3)?'有結果集':'沒有結果集';
       
       $data['subPath']=base_url().'Users/UpdateItem';
       $data['formPath']='Users/UpdateItem';
       
       $data['sql_result'][0]['member_pw']=base64_decode($data['sql_result'][0]['member_pw']);
       $this->parser->parse('member_info_item', $data);
       $this->load->view('foot');
    }
    
    public function MemberList()
    {
        $model_result_arr = $this->user_model->readSum_MemberInfo();
        $data['listItemData']=[];
        foreach ($model_result_arr as $row)
        {
            $data['listItemData'][]=$row;
        }
        
        $this->load->view('header');
        $this->load->view('banner');
        $data['bpath']=$this->my_brdcrub->output();
        $this->load->view('brdcrub',$data);
        $this->load->view('member_list',$data);
        
        $this->load->view('foot');
    }
    
   
    
    public function nowOnLine()
    {
        $data['nowip']=$this->session->userdata('user_ip_addr');
        $data['oldListIp']=$this->shdMem->tempIpList;
        $data['aftData']=unserialize($this->shdMem->readData());
        
        $this->load->view('header');
        $this->load->view('banner');
        $data['bpath']=$this->my_brdcrub->output();
         $this->load->view('brdcrub',$data);
        $this->load->view('member_online',$data);
        $this->load->view('foot');
    }

    public function deleteShdMem()
    {
        $this->shdMem->deleteConnect();
         //$this->shdMem->closeConnect();
    }
    
    /*  for AJAX  */
    public function ajaxValid()
    {
        $patternA = '/'.$this->input->get_post('userId').'/i';
        $patternB = '/'.base64_encode($this->input->get_post('userPass')).'/i';

        $resjson = array(
            'success'=>'驗證失敗',
            'userId'=>'無結果',
            'userPass'=>'無結果'
        );
       
        $admin_row = $this->user_model->getUserData();

        $getCondId=false;
        $getCondPass=false;
        $getCondRole=false;
        $isOnline=false;
        
        for($i=0;$i<count($admin_row);$i++){
            $Confirm_A = preg_match($patternA,$admin_row[$i]['user_id']);
            $Confirm_B = preg_match($patternB,$admin_row[$i]['user_pass']);
            $oldListIp = $this->shdMem->tempIpList;
            $Confirm_C =in_array($admin_row[$i]['user_id'], $oldListIp);
            
            if($Confirm_A&&$Confirm_B&&!$Confirm_C){

                $resjson['userId']='得到結果';
                $resjson['userPass']='得到結果';
                $resjson['success']='驗證成功';
                $resjson['userRole']=$admin_row[$i]['user_auth'];
                
                $getCondRole=$admin_row[$i]['user_auth'];

                $getCondId= true;
                $getCondPass = true;
                break;
            }
        }
        
        $nowip=$this->session->userdata('user_ip_addr');
        $nowid=$this->input->get_post('userId');

        if($getCondId&&$getCondPass){
            
            $addIPsuccess=$this->shdMem->addIDtoTempArray($nowid);
            $this->session->set_userdata('user_id',$this->input->get_post('userId'));
            //$this->session->set_userdata('user_role','users');
            $this->session->set_userdata('user_role',$getCondRole);
            $this->session->set_userdata('logged_in',true);

        }else{

           echo "沒有資料,免跳轉";

        }
 
        echo json_encode($resjson);
       
    }
}