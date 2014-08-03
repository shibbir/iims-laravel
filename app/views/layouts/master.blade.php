<!DOCTYPE html>
<html lang=en>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="description" content="IIMS is a simple easy-to-use, online inventory and invoice management system that also help you manage your customers, employees, products." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>IIMS -- @yield('title')</title>

    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="IIMS" />
    <meta property="og:url" content="http://iims.shibbir.net/" />
    <meta property="og:title" content="IIMS: Inventory & Invoice Management System" />
    <meta property="og:image" content="" />
    <meta property="og:description" content="IIMS is a simple easy-to-use, online inventory and invoice management system that also help you manage your customers, employees, products." />

    {{ HTML::style('build/css/site.min.css') }}

    <!--[if lt IE 9]>
    {{ HTML::script('bower_components/html5shiv/dist/html5shiv.js') }}
    <![endif]-->
</head>
<body ng-app="iimsApp">
    <div ng-controller="BaseCtrl">
        @include('shared.navigation')
        <div class="container content">
            <div class="row">
                <div class="col-xs-12">
                    @yield('breadcrumb')
                    @yield('content')
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <p class="pull-right">
                        Copyright &copy;
                        <?=(2013 == date('Y')) ? 2013 : "2013 &#8211; " . date('Y')?>
                        <a href="http://shibbir.net/" target="blank">Shibbir Ahmed</a>. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
    {{ HTML::script('build/js/libs.min.js') }}

    {{ HTML::script('js/application/app.js') }}
    {{ HTML::script('js/application/services/apiService.js') }}
    {{ HTML::script('js/application/services/productService.js') }}
    {{ HTML::script('js/application/services/notifierService.js') }}
    {{ HTML::script('js/application/services/customerService.js') }}
    {{ HTML::script('js/application/controllers/baseCtrl.js') }}
    {{ HTML::script('js/application/controllers/dashboardCtrl.js') }}
    {{ HTML::script('js/application/controllers/salesInvoiceCtrl.js') }}
</body>
</html>