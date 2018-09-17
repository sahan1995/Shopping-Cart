$(document).ready(function () {
    //get Query Parameter

    var ajaxconfig3 = {

        method: "GET",
        url: "API/Sessions.php?action=isSession",
        async: true,

    }

    $.ajax(ajaxconfig3).done(function (response) {

        var status = response["status"];
        if (status) {


            var fullname = response["fullname"];
            $(".uname").text(fullname);

        }
    })


    var queryParam = window.location.search;

    var param = queryParam.split("=");

    var itemCode = param[1];

    var ajaxConfig = {
        method: "GET",
        url: "API/Items.php",
        data: {
            action: "byID",
            ID: itemCode,
        },
        async: true,
    }

    $.ajax(ajaxConfig).done(function (response) {

        response.forEach(function (result) {
            var imgPath = result["imgPath"];
            var imgArray = imgPath.split("ShoppingCart/");
            var img = "<div class=col-md-4> <div class=card> <img class=img ></div> </div>"

            $("#img").attr("src",imgArray[1]);

            $("#img").css("width","250px");
            $("#img").css("height","250px");
            // $(".col-md-4").attr("class","col-sm-12");
            // $(".div").attr("class", "col-lg-12");
            // $(".div").attr("class", "col-xs-12");
            // $(".div").css("position","relative");
            // $(".div").css("margin","auto");
            //
            $("#itemCode").text(result["itemID"]);
            $("#itemname").text(result["itemName"]);
            $("#stock").text(result["stock"]);
            $("#price").text(result["unitPrice"]);
            //
            // console.log(response);
        })

    })

    $("#btnAddtoCart").click(function () {
        var ajaxconfig2 = {

            method: "GET",
            url: "API/Sessions.php?action=isSession",
            async: true,

        }

        $.ajax(ajaxconfig2).done(function (response) {

            var status = response["status"];
            if (!status) {

                var code = $("#itemCode").text();
                window.location.assign("login.html?page=OrderItem.html&id="+code);

            } else {
                var itemCode =$("#itemCode").text();
                var qty = $("#txtQty").val();

                var itemSession = {
                    method: "POST",
                    url: "API/Sessions.php",
                    data: {
                        action: "cart",
                        itemcode: itemCode,
                        qty: qty,
                    },
                    async: true,


                }


                var stock = parseInt($("#stock").text())
                if(qty>stock){
                    $.alert({
                        title: 'Shopping Cart ',
                        content: 'Error ',

                    });

                }else {

                $.ajax(itemSession).done(function (response) {

                   if(response){
                       $.alert({
                           title: 'Shopping Cart ',
                           content: 'Item Added to Cart ! ',

                       });

                   }
                })
                }

                // $.cookie(itemCode, JSON.stringify(itemCookie), {path: "../", expires: 10});
                //

                // return;
            }


        })
    })


})


