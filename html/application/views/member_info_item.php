


<div class="ui raised  text container segment items">
      
  <div class="ui " style="padding:20px 0 20px 10px">
     
      <span class="ui header" style="font-size:26px;">{method_name}會員詳細資料</span>
       
       <p>表單路徑:{temp_contrl}/{temp_method},預查詢:{result}</p>
       
      
  </div>
  
  <form class="ui form" action="{subPath}" method="post" id="member_form">
        {sql_result}
          <div class="inline fields">
            <div class="sixteen wide field">
              <label style="width:120px;font-size:16px">會員帳號</label>
              <input name="member_ac" style="width:290px;" type="text" placeholder="account id" value="{member_ac}">
            </div>
    
          </div>
          <div class="inline fields">
            <div class="sixteen wide field">
              <label style="width:120px;font-size:16px">會員密碼</label>
              <input name="member_pw" style="width:290px;" type="text" placeholder="password" value="{member_pw}">
            </div>
    
          </div>
           <div class="inline  fields">
               <label style="width:120px;font-size:16px" for="fruit">會員權限</label>
               {chebox_result}
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" name="authority" tabindex="0" class="hidden result_box" value="{id}">
                    <label>{auth_name}</label>
                  </div>
                </div>
                {/chebox_result}
                
           </div>
           <div class="inline  fields">
                 <div class="sixteen wide field">
                    <label style="width:120px;font-size:16px">E-mail</label>
                    <input name="email" style="width:290px" type="email" placeholder="joe@schmoe.com" value="{email}">
                 </div>
           </div>
           <div class="inline  fields">
                 <div class="sixteen wide field">
                    <label style="width:120px;font-size:16px">姓&nbsp;&nbsp;&nbsp;&nbsp;名</label>
                    <input name="member_name" style="width:290px" type="text" placeholder="Sky Chen" value="{member_name}">
                 </div>
           </div>
          <div class="  fields">
                 <div class="sixteen wide field" style="padding:20px 0 20px 0;text-align:center;">
                    <input onsubmit="return showHint();" style="diplay:inline-block" type="submit" class="large ui primary button">
                    
                   
                    <a href="/Users/MemberList" style="inline-block" class="large ui button">
                      取消
                    </a >
                 </div>
           </div>
      
     {/sql_result}
     
     
      <input type="hidden" name="id" value="{hidden_input}">
  </form><!--ui form  end -->
  
  <div id="Hint" class="small hidden ui negative message">
      <i class="close icon"></i>
          <div class="header"> There were some errors with your submission </div>
   </div>
  
<?php
  
      $js_string =<<<EOD
      <script type="text/javascript">
      
      $('.ui.radio.checkbox').checkbox();\n
EOD;
      
     if(!empty( $sql_result[0]['fk_member_auth'])) {
       $js_string .="var checkNum = " . $sql_result[0]['fk_member_auth']."-1;\n";
     }else{
       $js_string .="var checkNum = 0;\n";
     }
     
     $js_string .='$(".result_box").eq(checkNum).prop("checked", true);';
     
     $js_string .= <<<EOD
     \n
     $("#member_form").submit(function(e){
          e.preventDefault();
         
          $.post("/{$formPath}",$("#member_form").serialize(),
              function(data){
                  var status = data.status;
                  
                  if(data.pass==true){
                      $("#Hint").removeClass("negative");
                      $("#Hint").addClass("success ");
                  }
                  
                  $("#Hint .header").text(status);
                  
                  $("#Hint").removeClass("hidden");
                  $("#Hint").addClass("visible");
              }
          );
          
      }); 
      
      $("#Hint .close").click(function(){
         $("#Hint").removeClass("success");
         $("#Hint").addClass("negative");
         $("#Hint").addClass("hidden");
      });
      
      </script>
EOD;
   
     echo $js_string;
   
?>
    
             
</div>
 
 