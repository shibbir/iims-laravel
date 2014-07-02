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

    {{ HTML::style('bower_components/bootstrap/dist/css/bootstrap.css') }}
    {{ HTML::style('bower_components/fontawesome/css/font-awesome.css') }}
    {{ HTML::style('bower_components/toastr/toastr.css') }}
    {{ HTML::style('css/jquery.cleditor.css') }}
    {{ HTML::style('css/style.css') }}

    <!--[if lt IE 9]>
    {{ HTML::script('bower_components/html5shiv/dist/html5shiv.js') }}
    <![endif]-->
</head>
<body ng-app="iimsApp">
    <div ng-controller="BaseCtrl">
        @include('shared.navigation')
        <div class="container content">
            @yield('breadcrumb')
            @yield('content')
        </div>
        <div class="container">
            <p class="pull-right">
                Copyright &copy;
                <?=(2013 == date('Y')) ? 2013 : "2013 &#8211; " . date('Y')?>
                <a href="http://shibbir.net/" target="blank">Shibbir Ahmed</a>. All rights reserved.
            </p>
        </div>
    </div>
    {{ HTML::script('bower_components/jquery/dist/jquery.js') }}
    {{ HTML::script('bower_components/bootstrap/dist/js/bootstrap.js') }}
    {{ HTML::script('bower_components/lodash/dist/lodash.js') }}
    {{ HTML::script('bower_components/angular/angular.js') }}
    {{ HTML::script('bower_components/angular-i18n/angular-locale_bn-bd.js') }}
    {{ HTML::script('bower_components/toastr/toastr.js') }}
    {{ HTML::script('bower_components/lodash/dist/lodash.js') }}
    {{ HTML::script('js/libs/jquery.cleditor.js') }}
    {{ HTML::script('js/libs/highcharts.src.js') }}
    {{ HTML::script('js/libs/jquery.printPage.js') }}
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