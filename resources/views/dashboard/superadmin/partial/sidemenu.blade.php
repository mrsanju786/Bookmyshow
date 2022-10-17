<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="{{ asset('dashboard/assets/images/logo/logo.png') }}" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">{{ Auth::user()->name }} <b> ( Role - {{ Auth::user()->roles[0]->name }} )</b> </li>

                <li class="sidebar-item ">
                    <a class='sidebar-link' href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i>
                        <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                <li class="sidebar-item  {{ request()->is('/home') ? 'active' : ''}} ">
                    <a href="{{ url('/home') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->is('/banner') ? 'active' : ''}} @if(Auth::user()->roles[0]->name != 'superadmin') d-none @endif" >
                    <a href="{{ url('/banner') }}" class='sidebar-link'>
                        <i class="fa fa-picture-o"></i>
                        <span>Banner</span>
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->is('/event') ? 'active' : ''}} @if(Auth::user()->roles[0]->name != 'admin') d-none @endif " >
                    <a href="{{ url('/event') }}" class='sidebar-link'>
                        <i class="fa fa-calendar"></i>
                        <span>Event</span>
                    </a>
                </li>

                <li class="sidebar-item  {{ request()->is('category') ? 'active' : ''}} @if(Auth::user()->roles[0]->name != 'superadmin') d-none @endif"">
                    <a href="{{ url('category') }}"  class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Category</span>
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->is('subcategory') ? 'active' : ''}} @if(Auth::user()->roles[0]->name != 'superadmin') d-none @endif"">
                    <a href="{{ url('subcategory') }}"  class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>SubCategory</span>
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->is('city') ? 'active' : ''}} @if(Auth::user()->roles[0]->name != 'superadmin') d-none @endif"">
                    <a href="{{ url('city') }}" class='sidebar-link'> 
                        <i class="bi bi-stack"></i>
                        <span>City</span>
                    </a>
                </li>

                {{-- <li class="sidebar-item  {{ request()->is(['category','subcategory','city']) ? 'active' : ''}}  has-sub @if(Auth::user()->roles[0]->name != 'superadmin') d-none @endif">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Master</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item  {{ request()->is('category') ? 'active' : ''}}">
                            <a href="{{ url('category') }}">Category</a>
                        </li>
                        <li class="submenu-item  {{ request()->is('subcategory') ? 'active' : ''}}">
                            <a href="{{ url('subcategory') }}">SubCategory</a>
                        </li>
                        <li class="submenu-item  {{ request()->is('city') ? 'active' : ''}}">
                            <a href="{{ url('city') }}">City</a>
                        </li>
                    </ul>
                </li> --}}

              

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>