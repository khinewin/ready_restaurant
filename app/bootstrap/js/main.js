/**
 * Created by root on 5/22/16.
 */
$(function () {

//toggle function
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
//end toggle

//sign up
    $("#signup").click(function () {
        var fName=$("#fName").val();
        var lName=$("#lName").val();
        var email=$("#email").val();
        var password=$("#password").val();
        var password_confirm=$("#password_confirm").val();
        var urole=$("#urole").val();


        $.ajax({
           type:"POST",
            url:"register.php",
            async:false,
            data:{urole:urole, fName:fName, lName:lName, email:email, password:password, password_confirm:password_confirm },
            success:function(msg)
            {
                $("#msg_signup").html(msg);

                $("#password").val('');
                $("#password_confirm").val('');

            }
        });

    });
 //end signup

 //login
    $("#login").click(function () {
        var email=$("#email").val();
        var password=$("#password").val();


        $.ajax({
            type:"POST",
            url:"login.php",
            async:false,
            data:{email:email, password:password},
            success:function (msg) {
                if (msg === 'Login') {
                    window.location.replace('../');
                }
                $("#msg_login").html(msg);

            }
        });
    });
//end_login

    //password dialog
    $("#edit_pass").hide();
    $("#change_pass").click(function(){

                $("#edit_pass").fadeIn(500).show();


    });
    //end password dialog

    //update password
    $("#update_pass").click(function(){
        var id=$("#id").val();
        var c_password=$("#c_password").val();
        var password=$("#password").val();
        var password_confirm=$("#password_confirm").val();


        $.ajax({
                type:"POST",
                url:"../admins/update_password.php",
                data: {id:id, c_password:c_password, password:password, password_confirm:password_confirm},
            success:function(msg)
            {
                $("#msg_pass").html(msg);
                $("#password").val('');
                $("#password_confirm").val('');
            }
        });

    });

    //end update password

    //update user password
    $("#update_user_pass").click(function(){
        var id=$("#id").val();
        var c_password=$("#c_password").val();
        var password=$("#password").val();
        var password_confirm=$("#password_confirm").val();


        $.ajax({
            type:"POST",
            url:"../users/update_password.php",
            data: {id:id, c_password:c_password, password:password, password_confirm:password_confirm},
            success:function(msg)
            {
                $("#msg_pass").html(msg);
                $("#password").val('');
                $("#password_confirm").val('');
            }
        });

    });

    //end update user password

    //delete_account
    $("#delete_account").click(function(){
       var id=$("#id").val();
        var test=window.confirm("are you sure you want to delete your account?");
        if(test)
        {
            $.ajax({
                type:"POST",
                url:"../admins/del_user.php",
                data:{id:id},
                success:function(msg){
                    if (msg === 'delete') {
                        window.location.replace('../');
                    }
                    $("#msg_delete_account").html(msg)
                }
            });
        }
    });
    //end_delete_account

    //delete_account
    $("#delete_user_account").click(function(){
        var id=$("#id").val();
        var test=window.confirm("are you sure you want to delete your account?");

        if(test)
        {
            $.ajax({
                type:"POST",
                url:"../users/del_user.php",
                data:{id:id},
                success:function(msg){
                    if (msg === 'delete') {
                        window.location.replace('../');
                    }
                    $("#msg_delete_account").html(msg)
                }
            });
        }
    });
    //end_delete_account



    //show menu add
    $("#show_menu_add_form").hide();
    $("#show_menu_add").click(function () {
       $("#show_menu_add_form").fadeIn(500).show();
    });
    //end show menu add

    //food_menu
    $("#add_food_menu").click(function () {
       var name=$("#name").val();
        var remark=$("#remark").val();

        $.ajax({
           type:"POST",
            url:"../food/add_food_menu.php",
            data:{name:name, remark:remark},
            async:false,
            success:function(msg)
            {
                $("#food_menu_add").html(msg);
                $("#name").val('');
                $("#remark").val('');
                show_food_menu();

            }
        });
    });
    //end_food_menu
    
    //show_food_menu
    show_food_menu();
    function show_food_menu() {
        $.ajax({
           type:"POST",
            url:"../food/show_food_menu.php",
            async:false,
            success:function (msg) {
                $("#show_food_menu").html(msg);

            }
        });
        
    }
    //end_show_food_menu

    //delete_food_menu
    $("body").delegate('.delete_food_menu','click', function(){
        var id=$(this).attr('id');
        $.ajax({
            type:"POST",
            url:"../food/delete_food_menu.php",
            data:{id:id},
            success:function(msg)
            {
                $("#msg_delete_food_menu").html(msg);
                show_food_menu();
            }
        });

        });
    //end_delete_food_menu


//show add food form
    $("#show_add_food_form").hide();
    $("#show_add_food").click(function () {
        $("#show_add_food_form").fadeIn(500).show();
    });
    //end show add food form

    //show food
    show_food();
    function show_food()
    {
        $.ajax({
           type:"POST",
            url:"../food/show_food.php",
            success:function(msg)
            {
                $("#show_food").fadeIn(500).html(msg);
            }
        });

    }
    //end show food

    //delete_food
    $("body").delegate('.delete_food','click', function(){
        var id=$(this).attr('id');
        $.ajax({
            type:"POST",
            url:"../food/delete_food.php",
            data:{id:id},
            success:function(msg)
            {
                $("#msg_delete_food").html(msg);
                show_food();
            }
        });

    });
    //end_delete_food

//add to cart
   $("body").delegate('.add_to_cart','click',function () {
      var id=$(this).attr('id');
       $.ajax({
            type:"POST",
           url:"add_to_cart.php",
           async:false,
           data:{id:id},
           success:function(msg)
           {
               $("#add_to_cart").html(msg);
               show_cart();
           }
       });
   });
    //end add to card

    //show cart
    show_cart();
    function show_cart() {
    $.ajax({
       type:"POST",
        url:"show_cart.php",
        async:false,
        success:function (msg) {
            $("#show_cart").html(msg);
        }
    });
    }
    //end show cart


    //show order in cart
    show_order_in_cart();
    function show_order_in_cart() {
        $.ajax({
           type:"POST",
            url:"show_order_in_cart.php",
            async:false,
            success:function(msg)
            {
                $("#show_order_in_cart").html(msg);
            }
        });
    }
    //end show order in

    //clear cart
    $("#clear_cart").click(function(){
       $.ajax({
           type:"POST",
           url:"clear_cart.php",
           async:false,
           success:function (msg) {
               $("#msg_clear_cart").html(msg);
               show_order_in_cart();
               show_cart();

           }
       })
    });
    //end clear cart

    //submit order
    $("#submit_order").click(function(){
        var customer=$("#customer").val();
        var o_f=$("#o_f").val();
        
       $.ajax({
          type:"POST",
            url:"submit_order.php",
           async:false,
           data:{customer:customer, o_f:o_f},
          success:function (msg) {
               $("#msg_submit_order").html(msg);
               show_order_in_cart();
              show_cart();

           }
       });
    });
    //end submit order

    //show Orders
    show_order();
    function show_order(){
        $.ajax({
           type:"POST",
            url:"../admins/show_order.php",
            async:false,
            success:function(msg)
            {
                $("#show_order").html(msg);
            }
        });
    }
    //end show Orders



    //show Orders user
    show_user_order();
    function show_user_order(){
        $.ajax({
            type:"POST",
            url:"../users/show_order_user.php",
            async:false,
            success:function(msg)
            {
                $("#show_user_order").html(msg);
            }
        });
    }
    //end show Orders user

    //show Orders
    show_order_only();
    function show_order_only(){
        $.ajax({
            type:"POST",
            url:"../admins/show_order_only.php",
            async:false,
            success:function(msg)
            {
                $("#show_order_only").html(msg);
            }
        });
    }
    //end show Orders

    //do delivered
    $("body").delegate('.do_delivered','click',function () {
       var id=$(this).attr('id');
        $.ajax({
        type:"POST",
            url:"../admins/do_delivered.php",
            data:{id:id},
            success:function(msg)
            {
                $("#do_delivered").html(msg);
                show_order();
                show_order_only();
            }
        });

    });
    //end do delivered

    //do cashed
    $("body").delegate('.do_cashed','click',function () {
        var id=$(this).attr('id');
                $.ajax({
            type:"POST",
            url:"../admins/do_cashed.php",
            data:{id:id},
            success:function(msg)
            {
                $("#do_cashed").html(msg);
                show_order();
                show_order_only();
            }
        });

    });
    //end do cashed

    //delete order
    $("body").delegate('.delete_order','click',function () {
       var id=$(this).attr('id');

        var d=window.confirm("Sure you want to delete this order ?");
        if(d)
        {
            $.ajax({
                type:"POST",
                url:"../admins/delete_order.php",
                async:false,
                data:{id:id},
                success:function (msg)
                {
                    $("#delete_order").html(msg);
                    show_order();
                }
            });
        }

    });
    //end delete order


    //show user
    show_user();
    function show_user() {
        $.ajax({
           type:"POST",
            url:"../admins/show_user.php",
            async:false,
            success:function(msg)
            {
                $("#show_user").html(msg);
            }
        });
    }
    //end show user

    //remove account
    $("body").delegate('.remove_acc','click',function () {
        var id=$(this).attr('id');
        var d=window.confirm("Sure you want to delete this account ?");
        if(d)
        {
            $.ajax({
                type:"POST",
                url:"../admins/remove_acc.php",
                async:false,
                data:{id:id},
                success:function (msg)
                {
                    $("#remove_acc").html(msg);
                    show_user();
                }
            });
        }

    });
//end remove account
});
