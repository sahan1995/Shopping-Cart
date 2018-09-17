$("#btnLogin").click(function () {

    var uname = $("#txtUname").val();
    var pass = $("#txtPassword").val();


    var ajaxConfig = {
        method : "POST",
        url: "API/Sessions.php",
        data :{
         action : "login",
         uname : uname,
         pass : pass,
        },
        async: true,
    }

    $.ajax(ajaxConfig).done(function (response) {

        console.log(response);

        if(response){

            var queryParam = window.location.search;


           var params= queryParam.split("&");
           var link = params[0].split("=");

           console.log(link[1]+"?"+params[1])
            window.location.replace(link[1]+"?"+params[1]);
        }
    })

})

$('a[href="#signup"]').click(function () {
    var queryParam = window.location.search;
    var params= queryParam.split("&");
    var link = params[0].split("=");

        window.location.replace("SignupForm.html?ToUrl="+link[1]+"&"+params[1]);

})