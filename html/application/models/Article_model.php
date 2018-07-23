<?php

class Article_model extends CI_Model
{
	// select t2.title,t2.description,group_concat(t1.tb_name,t1.tagId separator '::'),group_concat(t3.name)
	// from tags t3, sec_article t1 left join article_item t2 on t1.acleId= t2.id
	// where t2.id=2 and t3.id=t1.tagId group by acleId;
	
	
	public function __construct()
    {
        parent::__construct();
       
        $this->load->database('default');
        
    }
    
    public function read_Acle_with_Tags($tb_name,$id)
    {
    	$this->db->trans_start();
    	
    	$this->db->select('title,description');
        $this->db->from('article_item');
        $array = array('id'=> $id, 'tb_name' => $tb_name);
        $this->db->where($array);
        $query_1 = $this->db->get();
        
        $this->db->select('tagId');
        $this->db->from('tags_insec_article');
        $array = array('acleId'=> $id);
        $this->db->where($array);
        $query_2 = $this->db->get();
        
    	
    	$this->db->trans_complete();
    	    if ($this->db->trans_status() === FALSE)
			{
			    $this->db->trans_rollback();
			}
			else
			{
			    $this->db->trans_commit();
			    $temp_array= $query_1->result_array()[0];
			    $temp_array['tag_row']=$query_2->result_array();
			    
			    return $temp_array;
			}
			
			
    }
    
    public function update_Acle_with_Tags($array)
    {
		$this->db->trans_start();
		
		$data=array(
		'title'=>$array['title'],
		'description'=>$array['description']
		);
	 
		$this->db->where('id',$array['id']);
		$this->db->update('article_item', $data);
		$this->db->where('acleId',$array['id']);
        $this->db->delete('tags_insec_article');
  
       $batchData = array();
       
       if(!empty($array['tag_row'])){
       	
       		for($j=0;$j<count($array['tag_row']);$j++){
			    $batchData[]=array(
			    	'acleId'=>$array['id'],
			    	'tagId'=>$array['tag_row'][$j]
			    );
			}
       }
      
      $this->db->insert_batch('tags_insec_article',$batchData);
	 
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
		    return "rollback";
		}
		else
		{
		    $this->db->trans_commit();
		    
		    return '已成功修改文章'.$array['id'];
		}
    }
    
    public function create_Acle_with_Tags($array)
    {
    	    $temprow_1=array();
    	    
    	    $temprow_1['title']=$array['title'];
    	    $temprow_1['description']=$array['description'];
    	    
    	    $temprow_2=array();
    	   
         	$this->db->trans_start();
			
		    $this->db->insert('article_item', $temprow_1);
			$insert_id = $this->db->insert_id();
			
			
			if(!empty($array['tag_row'])){
				
				for($j=0;$j<count($array['tag_row']);$j++){
					$temprow_2[$j]=array(
						'tagId'=>$array['tag_row'][$j],
						'acleId'=>$insert_id
					);
				}
				
				for($i=0;$i<count($temprow_2);$i++){
				
				    $tagId=$temprow_2[$i]['tagId'];
				    $acleId=$temprow_2[$i]['acleId'];
					$sql = "insert into tags_insec_article(tagId,acleId) values(".$tagId.",".$acleId.")";
					$sql .=" on duplicate key update ";
					$sql .="tagId=".$tagId.",acleId=".$acleId;
					$this->db->query($sql);
					
				}
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
			    return "文章已成功新增!";
			}
			
    }
    
    public function deleteItem_Article($id)
    {
    	$this->db->where('id', $id);
		$this->db->delete('article_item');
		return mysql_affected_rows();
    }
    
    public function readSum_tags()
    {
    	//SELECT id,name FROM skypony.tags;
    	$this->db->select('id,name');
    	$this->db->from('tags');
    	$query = $this->db->get();
    	return $query->result_array();
    }
    
	public function readSum_article()
	{
		// 	select t1.id,t1.title,t1.description,group_concat(t3.tb_name,t2.tagId),group_concat(t3.name)
		// from article_item t1 
		// left outer join tags_insec_article t2
		//   left outer join tags t3
		//   on t2.tagId = t3.id
		// on t1.id=t2.acleId
		// group by t1.id
		$this->db->select('t1.id,group_concat(distinct t1.tb_name,t1.id),t1.title,t1.description,group_concat(t3.tb_name,t2.tagId),group_concat(t3.name)');
	    $this->db->from('article_item t1'); 
	    $this->db->join('tags_insec_article t2', 't1.id=t2.acleId', 'left');
	    $this->db->join('tags t3', 't2.tagId = t3.id', 'left');
	    $this->db->group_by('t1.id');         
	    $query = $this->db->get(); 
	    if($query->num_rows() != 0)
	    {
	        return $query->result_array();
	    }
	    else
	    {
	        return false;
	    }
	}
}


?>