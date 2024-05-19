<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link rel="stylesheet" href="./css/login.css">
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
        <div class="header">
            <h1>Smart Stock</h1>
        </div>
        <div class="login-box">
            <h2>Login</h2>
            <form action="action.php" method="post">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" name="login">Login</button>
                <p class="signup-link">Don't have an account? <a href="#">Sign up</a></p>
            </form>
        </div>
    </div>
        <script src="./js/bootstrap.min/js"></script>
        <script src="./js/bootstrap.bundle.min.js"></script>
    </body>
    </html>