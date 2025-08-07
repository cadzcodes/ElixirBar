<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Order #{{$id}}</h4>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="mt-4">
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <span><b>Order Total</b></span>
                                    <div class="mt-2">
                                        <h2 class="counter">₱35,000</h2>
                                    </div>
                                </div>
                                <div>
                                    <span class="badge bg-primary">Cash on Delivery</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div>
                                    <span>Amount Paid</span>
                                </div>
                                <div>
                                    <span>35%</span>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="progress bg-soft-primary shadow-none w-100" style="height: 6px">
                                    <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar"
                                        aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-4">
                                <div>
                                    <span>Order Status</span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11.414l3.293 3.293-1.414 1.414L11 9.414l-1.879 1.879-1.414-1.414L11 6.586z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="border rounded p-3 bg-soft-info me-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24"
                                            fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M21 9.75H19.5V18.3107L18.3107 19.5H5.68934L4.5 18.3107L4.5 9.75H3V4.5H21V9.75ZM6 9.75L18 9.75V17.6893L17.6893 18H6.31066L6 17.6893L6 9.75ZM19.5 6V8.25L4.5 8.25L4.5 6L19.5 6ZM9.75 13.5H15V12H9.75V13.5Z"
                                                fill="currentColor" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h2 class="text-info">Delivered</h2>
                                        <small class="text-muted">Aug 7, 2025</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-4">
                                <div>
                                    <span>Payment Method</span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M4 4h12a2 2 0 012 2v2H2V6a2 2 0 012-2zm14 4v6a2 2 0 01-2 2H4a2 2 0 01-2-2V8h16zm-4 2a1 1 0 100 2 1 1 0 000-2z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="border rounded p-3 bg-soft-dark me-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <path d="M4 7h16v2H4V7zm0 4h16v2H4v-2zm0 4h10v2H4v-2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h2 class="text-dark">GCash</h2>
                                        <small class="text-muted">Ref: #94828484</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-3">
                                        <div>
                                            <span>Items Subtotal</span>
                                        </div>
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <div class="border rounded p-3 bg-soft-warning me-3">
                                                <svg width="24" height="24" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M12.3 8.93L9.88 6.5H15.5V10H17V5H9.88L12.3 2.57L11.24 1.5L7 5.75L11.24 10L12.3 8.93M12 14A3 3 0 1 0 15 17A3 3 0 0 0 12 14M3 11V23H21V11M19 19A2 2 0 0 0 17 21H7A2 2 0 0 0 5 19V15A2 2 0 0 0 7 13H17A2 2 0 0 0 19 15Z" />
                                                </svg>
                                            </div>
                                            <h2 class="counter">₱2,300</h2>
                                        </div>
                                        <div class="pt-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                                                viewBox="0 0 20 20" fill="#d48918">
                                                <path
                                                    d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-3">
                                        <div>
                                            <span>Shipping Fee</span>
                                        </div>
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <div class="border rounded p-3 bg-soft-success me-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" viewBox="0 0 24 24"
                                                    fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M16.5 6H3V17.25H3.375H4.5H4.52658C4.70854 18.5221 5.80257 19.5 7.125 19.5C8.44743 19.5 9.54146 18.5221 9.72342 17.25H15.0266C15.2085 18.5221 16.3026 19.5 17.625 19.5C18.9474 19.5 20.0415 18.5221 20.2234 17.25H21.75V12.4393L18.3107 9H16.5V6ZM16.5 10.5V14.5026C16.841 14.3406 17.2224 14.25 17.625 14.25C18.6721 14.25 19.5761 14.8631 19.9974 15.75H20.25V13.0607L17.6893 10.5H16.5ZM15 15.75V9V7.5H4.5V15.75H4.75261C5.17391 14.8631 6.07785 14.25 7.125 14.25C8.17215 14.25 9.07609 14.8631 9.49739 15.75H15ZM17.625 18C17.0037 18 16.5 17.4963 16.5 16.875C16.5 16.2537 17.0037 15.75 17.625 15.75C18.2463 15.75 18.75 16.2537 18.75 16.875C18.75 17.4963 18.2463 18 17.625 18ZM8.25 16.875C8.25 17.4963 7.74632 18 7.125 18C6.50368 18 6 17.4963 6 16.875C6 16.2537 6.50368 15.75 7.125 15.75C7.74632 15.75 8.25 16.2537 8.25 16.875Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </div>
                                            <h2 class="counter">₱100</h2>
                                        </div>
                                        <div class="pt-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                                                viewBox="0 0 20 20" fill="#07750b">
                                                <path
                                                    d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white d-flex align-items-center"
                            style="border-bottom: 2px dashed #fff;">
                            <i class="bi bi-envelope-fill me-2"></i>
                            <strong>Shipping Address</strong>
                        </div>
                        <div class="card-body position-relative p-4">
                            <div class="border p-3 rounded bg-light position-relative"
                                style="border-left: 5px solid #0d6efd;">
                                <div class="mb-2">
                                    <h5 class="mb-0">
                                        <i class="bi bi-person-fill me-2"></i>Raymund Joel Cadiz
                                        <small class="text-muted"> (0927 765 2053)</small>
                                    </h5>
                                </div>

                                <div class="mb-2">
                                    <i class="bi bi-geo-alt-fill me-2"></i>
                                    Phase 8B, Package 5<br>
                                    Block 81, Lot 1, Bagong Silang, Caloocan City
                                </div>

                                <div class="text-end">
                                    <span class="badge bg-secondary">
                                        <i class="bi bi-house-door-fill me-1"></i> Home
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    </div>
</x-app-layout>