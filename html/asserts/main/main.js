

$(function(){
    
    $("#myform").submit(function (e) {
        //event.preventDefault();

        var userid = $("input[name='userid']").val();
        var userpass = $("input[name='userpass']").val();

        //alert(userid+'/'+userpass);

        if(userid!='' && userpass!=''){

            $.ajax({
                data:{userId:userid,userPass:userpass},
                dataType:'json',
                type:"POST",
                url:"/Users/ajaxValid",
                error:function(data){
                    $("#ajaxCheck").html("請求失敗...");
                    console.log(data);
                },
                success:function(data){

                    if(data!=''){
                        $("#ajaxCheck").html(data['success']);
                        console.log(data);
                        function direct() {
                            window.location.href = "/Users/MemberList";
                        }
                         setInterval(direct,1000);
                    }else{

                        $("#ajaxCheck").html("用户名或密碼錯誤");
                    }
                }
            });

        }else{
            var errormessage = "用戶密碼不得為空";
        }
        $("#ajaxCheck").html(errormessage);
        return false;
    })





});