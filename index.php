<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:image" content="https://fillow.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>Login Page</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/logo-cto.png">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="index.php"><img src="images/logo-cto.png" alt=""
                                                style="height:150px;width:150px;"></a>
                                    </div>
                                    <h4 class="text-center mb-4">City Treasurer's Office - Treasfund System</h4>
                                    <?php
                                    if (isset($_SESSION['status']) && $_SESSION['status_code'] != '') {
                                        echo "<script>
                      Swal.fire({
                          title: '{$_SESSION['status']}',
                          icon: '{$_SESSION['status_code']}',
                          confirmButtonText: 'Ok Done'
                      }).then(function() {
                          // Redirect after alert is closed if successful
                          if ('{$_SESSION['status_code']}' == 'success') {
                              window.location.href = 'dashboard.php';
                          }
                      });
                    </script>";
                                        unset($_SESSION['status']);
                                        unset($_SESSION['status_code']);
                                    }
                                    ?> 
                                    <form action="" method="POST" id="loginForm">
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Employee ID</strong></label>
                                            <input type="number" id="username" name="username" class="form-control"
                                                placeholder="Employee ID">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" id="password" name="password" class="form-control"
                                                placeholder="Password">
                                        </div>
                                        <div class="row d-flex justify-content-between mt-4 mb-2">
                                            <div class="mb-3">
                                                <div class="form-check custom-checkbox ms-1">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="basic_checkbox_1">
                                                    <label class="form-check-label" for="basic_checkbox_1">Remember
                                                        Me</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="login"
                                                class="btn btn-dark btn-block">Login</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>

</html>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    document.getElementById('loginForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent default form submission

        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;

        if (username && password) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'log-config.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            var data = 'username=' + encodeURIComponent(username) + '&password=' + encodeURIComponent(password);

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);

                        if (response.status_code === 'success') {
                            Swal.fire({
                                title: 'Welcome!',
                                text: `Hello, ${username}! You have logged in successfully.`,
                                icon: 'success',
                                confirmButtonText: 'Okay',
                                heightAuto: false // Prevents auto height adjustments causing jump
                            }).then(() => {
                                window.location.href = 'dashboard.php';
                            });
                        } else {
                            Swal.fire({
                                title: 'Oops!',
                                text: response.status,
                                icon: 'error',
                                confirmButtonText: 'Try Again',
                                heightAuto: false // Prevents layout shift
                            });
                        }
                    }
                }
            };

            xhr.send(data);
        } else {
            Swal.fire({
                title: 'Oops!',
                text: 'Please fill in both fields.',
                icon: 'error',
                confirmButtonText: 'Try Again',
                heightAuto: false // Prevents interface jumping
            });
        }
    });

</script>