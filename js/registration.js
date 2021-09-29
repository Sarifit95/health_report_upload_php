$(document).ready(function () {











    jQuery.validator.addMethod("phonenu", function (value, element) {
        if (value.startsWith('01')) {
            return true;
        } else {
            return false;
        };
    }, "Invalid phone number");

    $("#sign-up").validate({
        rules: {
            name: {
                required: true,

            },
            password: {
                required: true,
                minlength:6,

            },
            mobile: {
                phonenu: true,
                required: true,
                number:true,
                // regex: /^01$/,
                minlength:11,
                maxlength:11,

                remote: {

                    url: "web/_ajax.php",
                    type: "post",
                    data:
                        {

                            mobile: function() {

                                return $("#mobile" ).val();
                            }
                        },


                },


            },
            email: {

                required: true,
                email: true,

                // remote: {
                //
                //     url: "../ajax.php",
                //     type: "post",
                //     data:
                //         {
                //
                //             email: function() {
                //
                //                 return $("#email" ).val();
                //             }
                //         },
                //
                //
                // },


            },
        },
        messages: {
            mobile: {
                number: jQuery.validator.format("must not include spaces or characters"),
                // regex: jQuery.validator.format("must eeces or characters"),
                minlength: jQuery.validator.format("Enter only phone numbers with 11 digits"),
                maxlength: jQuery.validator.format("Enter only phone numbers with 11 digits"),
                remote: jQuery.validator.format("{0} is already taken.")         },
            email: {
                email: jQuery.validator.format("Enter Valid Email"),
                remote: jQuery.validator.format("{0} is already taken.")         },


        },
        submitHandler: function(form) {
            form.submit();
        },

    });

















});

