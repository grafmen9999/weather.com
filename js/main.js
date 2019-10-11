function redirect(url, timeout) {
    setTimeout(function() {
        document.location.replace(url);
    }, timeout);
}

$('document').ready(function() {

    $('#form_register #submit').click(function() {
        var fName = $('#firstName').val();
        var lName = $('#lastName').val();
        var email = $('#email').val();
        var sex = $('input[name="sex"]:checked').val();
        var date_birth = $('#date-birth').val();

        var password = $('#password').val();
        var password_confirm = $('#password-confirm').val();

        $.ajax({
            url: './controllers/register.php',
            type: 'post',
            data: {
                'do_send': 'send',
                'firstName': fName,
                'lastName': lName,
                'email': email,
                'sex': sex,
                'date-birth': date_birth,
                'password': password,
                'password-confirm': password_confirm
            },
            success: function(data, status, xhr) {

                if (xhr.getResponseHeader("DB_SUCCESS") == "1") {

                    if ($('form .response').length) {

                        $('form .response').removeClass('success');
                        $('form .response').removeClass('error');
                        $('form .response').text(data).addClass('success');

                    } else {

                        $('form').prepend("<div class='response success'>" + data + "</div>");

                    }

                    $('form input:not(input[type="button"]):not(input[type="radio"])').val("");
                    $('form input[type="radio"]').prop('checked', false);

                    redirect('/', 500);
                } else {

                    if ($('form .response').length) {

                        $('form .response').removeClass('success');
                        $('form .response').removeClass('error');
                        $('form .response').text(data).addClass('error');

                    } else {

                        $('form').prepend("<div class='response error'>" + data + "</div>");

                    }

                }

            }
        });

        return false;

    });

    $('#form_login #submit').click(function() {
        var email = $('#email').val();
        var password = $('#password').val();

        $.ajax({
            url: './controllers/login.php',
            type: 'post',
            data: {
                'do_send': 'send',
                'email': email,
                'password': password
            },
            success: function(data, status, xhr) {

                if (xhr.getResponseHeader("DB_SUCCESS") == "1") {

                    if ($('form .response').length) {

                        $('form .response').removeClass('success');
                        $('form .response').removeClass('error');
                        $('form .response').text(data).addClass('success');

                    } else {

                        $('form').prepend("<div class='response success'>" + data + "</div>");

                    }

                    $('form input:not(input[type="button"]):not(input[type="radio"])').val("");

                    redirect('/', 500);

                } else {

                    if ($('form .response').length) {

                        $('form .response').removeClass('success');
                        $('form .response').removeClass('error');
                        $('form .response').text(data).addClass('error');

                    } else {

                        $('form').prepend("<div class='response error'>" + data + "</div>");

                    }

                }

            }
        });

        return false;
    });

    $('.logout').click(function() {
        $.ajax({
            url: './controllers/logout.php',
            type: 'post',
            data: {
                'do_send': 'send'
            },
            success: function() {
                location.reload();
            }
        });

        return false;
    });

    $('#form__feedback #submit').click(function() {
        var email = $('#email').val();
        var name = $('#name').val();
        var message = $('#message').val();

        $.ajax({
            url: './controllers/feedback_send.php',
            type: 'post',
            data: {
                'do_send': 'send',
                'email': email,
                'name': name,
                'message': message
            },
            success: function(data, status, xhr) {

                if (xhr.getResponseHeader("DB_SUCCESS") == "1") {

                    if ($('form .response').length) {

                        $('form .response').removeClass('success');
                        $('form .response').removeClass('error');
                        $('form .response').text(data).addClass('success');

                    } else {

                        $('form').prepend("<div class='response success'>" + data + "</div>");

                    }

                    $('form input:not(input[type="button"]):not(input[type="radio"])').val("");
                    $('form input[type="radio"]').prop('checked', false);

                    redirect(location.href, 300);

                } else {

                    if ($('form .response').length) {

                        $('form .response').removeClass('success');
                        $('form .response').removeClass('error');
                        $('form .response').text(data).addClass('error');

                    } else {

                        $('form').prepend("<div class='response error'>" + data + "</div>");

                    }

                }

            }
        });

        return false;
    });

});