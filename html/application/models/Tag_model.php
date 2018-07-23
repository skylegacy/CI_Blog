<?php

class Tag_model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
       
        $this->load->database('default');
        
    }
    public function deleteItem_tag($id)
    {
    	$this->db->where('id', $id);
		$this->db->delete('tags');
		return mysql_affected_rows();
    }
    public function updateItem_tag($array)
    {
    	$this->db->trans_start();
		
		$data=array(
		'name'=>$array['name'],
		);
		
		$this->db->where('id',$array['id']);
		$this->db->update('tags', $data);
		
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
		    return "rollback";
		}
		else
		{
		    $this->db->trans_commit();
		    
		    return '已成功修改標籤'.$array['id'];
		}
    }
    
    public function readItem_tag($tb_name,$id)
    {
    	$this->db->trans_start();
    	
    	$this->db->select('id,name,tb_name');
        $this->db->from('tags');
        $array = array('id'=> $id, 'tb_name' => $tb_name);
        $this->db->where($array);
        $query_1 = $this->db->get();
        
        $this->db->trans_complete();
	    if ($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
		}
		else
		{
		    $this->db->trans_commit();
		    
		    return $query_1->result_array();
		}
    }
    
    public function createItem_tag($array)
    {
    	
       $this->db->trans_start();
       
       $this->db->select('name');
       $this->db->from('tags');
       $this->db->where($array);
       $query_1 = $this->db->get();

       $temp=$query_1->result_array()[0];
       
       if($temp['name']==''){
       	 $back['bstr']='名稱未重複,允許新增!';
       	 $back['agre']=true;
       	 $this->db->insert('tags', $array);
       }else{
       	 $back['bstr']=$temp['name']."名稱重複了";
       	 $back['agre']=false;
       }
      
      $this->db->trans_complete();
			
		if ($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
		    return "rollback";
		}
		else
		{
		    $this->db->trans_commit();
		    return $back;
		}
    }
    
    public function readSum_tags()
    {
    	//SELECT id,name FROM skypony.tags;
    	$this->db->select('*');
    	$this->db->from('tags');
    	$query = $this->db->get();
    	return $query->result_array();
    }
}

?>