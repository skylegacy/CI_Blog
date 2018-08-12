

<div class="ui raised  text  segment items pushable" style="height:auto;width:90%;margin:20px auto 20px auto;border:none">



        <div id="tree_penal" class="ui visible right vertical sidebar menu" style="width:300px;background:#009999;box-shadow:none;border:none;">
           
           <form id="add_form" class="ui form"  >
           	  
           	  <h3 class="ui center aligned header">增加節點</h3>
			  <div class="inline field">
			    <label>名稱</label>
			    <input id="add_node_name" name="add_nodeName" type="text" placeholder="name">
			  </div>
			  <div id="insert_id" class="inline field">
			    <label>插入點</label>
			    <select name="insert" class="ui dropdown" id="ins_add">
				  
				</select>
			  </div>
			  <div id="parent_id" class="inline field">
			    <label>父節點</label>
			    <select name="parent" class="ui dropdown" id="par_add">
				  
				</select>
			  </div>
			  <div style="text-align:center;">
			   <button  type="submit" class=" ui inverted button">送出新增</button >
			   <div id="cancel_add"  class=" ui inverted button">取消新增</div >
              </div>
		    </form>
		    <!--add_form-->
		    <form id="edit_form" class="ui form"  >
           	  
           	  <h3 class="ui center aligned header">編輯節點</h3>
			  <div class="inline field">
			    <label>名稱</label>
			    <input id="edit_node_name" name="nodeName" type="text" placeholder="name">
			  </div>
			 <!-- <div id="insert_edit" class="inline field">-->
			 <!--   <label>新位置</label>-->
			 <!--   <select name="insert" class="ui dropdown" id="ins_edit">-->
				  
				<!--</select>-->
			 <!-- </div>-->
			  <div id="parent_edit" class="inline field">
			    <label>父節點</label>
			    <select name="parent" class="ui dropdown" id="par_edit">
				   
				</select>
			  </div>
			  <div style="text-align:center;">
			   <button  type="submit" class=" ui inverted button">送出編輯</button >
			   <div id="cancel_edit"  class=" ui inverted button">取消編輯</div >
              </div>
		    </form>
		    <!--edit_form-->
		    <div id="del_form" class="ui form">
           	  
           	  <h3 class="ui center aligned header">刪除節點</h3>
			   
			  <p style="color:#fff;">點選刪除鍵即可刪除節點(刪除節點僅能從末端刪除,代有子節點的類別無法刪除)</p>
			   
		    </div>
			
        </div>
        
        <div class="pusher"  style="width:70%;float:right;">
          <div class="ui basic segment">
          	
          	<div class="ui " style="padding:20px 0 20px 10px">
             <span class="ui header" style="font-size:26px;">無限級分類樹狀表</span>
            </div> 

		   <div id="Hint" style="width:460px;" class="small hidden ui negative message">
              <i class="close icon"></i>
                  <div class="header"> There were some errors with your submission </div>
           </div>
           
           <div id="ajax_tree">
				
			</div>
           <div class="ui small test modal transition hidden">
                    <div id="cate_num" class="header">
                      類別資料編號
                    </div>
                    <div class="content">
                      <p>永久刪除此筆類別記錄?</p>
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
		<style>
     
       #ajax_tree li ul{
            padding:0 0px 0 50px;	
            margin:10px 0  10px 0;	
       }
       
       #ajax_tree ul li{
       	    margin:15px 0  15px 0;	
       }
       
       #ajax_tree li .nodeWord{
       	
       	  width:280px;
       	  font-size:16px;
       	  line-height:30px;
       }
       #ajax_tree li .editToggle{
       	 border:1px solid #25a233;
       }
       
       #tree_penal h3.header{
       	
	      margin:30px 0 10px 0px;
	      padding:10px 0 10px 0;
	      color:#fff;
	      border-top:1px solid #fff;
	      border-bottom:1px solid #fff;
       }
       
       #add_form,#edit_form{
       	 margin:0 10px 0 10px;
       	 height:240px;
       }
       #del_form{
       	margin:0 10px 0 10px;
       	height:80px;
       }
       
       #add_form label,#edit_form label{
       	  color:#fff;
       }
       
       #add_node_name,#edit_node_name{
       	 width:195px;
       }
       
       
     </style>	
		<script>

			 var jsonTree='start!';
			 
			 //建立類別樹方法
			 function recurTree(data, $e) {
			    
			    function createInner(childData,$target){
			    	var li = $('<li>').appendTo($target);
			    	var div = $('<div class="nodeWord ui big label">').appendTo(li);
			    	var btnDel = $('<div class="delete ui right floated inverted mini red button">刪除</div>');
			    	var btnEdit =  $('<div class="edit ui right floated inverted mini green button">編輯</div>');
			    	
			    	if (childData.nodes == undefined)
			    	{
			    	btnDel.attr('data-lft', childData.lft);
			    	btnDel.attr('data-rgt', childData.rgt);
			    	btnDel.attr('data-name', childData.name);
			    	}
			    	
			    	div.text(childData.name);
			    	btnDel.appendTo(div);
			    	btnEdit.attr('data-lft', childData.lft);
			    	btnEdit.attr('data-rgt', childData.rgt);
			    	btnEdit.attr('data-name', childData.name);
			    	btnEdit.appendTo(div);
			    	
			    	if (childData.nodes != undefined && childData.nodes.length > 0) {
			            var innerList = $('<ul>').appendTo(li);
			            for (var i = 0; i < childData.nodes.length; i++) {
			                var child = childData.nodes[i];
			                createInner(child, innerList);
			            };
			        }
			    }
			     for(var key in data){
			     	createInner(data[key],$e);
			     }
			}
			
			function recurForm(data, $e){
				
				function createInner(childData,$target){
				    var opt_lft = $('<option>');
				    opt_lft.attr("value",childData.lft);
				    opt_lft.appendTo($target);
				    
                    var texstr='';

			    	if (childData.nodes != undefined && childData.nodes.length > 0) {
			            //var innerList = $('<option>').appendTo($target);
			            for (var i = 0; i < childData.nodes.length; i++) {
			                var child = childData.nodes[i];
			                createInner(child, $target);
			            };
			            
			        }else{
			        	texstr+='__';
			        }
			        if (childData.name == 'root'){
			    	    opt_lft.text(childData.name+"(增加子代)");	
			    	}else{
			    		var opt_rgt = $('<option>');
					    opt_rgt.attr("value",childData.rgt);
					    opt_rgt.appendTo($target);
			    		texstr+='__';
			    		opt_lft.text(texstr+childData.name+"(增加子代)");
			    		opt_rgt.text(texstr+childData.name+"(增加同代)");
			    	}
			        
				 }
			     for(var key in data){
			     	createInner(data[key],$e);
			     }
			}
			
			function recurParent(data, $e){
				
				function createInner(childData,$target){
				    var opt = $('<option>');
				    opt.attr("value",childData.id);
				    opt.appendTo($target);
				    
                    var texstr='';

			    	if (childData.nodes != undefined && childData.nodes.length > 0) {
			            //var innerList = $('<option>').appendTo($target);
			            for (var i = 0; i < childData.nodes.length; i++) {
			                var child = childData.nodes[i];
			                createInner(child, $target);
			            };
			            
			        }else{
			        	texstr+='__';
			        }
			        if (childData.name == 'root'){
			    	    opt.text(childData.name);	
			    	}else{
			    		texstr+='__';
			    		opt.text(texstr+childData.name);
			    	
			    	}
			        
				 }
			     for(var key in data){
			     	createInner(data[key],$e);
			     }
			}
			
			function recurFind(json,Lft,Rgt){
				
				 var getName={};
				 function fineInner(jData){
				 	
				 	if(jData.lft==Lft&&jData.rgt==Rgt&&jData.name!='root'){
				 		getName.name=jData.name;
				 		getName.parent=jData.parent;
				 		//console.log(getName);
				 	}
				  
				 	if (jData.nodes != undefined && jData.nodes.length > 0) {
			            //var innerList = $('<option>').appendTo($target);
			            for (var i = 0; i < jData.nodes.length; i++) {
			                var child = jData.nodes[i];
			                fineInner(child);
			            };
			            
			        }
				 }
				 for(var key in json){
			     	fineInner(json[key]);
			     }
			     return getName;
			 }
			
		     //ajax 取得類別樹 綁定事件  初始化樹
		     function init_cateTree(){
					  	
					  	$.get("/Category/ajax_RebuildTree",function(data,status){
					    //alert(data+",傳輸: " +status);
					    
					    jsonTree= JSON.parse(data);
					    
					    //console.log(jsonTree);
					    recurTree(jsonTree,$('#ajax_tree'));
					    recurForm(jsonTree,$('#ins_add'));
					    recurForm(jsonTree,$('#ins_edit'));
					    recurParent(jsonTree,$('#par_add'));
					    recurParent(jsonTree,$('#par_edit'));
					    
						    $("#ajax_tree .delete").each(function(){
						    	var check_lft =$(this).data("lft");
						    	var check_rgt =$(this).data("rgt");
						    	if(check_lft==undefined&&check_rgt== undefined){
						    		 $(this).addClass("disabled");
						    	}
						    })
						    
						    //注意ajax的渲染比php慢,所以綁定ajax的元素,須放在執行ajax時期
						    $("#ajax_tree .nodeWord .delete").click(function(){
						    	
						    	var dataLft=$(this).data('lft');
								var dataRgt=$(this).data('rgt');
		
								var input_data=recurFind(jsonTree,dataLft,dataRgt);
							    var eventLocate = $(this);
								$('#cate_num').text("刪除類別 : "+input_data.name);
								
								$('.ui.modal').modal({
								    closable  : false,
								    onDeny    : function(){},
								    onApprove : function(){
								    
								        var nodeLft=eventLocate.data('lft');
								        var nodeRgt=eventLocate.data('rgt');
								        var nodeName=eventLocate.data('name');
								    	$.post("/Category/ajax_DeleItem",{ lft:nodeLft,name:nodeName,rgt:nodeRgt},function(data){
								    		var Status_obj= JSON.parse(data);
								    		console.log(Status_obj);
								    		if(Status_obj.pass=="0"){
					        	                $("#Hint").addClass("negative");
					                        	$("#Hint").removeClass("success");
					                        }else{
					                        	setTimeout(function(){
						                        	$('#ajax_tree').empty();
										    		init_cateTree();
						                        },1000);
					                        	$("#Hint").removeClass("negative");
									            $("#Hint").addClass("success ");
					                        }
								    		$("#Hint .header").text(Status_obj.backword);
								    	})
								        
								        $("#Hint").removeClass("hidden");
                        				$("#Hint").addClass("visible");
								    }
								  })
								  .modal('show')
								;
							})
							
							$("#ajax_tree .nodeWord .edit").click(function(){
							  
							    event.stopPropagation();
							    $(this).parents().find('div.nodeWord').removeClass('editToggle');
							    $(this).parents().find('div.edit').addClass('inverted');
							    
								$(this).toggleClass('inverted');
								$(this).parent().toggleClass('editToggle');
								
								var dataLft=$(this).data('lft');
								var dataRgt=$(this).data('rgt');
		
								var input_data=recurFind(jsonTree,dataLft,dataRgt);
								 
								//alert('clicked inside');//編輯綁定
								$('#edit_node_name').val(input_data.name);
								$("#par_edit").val(input_data.parent);
		    
							})
							$('#cancel_edit').click(function() {
							    //alert('clicked outside');//編輯取消
							    $('#ajax_tree').find('div.nodeWord').removeClass('editToggle');
							    $('#ajax_tree').find('div.edit').addClass('inverted');
							    $('#edit_node_name').val('');
							});
					    
					  });
			  }
			 
			 //初始化界面
			 init_cateTree();
			 
			 //以下為非初始化程序
			 $("#edit_form").submit(function(event){
						
				event.preventDefault();
				var formName = $('#edit_node_name').val();
				var formLft = $('div.nodeWord.editToggle').find('.edit').data('lft');
				var formRgt = $('div.nodeWord.editToggle').find('.edit').data('rgt');
				if ( formName ===""||formName ==="root") {
			      	$("#Hint").addClass("negative");
	                $("#Hint").removeClass("success ");
				    $("#Hint .header").text('不可為空..');
				    $("#Hint").removeClass("hidden");
                    $("#Hint").addClass("visible");
				    return;
				  }else{
				  	$.post("/Category/ajax_UpdateItem", { name:formName,rgt:formRgt,lft:formLft },
				  	function(data){
				  		var Status_obj = JSON.parse(data);
				  	  	    console.log(Status_obj);
				  	  	    
				  	  	     if(Status_obj.pass){
					        	
					        	  setTimeout(function(){
			                        	$('#ajax_tree').empty();
							    		init_cateTree();
			                        },1000);
			                        
	                            $("#Hint").removeClass("negative");
					            $("#Hint").addClass("success ");
	                        }else if(Status_obj.pass==false){
	                        	$("#Hint").addClass("negative");
	                        	$("#Hint").removeClass("success");
	                        }
					        $("#Hint").removeClass("hidden");
                    		$("#Hint").addClass("visible");
	                        $("#Hint .header").text(Status_obj.errorWord);
				  	})
				   
				  }
			 })
			 
			 $("#add_form").submit(function( event ){
						
			      event.preventDefault();
			       var formName = $( "#add_form input[name='add_nodeName']" ).val();
				  	var formParent = $("#par_add option:selected").val();
				  	var formInsert =$("#ins_add option:selected").val();
				  	
			      if ( formName ===""||formParent ===""||formParent === "") {
			      	$("#Hint").addClass("negative");
	                $("#Hint").removeClass("success ");
				    $("#Hint .header").text('不可為空..');
				    $("#Hint").removeClass("hidden");
                    $("#Hint").addClass("visible");
				    return;
				  }else{
				  	$.post("/Category/ajax_CreateItem", { name:formName,insert:formInsert, parent:formParent },
				  	  function(data){
				  	  	    
				  	  	    var Status_obj = JSON.parse(data);
				  	  	    console.log(Status_obj);
				  	  	    
					        if(Status_obj.pass){
					        	
					        	  setTimeout(function(){
			                        	$('#ajax_tree').empty();
							    		init_cateTree();
			                        },1000);
			                        
	                            $("#Hint").removeClass("negative");
					            $("#Hint").addClass("success ");
	                        }else{
	                        	$("#Hint").addClass("negative");
	                        	$("#Hint").removeClass("success");
	                        }
					        
	                        $("#Hint .header").text(Status_obj.errorWord);

					  }
				  	);
				    $("#Hint").removeClass("hidden");
                    $("#Hint").addClass("visible");
				  }
				  //add_form submit
			});
			
			$("#cancel_add").click(function(){
				$(this).closest('form').find("input[name='add_nodeName']").val("");
			})
			 
			 //$('#insert_id #par_select').dropdown();
		     $("#Hint .close").click(function(){
		         $("#Hint").removeClass("success");
		         $("#Hint").addClass("negative");
		         $("#Hint").addClass("hidden");
		      });
			
			
			</script>
			
			
          </div>
        </div>

     

</div>