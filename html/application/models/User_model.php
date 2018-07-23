<?php
/**
 * Created by PhpStorm.
 * User: chenydf6v
 * Date: 2018/3/26
 * Time: 下午 07:12
 */

class User_model extends CI_Model
{
    private  $userdata;
    private $addBuffRow;
    
    public function __construct()
    {
        parent::__construct();
        
        $this->config->load('profiler');
        
        $this->load->database('default');
        
        $this->userdata = $this->config->item('data_model_user');
    }

    public function deleteItem_MemberInfo($id)
    {
         //https://blog.csdn.net/chenlong12580/article/details/7514960
         // delete from member_info where id = x
         $this->db->where('id', $id);
         $this->db->delete('member_info');
         return mysql_affected_rows();
    }
    
    
    /* 建立PDO物件 */
    public function createItem_MemberInfo($array)
    {
        
        $dsn="mysql:host=".$this->db->hostname.";dbname=".$this->db->database.";charset=utf8mb4";
        $username = $this->db->username;
        $password = $this->db->password;
        
        try
        {
           
            $conn_Pdo = new PDO($dsn,$username,$password);

            $sql = "call insertUnlockAi(:member_ac,:member_pw,:authority,:email,:member_name)";

            $res_Pdo = $conn_Pdo->prepare($sql);
            
            $res_Pdo->bindParam(":member_ac",$array['member_ac']);
            $res_Pdo->bindParam(":member_pw",$array['member_pw']);
            $res_Pdo->bindParam(":authority",$array['fk_member_auth']);
            $res_Pdo->bindParam(":email",$array['email']);
            $res_Pdo->bindParam(":member_name",$array['member_name']);
            
            $res_Pdo->execute();
            
            $result = $res_Pdo->fetch(PDO::FETCH_ASSOC);

            return $result;

        }
        catch (PDOException $e)
        {
        }
        
    }
    
    public function updateItem_MemberInfo($mid,$arr)
    {
        // update member_info set 
        // member_ac = xxx ,member_pw = xxx ,fk_member_auth = xxx ,email = xxx ,member_name = xxx \
        // where id = xxx
        $this->db->where('id', $mid);
        $this->db->update('member_info',$arr);
    }
    
    public function readSum_authur()
    {
        $this->db->select('id,auth_name');
        $this->db->from('member_authority');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function readItem_MemberInfo($tb_name,$id)
    {
       // SELECT member_ac,member_pw,fk_member_auth,email,member_name
       // FROM member_info where id = 8 and tb_name = 'minfo'
        $this->db->select('member_ac,member_pw,fk_member_auth,email,member_name');
        $this->db->from('member_info');
        $array = array('id'=> $id, 'tb_name' => $tb_name);
        $this->db->where($array);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function readSum_MemberInfo()
    {
       //SELECT id, member_ac FROM member_info
       $this->db->select('tb_name,id, member_ac');
       $query = $this->db->get('member_info');
       return $query->result_array();
    }
    
    public function getUserData()
    {
        
        $this->db->select('member_info.member_ac,member_info.member_pw,member_authority.auth_name');
        $this->db->from('member_info');
        $this->db->join('member_authority', 'member_info.fk_member_auth = member_authority.id', 'left outer');
        //$this->db->join('member_authority', 'member_info.fk_member_auth = member_authority.id');
        $query = $this->db->get();

        // 添加陣列範例:
        // $this->addBuffRow =array( '0'=>array('user_id'=>'abby','user_pass'=>'27662000') );
      
        $this->addBuffRow =array();
        
        foreach ($query->result_array() as $row)
        {
            $this->addBuffRow[]=array(
                'user_id' => $row['member_ac'],
                'user_pass' => $row['member_pw'],
                'user_auth' => $row['auth_name']
            );
            
        }
        
       
        $query->free_result();
        
        //$this->addBuffRow[]=$this->userdata[0];
        //$this->addBuffRow[]=$this->userdata[1];
        
        return $this->addBuffRow;
    }
    
    
}