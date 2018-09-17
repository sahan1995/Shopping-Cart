
var already;

$("#btnRegister").click(function () {

    var pass = $("#password").val();
    var conf = $("#confirm").val();

    var fullname = $("#name").val();
    var contact = $("#contact").val();
    var addres = $("#address").val();
    var uname = $("#username").val();
    if (pass === conf) {
        if(already){
            $.alert({
                title: 'Shopping Cart ',
                content: 'Your User is Already Taken',

            });
            return;
        }
        var ajaxconfig = {

            method: "POST",
            url: "API/Sessions.php",
            data: {
                action : "signup",
                fullname: fullname,
                contact: contact,
                address: addres,
                uname: uname,
                password: pass,
                isAdmin: 0,

            },
            async: true,
        }

        $.ajax(ajaxconfig).done(function (result) {
            console.log("sasasasasasasa")
            console.log(result)
            if(result){

                var url =  window.location.href;
                var myurl =   new URL(url);
                var toThis =  myurl.searchParams.get("ToUrl");
                var Id = myurl.searchParams.get("id");
                window.location.replace(toThis+"?id="+Id);

            }else{
                alert("No")
            }

        })





    } else {
        $.alert({
            title: 'Shopping Cart ',
            content: 'Passwords are not Same ! ',

        });
    }
})


$("#password").focus(function () {


    var uname = $("#username").val();
    if(uname!=""){
        var ajaxconfig = {
            method: "POST",
            url: "API/Users.php",
            data: {
                action : "searchUser",
                uname: uname,

            },
            async: true,
        }


        $.ajax(ajaxconfig).done(function (result) {
            if(result){
                $("#username").css("border-color","red");
                $("#msg").text(" * This User Name is Already Taken ");
                $("#msg").css("color","red");
                already = true;

            }else{
                $("#username").css("border-color","#CCCCCC");
                $("#msg").text("")
                already = false;
            }

        })
    }

})
$("#username").focus(function () {
    $("#username").css("border-color","#CCCCCC");
    $("#msg").text("")
})