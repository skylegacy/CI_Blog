<?php

class Tag extends CI_Controller
{
    private $shdMem;
    private $ipContainer;
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->model('tag_model');
        $this->load->library('MY_BrdCrub');
        $this->load->library('session');
        $this->load->library('MY_Global_Vars');
        $this->load->library('MY_Shard_Mem');
        $this->load->library('parser');
 
        $this->shdMem = new MY_Shard_Mem;
        $this->shdMem->genConnect();
        $this->shdMem->initTempIpArray();
   
        
    }
    
    public function CreateItem()
    {
    	$sqlData = array(
            'name' => $this->input->post('name'),
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
           
            $status =$this->tag_model->createItem_tag($sqlData);
        }
   
        $arr = array('status'=>$status['bstr'],'pass'=>$status['agre']);
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
                'name' => ''
                )
            )
        );
        
        $data['formPath']='Tag/CreateItem';
        $this->parser->parse('tag_edit', $data);
        $this->load->view('foot');
    }
    public function UpdateItem()
    {
     
    	$sqlData = array(
            'name' => $this->input->post('name'),
            'id' => $this->input->post('id')
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
        	
            $status =$this->tag_model->updateItem_tag($sqlData);
        }
        $arr = array('status'=>$status,'pass'=>$condit);

        header('Content-Type: application/json');
        echo json_encode( $arr );
       
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
        
         if($this->uri->segment(3)){
            preg_match('/(^[a-z]+)(\d+$)/', $this->uri->segment(3), $matches);
            //預置數據ID
            $data['hidden_input']=$matches[2];
            //$matches[1]  資料表名欄 //$matches[2]   資料表id欄
            $temp=$this->tag_model->readItem_tag($matches[1],$matches[2]);
            $data['name']=$temp[0]['name'];
         } 
         
         $data['subPath']=base_url().'Tag/UpdateItem';
         $data['formPath']='Tag/UpdateItem';
         $this->parser->parse('tag_edit', $data);
         $this->load->view('foot');
    }
    public function DeleItem()
    {
    	$arr = array('status'=>'未接收到json','pass'=>true);
    	$TbName=$this->input->post('tbname');
        $TbID=$this->input->post('id');
        if(!empty($TbName)){
            
            $this->tag_model->deleteItem_tag($TbID);
            $arr['status']='已刪除一筆資料 id: '.$TbID;
            $arr['delid']=$TbID;
        }
        
        header('Content-Type: application/json');
        echo json_encode( $arr );
    }
    
    public function tagList()
    {
        
        $model_result_arr = $this->tag_model->readSum_tags();
        $data['listItemData']=[];
        foreach ($model_result_arr as $row)
        {
            $data['listItemData'][]=$row;
        }
       
        $this->load->view('header');
        $this->load->view('banner');
        $data['bpath']=$this->my_brdcrub->output();
        $this->load->view('brdcrub',$data);
 
        $this->load->view('tag_list',$data);
        $this->load->view('foot');
        
        
    }
}

?>