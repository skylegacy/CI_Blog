<div class="ui raised  text  segment items" style="width:90%;margin:20px auto 20px auto;">
      
  <div class="ui " style="padding:20px 0 20px 10px">
     
      <span class="ui header" style="font-size:26px;"><?php echo $method_name; ?>文章詳細資料</span>
       
       <p>xxx</p>
       
      
  </div>
  
  <form class="ui form" action="{subPath}" method="post" id="article_form">
        
        
          <div class="inline fields">
            <div class="sixteen wide field">
              <label style="width:120px;font-size:16px">文章標題</label>
              <input name="art_title" style="width:450px;" type="text" value="<?php echo $sql_result['val_result']['title']; ?>">
            </div>
          </div>
          
          <div class="inline fields">
          	 <div class="sixteen wide field">
			    <label style="width:120px;font-size:16px" >文章內容</label>
			    <textarea name="art_inner" style="width:450px;align-align:left;"><?php echo $sql_result['val_result']['description']; ?></textarea>
			  </div>
		  </div>
		  <div class="inline fields">
		  
		    <label style="width:120px;font-size:16px">文章類別</label>
		    <div class="field" style="width:450px;">
		       
		       <fieldset id="multiSelect"><legend>任選一或多個類別</legend>
	 
					<div class="ui multiple selection dropdown">
					  <!-- This will receive comma separated value like OH,TX,WY !-->
					  <input name="cate_row" type="hidden" value="<?php echo $selectDefault; ?>">
					  <i class="dropdown icon"></i>
					  <div class="default text">States</div>
					  <div id="ajaxData_in" class="menu">
					     
					  </div>
					</div>
					
		        </fieldset>
		     </div>
		  </div>
		  
		  <div class="inline fields">
		  	
		    <label style="width:120px;font-size:16px">文章標籤</label>
		    <div class="field" style="width:450px;">
		       
		       	
		       	 <?php 
                
                 
                 $htmstr='<fieldset id="multiSelect"><legend>任選一或多個標籤</legend>';
                 
                 for($i=0;$i<count($sql_result['chebox_result']);$i++){

                 	$sum=$sql_result['chebox_result'];
                 	$htmstr.=<<<EOD
                      <div style="height:20px;line-height:0.5;display:inline-block">
    					<input type="checkbox" name="tagname_row[]" id="{$sum[$i]['id']}" value="{$sum[$i]['id']}" />
    					<label for="{$sum[$i]['id']}">{$sum[$i]['name']}</label><br />
				     </div> 

EOD;
                 }
                 $htmstr.='</fieldset>';
                 echo $htmstr;
           
                 ?> 
               
          </div>
          </div>
          
          <div class="inline fields">
                 <ui class="sixteen wide field" style="padding:20px 0 20px 0;text-align:center;">
                 	<li style="display:inline-block;width:100px;">
                 		<input  type="submit" class="large ui primary button">
                 		<!--onsubmit="return showHint();"-->
                 	</li>
                 	<li style="display:inline-block;width:100px;">
                 		<a href="/Article/showList" class="large ui button"> 取消 </a >
                 	</li>

                 </ui>
                
                 
           </div>
   
  
 
     
      <input type="hidden" name="id" value="{hidden_input}">
  </form><!--ui form  end -->
  
  <div id="Hint" class="small hidden ui negative message">
      <i class="close icon"></i>
          <div class="header"> 記錄插入錯誤</div>
   </div>
 
 <script type="text/javascript" src="<?php echo site_url('asserts/ckeditor/ckeditor.js'); ?>"></script>
 <?php

      $js_string =<<<EOD
      <script type="text/javascript">
      
EOD;
      
     
     
     $temp_check =$sql_result['val_result']['tag_row'];
     
     for($z=0;$z<count($temp_check);$z++){
     	$js_string .='$("#multiSelect input[id=\''.$temp_check[$z]['tagId'].'\']").prop("checked", true);';
     }
     
     
     $js_string .= <<<EOD
     \n
     $("#article_form").submit(function(e){
          e.preventDefault();
          function processData(){
			   
			   var data = CKEDITOR.instances.art_inner.getData()
			   //alert(data);
			   for ( instance in CKEDITOR.instances ){
        			CKEDITOR.instances[instance].updateElement();
			   }
		  }
          processData();
          $.post("/{$formPath}",$("#article_form").serialize(),
              function(data){
                  var status = data.status;
                  console.log($("#article_form").serialize());
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
      
      CKEDITOR.replace( 'art_inner', {});
      </script>
EOD;
   
     echo $js_string;
   
?>
  <script>
  
		 	
	
	        function recurParent(data, $e,dataArr){
				
				function createInner(childData,$target){
					
				    var opt = $('<div class="item">');
				    var texstr='';
				    if (childData.nodes != undefined && childData.nodes.length > 0) {
				            
				            for (var i = 0; i < childData.nodes.length; i++) {
				                var child = childData.nodes[i];
				                createInner(child, $target);
				            };
				            
			        }else{
			        	//texstr+='__';
			        }
			        if (childData.name != 'root'){
			    	     //texstr+='__';
			    		 opt.text(texstr+childData.name);
			    		 dataArr.push({id:childData.id,name:childData.name});
			    		 opt.attr("data-value",childData.id);
			    		 opt.appendTo($target);
			    	} 
			        
				 }
			     for(var key in data){
			     	createInner(data[key],$e);
			     }
			}
			
		    var optionDataRow=[];
		    
		 //   $.when($.get("/Category/ajax_RebuildTree")).done(function(data,status){
		    	
			//     jsonTree= JSON.parse(data);
			// 	recurParent(jsonTree,$('#multiSelect select'),optionDataRow);
			// 	$('.multiple.ui.dropdown').dropdown();
				
			// }).then(function (data) {
				
			//     $('.multiple .menu .item').each(function(i,ele){
			// 	 //var name=$(this).data('value');
			//         $(ele).attr('data-id',optionDataRow[i].id);
			//     });
			 
			// });
			
			  $.when($.get("/Category/ajax_RebuildTree")).done(function(data,status){
		    	
			    jsonTree= JSON.parse(data);
				recurParent(jsonTree,$('#ajaxData_in'),optionDataRow);
				$('.ui.multiple.selection').dropdown();
				
			}).then(function (data) {
				
			    $('.menu .item').each(function(i,ele){
			    	
			       //console.log(optionDataRow[i]);
				   //var name=$(this).data('value');
			        //$(ele).attr('data-id',optionDataRow[i].id);
			    });
			 
			});
			 
			
			
			
			
			
			
 </script>
</div>
 