<div class="row g-4">
    <label for="">Account Details <span class="small"> <i class="fa-solid fa-sack-dollar"></i> ৳ {{$pay - $expenses + $dueCollection}}/-</span></label>
    
    <div class="col-md-6 col-xl-3">
        <a href="{{url('/total-sale')}}">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <!-- BS5 classes দিয়ে icon circle -->
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center icon">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Total Sale</h6>
                        <h4 class="mb-1">৳ {{$total}}/-</h4>
                        <small class="text-muted">Extra <span class="text-primary fw-bold">35,000</span> this year</small>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 col-xl-3">
        <a href="{{url('/total-sale')}}">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-danger text-white rounded-circle d-flex align-items-center justify-content-center icon">
                        <i class="fa-solid fa-percent"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Discount</h6>
                        <h4 class="mb-1">৳ {{$discount}}/-</h4>
                        <small class="text-muted">Extra <span class="text-danger fw-bold">8,900</span> this year</small>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 col-xl-3">
        <a href="{{url('/total-sale')}}">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-warning text-white rounded-circle d-flex align-items-center justify-content-center icon">
                        <!-- <i class="fa-solid fa-money-bill-1-wave"></i> -->
                        <i class="fa-solid fa-wallet"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Vat</h6>
                        <h4 class="mb-1">৳ {{$vat}}/-</h4>
                        <small class="text-muted">Extra <span class="text-warning fw-bold">1,943</span> this year</small>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 col-xl-3">
        <a href="{{url('/due-list')}}">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center icon">
                        <i class="fa-solid fa-money-bill-transfer"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Due</h6>
                        <h4 class="mb-1">৳ {{$due}}/-</h4>
                        <small class="text-muted">Extra <span class="text-success fw-bold">20,395</span> this year</small>
                    </div>
                </div>
            </div>
        </a>
    </div>    

    <div class="col-md-6 col-xl-3">
        <a href="{{url('/total-sale')}}">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center icon">
                        <i class="fa-solid fa-comments-dollar"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Payable</h6>
                        <h4 class="mb-1">৳ {{$payable}}/-</h4>
                        <small class="text-muted">Extra <span class="text-info fw-bold">35,000</span> this year</small>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 col-xl-3">
        <a href="{{url('/total-sale')}}">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center icon">
                        <i class="fa-solid fa-file-invoice-dollar"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Pay</h6>
                        <h4 class="mb-1">৳ {{$pay}}/-</h4>
                        <small class="text-muted">Extra <span class="text-secondary fw-bold">8,900</span> this year</small>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 col-xl-3">
        <a href="{{url('/expenses-details')}}">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center icon">
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Expenses</h6>
                        <h4 class="mb-1">৳ {{$expenses}}/-</h4>
                        <small class="text-muted">Extra <span class="text-info fw-bold">8,900</span> this year</small>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 col-xl-3">
        <a href="{{url('/due-collection-list')}}">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-warning text-white rounded-circle d-flex align-items-center justify-content-center icon">
                        <i class="fa-solid fa-filter-circle-dollar"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Due Collection</h6>
                        <h4 class="mb-1">৳ {{$dueCollection}}/-</h4>
                        <small class="text-muted">Extra <span class="text-warning fw-bold">20,395</span> this year</small>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="row g-4 mt-2">
    <label for="">Product Details</label>
    <div class="col-md-6 col-xl-3">
        <div class="card shadow-sm border-0 h-100">
            <a href="{{url('/product-view')}}">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center icon">
                        <i class="fa-solid fa-box-open"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Product</h6>
                        <h4 class="mb-1">{{$totalProduct}}</h4>
                        <small class="text-muted">Extra <span class="text-success fw-bold">1,943</span> this year</small>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card shadow-sm border-0 h-100">
            <a href="{{url('/product-view')}}">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center icon">
                        <i class="fa-solid fa-box-open"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Active Product</h6>
                        <h4 class="mb-1">{{$active}}</h4>
                        <small class="text-muted">Extra <span class="text-secondary fw-bold">1,943</span> this year</small>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card shadow-sm border-0 h-100">
            <a href="{{url('/product-view')}}">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-danger text-white rounded-circle d-flex align-items-center justify-content-center icon">
                        <i class="fa-solid fa-box-open"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">De-active Product</h6>
                        <h4 class="mb-1">{{$deactive}}</h4>
                        <small class="text-muted">Extra <span class="text-danger fw-bold">1,943</span> this year</small>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card shadow-sm border-0 h-100">
            <a href="{{url('/expired-list')}}">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-danger text-white rounded-circle d-flex align-items-center justify-content-center icon">
                        <i class="fas fa-list"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Expired Product</h6>
                        <h4 class="mb-1">{{$expired}}</h4>
                        <small class="text-muted">Extra <span class="text-danger fw-bold">20,395</span> this year</small>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card shadow-sm border-0 h-100">
            <a href="{{url('/expired-list')}}">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-warning text-white rounded-circle d-flex align-items-center justify-content-center icon">
                        <i class="fa-solid fa-calendar-days"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Expired Soon Product</h6>
                        <h4 class="mb-1">{{$expiredSoon}}</h4>
                        <small class="text-muted">Extra <span class="text-warning fw-bold">35,000</span> this year</small>
                    </div>
                </div>
            </a>
        </div>
    </div>

</div>

<div class="row g-4 mt-2">
    <label for="">Branch & Order Details</label>
    <div class="col-md-6 col-xl-3">
        <a href="{{url('/purchase-list')}}">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-warning text-white rounded-circle d-flex align-items-center justify-content-center icon">
                        <i class="fa-solid fa-industry"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Phurchase Order</h6>
                        <h4 class="mb-1">{{$totalPhurchaseOrder}}</h4>
                        <small class="text-muted">Extra <span class="text-warning fw-bold">8,900</span> this year</small>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card shadow-sm border-0 h-100">
            <a href="{{url('/delivery-order')}}">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center icon">
                        <i class="fa-solid fa-shop"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Phurchase Ready</h6>
                        <h4 class="mb-1">{{$totalPhurchaseReady}}</h4>
                        <small class="text-muted">Extra <span class="text-info fw-bold">8,900</span> this year</small>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card shadow-sm border-0 h-100">
            <a href="{{url('/delivery-order')}}">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center icon">
                        <i class="fa-solid fa-truck"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Phurchase Delivery</h6>
                        <h4 class="mb-1">{{$totalPhurchaseDelivery}}</h4>
                        <small class="text-muted">Extra <span class="text-success fw-bold">8,900</span> this year</small>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card shadow-sm border-0 h-100">
            <a href="{{url('/branch')}}">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center icon">
                        <i class="fa-solid fa-code-branch"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Branch</h6>
                        <h4 class="mb-1">{{$bracnh}}</h4>
                        <small class="text-muted">Extra <span class="text-primary fw-bold">8,900</span> this year</small>
                    </div>
                </div>
            </a>
        </div>
    </div>
    
</div>