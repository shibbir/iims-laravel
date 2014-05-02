<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Inventory &amp; Inventory Management System</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active">{{ HTML::link('/dashboard', 'Dashboard')}}</li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Users <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>{{ HTML::link('/users', 'List')}}</li>
                        <li>{{ HTML::link('/users/create', 'Create')}}</li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Customers <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>{{ HTML::link('/customers', 'List')}}</li>
                        <li>{{ HTML::link('/customers/create', 'Create')}}</li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Inventory <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>{{ HTML::link('/products', 'List')}}</li>
                        <li>{{ HTML::link('/products/create', 'Create')}}</li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hello {{ Auth::user()->username }} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>{{ HTML::link('/users/' . Auth::user()->id , 'Profile')}}</li>
                        <li>{{ HTML::link('/logout', 'Logout')}}</li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>