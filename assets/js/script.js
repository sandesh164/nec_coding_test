$(document).ready(function () {
    $("#register").submit(function (e) {
        e.preventDefault();
        $(".field_error").html('');
        var formData = new FormData($(this)[0]);

        $.ajax({
            url: base_url + 'controllers/registration',
            type: 'POST',
            dataType: 'JSON',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                if(response.type==false){
                    if(response.code == 403){
                        $.each(response.data, function(key, value) {
                            $("#"+ key + '_error').html(value);
                        });
                    }else{
                        $("#common_error").html(response.message);
                    }
                }else {
                    $("#success_message").html(response.message);
                    window.location.href = base_url + 'views/user_login';
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('AJAX Error:', textStatus, errorThrown);
            }
        });
    });

    $("#login").submit(function (e) {
        e.preventDefault();
        $(".field_error").html('');
        var formData = $(this).serialize();

        $.ajax({
            url: base_url + 'controllers/login',
            type: 'POST',
            dataType: 'JSON',
            data: formData,
            success: function (response) {
                if(response.type==false){
                    if(response.code == 403){
                        $.each(response.data, function(key, value) {
                            $("#"+ key + '_error').html(value);
                        });
                    }else{
                        $("#common_error").html(response.message);
                    }
                }else {
                    window.location.replace (base_url + 'views/home');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('AJAX Error:', textStatus, errorThrown);
            }
        });
    });
});
