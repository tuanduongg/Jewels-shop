

$(document).ready(function () {
    
    $("#myInput").keyup(function (e) {
        $("#pagination").hide();
        var value = $(this).val().toLowerCase();
        $(".col").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    $("#btn-show-signin").click(function () {
        $("#btn-signin").show();
        $(".info-cart").hide();
        $("#form-login").show();
        $(".modal-title").text('Đăng Nhập');
        $('input[name=name]').hide();
        $('input[name=phone]').hide();
        $('input[name=address]').hide();
        $('#btn-show-signup').show();
        $(".modal-title").text('Đăng Nhập');
        $('input[name=name]').hide();
        $('input[name=phone]').hide();
        $('input[name=address]').hide();
        $('label[for=exampleInputPhone]').hide();
        $('label[for=exampleInputAddress]').hide();
        $('label[for=exampleInputName]').hide();
        $('#btn-signup').hide();
        $('#btn-signin').show();
    });


    $("#btn-show-signup").click(function () {
        $(".info-cart").hide();
        $("#btn-signin").hide();
        // $("#form-login").show();
        $(".modal-title").text('Đăng Ký');
        $('#btn-signup').show();
        $('#btn-show-signup').hide();
        $('input[name=name]').show();
        $('input[name=remember_login]').hide();
        $('input[name=phone]').show();
        $('input[name=address]').show();
        $('label[for=exampleInputPhone]').show();
        $('label[for=exampleInputAddress]').show();
        $('label[for=exampleInputName]').show();
        $('label[for=exampleCheck]').hide();
    });
    $("#btn-signin").click(function () {
        let email = $("input[name=email]").val();
        let password = $("input[name=password]").val();
        let remember_login = $("input[name=remember_login]").val();
        $.ajax({
            type: "post",
            url: "process_login.php",
            data: { email, password, remember_login },
            success: function (response) {
                if (response == 1) {
                    // $('#ModalEdit').modal().hide();
                    $(".alert-success-login").show();
                    setTimeout(() => {

                        $('#ModalEdit').modal().hide();
                        location.reload();
                    }, 1000);
                } else {
                    alert('Sai Tài Khoản Hoặc Mật Khẩu!');
                }
            }
        });
    });
    $("#btn-signup").click(function () {
        $.ajax({
            type: "post",
            url: "process_signup.php",
            data: $("#form-login").serializeArray(),
            success: function (response) {
                if (response == 1) {
                    // $('#ModalEdit').modal().hide();
                    $(".alert-success").show();
                    setTimeout(() => {
                        $('#ModalEdit').modal().hide();
                        location.reload();
                    }, 1000);
                } else {
                    alert('Lỗi Truy Vấn');
                }
            }
        });
    });
    $("#btn-signout").click(function () {
        let confirmDelete = confirm('Bạn Chắc Chắn Muốn Đăng Xuất?');
        if (confirmDelete == true) {
            $.ajax({
                url: "sign_out.php",
            })
                .done(function (res) {
                    if (res == 1) {
                        location.reload();
                    };
                })
        }
    });
    $("#btn-view-cart").click(function () {
        $(".modal-title").text('Giỏ Hàng Của Bạn');
        $("#form-login").hide();
        $('#btn-show-signup').hide();
    });
    $("#btn-add-to-cart").click(function () {
        // $(".success-add-to-cart").show();
        let id = $(this).data('id');
        let quantity = parseFloat($("#span-counter").text());
        $.ajax({
            type: "get",
            url: "add_to_cart.php",
            data: {
                id,quantity
            },
        })
            .done(function (response) {
                console.log(response);
                if (response == 1) {
                    $(".success-add-to-cart").show();
                    setTimeout(() => {
                        location.reload();
                    }, 800);
                }
                // $("#span-counter").text(quantity);
                // let obj = JSON.parse(response);
                // const arrProduct = Object.values(obj);
                // $.each(arrProduct, function (key, value) {
                //     console.log(value);
                //     console.log(key);
                //     // let price = new Intl.NumberFormat('vi-VN', {
                //     //     style: 'currency',
                //     //     currency: 'VND'
                //     // }).format(value.price);
                //     // total_price += parseFloat(value.price);
                //     let tien = parseFloat(value.price) * value.quantity;
                //     $('#tbody-product-cart').append('<tr id="' + key + '"><td>' + key + '</td><td>' + value.name + '</td>  <td> <img height="100px" src="../admin/product/' + value.photo + '" alt="img"> </td> <td>' + value.quantity + '</td> <td>' + value.price + '</td><td id="td-sum">' + tien + '</td><td><button type="button" id="btn-remove-product" data-name="' + value.name + '" class="btn btn-danger">X</button></td>');
                // })
                // total_price = new Intl.NumberFormat('vi-VN', {
                //     style: 'currency',
                //     currency: 'VND'
                // }).format(total_price);


                // $('#tbody-product').append('<tr><td>' + arrProduct[key].id + '</td>  <td>' + arrProduct[key].name + '</td>  <td> <img height="100px" src="../product/' + arrProduct[key].photo + '" alt="img"> </td> <td>' + arrProduct[key].quantity + '</td> <td>' + price + '</td>');
            })
        // getTotalPrice();

    })
    // $("#btn-remove-product").click(function () {
    //     let name = $(this).data('name');
    //     $('#'+name+'').remove();
    // })
    $(document).on("click", '#btn-remove-product', function (event) {
        let btn = $(this);
        let confirmDelete = confirm('Are you sủa?');
        if (confirmDelete == true) {
            let id = btn.data('id');
            let price = 0;
            price = btn.data('price');
            let parent_tr = btn.parents('tr');
            parent_tr.remove();
            $.ajax({
                type: "GET",
                url: "delete_from_to_cart.php",
                data: {
                    id
                },
            })
                .done(function (res) {
                    if (res == 1) {
                        let price_old = $("#span-total-price").text();
                        let price_new = parseFloat(price_old) - parseFloat(price);
                        $("#span-total-price").text(price_new);
                        let parent_tr = btn.parents('tr');
                        parent_tr.remove();
                    }
                    // location.reload();
                    // getTotalPrice();
                });
        }
    });
    $(document).on("click", '#btn-update-quantity', function (event) {
        let btn = $(this);
        let id = btn.data('id');
        let type = btn.data('type');
        $.ajax({
            type: "GET",
            url: "update_quantity.php",
            data: {
                id,
                type
            },
        })
            .done(function () {
                let counter = parseFloat($("#span-counter").text());
                // let parent_tr = btn.parents('tr');
                // let price = parent_tr.find('.span-price').text();
                // let quantity = parent_tr.find('.span-quantity').text();
                if (type == 'incre') {
                    counter++;
                } else {
                    counter--;
                    if (counter < 1) {
                        counter = 1;
                    }
                }
                $("#span-counter").text(counter);
            });
    });
    // $(document).on("click", '#btn-create-oder', function (event) {
    //     $.ajax({
    //         type: "post",
    //         url: "process_oders.php",
    //         data: $("#form_pay").serializeArray(),
    //     })
    //     .done(function () {

    //     });
    // });
    $('#btn-create-oder').click(function () {
        let name_recever = $('input[name=name_recever]').val();
        let phone_recever = $('input[name=phone_recever]').val();
        let address_recever = $('input[name=address_recever]').val();
        $.ajax({
            type: "post",
            url: "process_oders.php",
            data: { name_recever, phone_recever, address_recever },
            success: function (response) {
                if (response == 1) {
                    $(".alert-success-login").show();
                    // $('.modal-dialog').hide();
                    // $('#myModal').hide();
                    
                    setTimeout(() => {
                        // $('.modal, .fade, .in').hide();
                        $(".alert-success-login").hide();
                        $('.modal-body').text("Không Có Sản Phẩm Nào!");
                        
                        // location.reload();
                    }, 1000);
                }
            }
        });
    });


}); //jquery