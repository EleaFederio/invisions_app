<nav id="sidebar" style="position: fixed; height: 100%">
    <div class="custom-menu">
        <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
        </button>
    </div>
    <div class="p-4 pt-5">
        <h1><a href="/" class="logo">INVISIONS</a></h1>
        <ul class="list-unstyled components mb-5">
            <li>
                <a href="/">Home</a>
            </li>
            <li>
                <a href="/employees">Employees</a>
            </li>
            <li>
{{--                <a href="{{route('products.index')}}">Products</a>--}}
            </li>
            <li>
                <a href="#myAccount" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">My Account</a>
                <ul class="collapse list-unstyled" id="myAccount">
                    <li>
                        <a href="{{ url('/change_password') }}">Settings</a>
                    </li>
                </ul>
            </li>
        </ul>


    </div>
</nav>
