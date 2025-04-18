<div class="side-nav">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            <li class="nav-item">
                <a class="dropdown-toggle" href="{{ route('dashboard') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-dashboard"></i>
                    </span>
                    <span class="title">Dashboard</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
            </li>

            @if (Auth::user()->role == 'companyadmin')
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="{{ route('manage.banners.index') }}">
                        <span class="icon-holder">
                            <i class="anticon anticon-pic-center"></i>
                        </span>
                        <span class="title">Manage Banners</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="javascript:void(0);">
                        <span class="icon-holder">
                            <i class="anticon anticon-deployment-unit"></i>
                        </span>
                        <span class="title">Organizations</span>
                        <span class="arrow">
                            <i class="arrow-icon"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('manage.org.index') }}">View All</a>
                        </li>
                        <li>
                            <a href="{{ route('manage.org.add') }}">Add New</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="javascript:void(0);">
                        <span class="icon-holder">
                            <i class="anticon anticon-deployment-unit"></i>
                        </span>
                        <span class="title">Members</span>
                        <span class="arrow">
                            <i class="arrow-icon"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('manage.org.member') }}">View All</a>
                        </li>
                        <li>
                            <a href="{{ route('manage.org.member.add') }}">Add New</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="{{ route('manage.campaigns.index') }}">
                        <span class="icon-holder">
                            <i class="anticon anticon-appstore"></i>
                        </span>
                        <span class="title">Campaigns</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="{{ route('manage.categories.index') }}">
                        <span class="icon-holder">
                            <i class="anticon anticon-appstore"></i>
                        </span>
                        <span class="title">Product Categories</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="javascript:void(0);">
                        <span class="icon-holder">
                            <i class="anticon anticon-shopping-cart"></i>
                        </span>
                        <span class="title">Products</span>
                        <span class="arrow">
                            <i class="arrow-icon"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('manage.products.index') }}">View All</a>
                        </li>
                        <li>
                            <a href="{{ route('manage.products.add') }}">Add New</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="javascript:void(0);">
                        <span class="icon-holder">
                            <i class="anticon anticon-shopping-cart"></i>
                        </span>
                        <span class="title">Orders</span>
                        <span class="arrow">
                            <i class="arrow-icon"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('manage.orders', ['all']) }}">All Orders</a>
                        </li>
                        <li>
                            <a href="{{ route('manage.orders', ['pending']) }}">Pending Orders</a>
                        </li>
                        <li>
                            <a href="{{ route('manage.orders', ['confirmed']) }}">Confirmed Orders</a>
                        </li>
                        <li>
                            <a href="{{ route('manage.orders', ['delivered']) }}">Delivered Orders</a>
                        </li>
                        <li>
                            <a href="{{ route('manage.orders', ['cancelled']) }}">Cancelled Orders</a>
                        </li>
                        <li>
                            <a href="{{ route('manage.orders', ['returned']) }}">Returned Orders</a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="{{ route('manage.users.index') }}">
                        <span class="icon-holder">
                            <i class="anticon anticon-team"></i>
                        </span>
                        <span class="title">Manage Users</span>
                    </a>
                </li> --}}
            @endif


            @if (Auth::user()->role == 'orgadmin')
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="javascript:void(0);">
                        <span class="icon-holder">
                            <i class="anticon anticon-deployment-unit"></i>
                        </span>
                        <span class="title">Members</span>
                        <span class="arrow">
                            <i class="arrow-icon"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('manage.member.index') }}">View All</a>
                        </li>
                        <li>
                            <a href="{{ route('manage.member.add') }}">Add New</a>
                        </li>
                    </ul>
                </li>
            @endif


            {{-- <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-appstore"></i>
                    </span>
                    <span class="title">Apps</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="app-chat.html">Chat</a>
                    </li>
                    <li>
                        <a href="app-file-manager.html">File Manager</a>
                    </li>
                    <li>
                        <a href="app-mail.html">Mail</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0);">
                            <span>Projects</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="app-project-list.html">Project List</a>
                            </li>
                            <li>
                                <a href="app-project-details.html">Project Details</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0);">
                            <span>E-commerce</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="app-e-commerce-order-list.html">Orders List</a>
                            </li>
                            <li>
                                <a href="app-e-commerce-products.html">Products</a>
                            </li>
                            <li>
                                <a href="app-e-commerce-products-list.html">Products List</a>
                            </li>
                            <li>
                                <a href="app-e-commerce-products-edit.html">Products Edit</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li> --}}
        </ul>
    </div>
</div>
