<?php
/**
 * Created by PhpStorm.
 * User: chenydf6v
 * Date: 2018/7/12
 * Time: 下午 02:58
 */

class Article extends CI_Controller
{
    private $shdMem;
    private $ipContainer;
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->model('article_model');
        $this->load->library('MY_BrdCrub');
        $this->load->library('session');
        $this->load->library('MY_Global_Vars');
        $this->load->library('MY_Shard_Mem');
        $this->load->library('parser');

        $this->shdMem = new MY_Shard_Mem;
        $this->shdMem->genConnect();
        $this->shdMem->initTempIpArray();

    }
    public function showList()
    {
    	$this->load->view('header');
        $this->load->view('banner');
        $data['bpath']=$this->my_brdcrub->output();
        $this->load->view('brdcrub',$data);
    	
    	$predata=$this->article_model->readSum_article();
    
	    for($i=0;$i<count($predata);$i++){
	     
	        
	       $_tagId=explode(',',$predata[$i]['group_concat(distinct t3.tb_name, t2.tagId)']);
	       $_name=explode(',',$predata[$i]['group_concat(distinct t3.name)']);
	       
	       $_cateId =explode(',',$predata[$i]['group_concat(distinct t5.tb_name, t4.cateId)']);
	       $_cateName =explode(',',$predata[$i]['group_concat(distinct t5.name)']);
	       
	        $data['arti_entries'][$i]['id']=$predata[$i]['id'];
	    	$data['arti_entries'][$i]['title']=$predata[$i]['title'];
	    	$data['arti_entries'][$i]['description']=htmlentities($predata[$i]['description']);
	    	$data['arti_entries'][$i]['edit']=$predata[$i]['group_concat(distinct t1.tb_name, t1.id)'];
	     
	        for($j=0;$j<count($_tagId);$j++){
	        	
	        	if(!empty($_tagId[$j])){
	        	
	        		$data['arti_entries'][$i]['tag'][$j]=array(
	        		   'name'=>$_name[$j],
	        		   'link'=>$_tagId[$j]
	        		);
	        	
	        	}
	        }
	        
	        for($x=0;$x<count($_cateId);$x++){
	        	
	        	if(!empty($_cateId[$x])){
	        	    
	        	   $data['arti_entries'][$i]['cate'][$x]=array(
	        		   'name'=>$_cateName[$x],
	        		   'link'=>$_cateId[$x]
	        		);

	        	}
	        }
	        
	    }

        $this->load->view('art_list',$data);
        $this->load->view('foot');

    }
    
    public function DeleItem()
    {
    	$arr = array('status'=>'未接收到json','pass'=>true);
        
        //接收id,tb_name 
        $TbName=$this->input->post('tbname');
        $TbID=$this->input->post('id');

        if(!empty($TbName)){
            
            $this->article_model->deleteItem_Article($TbID);
            $arr['status']='已刪除一筆資料 id: '.$TbID;
            $arr['delid']=$TbID;
        }
        
        header('Content-Type: application/json');
        echo json_encode( $arr );
    }
    
    public function UpdateItem()
    {
    	//update,delete,insert
    	
    	$id = $this->input->post('id');
    	
    	$sqlData = array(
            'title' => $this->input->post('art_title'),
            'description' => $this->input->post('art_inner'),
            'tag_row' => $this->input->post('tagname_row'),
            'cate_row'=> $this->input->post('cate_row'),
            'id' => $this->input->post('id')
        );
        
        $status = '修改成功';
        $condit = true;
        foreach($sqlData as $key => $value){
        	if($key!='tag_row'){
        		if(empty($value)){
                $status='資訊不可為空';
                $condit = false;
                break;
            	} 
        	}
            
        }
        
        if($condit==true){
        	
            $status =$this->article_model->update_Acle_with_Tags($sqlData);
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
            //$matches[1]  資料表名欄
            //$matches[2]   資料表id欄
         
            $data['sql_result']['val_result']= $this->article_model->read_Acle_with_Tags_Cates($matches[1],$matches[2]);
            $data['sql_result']['chebox_result']=$this->article_model->readSum_tags();
       }
        
        $data['subPath']=base_url().'Article/UpdateItem';
        $data['formPath']='Article/UpdateItem';
        $rebuild=$data['sql_result']['val_result']['cate_row'];
        $newStr=array();
        for($j=0;$j<count($rebuild);$j++){
        	$newStr[]=$rebuild[$j]['cateId'];
        }
        $data['selectDefault'] = implode(",", $newStr);
        $this->parser->parse('art_edit', $data);
       $this->load->view('foot');
    }
    
    public function CreateItem()
    {
 	    $sqlData = array(
            'title' => $this->input->post('art_title'),
            'description' => htmlspecialchars_decode($this->input->post('art_inner')),
            'tag_row' => $this->input->post('tagname_row'),
            'cate_row'=> $this->input->post('cate_row')
            
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
            $status=$this->article_model->create_Acle_with_Tags($sqlData);
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
           
                'article_title' => '',
                'article_inner' => '',
                'chebox_result' => $this->article_model->readSum_tags()
              
            )
        );
        $data['formPath']='Article/CreateItem';
        $this->parser->parse('art_edit', $data);
        $this->load->view('foot');
    }
    
 
}