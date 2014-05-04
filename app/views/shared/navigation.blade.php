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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">User <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>{{ HTML::link('/users', 'All Users')}}</li>
                        <li>{{ HTML::link('/users/create', 'Create New User')}}</li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Customer <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>{{ HTML::link('/customers', 'All Customers')}}</li>
                        <li>{{ HTML::link('/customers/create', 'Create New Customer')}}</li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Inventory <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>{{ HTML::link('/inventory', 'Product Inventory')}}</li>
                        <li>{{ HTML::link('/products/create', 'Create New Product')}}</li>
                        <li>{{ HTML::link('/categories', 'Manage Categories')}}</li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Supplier <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>{{ HTML::link('/suppliers', 'All Suppliers')}}</li>
                        <li>{{ HTML::link('/suppliers/create', 'Create New Supplier')}}</li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hello {{ Auth::user()->username }} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>{{ HTML::link('/profile', 'Profile')}}</li>
                        <li>{{ HTML::link('/logout', 'Logout')}}</li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>