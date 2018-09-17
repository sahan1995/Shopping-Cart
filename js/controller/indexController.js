var itemcodeobj = {}
var code;
$(document).ready(function () {

    // window.location.replace("OrderItem.html?ID=I002")

    var ajaxconfig3 = {

        method: "GET",
        url: "API/Sessions.php?action=isSession",
        async: true,

    }

    $.ajax(ajaxconfig3).done(function (response) {

        var status = response["status"];
        if (status) {


            var fullname = response["fullname"];
            $("#uname").text(fullname);

        }
    })


    var ajaxConfig = {
        method: "GET",
        url: "API/Items.php?action=all",
        async: true,
    }

    $.ajax(ajaxConfig).done(function (response) {
        var x = 0;
        response.forEach(function (item) {
            var name = (item.itemName);
            var array = item.imgPath.split("ShoppingCart/");

            var ItemCard = "<div class=col-md-4 " + x + "> <div class=card> <img class=img" + x + " ><input class=input" + x + "><input class=img" + x + "> <h2 class=itemName" + x + "> </h2> <p class=title >Price : LKR " + item.unitPrice + ".00</p> <div id=btnDiv> <button id=btn class=btn" + x + " type=button><i class=i" + x + "></i>&nbsp;&nbsp;Add to Cart</button> </div> </div> </div>"


            $("#row").append(ItemCard);
            $(".itemName" + x).text(name);
            $(".itemName" + x).attr("id", "h1");
            $(".img" + x).attr("src", array[1]);
            $(".img" + x).css("width", "150px");
            $(".img" + x).css("height", "150px");
            $(".col-md-4" + x).attr("class", "col-sm-12");
            $(".btn" + x).attr("class", "ui inverted green button");
            $(".input" + x).attr("type", "hidden");
            $(".img" + x).attr("type", "hidden");
            $(".img" + x).attr("id", "img");
            $(".input" + x).val(item.itemID);
            $(".img" + x).val(array[1]);
            $(".i" + x).attr("class", "fas fa-cart-arrow-down")
            x = x + 1;
        });


        $(".card").click(function (eventData) {

            var itemCode = $(this).find('input:first').val();
            var url = $(this).find("#img").val();
            var itemName = $(this).find("#h1").text();
            var unitPrice = $(this).find(".title").text();
            var array = unitPrice.split("LKR");

            var total = parseInt(array[1]) * 1;
            if (eventData.target.id == "btn") {

                var ajaxconfig2 = {

                    method: "GET",
                    url: "API/Sessions.php?action=isSession",
                    async: true,

                }

                $.ajax(ajaxconfig2).done(function (response) {

                    var status = response["status"];
                    if (!status) {


                        window.location.assign("login.html?page=index.html&id=0");

                    } else {
                        var itemSession = {
                            method: "POST",
                            url: "API/Sessions.php",
                            data: {
                                action: "cart",
                                itemcode: itemCode,
                                qty: 1,
                            },
                            async: true,


                        }

                        $.ajax(itemSession).done(function (response) {

                            if (response) {
                                $.alert({
                                    title: 'Shopping Cart ',
                                    content: 'Item Added to Cart ! ',

                                });

                            }
                        })


                        // $.cookie(itemCode, JSON.stringify(itemCookie), {path: "../", expires: 10});
                        //

                        // return;
                    }


                })






            }
            else{
                itemCode = $(this).find('input:first').val();

                console.log($(this).find('input:first').val());

                window.location.assign("OrderItem.html?ID=" + itemCode);
            }

        })

    })
});

$("#logOut").click(function () {

    var ajaxConfig = {
        method: "GET",
        url: "API/Sessions.php?action=logOut",
        async: true,
    }
    $.ajax(ajaxConfig).done(function (response) {

        if(response){
            window.location.replace("index.html");
        }
    })
})
