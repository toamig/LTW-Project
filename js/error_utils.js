$(document).ready(function(){
    $("#register-form").submit(function(event) {
        event.preventDefault();
        let firstname = $("#register-firstname").val();
        let lastname = $("#register-lastname").val();
        let username = $("#register-username").val();
        let email = $("#register-email").val();
        let phoneNumber = $("#register-phoneNumber").val();
        let password = $("#register-password").val();
        let confirm = $("#register-confirm").val();
        let submit = $("#register-submit").val();
        $(".form-message").load("../actions/register_action.php", {
            firstname: firstname,
            lastname: lastname,
            username: username,
            email: email,
            phoneNumber: phoneNumber,
            password: password,
            confirm: confirm,
            submit: submit
        });
    });
});

$(document).ready(function(){
    $("#login-form").submit(function(event) {
        event.preventDefault();
        let email = $("#login-email").val();
        let password = $("#login-password").val();
        let submit = $("#login-submit").val();
        $(".form-message").load("../actions/login_action.php", {
            email: email,
            password: password,
            submit: submit
        });
    });
});


