<!DOCTYPE html>
<html lang=en>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="description" content="IIMS is a simple easy-to-use, online inventory and invoice management system that also help you manage your customers, employees, products." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>IIMS -- Login to access Dashboard</title>

    {{ HTML::style('css/welcome.min.css') }}

    <!--[if IE 7]>
    {{ HTML::style('bower_components/fontawesome/css/font-awesome-ie7.min.css') }}
    <![endif]-->

    <!--[if lt IE 9]>
    {{ HTML::script('bower_components/html5shiv/dist/html5shiv.js') }}
    <![endif]-->
</head>
<body>
    <!-- Navbar -->
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="brand" href="/">
                    Inventory &amp; Invoice Management System
                    <span class="label label-success">beta</span>
                </a>
            </div>
        </div>
    </div>
    <!-- login-container -->
    <div class="login-container container">
        <div class="well">
            <legend>Please Sign In</legend>
            @yield('flashMessage')
            <div id="notification-login"></div>
            <form action="#" class="user-login-form">
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-user"></i></span>
                    <input type="text" name="UserName" style="width: 343px;" placeholder="Username" />
                </div>
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-key"></i></span>
                    <input type="password" name="Password" style="width: 343px;" placeholder="Password" />
                </div>
                <br/>
                <button type="button" class="btn btn-info btn-block btn-login btn-ajax">Sign in</button>
                <button type="button" class="btn btn-info btn-block btn-loading hide"><i class="icon-spinner icon-spin"></i>
                    Signing in...
                </button>
            </form>
        </div>
        <p class="pull-right">
            Copyright &copy;
            <?= (2014 == date('Y')) ? 2014 : "2014 &#8211; " . date('Y') ?>
            <a href="http://shibbir.net/" target="blank">Shibbir Ahmed</a>. All rights reserved.
        </p>
    </div>
    {{ HTML::script('js/welcome.min.js') }}
</body>
</html>