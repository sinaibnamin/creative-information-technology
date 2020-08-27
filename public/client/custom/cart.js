const isValidStep = (activePanelNum, eventTarget, DOMstrings) => {
    //alert(activePanelNum+" data ");
    if (eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`)) {
        activePanelNum--;
        setActiveStep(activePanelNum);
        setActivePanel(activePanelNum);
    } else if (activePanelNum == '0') { //is cart exist...
        isCartExist(function (data) {
            if (data.total <= 0) {
                Swal.fire({
                    title: 'Your Cart is Empty ..Please add some product!! ',
                    width: 600,
                    padding: '3em',
                    background: '#fff url(/images/trees.png)',
                    backdrop: `
                      rgba(0,0,123,0.4)
                      url("/images/nyan-cat.gif")
                      left top
                      no-repeat
                    `
                })
            } else {
                isActiveNextStep(activePanelNum, eventTarget, DOMstrings);
            }
        });
    } else if (activePanelNum == '1') {
        let name = $("#firstname").val();
        let lastname = $("#lastname").val();
        let address = $("#txt_cart_address").val();
        let email = $("#email").val();
        let phonenumber = $("#phonenumber").val();
        let postcode = $("#postcode").val();


        if (name == '')
            Swal.fire({
                title: 'First name cannot be null!!',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
        else if (address == '')
            Swal.fire({
                title: 'Address cannot be null!!',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
        else if (lastname == '')
            Swal.fire({
                title: 'Last name cannot be null!!',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
        else if (email == '')
            Swal.fire({
                title: 'Email cannot be null!!',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
        else if (postcode == '')
            Swal.fire({
                title: 'Post code cannot be null!!',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
        else if (phonenumber == '')
            Swal.fire({
                title: 'Phone number cannot be null!!',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
        else {
            isActiveNextStep(activePanelNum, eventTarget, DOMstrings);

        }
    } else if (activePanelNum == '2') {
        var payment_type = $(".div_payment_radio input[type='radio']:checked").val();
        isActiveNextStep(activePanelNum, eventTarget, DOMstrings);

    }
}

function isCartExist(callback) {
    const method = "GET";
    const url = "./isCartExist";
    const data = {};
    ajaxSetup(function (data) {
        callback(data);

    }, method, url, data);
}


// function orderCheckout(v){
//     let name=$("#firstname").val();
//     let address=$("#txt_cart_address").val();

//     isCartExist(function(data){
//         if(data.total <= 0)
//         {
//             alert("Cart is empty..");
//         }
//         else{
//             // alert(name);
//         }
//     });
function orderCheckout(v) {
    let name = $("#firstname").val();
    let address = $("#txt_cart_address").val();
    let email = $("#email").val();
    let lastname = $("#lastname").val();
    let phonenumber = $("#phonenumber").val();
    let alphonenumber = $("#alphonenumber").val();


    // let postcode=$("#postcode").val();
    let status = $("#status").val();
    let payment = $('input[name="payment_type"]:checked').val();
    let cardname = $("#card-name").val();
    let cardno = $("#card-no").val();
    let expireDate = $("#expiredate").val();
    let security_number=$("#sec-no").val();
    let comment = $("#comment").val();

    isCartExist(function (data) {
        if (data.total <= 0) {
            // alert("Cart is empty..");
            Swal.fire({
                title: 'Your Cart is Empty ..Please add some product!! ',
                width: 600,
                padding: '3em',
                background: '#fff url(/images/trees.png)',
                backdrop: `
                      rgba(0,0,123,0.4)
                      url("/images/nyan-cat.gif")
                      left top
                      no-repeat
                    `
            })
        } else {
            // alert(lastname);
            $.ajax({
                type: 'POST',
                //dataType: 'json',
                url: "./confim-order",
                data: {
                    name: name,
                    lastname: lastname,
                    phonenumber: phonenumber,
                    alphonenumber: alphonenumber,
                    status: status,
                    payment,
                    expireDate: expireDate,
                    comment: comment,
                    cardname: cardname,
                    cardno: cardno
                },
                success: function (data) {
                    let timerInterval
                    Swal.fire({
                        title: 'Your order created successfully!!',
                        html: 'We will close in <b></b> milliseconds.',
                        timer: 3000,
                        timerProgressBar: true,
                        onBeforeOpen: () => {

                            Swal.showLoading()
                            timerInterval = setInterval(() => {
                                const content = Swal.getContent()
                                if (content) {
                                    const b = content.querySelector('b')
                                    if (b) {
                                        b.textContent = Swal.getTimerLeft()
                                    }
                                }
                            }, 100)
                        },
                        //   onClose: () => {
                        //     clearInterval(timerInterval),

                        //   }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {
                            console.log('We was closed by the timer')
                        }
                    })
                }
            });
        }
    });


}


// ------------------------------------------
// function increaseValue(v) {
//     let id = $(v).attr("data-id");
//     let value = parseInt(document.getElementById('qty-'+id).value, 10);
//     value = isNaN(value) ? 0 : value;
//     value++;
//     document.getElementById('qty-'+id).value = value;
//     let rowId=$("#rowId-"+id).val();
//     let qty=$("#qty-"+id).val();
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });

//     $.ajax({
//         url: './update-cart',
//         type: 'POST',
//         data: {increment: true,qty:qty,rowId:rowId},
//         success: function() { alert('cart quantity is increased successfully!!') }
//     });

//   }


function increaseValue(v) {


    let id = $(v).attr("data-id");
    let value = parseInt(document.getElementById('qty-' + id).value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('qty-' + id).value = value;
    let rowId = $("#rowId-" + id).val();
    let qty = $("#qty-" + id).val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn_loading").attr("disabled", true);
    $(".cart_loading").text("Loading..");

    $.ajax({
        url: './update-cart',
        type: 'GET',
        dataType: 'json',
        data: {increment: true, qty: qty, rowId: rowId},
        success: function (data) {

            updateCartInfo(data);
            $(".btn_loading").attr("disabled", false);
            $(".cart_loading").text("");
        }
    });

    // $("#qty-").load(" #qty- > *");
    //$("#here").load(" #here > *");
    //$("#subtotal-").load(" #subtotal- > *");
    //$("#navbarSupportedContent").load(" #navbarSupportedContent > *");


}

function decreaseValue(v) {
    let id = $(v).attr("data-id");
    let value = parseInt(document.getElementById('qty-' + id).value, 10);
    value = isNaN(value) ? 0 : value;
    value < 1 ? value = 1 : '';
    value--;
    document.getElementById('qty-' + id).value = value;

    let rowId = $("#rowId-" + id).val();
    let qty = $("#qty-" + id).val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".btn_loading").attr("disabled", true);
    $(".cart_loading").text("Loading..");


    $.ajax({
        url: './update-cart',
        type: 'GET',
        dataType: 'json',
        data: {increment: true, qty: qty, rowId: rowId},
        success: function (data) {

            $(".btn_loading").attr("disabled", false);
            $(".cart_loading").text("");

            if (qty <= 0)
                $(".tr-" + rowId).remove();

            updateCartInfo(data);
        }
    });

    // $("#qty-").load(" #qty- > *");
    /* $("#subtotal-").load(" #subtotal- > *");
     $("#navbarSupportedContent").load(" #navbarSupportedContent > *");
     $("#here").load(" #here > *");*/
    // $("#navbarSupportedContent").load(" #navbarSupportedContent > *");

}

function deleteCart(v) {
    let id = $(v).attr("data-id");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".btn_loading").attr("disabled", true);
    $(".cart_loading").text("Loading..");
    $.ajax({
        type: 'get',
        dataType: 'json',
        url: "./delete-cart/" + id,
        data: {id: id},
        success: function (data) {


            $(".btn_loading").attr("disabled", false);
            $(".cart_loading").text("");


            $(".tr-" + id).remove();
            updateCartInfo(data);

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'Cart Removed Successfully!!'
            })


        }
    });
    /*$("#navbarSupportedContent").load(" #navbarSupportedContent > *");
    $("#here").load(" #here > *");*/
}

function updateCartInfo(data) {


    $(".cart_qty").text(data.count);
    var gross_discount = 0;
    var gross_amount = 0;
    $.each(data.list, function (key, val) {
        var discount = 0;
        var amount = val.price * val.qty;
        if (val.options.discount != null && val.options.discount > 0)
            discount = (val.options.discount) * val.qty;
        else {
            var dis_amt = ((amount) * val.options.percent) / 100;
            discount = dis_amt;
        }
        var sub_amount = parseFloat(amount) - parseFloat(discount);
        gross_amount = parseFloat(gross_amount) + parseFloat(amount);
        $(".amount-" + val.rowId).text(amount + " BDT");
        $(".discount-" + val.rowId).text(discount + " BDT");
        $(".sub_amount-" + val.rowId).text(sub_amount + " BDT");
        gross_discount = parseFloat(gross_discount) + parseFloat(discount);
    });
    var total = parseFloat(gross_amount) - parseFloat(gross_discount);
    $(".final_amount_before").text(total);
}


// new plus minus btn js
// function increaseValue() {
//   var value = parseInt(document.getElementById('number').value, 10);
//   value = isNaN(value) ? 0 : value;
//   value++;
//   document.getElementById('number').value = value;
// }

// function decreaseValue() {
//   var value = parseInt(document.getElementById('number').value, 10);
//   value = isNaN(value) ? 0 : value;
//   value < 1 ? value = 1 : '';
//   value--;
//   document.getElementById('number').value = value;
// }
// new plus minus btn js

// ------------------------------------------


// function addToCart(v){
//     let id = $(v).attr("data-id");
//     let proid=$("#proid-"+id).val();
//     let qty=$("#qty-"+id).val();


//     // alert(proid);
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });

//     $.ajax({
//         type: 'POST',
//         //dataType: 'json',
//         url: "./add-to-cart",
//         data: {id:id,proid:proid,qty:qty},
//         success: function (data) {
//         alert("cart added successfully!!");
//         }
//     });
//     $("#navbarSupportedContent").load(" #navbarSupportedContent > *");
// }
function addToCart(v) {
    let id = $(v).attr("data-id");
    // let proid=$("#proid-"+id).val();
    let qty = $("#qty-" + id).val();

    var btn_txt = $(v).text();
    $(v).text("Adding....");
    $(v).attr("disabled", true);
    // alert(proid);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var api = getUrl();
    // alert(api);
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: api + "add-to-cart",
        data: {id: id, qty: qty},
        success: function (data) {

            //alert(data.count);
            $(".cart_qty").text(data.count);

            $(v).text(btn_txt);
            $(v).attr("disabled", false);

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'Cart Added Successfully!!'
            })
        }
    });
    //$("#navbarSupportedContent").load(" #navbarSupportedContent > *");
}


// function updateCart(v){

//     let rowId=$("#rowId").val();
//     let qty=$("#qty").val();

//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//     // alert(rowId);
//     $.ajax({
//         type: 'POST',
//         //dataType: 'json',
//         url: "./update-cart",
//         data: {rowId:rowId,qty:qty},
//         success: function (data) {
//         alert("cart updated successfully!!");
//         }
//     });

// }

/*function increaseValue(v) {
    let id = $(v).attr("data-id");
    let value = parseInt(document.getElementById('qty-'+id).value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('qty-'+id).value = value;
    let rowId=$("#rowId-"+id).val();
    let qty=$("#qty-"+id).val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: './update-cart',
        type: 'POST',
        data: {increment: true,qty:qty,rowId:rowId},
        success: function() { }
    });

    // $("#qty-").load(" #qty- > *");
    $("#here").load(" #here > *");
    $("#subtotal-").load(" #subtotal- > *");
    $("#navbarSupportedContent").load(" #navbarSupportedContent > *");
}*/


function increaseQty() {
    let value = parseInt(document.getElementById('qty').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('qty').value = value;
}

function decreaseQty() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value < 1 ? value = 1 : '';
    value--;
    document.getElementById('number').value = value;
}

const isActiveNextStep = (activePanelNum, eventTarget, DOMstrings) => {
    if (eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`)) {
        activePanelNum--;
    } else {
        activePanelNum++;
    }
    setActiveStep(activePanelNum);
    setActivePanel(activePanelNum);
}


