<!DOCTYPE html>
<html lang=en>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="description" content="IIMS is a simple easy-to-use, online inventory and invoice management system that also help you manage your customers, employees, products." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>IIMS -- <?=$title?></title>

    {{ HTML::style('css/all.min.css') }}

    <!--[if IE 7]>
    {{ HTML::style('bower_components/fontawesome/css/font-awesome-ie7.min.css') }}
    <![endif]-->

    <!--[if lt IE 9]>
    {{ HTML::script('bower_components/html5shiv/dist/html5shiv.js') }}
    <![endif]-->

    {{ HTML::script('bower_components/jquery/jquery.min.js') }}
</head>
<body>
    <div id="container-spinner" class="hide">
        <div id="spinner"></div>
        <div class="pager">Loading Content ...</div>
    </div>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner" style="padding-left: 10px;padding-right: 10px;">
            <div class="container-fluid">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="/dashboard">
                    Inventory &amp; Invoice Management System
                    <span class="label label-success">beta</span>
                </a>
                <div class="btn-group pull-right right">
                    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="icon-user"></i> <?=Auth::user()->name?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="user/profile/<?=Auth::user()->username?>"><i class="icon-pencil"></i> Profile</a></li>
                        <li><a href="notification"><i class="icon-bell-alt"></i> Notification</a></li>
                        <li class="divider"></li>
                        <li><a href="logout"><i class="icon-off"></i> Sign Out</a></li>
                    </ul>
                </div>
                <div class="nav-collapse">
                    <ul class="nav">
                        <li class="active">{{ HTML::link('/dashboard', 'Dashboard')}}</li>
                        <li class="">{{ HTML::link('/user', 'User')}}</li>
                        <li class="">{{ HTML::link('/customer', 'Customer')}}</li>
                        <li class="">{{ HTML::link('/inventory', 'Inventory')}}</li>
                        <li class="">{{ HTML::link('/invoice', 'Invoice')}}</li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row-fluid">
            <div class="span12">
                @yield('breadcrumb')
                @yield('content')
            </div>
        </div><hr />
        <p class="pull-right">
            Copyright &copy;
            <?=(2013 == date('Y')) ? 2013 : "2013 &#8211; " . date('Y')?>
            <a href="http://shibbir.net/" target="blank">Shibbir Ahmed</a>. All rights reserved.
        </p>
    </div>
    {{ HTML::script('js/all.min.js') }}
</body>
</html>