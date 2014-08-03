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

    {{ HTML::style('build/css/login.min.css') }}

    <!--[if lt IE 9]>
    {{ HTML::script('bower_components/html5shiv/dist/html5shiv.js') }}
    <![endif]-->
</head>
<body>
    <div class="login-container container">
        <div class="well">
            <legend>Please Sign In</legend>

            @include('shared._flashMessage')

            {{ Form::open(array('route' => 'sessions.store')) }}
            <div class="form-group">
                {{ Form::text('username', '', ['placeholder' => 'Username', 'class' => 'form-control']) }}
                {{ $errors->first('username', '<span class="error">:message</span>')}}
            </div>

            <div class="form-group">
                {{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) }}
                {{ $errors->first('password', '<span class="error">:message</span>')}}
            </div>

            <br />
            {{ Form::submit('Sign in', ['class' => 'btn btn-info btn-block']) }}
            {{ Form::close() }}
        </div>
        <p class="pull-right">
            Copyright &copy;
            <?= (2014 == date('Y')) ? 2014 : "2014 &#8211; " . date('Y') ?>
            <a href="http://shibbir.net/" target="blank">Shibbir Ahmed</a>. All rights reserved.
        </p>
    </div>
</body>
</html>