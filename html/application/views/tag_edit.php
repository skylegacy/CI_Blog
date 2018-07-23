<div class="ui raised  text container segment items">
      
  <div class="ui " style="padding:20px 0 20px 10px">
     
      <span class="ui header" style="font-size:26px;"><?php echo $method_name; ?>標籤詳細資料</span>
       
     
  </div>
  
  <form class="ui form" action="{subPath}" method="post" id="tag_form">
        
        
          <div class="inline fields">
            <div class="sixteen wide field">
              <label style="width:120px;font-size:16px">標籤名稱</label>
              <input name="name" style="width:450px;" type="text" value="<?php echo $name; ?>">
            </div>
          </div>
        
		   
          
          <div class="inline fields">
                 <ui class="sixteen wide field" style="padding:20px 0 20px 0;text-align:center;">
                 	<li style="display:inline-block;width:100px;">
                 		<input onsubmit="return showHint();"  type="submit" class="large ui primary button">
                 	</li>
                 	<li style="display:inline-block;width:100px;">
                 		<a href="/Tag/tagList" class="large ui button"> 取消 </a >
                 	</li>

                 </ui>
                
                 
           </div>

      <input type="hidden" name="id" value="{hidden_input}">
  </form><!--ui form  end -->
  
  <div id="Hint" class="small hidden ui negative message">
      <i class="close icon"></i>
          <div class="header"> 記錄插入錯誤</div>
   </div>
  
 <?php

      $js_string =<<<EOD
      <script type="text/javascript">
     
EOD;
      
 
     
      
     
     $js_string .= <<<EOD
     \n
     $("#tag_form").submit(function(e){
          e.preventDefault();
         
          $.post("/{$formPath}",$("#tag_form").serialize(),
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
 