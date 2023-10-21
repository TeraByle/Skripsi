<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="background-login">
            <div class="container">
                <div class="login-box">
                    <div class="company-name">PT. CENTRAL UTAMA</div>
                    <div class="form-container">
                        <form action="/admin/login" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-element">
                            <label for="username" style="color: #212B36; font-size: 14px; font-family: Poppins; font-weight: 500;">Username</label>
                            <input type="text" id="username">
                        </div>
                        <div class="form-element">
                            <label for="password" style="color: #212B36; font-size: 14px; font-family: Poppins; font-weight: 500;">Password</label>
                            <input type="password" id="password">
                        </div>
                        <div class="sign-in-button">
                            <a href="/produk">Sign in</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\Skripsi\resources\views/login.blade.php ENDPATH**/ ?>