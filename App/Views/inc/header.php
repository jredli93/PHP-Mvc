<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta
        name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
        href="https://fonts.googleapis.com/css?family=Roboto&display=swap"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link
        rel="stylesheet"
        href="./assets/font-awesome-4.7.0/css/font-awesome.min.css"
    />
    <title>Citrus</title>
</head>
<body>
<div class="navbar">
    <div class="navbar-center section_center">
        <nav>
            <div class="nav_header">
                <img
                    src="./assets/img/citrus-avatar.jpg"
                    alt="citrus logo"
                    class="navbar-img"
                />
                <span class="nav_btn">
              <i class="fa fa-bars"></i>
            </span>
            </div>
            <ul class="nav_links">
                <?php if(\Core\Session::get('loggedIn') == 0) { ?>
                <li>
                    <form action="login" method="POST">
                        <input class="login" placeholder="Username" type="text" name="username">
                        <input class="login" placeholder="Password" type="password" name="password">
                        <button class="login-btn">Login</button>
                    </form>
                </li>
                <?php }
                else { ?>
                    <span>Welcome - <?= Core\Session::get('username'); ?></span>
                    <span><a href="logout" class="logout">Logout</a></span>
                <?php } ?>
            </ul>
        </nav>
    </div>
</div>