$(document).ready(function () {

    $('#clientInfo').click(function () {
        // alert("hello");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: "./getclientInfo",
            success: function (results) {
                //  console.log(results);
                $("#firstname").val(results.first_name);
                $("#lastname").val(results.last_name);
                $("#email").val(results.email);
                $("#txt_cart_address").val(results.present_address);
                $("#phonenumber").val(results.contact_no);
            }
        });
    });

    // Remove Items From Cart
    $('a.remove').click(function () {
        event.preventDefault();
        $(this).parent().parent().parent().hide(400);

    })

// Just for testing, show all items
    $('a.btn.continue').click(function () {
        $('li.items').show(400);
    })
});

// multi stepper form

//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function () {
    if (animating) return false;
    animating = true;

    current_fs = $(this).parent();
    next_fs = $(this).parent().next();

    //activate next step on progressbar using the index of next_fs
    $("#progressbar-cart li").eq($("fieldset").index(next_fs)).addClass("active");

    //show the next fieldset
    next_fs.show();
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function (now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale current_fs down to 80%
            scale = 1 - (1 - now) * 0.2;
            //2. bring next_fs from the right(50%)
            left = (now * 50) + "%";
            //3. increase opacity of next_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({
                'transform': 'scale(' + scale + ')',
                'position': 'absolute'
            });
            next_fs.css({'left': left, 'opacity': opacity});
        },
        duration: 800,
        complete: function () {
            current_fs.hide();
            animating = false;
        },
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });
});

$(".action-button-previous").click(function () {
    if (animating) return false;
    animating = true;

    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();

    //de-activate current step on progressbar
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

    //show the previous fieldset
    previous_fs.show();
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function (now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale previous_fs from 80% to 100%
            scale = 0.8 + (1 - now) * 0.2;
            //2. take current_fs to the right(50%) - from 0%
            left = ((1 - now) * 50) + "%";
            //3. increase opacity of previous_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({'left': left});
            previous_fs.css({'transform': 'scale(' + scale + ')', 'opacity': opacity});
        },
        duration: 800,
        complete: function () {
            current_fs.hide();
            animating = false;
        },
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });
});

// $(".submit").click(function(){
// 	return false;
// })
// multi stepper form


// submit btn popup
var popup = document.getElementById('popup-wrapper');
var btn = document.getElementById("popup-btn");
var span = document.getElementById("close");
btn.onclick = function () {
    popup.classList.add('show-popup-overlay');
}
span.onclick = function () {
    popup.classList.remove('show-popup-overlay');
}

window.onclick = function (event) {
    if (event.target == popup) {
        popup.classList.remove('show-popup-overlay');
    }
}

// submit btn popup