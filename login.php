<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Login</title>
</head>

<body>
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-5 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <label>LOGIN</label>
                        <hr>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Username">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password">
                        </div>

                        <button class="btn btn-login btn-block btn-success">LOGIN</button>

                    </div>
                </div>

                <div class="text-center" style="margin-top: 15px">
                    Don't have an account? <a href="register.php">Register</a>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".btn-login").click(function () {
                var username = $("#username").val();
                var password = $("#password").val();

                if (username.length == "") {
                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Username is Required!',
                    });
                } else if (password.length == "") {
                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Password is Required!',
                    });
                } else {
                    $.ajax({
                        url: "check-login.php",
                        type: "POST",
                        data: {
                            "username": username,
                            "password": password
                        },

                        success: function (response) {
                            if (response == "success") {
                                Swal.fire({
                                    type: "success",
                                    title: "Login Success!",
                                    text: "You will redirect in 3 second!",
                                    timer: 3000,
                                    showCancelButton: false,
                                    showConfirmButton: false
                                }).then(function () {
                                    window.location.href = "dashboard.php";
                                });
                            } else {
                                Swal.fire({
                                    type: "error",
                                    title: "Login Failed!",
                                    text: "Please try again!"
                                });
                            }

                            console.log(response);
                        },
                        error: function (response) {
                            Swal.fire({
                                type: "error",
                                title: "Oops...",
                                text: "Server Error!",
                            });
                            console.log(response);
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>