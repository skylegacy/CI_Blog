


<div class="ui raised  text container segment items">
      
  <div class="ui " style="padding:20px 0 20px 10px">
     
      <span class="ui header" style="font-size:26px;">標籤資料管理列表</span>
      <a href="/Tag/Create" class="ui right floated teal icon button">
          <i class="user plus icon"></i> 新增標籤
      </a>
      
      
  </div>
   
        <div id="tag_List" class="ui middle aligned divided list admins">
            
            <?php
           
               $modifyFuncName='/Tag/Update/';
               $deleteFuncName='/Tag/DeleItem/';
               
               for($i=0;$i<count($listItemData);$i++){
                    
                   $htmlstring= <<<EOD
                   
                   <div id="{$listItemData[$i]['id']}" class="item">
                         <div class="right floated content">
                           <a href=" {$modifyFuncName}{$listItemData[$i]['tb_name']}{$listItemData[$i]['id']} " class="ui primary button">編輯</a>
                           <a data-modal=" {$listItemData[$i]['tb_name']}{$listItemData[$i]['id']}" class="ui act_modal  button">刪除</a>
                         </div>
                        <div class="content" style="padding:10px 0 10px 0">
                            <div id="usname" style="font-size:22px;"><i class="user circle icon"></i>
                               <span>{$listItemData[$i]['name']}</span>
                            </div>
                        </div>
                    </div>
EOD;
                    echo $htmlstring;
               }
           ?>

            <div id="Hint" class="small hidden ui negative message">
              <i class="close icon"></i>
                  <div class="header"> There were some errors with your submission </div>
           </div>
           
        </div>
 
             <div class="ui small test modal transition hidden">
                    <div id="tag_num" class="header">
                      標籤資料編號
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
  
    $('.admins .item a.act_modal').click(
        
        function(){
            
            var item_data=$(this).data("modal");
            
            event.preventDefault();
            
            var tbid=item_data.match(/[\d$]+/); 
            var tbname=item_data.match(/[\D]+/);
          
            
            $('.ui.modal #tag_num').text(function( ) {
              return "標籤編號 : " + tbname[0] +"-" + tbid[0];
            });
            
            $('.ui.modal').modal({
                closable  : true,
                onDeny    : function(){
                 
                },
                onApprove : function(){
                    
                    $.post("/Tag/DeleItem",{ id:tbid[0],tbname:tbname[0]},function(data){
                         
                         if(data.pass==true){
                              $("#Hint").removeClass("negative");
                              $("#Hint").addClass("success ");
                         }
                      
                        $("#Hint .header").text(data.status);
                        
                        var item=$('#'+data.delid);
                        $("#tag_List").find( item ).remove();
                      
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
 