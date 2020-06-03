<nav id="sidebar" style="position: fixed; height: 100%">
    <div class="custom-menu">
{{--        <button type="button" id="sidebarCollapse" class="btn btn-primary">--}}
{{--            <i class="fa fa-bars"></i>--}}
{{--            <span class="sr-only">Toggle Menu</span>--}}
{{--        </button>--}}
    </div>
    <div class="p-4 pt-5">
        <div>
            <img src="https://images.theconversation.com/files/304864/original/file-20191203-67028-qfiw3k.jpeg?ixlib=rb-1.1.0&rect=638%2C2%2C795%2C745&q=45&auto=format&w=496&fit=clip", class="rounded-circle" width="180">
        </div>
        <br>
        <h6 class="text-center" style="color: white">Juan de la Cruz</h6>
        <h1><a href="/" class="logo">INVISIONS</a></h1>
        <ul class="list-unstyled components mb-5">
            <li>
                <a href="/"><i class="fas fa-home"></i>     Home</a>
            </li>
            <li>
                <a href="{{route('employees.index')}}"><i class="fas fa-address-card"></i>     Employees</a>
            </li>
            <li>
                <a href="{{url('products_all')}}"><i class="fas fa-calendar-alt"></i>    Schedule</a>
            </li>
            <li>
                <a href="{{url('settings')}}"><i class="fas fa-tools"></i>     Settings</a>
            </li>
            <!-- <li>
{{--                <a href="{{route('products.index')}}">Products</a>--}}
            </li> -->
            <!-- <li>
                <a href="#myAccount" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">My Account</a>
                <ul class="collapse list-unstyled" id="myAccount">
                    <li>
                        <a href="{{ url('/change_password') }}">Settings</a>
                    </li>
                </ul>
            </li> -->
        </ul>


    </div>
</nav>
