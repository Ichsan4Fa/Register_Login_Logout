
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User's Sign in</title>
    <link href="style.css" type="text/css" rel="stylesheet">
</head>

<body>
    <header>
        <nav>
            <div class="main-wrapper">
                <ul>
                    <li>
                        <a href="index.php">Beranda</a>
                    </li>
                </ul>
                <div class="nav-login">
                <form action="logsys.php" method="POST">
                    <input type="text" name="username" placeholder="Username">
                    <input type="password" name="password" placeholder="Password">
                    <button type="submit" name="login">Masuk</button>
                </form>
                <a href="signup.php">Daftar</a>
            </div>
            </div>
        </nav>
    </header>
</body>

</html>