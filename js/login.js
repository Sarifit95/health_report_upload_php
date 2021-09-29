$(document).ready(function () {











    jQuery.validator.addMethod("phonenu", function (value, element) {
        if (value.startsWith('01')) {
            return true;
        } else {
            return false;
        };
    }, "Invalid phone number");

    $("#login").validate({
        rules: {
            password: {
                required: true,
            },
            mobile: {
                phonenu: true,
                required: true,
                number:true,

                remote: {

                    url: "web/_ajax.php",
                    type: "post",
                    data:
                        {

                            phone: function() {

                                return $("#mobile" ).val();
                            },
                            login:true
                        },


                },


            },

        },
        messages: {
            mobile: {
                number: jQuery.validator.format("must not include spaces or characters"),

                remote: jQuery.validator.format("{0} is Not Registered")
            }



        },
        submitHandler: function(form) {
            form.submit();
        },

    });

















});

