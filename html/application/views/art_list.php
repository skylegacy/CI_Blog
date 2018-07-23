

<div class="ui raised  text container segment items">
      
  <div class="ui " style="padding:20px 0 20px 10px">
     
      <span class="ui header" style="font-size:26px;">文章資料管理列表</span>
      <a href="/Article/Create" class="ui right floated teal icon button">
          <i class="user plus icon"></i> 新增文章
      </a>
      
      
  </div>
  
        <div id="arti_list" class="ui divided items admins">
			   
	 
			   <?php
   
               for($i=0;$i<count($arti_entries);$i++){
                    
                   $htmlstring= <<<EOD
                   
                   <div id="{$arti_entries[$i]['id']}" class="item">
			    
				    <div class="content">
				      <span class="header">{$arti_entries[$i]['title']}</span>
				     
					      <div class="description">
					        <p>{$arti_entries[$i]['description']}</p>
					      </div>
					      <div class="extra">
					        <a class="ui right floated primary button" href="Update/{$arti_entries[$i]['edit']}" >
					          編輯<i class="right chevron icon"></i>
					        </a>
					        <a data-modal="{$arti_entries[$i]['edit']}" class="ui right floated act_modal button">
					          刪除<i class="right chevron icon"></i>
					        </a>
EOD;
					 
							 for($j=0;$j<count($arti_entries[$i]['tag']);$j++){
							 
							 	$htmlstring.=<<<EOD
							 
							 <a href="{$arti_entries[$i]['tag'][$j]['link']}" class="ui label">
							     <i class="globe icon"></i>{$arti_entries[$i]['tag'][$j]['name']}
							 </a>
EOD;
							 }
							 
							 
				$htmlstring.= <<<EOD
					      </div>
				    </div>
				  </div> 
EOD;

                    echo $htmlstring;
                    
               }
           ?>
			  
			  
		   <div id="Hint" class="small hidden ui negative message">
              <i class="close icon"></i>
                  <div class="header"> 刪除錯誤無法刪除 </div>
           </div>
			  
		</div>
    
             <div class="ui small test modal transition hidden">
                    <div id="arti_num" class="header">
                      文章資料編號
                    </div>
                    <div class="content">
                      <p>永久刪除此筆資料庫記錄?</p>
                    </div>
                    <div class="actions">
                      <div class="ui negative button">
                        取消
                      </div>
                      <div class="ui positive right labeled icon button">
                        確定
                        <i class="checkmark icon"></i>
                      </div>
                    </div>
              </div>
              
              
              
</div>
<script>

	$('.description').ellipsis({
	    row: 2,
	    char: '...'
	});
  
    $('.admins .item a.act_modal').click(
        
        function(){
            
            var item_data=$(this).data("modal");
            
            event.preventDefault();
            
            var tbid=item_data.match(/[\d$]+/); 
            var tbname=item_data.match(/[\D]+/);
            //var usname = $(this).parent().parent().find("#usname span").text();
            
            $('.ui.modal #arti_num').text(function( ) {
              return "文章資料編號 : " + tbname[0] +"-" + tbid[0] ;
            });
            
            $('.ui.modal').modal({
                closable  : true,
                onDeny    : function(){
                 
                },
                onApprove : function(){
                    
                    $.post("/Article/DeleItem",{ id:tbid[0],tbname:tbname[0]},function(data){
                         
                         if(data.pass==true){
                              $("#Hint").removeClass("negative");
                              $("#Hint").addClass("success ");
                         }
                      
                        $("#Hint .header").text(data.status);
                        
                        var item=$('#'+data.delid);
                        $("#arti_list").find( item ).remove();
                      
                        $("#Hint").removeClass("hidden");
                        $("#Hint").addClass("visible");
                    });
      
                }
            })
            .modal('show');
          
        }
    )
    
    $("#Hint .close").click(function(){
         $("#Hint").removeClass("success");
         $("#Hint").addClass("negative");
         $("#Hint").addClass("hidden");
      });
</script>
 