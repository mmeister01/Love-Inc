$(".banner-image").backstretch(['images/love_banner.jpg',
        'images/mission.jpg',
        'images/volunteers_patton.jpg'],
    {
        duration: 3000, fade: 750
    }
);

$('#loginSubmit').click(function (event) {
    event.preventDefault();

    $("div#loginEmail").removeClass("has-error");
    $("label[for='loginEmailInput']").text("Email address");

    $("div#loginPassword").removeClass("has-error");
    $("label[for='loginPasswordInput']").text("Password");

    var email = $('#loginEmailInput').val();
    var password = $('#loginPasswordInput').val();

    if (email.length == 0) {
        $("div#loginEmail").addClass("has-error");
        $("label[for='loginEmailInput']").text("Email address is required!");
    }
    if (password.length == 0) {
        $("div#loginPassword").addClass("has-error");
        $("label[for='loginPasswordInput']").text("Password is required!");
    }
    else {
        $.ajax({
            type: "POST",
            url: "lib/login.php",
            data: "email=" + email + "&pwd=" + password,
            success: function (result) {
                if (result == 'invalid_email') {
                    $("div#loginEmail").addClass("has-error");
                    $("label[for='loginEmailInput']").text("Please enter a valid email address!");
                }
            }
        });
    }
});