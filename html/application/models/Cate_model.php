<?php

class Cate_model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
       
        $this->load->database('default');
        
    }
    
    public function readItem_cate_sum()
    {
    	
    	$this->db->trans_start();
    	
    	$sql='select max(rgt) from cate_tree';
    	$num =$this->db->query($sql);
    	
    	$newlft = 1;
    	$newrgt=$num->result_array()[0]['max(rgt)'];
    	
    	$sql=" SELECT id,name,lft,rgt,parent FROM cate_tree WHERE lft BETWEEN ? AND ? ORDER BY lft ASC";
    	$coldata=array($newlft,$newrgt);
    	$sqldata=$this->db->query($sql,$coldata);
    	$this->db->trans_complete();
    	
		return $sqldata->result_array();
    }
    
    public function updateItem_cate($newlft,$newName,$newrgt)
    {
    	$this->db->trans_start();
    	$sql_1 = 'select count(*) from cate_tree where name = ?';
    	$result=$this->db->query($sql_1,array($newName));
    	$num=$result->result_array()[0]['count(*)'];
    	
    	$back=array(
    		'errorWord'=>'更新失敗..',
    		'pass'=>false
    	);
    	if($num==0){
    		$sql_2 =  'update cate_tree set name = ? where lft = ? and rgt = ?';
    	    $this->db->query($sql_2,array($newName,$newlft,$newrgt));
    	    $back['errorWord']="更新成功!";
    	    $back['pass']=true;
    	}
    	$this->db->trans_complete();
    	return $back;
    }
    
	public function deleteItem_cate($newlft,$newName,$newrgt)
	{
		$sql="CALL deleteCateNode(?,?,?);";
		$coldata=array($newlft,$newName,$newrgt);
		$sqldata=$this->db->query($sql,$coldata);
		return  $sqldata->result_array();
	}
	
	public function createItem_cate($newlft,$newName,$newParent)
	{
		$this->db->trans_start();
	 
	    $in_lft = $newlft;
        $in_name = $newName;
        $in_rgt = $in_lft+1;
        $node = $in_lft-1 ;
        $in_par = $newParent;
        $sql_0 = "select count(*) from cate_tree where name=?";
        
        $query=$this->db->query($sql_0,array($in_name));
        $foundNum=$query->result_array()[0]['count(*)'];
 
        if($foundNum>0){
        	
        	return array('errorWord'=>'插入值重複,無法新增..','pass'=>false);
        	
        }else{
        	
        	$this->db->query("set sql_safe_updates=0;");
	        $sql_1="update cate_tree set lft = lft +2 where lft > ?";
	        $sql_2="update cate_tree set rgt = rgt +2 where rgt > ?";
			$this->db->query($sql_1,array($node));
			$this->db->query($sql_2,array($node));
			$this->db->query("set sql_safe_updates=1;");
	        $sql_3="insert into cate_tree(name,lft,rgt,parent) values(?,?,?,?)";
	        $this->db->query($sql_3,array($in_name,$in_lft,$in_rgt,$in_par));
	        
	        $this->db->trans_complete();
            return array('errorWord'=>'查無插入值,插入成功!!','pass'=>true);
        }
        
		
	}
}


?>