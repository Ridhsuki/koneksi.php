<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

  <title>Register Account</title>
</head>

<body>
  <div class="container" style="margin-top: 50px">
    <div class="row">
      <div class="col-md-5 offset-md-3">
        <div class="card">
          <div class="card-body">
            <label>REGISTER</label>
            <hr>

            <div class="form-group">
              <label>Full Name</label>
              <input type="text" class="form-control" id="full_name" placeholder="Input Full Name">
            </div>

            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" id="username" placeholder="Input Username">
            </div>

            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" id="password" placeholder="Input Password">
            </div>

            <button class="btn btn-register btn-block btn-success">REGISTER</button>

          </div>
        </div>
        <div class="text-center" style="margin-top: 15px">
          Already have an Account? <a href="login.php">Login</a>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

  <script>
    $(document).ready(function () {
      $(".btn-register").click(function () {
        var full_name = $("#full_name").val();
        var username = $("#username").val();
        var password = $("#password").val();

        if (full_name.length == "") {
          Swal.fire({
            type: 'warning',
            title: 'Oops...',
            text: 'Full name is Required!'
          })
        } else if (username.length == "") {
          Swal.fire({
            type: 'warning',
            title: 'Oops...',
            text: 'Username is Required!'
          })
        } else if (password.length == "") {
          Swal.fire({
            type: 'warning',
            title: 'Oops...',
            text: 'Password is Required!'
          })
        } else {
          $.ajax({
            url: "save-register.php",
            type: "POST",
            data: {
              "full_name": full_name,
              "username": username,
              "password": password
            },

            success: function (response) {
              if (response == "success") {
                Swal.fire({
                  type: 'success',
                  title: 'Registered successfully!',
                  text: 'Please, Login!'
                });

                $("#full_name").val('');
                $("#username").val('');
                $("#password").val('');
              } else {
                Swal.fire({
                  type: 'error',
                  title: 'Failed to Register!',
                  text: 'Please, Try Again!'
                });
              }
              console.log(response);
            },

            error: function (response) {
              Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Server Error!'
              });

            }
          })
        }
      })
    })
  </script>
</body>

</html>