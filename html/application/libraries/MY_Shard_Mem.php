<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
  ipc shared memory resource
*/
class MY_Shard_Mem
{
    private $f_Id;
    private $shm_link;
    private $size=4096;
    public $tempIpList;
   
    public function __construct()
    {
        $this->f_Id=ftok( __FILE__,'R');
        // echo "已實例化類別/<br>";
    }
    
    public function getShmId()
    {
        return $this->f_Id;
    }
    
    public function genConnect()
    {
        $this->shm_link=shmop_open($this->getShmId(),'c',0644,$this->size);
    }
    
    public function writeData($data)
    {
        shmop_write($this->shm_link, $data, 0);
    }
    public function readData()
    {
        $data = shmop_read($this->shm_link, 0, $this->size);
        return $data;
    }
    public function initTempIpArray()
    {
        
        try{
            
         error_reporting(0);

         $temp_data =unserialize($this->readData());
         
         throw new Exception();
            
        }catch(Exception $e){
            
           //echo $e->getMessage();
           
           if(in_array("SkyOps",$temp_data)){
               //echo "數據不為空,無須植入數據";
           }else{
               echo "數據為空,植入數據,防止解析錯誤";
               $data = array("SkyOps");
               $this->writeData(serialize($data));
           }
        }

        // var_dump( $temp_data);
        $this->tempIpList= $temp_data;

    }
    public function addIDtoTempArray($nID){
        
        $this->initTempIpArray();
        $ipExist= in_array($nID,$this->tempIpList);
        if($ipExist){
            return false;
        }else{
            
            $new_OnlineList= $this->tempIpList;
            array_push($new_OnlineList,$nID);
            $this->writeData(serialize($new_OnlineList));
            return true;
            
        }
    }
    
    public function addIPtoTempArray($nIP,$nID)
    {
        $this->initTempIpArray();
        $ipExist = array_key_exists($nIP,$this->tempIpList);
        
        if($ipExist){
            return false;
        }else{
             
            $new_OnlineList= $this->tempIpList;
            if(!in_array($nID,$new_OnlineList)){
                
                $new_OnlineList[ $nIP ]=$nID;
                $this->writeData(serialize($new_OnlineList));
                return true;
                
            }else{
                
                return false;
                
            }
        }
        
    }
    public function deleIDtoTempArray($nID)
    {
        $this->initTempIpArray();
        $ipExist = in_array($nID,$this->tempIpList);
        if($ipExist){
            $filterEle = array($nID);
            $old_OnlineList= $this->tempIpList;
            $new_OnlineList=array_diff($old_OnlineList,$filterEle);
            
            $this->writeData(serialize($new_OnlineList));
            return true;
        }else{
            exit("$nID不存在不可卸載<br>");
        }
         
    }
    public function deleIPtoTempArray($nIP,$nID)
    {
        $this->initTempIpArray();
        $ipExist = array_key_exists($nIP,$this->tempIpList);
        
        if($ipExist){

            $filterEle = array($nIP=>$nID);
            $old_OnlineList= $this->tempIpList;
            $new_OnlineList=array_diff_key($old_OnlineList,$filterEle);
            $this->writeData(serialize($new_OnlineList));
            return true;
            
        }else{
           exit("$nIP不存在不可卸載<br>");
        }
        
    }
    
    public function deleteConnect()
    {
        shmop_delete($this->shm_link);
    }
    
    public function closeConnect()
    {
        shmop_close($this->shm_link);
    }
     
    
}
