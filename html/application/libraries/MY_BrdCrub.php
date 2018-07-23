<?php

  class MY_BrdCrub
  {
      private $ctrl_path;
      private $meth_path;
      private $resData;
      
      private $root_id;
      private $ctrl_id;
      private $meth_id;
      
      private $new_str;
      
      public function __construct()
      {
         $this->CI =&get_instance();
         $this->CI->config->load('routes');
         $this->resData=$this->CI->config->item('BackCrumb');
         $this->ctrl_path = $this->CI->uri->segment(1);
         $this->meth_path = $this->CI->uri->segment(2);
         
         $this->root_id = 1;
      }
      
	  public function search_by_par($array,$value1,$value2)
	  {
	  	$lastElement=end($array);
        $len= intval($lastElement['id']);
 
		 $temp_str='';
		 $this->new_str=$array[1]['funcname']."/";
		  
	     for($i=0;$i<=$len;$i++){
	     	
	     	if($array[$i]['funcword']==$value1){
		     		$this->ctrl_id=$array[$i]['id'];
		     		$this->new_str.= $array[$i]['funcname']."/";
		     		$temp_str= $this->root_id.",".$this->ctrl_id;
		    }
     		
	     }
	     
	    for($i=0;$i<=$len;$i++){
	    	
	       if($temp_str==$array[$i]['parsent']){
	       	
                if(preg_match("/".$value2."/i",$array[$i]['funcword'])){
		     		$this->meth_id=$array[$i]['id'];
		     		$this->new_str.= $array[$i]['funcname'];
		     		$temp_str= $this->root_id.",".$this->ctrl_id.",".$this->meth_id;
		     
		     	}
		     	
			} 
	    	
	    }
	   
	  }

      public function output()
      {
         
          $this->search_by_par($this->resData,$this->ctrl_path,$this->meth_path);
          
          $nestr='path:'.$this->root_id.'/'.$this->ctrl_id.'/'.$this->meth_id."<br>";
          
          //$nestr."<br>".$this->new_str."<br>";
          
          $htmData=explode("/",$this->new_str);
          
           
          $htmlstr=<<<EOD
          <div class="ui small  breadcrumb">
                    <i class="home icon"></i>
                    <div class="section">
                       <a href="#">{$htmData[0]}</a>
                    </div> 
                    <i class="right chevron icon divider"></i>
                    <div class="section">
                       <a href="#">{$htmData[1]}</a>
                    </div> 
                    <i class="right chevron icon divider"></i>
                    <div class="section">
                    	<a href="#">{$htmData[2]}</a>
                    </div> 

                </div>
EOD;
           return $htmlstr;
      }
  }

?>