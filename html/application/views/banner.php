    <div class="ui visible inverted left vertical sidebar menu">
         <div class="item">
            <img class="logo" src="<?php echo base_url(); ?>asserts/img/logo.png" style="max-width:40px;max-height:auto;display:inline;"> SKY NIGHT OPS
        </div>
         
        <a href="/Article/showList" class="item"><i class="calendar icon"></i>文章列表 </a>
        <a href="/Users/MemberList" class="item"><i class="smile icon"></i> 會員管理 </a>
        <a href="/Tag/tagList" class="item"><i class="block layout icon"></i> 標籤管理 </a>
        <a href="/Users/nowOnLine" class="item"><i class="calendar icon"></i>誰在線上 </a>
    </div>
    
<div class="pushable">
<div class="pusher" style="padding-bottom:50px">
    
<div class="navWrap">
    <div class="ui grid inverted menu" style="min-height:40px;">
    
        <a class="right item"> <i class="grid layout icon"></i> Browse </a>
        <a class="item"> <i class="mail icon"></i> Messages </a>

        <div class="ui simple dropdown item">
            <?php
            echo "<i class='user icon'></i>";
               $account = $this->session->userdata('user_id');
               echo $account;
            ?>
        <i class="dropdown icon"></i>
        <div class="menu">
          <?php 
                    echo "<p class=\"item\">會話: ".$hasSess." </p> ";
                    echo "<p class=\"item\">權限: ".$myPath." </p> ";
                ?>
          <div class="divider"></div>
           
          <?php  $visible=$this->session->userdata('logged_in');
                if($visible){

                    echo "<a class='item' href=\"";
                    //echo base_url();
                    echo "/LogCheck/logout\"><i class=\"sign out icon\"></i>登出</a>";
                }else{

                    echo "<a class='item' href=\"";
                    //echo base_url();
                    echo "/LogCheck/login\"><i class=\"sign in icon\"></i>登入</a>";
                }
                ?>
        </div>
      </div>
    
</div>
    
</div>
<div class="mainWrap">
    
    <div class="ui equal width">
        <div class=" top_banner  ">
            <div class="four wide column">
            <p>topbanner</p>
    
        </div>
            <div class="four wide column">
            <p>topbanner</p>
    
        </div>
            <div class="four wide column">
            <p>topbanner</p>
    
        </div>
            <div class="four wide column">
            <p>topbanner</p>
    
        </div>
        </div>
        
   
    
    
    


    

    
        
        


