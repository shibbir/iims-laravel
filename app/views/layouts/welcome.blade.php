<!DOCTYPE html>
<html lang=en>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="description" content="IIMS is a simple easy-to-use, online inventory and invoice management system that also help you manage your customers, employees, products." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>IIMS -- Login to access Dashboard</title>

    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="IIMS" />
    <meta property="og:url" content="http://iims.shibbir.net/" />
    <meta property="og:title" content="IIMS: Inventory & Invoice Management System" />
    <meta property="og:image" content="" />
    <meta property="og:description" content="IIMS is a simple easy-to-use, online inventory and invoice management system that also help you manage your customers, employees, products." />

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
            @if (Session::get('flash_message'))
                <div class="alert alert-{{ Session::get('flash_type') }}">
                    {{ Session::get('flash_message') }}
                </div>
            @endif
            {{ Form::open(array('route' => 'sessions.store')) }}
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-user"></i></span>
                    {{ Form::text('username', '', ['placeholder' => 'Username', 'style' => 'width: 343px;']) }}
                </div>
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-key"></i></span>
                    {{ Form::password('password', ['placeholder' => 'Password', 'style' => 'width: 343px;']) }}
                </div>
                <br/>
                <button type="submit" class="btn btn-info btn-block">Sign in</button>
            {{ Form::close() }}
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