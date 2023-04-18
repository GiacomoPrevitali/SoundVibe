$(document).ready(function(){
    $("#but_submit").click(function(){
        var username = $("#txt_uname").val().trim();
        var password = $("#txt_pwd").val().trim();

        if( username != "" && password != "" ){
            $.ajax({
                url:'login.php',
                type:'post',
                data:{username:username,password:password},
                success:function(data){
                    console.log("CIao");
                    var msg = "";
                    if(data == 1){
                        window.location = "home.php";
                    }else{
                        msg = "Invalid username and password!";
                    }
                    $("#message").html(msg);
                }
            });
        }
    });
});