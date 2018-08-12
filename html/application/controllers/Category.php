<?php

class Category extends CI_Controller
{
	private $shdMem;
	public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
         
        $this->load->library('MY_BrdCrub');
        $this->load->library('session');
        $this->load->library('MY_Global_Vars');
        $this->load->library('MY_Shard_Mem');
        $this->load->library('parser');
        $this->load->model('cate_model');
        $this->shdMem = new MY_Shard_Mem;
        $this->shdMem->genConnect();
        $this->shdMem->initTempIpArray();
    }
    
    public function cateList()
    {

        $this->load->view('header');
        $this->load->view('banner');
        $data['bpath']=$this->my_brdcrub->output();
        $this->load->view('brdcrub',$data);
        
        $list_item=$this->cate_model->readItem_cate_sum();
    	//$data['result']=$this->buildModel($list_item);
      
        $this->load->view('cate_list',$data);
        $this->load->view('foot');
        
    }
    public function ajax_UpdateItem(){
    	$back_name =$this->input->get_post('name');
    	$back_lft=$this->input->get_post('lft');
    	$back_rgt=$this->input->get_post('rgt');
    	$resjson=$this->cate_model->updateItem_cate($back_lft,$back_name,$back_rgt);
    	echo json_encode($resjson,JSON_UNESCAPED_UNICODE);
    }
    public function ajax_DeleItem(){
       $back_name =$this->input->get_post('name');
       $back_rgt =$this->input->get_post('rgt');
       $back_lft =$this->input->get_post('lft');
       $resjson=$this->cate_model->deleteItem_cate($back_lft,$back_name,$back_rgt)[0];
       
       echo json_encode($resjson,JSON_UNESCAPED_UNICODE);
    }
    public function ajax_CreateItem(){
      $sql_data['back_name'] =$this->input->get_post('name');
      $sql_data['back_insert'] =$this->input->get_post('insert')+1;
      $sql_data['back_parent'] =$this->input->get_post('parent');
      
      $resjson = $this->cate_model->createItem_cate($sql_data['back_insert'],$sql_data['back_name'],$sql_data['back_parent']);
      
      echo json_encode($resjson,JSON_UNESCAPED_UNICODE);
    }
    
    public function buildModel($dataArr){
 	
 	    //打包欄位建立條列子單元
    	for($i=0;$i<count($dataArr);$i++){
    		$sub_data['name']=$dataArr[$i]['name'];
    		$sub_data['id']=$dataArr[$i]['id'];
    		$sub_data['parent']=$dataArr[$i]['parent'];
    		$sub_data['lft']=$dataArr[$i]['lft'];
    		$sub_data['rgt']=$dataArr[$i]['rgt'];
    		$data[]=$sub_data;
    	}
        //將有序條列改為鍵名條列
    	foreach($data as $key => &$value){
    		$output[$value["name"]]= &$value;
    	}
    	//重建引用至原條列
    	foreach($data as $key => &$value1){
    	   // echo  "<br>".$key."//".$value1['name']."<br>".$output[$value1["name"]]['name']."::";
    		 foreach($data as $key2 => &$value2){
    			
    			if($output[$value1["name"]]['parent']==$value2['id']){
    				 //echo  "(parent node)".$value2['name']."<br>";
    				$output[$value2["name"]]['nodes'][]=&$value1;
    			}
    			
    		 }
    	}
    	//剃除root以外的陣列元素
    	foreach($data as $key => &$value){
    		
    		if($value['name']!='root'){
    		    //echo "(kick_this)";
    			unset($output[$value['name']]);
    		}
    		//echo  "get othere item: ".$value['name']."<br>";
    	}
    	return $output;
    	
    }
    
    public function ajax_RebuildTree(){
    	
    	$list_item=$this->cate_model->readItem_cate_sum();
    	$newData=$this->buildModel($list_item);
    	$data_json_en = json_encode($newData,JSON_UNESCAPED_UNICODE);
        echo $data_json_en;
    }
    
}


?>