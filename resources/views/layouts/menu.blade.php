<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
@php
    $photo = Auth::guard('admin')->user()->photo ?? 'default.jpg';
@endphp
<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{url('/')}}" class="b-brand text-primary">
                <img src="{{ asset('/img/LOGO35 pix.png') }}" class="img-fluid logo-lg" alt="logo"> Mr. Paul Bakers
            </a>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item">
                    <a href="{{url('/')}}" class="pc-link">
                        <span class="pc-micon"><i class="fa-solid fa-gauge"></i></span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>
                
                <li class="pc-item">
                    <a href="{{url('/sale-view')}}" class="pc-link">
                        <span class="pc-micon"><i class="fa-solid fa-tag"></i></span>
                        <span class="pc-mtext">Sale</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{url('/cart-view')}}" class="pc-link">
                        <span class="pc-micon"><i class="fa-solid fa-cart-shopping"></i></span>
                        <span class="pc-mtext">Cart @if($cart)<span class="badge bg-primary">{{ $cart }}</span>@endif</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{url('/sale-order-list')}}" class="pc-link">
                        <span class="pc-micon"><i class="fa-solid fa-cart-flatbed"></i></span>
                        <span class="pc-mtext">Sale list</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{url('/sale-return')}}" class="pc-link">
                        <span class="pc-micon"><i class="fa-regular fa-share-from-square"></i></span>
                        <span class="pc-mtext">Sale Return</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{url('/sale-due-collection')}}" class="pc-link">
                        <span class="pc-micon"><i class="fa-solid fa-sack-dollar"></i></span>
                        <span class="pc-mtext">Due Collection</span>
                    </a>
                </li>
                <!-- <li class="pc-item">
                    <a href="{{url('/return-order-list')}}" class="pc-link">
                        <span class="pc-micon"><i class="fa-solid fa-arrow-rotate-left"></i></span>
                        <span class="pc-mtext">Return</span>
                    </a>
                </li> -->
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link"><span class="pc-micon"><i class="fa-solid fa-trash"></i></span><span class="pc-mtext">Waste Product</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{url('/expired-product')}}">Waste Product</a></li>
                        <li class="pc-item pc-hasmenu">
                            <a href="#!" class="pc-link">Waste Report's<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                            <ul class="pc-submenu">
                                <li class="pc-item"><a class="pc-link" href="{{url('/expired-list')}}">Waste Report</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>                
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link"><span class="pc-micon"><i class="fa-solid fa-chart-pie"></i></span><span class="pc-mtext">Stock</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">                        
                        <li class="pc-item"><a href="{{url('/product-stock')}}" class="pc-link"><span class="pc-mtext">Min 10 Stock</span></a></li>
                    </ul>
                </li>
                <li class="pc-item">
                    <a href="{{url('/profile')}}" class="pc-link">
                        <span class="pc-micon"><i class="fa-solid fa-id-card-clip"></i></span>
                        <span class="pc-mtext">Profile</span>
                    </a>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link"><span class="pc-micon"><i class="fa-solid fa-industry"></i></i></span><span class="pc-mtext">Factory</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{url('/factory-return')}}">Factory Return</a></li>
                        <li class="pc-item pc-hasmenu">
                            <a href="#!" class="pc-link">Factory Report's<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                            <ul class="pc-submenu">
                                <li class="pc-item"><a class="pc-link" href="{{url('/factory-stock-report')}}">Return Report</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                
                
                <!-- <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link"><span class="pc-micon"><i class="fa-solid fa-shop"></i></span></span><span class="pc-mtext">Purchase</span> @if($purchaseOrderPendding)<span class="badge bg-primary">{{ $purchaseOrderPendding }}</span>@endif<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{url('/purchase')}}">Purchase Order</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{url('/sale-return')}}">Sale Return</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{url('/purchase-list')}}">Purchase List @if($purchaseOrderPendding)<span class="badge bg-primary">{{ $purchaseOrderPendding }}</span>@endif</a></li>
                    </ul>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link"><span class="pc-micon"><i class="fa-solid fa-industry"></i></i></span><span class="pc-mtext">Factory</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{url('/factory')}}">Purchase Order List @if($purchaseOrderPendding)<span class="badge bg-primary">{{ $purchaseOrderPendding }}</span>@endif</a></li>
                        <li class="pc-item pc-hasmenu">
                            <a href="#!" class="pc-link">Purchase Report<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                            <ul class="pc-submenu">
                                <li class="pc-item"><a class="pc-link" href="{{url('/order-list-branch')}}">Branch Order</a></li> 
                                <li class="pc-item"><a class="pc-link" href="{{url('/product-order')}}">Product Order</a></li>                               
                                <li class="pc-item"><a class="pc-link" href="{{url('/received-order')}}">Received Order @if($purchaseOrderProcessing)<span class="badge bg-primary">{{ $purchaseOrderProcessing }}</span>@endif</a></li>
                                <li class="pc-item"><a class="pc-link" href="{{url('/delivery-order')}}">Delivery Order @if($purchaseOrderDelivery)<span class="badge bg-primary">{{ $purchaseOrderDelivery }}</span>@endif</a></li> 
                            </ul>
                        </li>
                    </ul>
                </li> -->
                <li class="pc-item">
                    <a href="{{url('/expenses-view')}}" class="pc-link">
                        <span class="pc-micon"><i class="fa-solid fa-circle-dollar-to-slot"></i></i></span>
                        <span class="pc-mtext">Expenses</span>
                    </a>
                </li>                
                <li class="pc-item">
                    <a href="{{url('/ber-code')}}" class="pc-link">
                        <span class="pc-micon"><i class="fa-solid fa-barcode"></i></span>
                        <span class="pc-mtext">Ber-code</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{url('/account-details')}}" class="pc-link">
                        <span class="pc-micon"><i class="fa-solid fa-circle-dollar-to-slot"></i></span>
                        <span class="pc-mtext">Total Transection</span>
                    </a>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link"><span class="pc-micon"><i class="ti ti-menu"></i></span><span class="pc-mtext">Report's</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{url('/total-sale')}}">Total Sale</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{url('/paid-list')}}">Paid List</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{url('/due-list')}}">Due List</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{url('/due-collection-list')}}">Due Collection</a></li>
                        <li class="pc-item pc-hasmenu">
                            <a href="#!" class="pc-link">Select Date Report<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                            <ul class="pc-submenu">
                                <li class="pc-item"><a class="pc-link" href="{{url('/select-day-wise-sale-report')}}">Day wise Total Sale</a></li>
                                <li class="pc-item"><a class="pc-link" href="{{url('/select-day-wise-paid-sale-report')}}">Day wise Paid Sale</a></li>
                                <li class="pc-item"><a class="pc-link" href="{{url('/select-day-wise-due-sale-report')}}">Day wise Due Sale</a></li>
                                <li class="pc-item"><a class="pc-link" href="{{url('/item-wise-sale')}}">Item wise Sale</a></li>
                                <li class="pc-item"><a class="pc-link" href="{{url('/item-date-wise-sale')}}">Item & Date wise Sale</a></li>
                                <li class="pc-item"><a class="pc-link" href="{{url('/category-wise-sale')}}">Category Wise Sale</a></li>
                                <li class="pc-item"><a class="pc-link" href="{{url('/category-date-sale')}}">Category & Date Wise Sale</a></li>
                                <li class="pc-item"><a class="pc-link" href="{{url('/payment-mathods')}}">Peyment Method</a></li>
                                <!-- <li class="pc-item pc-hasmenu">
                                    <a href="#!" class="pc-link">Level 3.3<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                                    <ul class="pc-submenu">
                                        <li class="pc-item"><a class="pc-link" href="#!">Level 4.1</a></li>
                                        <li class="pc-item"><a class="pc-link" href="#!">Level 4.2</a></li>
                                    </ul>
                                </li> -->
                            </ul>
                        </li>
                        <li class="pc-item pc-hasmenu">
                            <a href="#!" class="pc-link">Stock Report<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                            <ul class="pc-submenu">
                                <li class="pc-item"><a class="pc-link" href="{{url('/stock-report')}}">Stock</a></li>
                                <li class="pc-item"><a class="pc-link" href="{{url('/product-stock-report')}}">Product Stock</a></li>
                                <li class="pc-item"><a class="pc-link" href="{{url('/category-stock')}}">Stock Category</a></li>
                                <!-- <li class="pc-item pc-hasmenu">
                                    <a href="#!" class="pc-link">Date Wise<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                                    <ul class="pc-submenu">
                                        <li class="pc-item"><a class="pc-link" href="#!">Date wise Stock</a></li>
                                        <li class="pc-item"><a class="pc-link" href="#!">Date & Category Stock</a></li>
                                    </ul>
                                </li> -->
                            </ul>
                        </li>
                        <li class="pc-item"><a class="pc-link" href="{{url('/chart')}}">Chart</a></li>
                        <li class="pc-item pc-hasmenu">
                            <a href="#!" class="pc-link">Expenses Report<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                            <ul class="pc-submenu">
                                <li class="pc-item"><a class="pc-link" href="{{url('/expenses-details')}}">Expenses</a></li>
                                <li class="pc-item"><a class="pc-link" href="#">Category Expenses</a></li>
                                <li class="pc-item"><a class="pc-link" href="#">Sub-Category Expenses</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link"><span class="pc-micon"><i class="fa-solid fa-gears"></i></span><span class="pc-mtext">Setting</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">                        
                        <li class="pc-item"><a href="{{url('/product-view')}}" class="pc-link"><span class="pc-micon"><i class="fa-solid fa-chart-simple"></i></span><span class="pc-mtext">Product</span></a></li>
                        <li class="pc-item"><a href="{{url('/branch')}}" class="pc-link"><span class="pc-micon"><i class="fa-solid fa-code-branch"></i></span><span class="pc-mtext">Branch</span></a></li>
                        <li class="pc-item"><a class="pc-link" href="{{url('/permission')}}"><i class="fa-solid fa-lock me-3"></i>Permission</a></li>
                        <li class="pc-item"><a href="{{url('/backup-database')}}" class="pc-link"><i class="fa-solid fa-download me-3"></i></i>Backup DB</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{url('/setting')}}"><i class="fa-solid fa-gear me-3"></i>Setting</a></li>
                        
                    </ul>
                </li>
                <li class="pc-item">
                    <a href="{{url('/login')}}" class="pc-link">
                        <span class="pc-micon"><i class="fa-solid fa-right-from-bracket"></i></span>
                        <span class="pc-mtext">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<header class="pc-header">
    <div class="header-wrapper"> 
        <div class="me-auto pc-mob-drp">
            <ul class="list-unstyled">
                <!-- ======= Menu collapse Icon ===== -->
                <li class="pc-h-item pc-sidebar-collapse">
                <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                    <i class="ti ti-menu-2"></i>
                </a>
                </li>
                <li class="pc-h-item pc-sidebar-popup">
                <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                    <i class="ti ti-menu-2"></i>
                </a>
                </li>
                <li class="dropdown pc-h-item d-inline-flex d-md-none">
                <a
                    class="pc-head-link dropdown-toggle arrow-none m-0"
                    data-bs-toggle="dropdown"
                    href="#"
                    role="button"
                    aria-haspopup="false"
                    aria-expanded="false"
                >
                    <i class="ti ti-search"></i>
                </a>
                <div class="dropdown-menu pc-h-dropdown drp-search">
                    <form class="px-3">
                    <div class="form-group mb-0 d-flex align-items-center">
                        <i data-feather="search"></i>
                        <input type="search" class="form-control border-0 shadow-none" placeholder="Search here. . .">
                    </div>
                    </form>
                </div>
                </li>
                <li class="pc-h-item d-none d-md-inline-flex">
                <form class="header-search">
                    <i data-feather="search" class="icon-search"></i>
                    <input type="search" class="form-control" placeholder="Search here. . .">
                </form>
                </li>
            </ul>
        </div>
        <div class="ms-auto">
            <ul class="list-unstyled">
                <li class="dropdown pc-h-item">
                <a
                    class="pc-head-link dropdown-toggle arrow-none me-0"
                    data-bs-toggle="dropdown"
                    href="#"
                    role="button"
                    aria-haspopup="false"
                    aria-expanded="false"
                >
                    <i class="ti ti-mail"></i>
                </a>
                <div class="dropdown-menu dropdown-notification dropdown-menu-end pc-h-dropdown">
                    <div class="dropdown-header d-flex align-items-center justify-content-between">
                    <h5 class="m-0">Message</h5>
                    <a href="#!" class="pc-head-link bg-transparent"><i class="ti ti-x text-danger"></i></a>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="dropdown-header px-0 text-wrap header-notification-scroll position-relative" style="max-height: calc(100vh - 215px)">
                    <div class="list-group list-group-flush w-100">
                        <a class="list-group-item list-group-item-action">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                            <img src="{{ asset('/img/LOGO35 pix.png') }}" alt="user-image" class="user-avtar">
                            </div>
                            <div class="flex-grow-1 ms-1">
                            <span class="float-end text-muted">3:00 AM</span>
                            <p class="text-body mb-1">It's <b>Cristina danny's</b> birthday today.</p>
                            <span class="text-muted">2 min ago</span>
                            </div>
                        </div>
                        </a>
                        <a class="list-group-item list-group-item-action">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                            <img src="{{ asset('/img/LOGO35 pix.png') }}" alt="user-image" class="user-avtar">
                            </div>
                            <div class="flex-grow-1 ms-1">
                            <span class="float-end text-muted">6:00 PM</span>
                            <p class="text-body mb-1"><b>Aida Burg</b> commented your post.</p>
                            <span class="text-muted">5 August</span>
                            </div>
                        </div>
                        </a>
                        <a class="list-group-item list-group-item-action">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                            <img src="{{ asset('/img/LOGO35 pix.png') }}" alt="user-image" class="user-avtar">
                            </div>
                            <div class="flex-grow-1 ms-1">
                            <span class="float-end text-muted">2:45 PM</span>
                            <p class="text-body mb-1"><b>There was a failure to your setup.</b></p>
                            <span class="text-muted">7 hours ago</span>
                            </div>
                        </div>
                        </a>
                        <a class="list-group-item list-group-item-action">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                            <img src="{{ asset('/img/LOGO35 pix.png') }}" alt="user-image" class="user-avtar">
                            </div>
                            <div class="flex-grow-1 ms-1">
                            <span class="float-end text-muted">9:10 PM</span>
                            <p class="text-body mb-1"><b>Cristina Danny </b> invited to join <b> Meeting.</b></p>
                            <span class="text-muted">Daily scrum meeting time</span>
                            </div>
                        </div>
                        </a>
                    </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="text-center py-2">
                    <a href="#!" class="link-primary">View all</a>
                    </div>
                </div>
                </li>
                <li class="dropdown pc-h-item header-user-profile">
                <a
                    class="pc-head-link dropdown-toggle arrow-none me-0"
                    data-bs-toggle="dropdown"
                    href="#"
                    role="button"
                    aria-haspopup="false"
                    data-bs-auto-close="outside"
                    aria-expanded="false"
                >
                   <img src="{{ asset('img/employee/' . Auth::guard('admin')->user()->photo) }}" alt="user-image" class="user-avtar">
                    <span>{{ Auth::guard('admin')->user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                    <div class="dropdown-header">
                    <div class="d-flex mb-1">
                        <div class="flex-shrink-0">
                        <img src="{{ asset('img/employee/' . Auth::guard('admin')->user()->photo) }}" alt="user-image" class="user-avtar wid-35">
                        </div>
                        <div class="flex-grow-1 ms-3">
                        <h6 class="mb-1">{{ Auth::guard('admin')->user()->name }}</h6>
                        @php
                            $roles = [
                                1 => 'Admin',
                                2 => 'Manager',
                                3 => 'Incharge',
                                4 => 'Cashier'
                            ];

                            $roleId = Auth::guard('admin')->user()->role;
                        @endphp
                        <span>{{ $roles[$roleId] ?? 'Unknown' }}</span>
                        </div>
                        <a href="{{url('/login')}}" class="pc-head-link bg-transparent"><i class="ti ti-power text-danger"></i></a>
                    </div>
                    </div>
                    <ul class="nav drp-tabs nav-fill nav-tabs" id="mydrpTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button
                        class="nav-link active"
                        id="drp-t1"
                        data-bs-toggle="tab"
                        data-bs-target="#drp-tab-1"
                        type="button"
                        role="tab"
                        aria-controls="drp-tab-1"
                        aria-selected="true"
                        ><i class="ti ti-user"></i> Profile</button
                        >
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                        class="nav-link"
                        id="drp-t2"
                        data-bs-toggle="tab"
                        data-bs-target="#drp-tab-2"
                        type="button"
                        role="tab"
                        aria-controls="drp-tab-2"
                        aria-selected="false"
                        ><i class="ti ti-settings"></i> Setting</button
                        >
                    </li>
                    </ul>
                    <div class="tab-content" id="mysrpTabContent">
                    <div class="tab-pane fade show active" id="drp-tab-1" role="tabpanel" aria-labelledby="drp-t1" tabindex="0">
                        <a href="{{url('/edit-profile')}}" class="dropdown-item">
                        <i class="ti ti-edit-circle"></i>
                        <span>Edit Profile</span>
                        </a>
                        <a href="{{url('/profile')}}" class="dropdown-item">
                        <i class="ti ti-user"></i>
                        <span>View Profile</span>
                        </a>
                        <!-- <a href="#!" class="dropdown-item">
                        <i class="ti ti-clipboard-list"></i>
                        <span>Social Profile</span>
                        </a> -->
                        <!-- <a href="#!" class="dropdown-item">
                        <i class="ti ti-wallet"></i>
                        <span>Billing</span> -->
                        </a>
                        <a href="{{url('/login')}}" class="dropdown-item">
                        <i class="ti ti-power"></i>
                        <span>Logout</span>
                        </a>
                    </div>
                    <div class="tab-pane fade" id="drp-tab-2" role="tabpanel" aria-labelledby="drp-t2" tabindex="0">
                        <a href="#!" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <i class="ti ti-help"></i>
                        <span>Support</span>
                        </a>
                        <a href="{{url('/edit-profile')}}" class="dropdown-item">
                        <i class="ti ti-user"></i>
                        <span>Account Settings</span>
                        </a>
                        <a href="{{url('/account-permission')}}" class="dropdown-item">
                        <i class="ti ti-lock"></i>
                        <span>Permission Center</span>
                        </a>
                        <a href="#!" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <i class="ti ti-messages"></i>
                        <span>Feedback</span>
                        </a>
                        <a href="#!" class="dropdown-item">
                        <i class="ti ti-list"></i>
                        <span>History</span>
                        </a>
                    </div>
                    </div>
                </div>
                </li>
            </ul>
        </div>
    </div>
</header>

<!-- Support Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="staticBackdropLabel">Contact Support</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body py-5">
                <div class="text-center mb-5">
                    <h2>Need Help? Contact Us with Developer only</h2>
                    <p class="text-muted">We’re here to assist you 24/7 via your preferred communication channel.</p>
                </div>

                <div class="row g-4 justify-content-center px-3">

                    <!-- Phone -->
                    <div class="col-md-3 col-sm-6">
                        <div class="card h-100 shadow-sm border-0 text-center p-4">
                            <div class="mb-3">
                                <i class="bi bi-telephone-fill fs-2 text-primary"></i>
                            </div>
                            <h5>Call Us</h5>
                            <p class="text-muted">Available 9am - 10pm</p>
                            <a href="tel:+8801762164746" class="btn btn-outline-primary btn-sm">+880 1762-164746</a>
                        </div>
                    </div>

                    <!-- WhatsApp -->
                    <div class="col-md-3 col-sm-6">
                        <div class="card h-100 shadow-sm border-0 text-center p-4">
                            <div class="mb-3">
                                <i class="bi bi-whatsapp fs-2 text-success"></i>
                            </div>
                            <h5>WhatsApp</h5>
                            <p class="text-muted">Chat with our agent</p>
                            <a href="https://wa.me/+8801762164746" target="_blank" class="btn btn-outline-success btn-sm">Start Chat</a>
                        </div>
                    </div>

                    <!-- Telegram -->
                    <div class="col-md-3 col-sm-6">
                        <div class="card h-100 shadow-sm border-0 text-center p-4">
                            <div class="mb-3">
                                <i class="bi bi-telegram fs-2 text-info"></i>
                            </div>
                            <h5>Telegram</h5>
                            <p class="text-muted">Send us a message</p>
                            <a href="https://t.me/SAMIMHosseN5274" target="_blank" class="btn btn-outline-info btn-sm">SAMIM-HosseN</a>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="col-md-3 col-sm-6">
                        <div class="card h-100 shadow-sm border-0 text-center p-4">
                            <div class="mb-3">
                                <i class="bi bi-envelope-fill fs-2 text-danger"></i>
                            </div>
                            <h5>Email</h5>
                            <p class="text-muted">Get support via email</p>
                            <a href="mailto:cse.shamim.cub@gmail.com" class="btn btn-outline-danger btn-sm">cse.shamim.cub@gmail.com</a>
                        </div>
                    </div>

                </div>
            </div>
            
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>