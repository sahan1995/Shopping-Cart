$(document).ready(function () {


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
    var ajaxConfig = {
        method: "GET",
        url: "API/Sessions.php",
        data: {
            action: "userCart",
        },
        async: true,
    }
    $.ajax(ajaxConfig).done(function (response) {

        response["cart"].forEach(function (itemCode) {
            var code = itemCode.itemCode;
            var qty = itemCode.qty;
            var ajaxConfig2 = {
                method: "GET",
                url: "API/Items.php",
                data: {
                    action: "byID",
                    ID: code,
                },
                async: true,
            }
            $.ajax(ajaxConfig2).done(function (response2) {

                response2.forEach(function (item) {

                    var name = (item["itemName"]);
                    var array = item["imgPath"].split("ShoppingCart/");
                    var total = (item["unitPrice"] * qty);
                    var tr = "  <tr>\n" +
                        "                <td>" + item["itemID"] + "</td>\n" +
                        "                <td><img src=" + array[1] + "></td>\n" +
                        "                <td><b> " + name + " </b></td>\n" +
                        "                <td>" + item["unitPrice"] + "</td>\n" +
                        "                <td>" + item["stock"] + "</td>\n" +
                        "                <td>" + qty + "</td>\n" +
                        "                <td><span>LKR : <span>" + total + "</td>\n" +
                        "                <td><button  class=btn btn-primary id=btnBuynow>Buy Now </button> </td>\n" +
                        "                <td><i class=i id=remove> </i></td>\n" +
                        "            </tr>"

                    $("#tblItems tbody").append(tr);

                    // $(".img"+x).attr("src",cookie.imgURL);
                    $("img").css("width", "50px");
                    $("img").css("height", "50px");
                    $(".i").attr("class", "fas fa-trash-alt");
                    $("i").off();
                    $("i").mouseenter(function () {
                        $("i").css("cursor", "pointer");

                    });

                    $("#tblItems tbody").mouseenter(function () {

                        $("tbody").css("cursor", "pointer");

                    });
                    $("#tblItems tbody tr").off();
                    $("#tblItems tbody tr").click(function (eventData) {
                        var row = this;
                        var btn = eventData.toElement.id

                        if(btn =="btnBuynow"){


                            var code=  $($(row).find("td").get(0)).text();
                            var qty =  $($(row).find("td").get(5)).text();
                            var unitPrice =  $($(row).find("td").get(3)).text();
                            var date = new Date();
                            // date = date.getUTCFullYear() + '-' +
                            //     ('00' + (date.getUTCMonth()+1)).slice(-2) + '-' +
                            //     ('00' + date.getUTCDate()).slice(-2);

                            var ajaxconfigo ={
                                method: "POST",
                                url: "API/UserOrder.php",
                                data :{
                                    action :"addOrder",
                                    type : "one",
                                    qty : qty,
                                    unitPrice : unitPrice,
                                    itemId : code,
                                    date : "Date",

                                },
                                async: true,
                            }




                            // console.log($.ajax(ajaxconfig).status);
                            // $.ajax(ajaxconfig).done(function (response) {
                            //    console.log(ajaxconfig)
                            //     if(response){
                                    $.alert({
                                        title: 'Shopping Cart ',
                                        content: 'Item Ordered  ! ',
                            //
                                    });
                                    var code=  $($(row).find("td").get(0)).text();
                            //
                                    $(row).fadeOut("slow",function () {
                            //
                                        $(row).remove();
                            //
                                    });
                            //     }else{
                            //         alert(response)
                            //     }
                            //
                            // })
                            return;
                        }else if(btn=="remove"){
                            $.confirm({
                                title: 'Shopping Cart',
                                content: 'Are you Sure ? ',
                                buttons: {
                                    confirm: function () {


                                      var code=  $($(row).find("td").get(0)).text();

                                      $(row).fadeOut("slow",function () {

                                          $(row).remove();

                                      });
                                        var ajaxCofingf = {
                                            method: "POST",
                                            url: "API/Sessions.php",
                                            data: {
                                                action: "removeItem",
                                                itemcode: code,
                                            },
                                            async: true,

                                        }
                                        $.ajax(ajaxCofingf).done(function (response) {
                                            if(response){
                                                $.alert('Item Removed ! ');
                                            }
                                        })


                                      console.log(code);



                                    },
                                    cancel: function () {

                                    },

                                }
                            });
                            return;
                        }




                        console.log(row);

                        var itemsrc = $(this).find("td img").attr("src");

                        var itemname = $($(this).find("td").get(2)).text();
                        var itemCode = $($(this).find("td").get(0)).text();
                        var stocks = $($(this).find("td").get(4)).text();
                        var uqty = $($(this).find("td").get(5)).text();
                        var uprice = $($(this).find("td").get(3)).text();

                        var stock = parseInt(stocks);
                        var price = parseInt(uprice);
                        $.confirm({
                            title: itemname,
                            content: '' +
                            '<img src=' + itemsrc + '>' +
                            '<form action="" class="formName">' +
                            '<div class="form-group">' +
                            '<label>Qty</label>' +
                            '<input type="Number" placeholder="QTY" class="qty form-control" required id="txtQty" value=' + uqty + ' />' +
                            '</div>' +
                            '</form>',
                            buttons: {
                                formSubmit: {
                                    text: 'Submit',
                                    btnClass: 'btn-blue',
                                    action: function () {
                                        var qty = this.$content.find('.qty').val();
                                        if (!qty) {
                                            $.alert('Please Enter Qty ! ');
                                            return false;
                                        } else if (qty > stock) {
                                            $.alert('Qty is Higher than Stock ');
                                            return false;
                                        } else if (qty == uqty) {
                                            $.alert('Qty are Same ! ');
                                            return false
                                        }
                                        else if(qty<=0){
                                            $.alert('Please Enter Valid Qty! ');
                                            return false;
                                        }


                                        $($(row).find("td").get(5)).text(qty);

                                        $($(row).find("td").get(6)).text("LKR :" + qty * price);

                                        var ajaxCofingf = {
                                            method: "POST",
                                            url: "API/Sessions.php",
                                            data: {
                                                action: "updateQty",
                                                itemcode: itemCode,
                                                qty: qty,
                                            },
                                            async: true,

                                        }
                                        $.ajax(ajaxCofingf).done(function (response) {
                                            if(response){
                                                $.alert('Done');
                                            }
                                        })


                                    }
                                },
                                cancel: function () {
                                    //close
                                },
                            },
                            // onContentReady: function () {
                            //     // bind to events
                            //     var jc = this;
                            //     this.$content.find('form').on('submit', function (e) {
                            //         // if the user submits the form by pressing enter in the field.
                            //         e.preventDefault();
                            //         jc.$$formSubmit.trigger('click'); // reference the button and click it
                            //     });
                            // }
                        });


                    })
                })

            })
        })


    });


    // var ajaxConfig = {
    //     method: "GET",
    //     url: "API/Items.php?action=all",
    //     async: true,
    // }
    //
    // $.ajax(ajaxConfig).done(function (response) {
    //
    //     response.forEach(function (value) {
    //
    //         if($.cookie(value.itemID)){
    //             var x=0;
    //             var cookie = JSON.parse($.cookie(value.itemID));
    //
    //             var tr = "  <tr>\n" +
    //                 "                <td><img src="+cookie.imgURL+"></td>\n" +
    //                 "                <td><b> "+cookie.itemname+" </b></td>\n" +
    //                 "                <td>"+cookie.unitPrice+"</td>\n" +
    //                 "                <td>"+cookie.qty+"</td>\n" +
    //                 "                <td>LKR " +cookie.total+"</td>\n" +
    //                 "                <td><button  class=btn btn-primary id=btnBuynow>Buy Now </button> </td>\n" +
    //                 "                <td><i class=i> </i></td>\n" +
    //                 "            </tr>"
    //
    //         $("#tblItems tbody").append(tr);
    //
    //             $(".img"+x).attr("src",cookie.imgURL);
    //             $("img").css("width","50px");
    //             $("img").css("height","50px");
    //             $(".i").attr("class","fas fa-trash-alt");
    //             x++;
    //             $("i").off();
    //             $("i").mouseenter(function () {
    //                 $("i").css("cursor","pointer");
    //
    //             })
    //
    //          $("#tblItems tbody").off();
    //
    //          $("#tblItems tbody").click(function (eventData) {
    //
    //              if(eventData.target.id=="btnBuynow"){
    //
    //
    //
    //
    //              }
    //
    //
    //
    //          })
    //
    //         }
    //
    //
    //
    //
    //
    //
    //     })
    //
    // })
})


// $(document).find("#tblItems tbody td").click(function () {
//     console.log("tttttttttttt");
// });