<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body>
    <div class="submit-result">
        <?php
        if (isset($_GET['loginE']))
            echo "Username or Password Don't Match<br>"
                ?>
        </div>
        <div class="login-container">
            <form action="action.php" method="POST">
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

                <div class="form-floating">
                    <input name="email"  type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>

                <div class="form-check text-start my-3">
                    <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Remember me
                    </label>
                </div>
                <button class="btn btn-primary w-100 py-2" type="submit" name="login">LOG IN</button>
            </form>
        </div>

        <script src="./js/bootstrap.min/js"></script>
        <script src="./js/bootstrap.bundle.min.js"></script>
    </body>

    </html>