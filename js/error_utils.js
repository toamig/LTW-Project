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
