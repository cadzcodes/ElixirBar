<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-3">
                    <div class="header-title">
                        <h4 class="card-title mb-1">Order #{{ $orderData->id }}</h4>
                        <p class="mb-0 text-muted">
                            <strong>Customer:</strong> {{ $orderData->customer_name }} <br>
                            <strong>Order Date:</strong>
                            {{ \Carbon\Carbon::parse($orderData->status_date)->format('M j, Y') }}
                        </p>
                    </div>
                    <div class="w-100 mt-3">
                        @php
                            $statusSteps = ['Order Placed', 'To Ship', 'To Receive', 'Completed'];
                            $currentStatus = $orderData->status; // now from controller

                            $isCancelled = $currentStatus === 'Cancelled';
                            if ($isCancelled) {
                                // Override for cancelled
                                $statusSteps[0] = 'Cancelled';
                                $currentIndex = 0;
                            } else {
                                $currentIndex = array_search($currentStatus, $statusSteps);
                            }
                        @endphp

                        <div class="position-relative px-2 py-4">
                            <!-- Progress Base Line -->
                            @php
                                $progressWidths = [
                                    0 => '15%',  // Order Placed
                                    1 => '40%',  // To Ship
                                    2 => '60%',  // To Receive
                                    3 => '100%'  // Completed
                                ];
                            @endphp

                            <!-- Progress Base Line -->
                            <div class="position-absolute start-0 w-100" style="top: 40%; transform: translateY(-50%);">
                                <div class="{{ $isCancelled ? 'bg-danger' : 'bg-secondary' }}"
                                    style="height: 4px; width: 100%; border-radius: 2px;"></div>

                                @unless($isCancelled)
                                    <div class="position-absolute top-0 start-0 h-100 z-1"
                                        style="width: {{ $progressWidths[$currentIndex] ?? '0%' }};">
                                        <div class="bg-primary" style="height: 4px; border-radius: 2px;"></div>
                                    </div>
                                @endunless
                            </div>
                            <!-- Steps -->
                            <div class="d-flex justify-content-between align-items-center position-relative z-2">
                                @foreach ($statusSteps as $index => $step)
                                    @php
                                        if ($isCancelled) {
                                            $isActive = $index === 0; // Only first step active
                                            $isCurrent = $index === 0;
                                            $colorClass = 'danger';
                                        } else {
                                            $isActive = $index <= $currentIndex;
                                            $isCurrent = $index === $currentIndex;
                                            $colorClass = 'primary';
                                        }
                                    @endphp

                                    <div class="text-center flex-fill position-relative" style="z-index: 2;">
                                        <div class="rounded-circle mx-auto d-flex align-items-center justify-content-center
                                                                                {{ $isActive ? 'bg-' . $colorClass : 'bg-secondary' }}"
                                            style="width: 48px; height: 48px;
                                                                                color: white;
                                                                                border: 3px solid {{ $isCurrent ? 'white' : ($isActive ? ($isCancelled ? '#dc3545' : '#0d6efd') : '#6c757d') }};
                                                                                box-shadow: 0 0 0 3px {{ $isActive ? ($isCancelled ? '#dc354544' : '#0d6efd44') : 'transparent' }};">

                                            @if ($isCancelled && $index === 0)
                                                <i class="bi bi-x-circle-fill fs-5"></i>
                                            @elseif ($step === 'Order Placed')
                                                <i class="bi bi-check-circle-fill fs-5"></i>
                                            @elseif ($step === 'To Ship')
                                                <i class="bi bi-truck fs-5"></i>
                                            @elseif ($step === 'To Receive')
                                                <i class="bi bi-box-seam fs-5"></i>
                                            @elseif ($step === 'Completed')
                                                <i class="bi bi-star-fill fs-5"></i>
                                            @endif
                                        </div>
                                        <small
                                            class="d-block mt-2 text-{{ $isActive ? $colorClass : 'secondary' }}">{{ $step }}</small>
                                    </div>
                                @endforeach
                            </div>
                        </div>
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
                                        <h2 class="counter">₱{{ $orderData->total }}</h2>
                                    </div>
                                </div>
                                <div>
                                    <span class="badge bg-primary">GCash</span>
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
                                    @if($orderData->status === 'Delivered')
                                        <!-- Check Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11.414l3.293 3.293-1.414 1.414L11 9.414l-1.879 1.879-1.414-1.414L11 6.586z"
                                                clip-rule="evenodd" />
                                        </svg>

                                    @elseif($orderData->status === 'To Ship')
                                        <!-- Shipping Box Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                            fill="none">
                                            <path
                                                d="M11.0287 2.53961C11.6327 2.20402 12.3672 2.20402 12.9713 2.5396L20.4856 6.71425C20.8031 6.89062 21 7.22524 21 7.5884V15.8232C21 16.5495 20.6062 17.2188 19.9713 17.5715L12.9713 21.4604C12.3672 21.796 11.6327 21.796 11.0287 21.4604L4.02871 17.5715C3.39378 17.2188 3 16.5495 3 15.8232V7.5884C3 7.22524 3.19689 6.89062 3.51436 6.71425L11.0287 2.53961Z"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M3 7L12 12M12 12L21 7M12 12V21.5" stroke="currentColor"
                                                stroke-width="2" stroke-linejoin="round" />
                                            <path d="M7.5 9.5L16.5 4.5" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M6 12.3281L9 14" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    @elseif($orderData->status === 'To Receive')
                                        <!-- Placeholder for To Receive Icon -->
                                        <div style="width:20px; height:20px; background:#ccc;"></div>
                                    @endif
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="border rounded p-3 bg-soft-info me-3">
                                        @if($orderData->status === 'Completed')
                                            <!-- Delivered Box Icon -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24"
                                                fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M21 9.75H19.5V18.3107L18.3107 19.5H5.68934L4.5 18.3107L4.5 9.75H3V4.5H21V9.75ZM6 9.75L18 9.75V17.6893L17.6893 18H6.31066L6 17.6893L6 9.75ZM19.5 6V8.25L4.5 8.25L4.5 6L19.5 6ZM9.75 13.5H15V12H9.75V13.5Z"
                                                    fill="currentColor" />
                                            </svg>

                                        @elseif($orderData->status === 'Order Placed')

                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M17 13.0001H21V19.0001C21 20.1047 20.1046 21.0001 19 21.0001M17 13.0001V19.0001C17 20.1047 17.8954 21.0001 19 21.0001M17 13.0001V5.75719C17 4.8518 17 4.3991 16.8098 4.13658C16.6439 3.90758 16.3888 3.75953 16.1076 3.72909C15.7853 3.6942 15.3923 3.9188 14.6062 4.368L14.2938 4.54649C14.0045 4.71183 13.8598 4.7945 13.7062 4.82687C13.5702 4.85551 13.4298 4.85551 13.2938 4.82687C13.1402 4.7945 12.9955 4.71183 12.7062 4.54649L10.7938 3.45372C10.5045 3.28838 10.3598 3.20571 10.2062 3.17334C10.0702 3.14469 9.92978 3.14469 9.79383 3.17334C9.64019 3.20571 9.49552 3.28838 9.20618 3.45372L7.29382 4.54649C7.00448 4.71183 6.85981 4.7945 6.70617 4.82687C6.57022 4.85551 6.42978 4.85551 6.29383 4.82687C6.14019 4.7945 5.99552 4.71183 5.70618 4.54649L5.39382 4.368C4.60772 3.9188 4.21467 3.6942 3.89237 3.72909C3.61123 3.75953 3.35611 3.90758 3.1902 4.13658C3 4.3991 3 4.8518 3 5.75719V16.2001C3 17.8803 3 18.7203 3.32698 19.3621C3.6146 19.9266 4.07354 20.3855 4.63803 20.6731C5.27976 21.0001 6.11984 21.0001 7.8 21.0001H19M7 13.0001H9M7 9.0001H13M7 17.0001H9M13 17.0001H13.01M13 13.0001H13.01"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        @elseif($orderData->status === 'To Ship')
                                            <!-- Same Shipping Box Icon, bigger -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24"
                                                fill="none">
                                                <path
                                                    d="M11.0287 2.53961C11.6327 2.20402 12.3672 2.20402 12.9713 2.5396L20.4856 6.71425C20.8031 6.89062 21 7.22524 21 7.5884V15.8232C21 16.5495 20.6062 17.2188 19.9713 17.5715L12.9713 21.4604C12.3672 21.796 11.6327 21.796 11.0287 21.4604L4.02871 17.5715C3.39378 17.2188 3 16.5495 3 15.8232V7.5884C3 7.22524 3.19689 6.89062 3.51436 6.71425L11.0287 2.53961Z"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M3 7L12 12M12 12L21 7M12 12V21.5" stroke="currentColor"
                                                    stroke-width="2" stroke-linejoin="round" />
                                                <path d="M7.5 9.5L16.5 4.5" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M6 12.3281L9 14" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        @elseif($orderData->status === 'To Receive')
                                            <!-- Placeholder -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 -1 26 26"
                                                fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M12.31 16.826C12.2864 17.9963 11.3464 18.9278 10.2052 18.9118C9.06401 18.8957 8.14927 17.9382 8.15697 16.7676C8.16467 15.5971 9.09191 14.6522 10.2332 14.652C10.7897 14.6578 11.3212 14.8901 11.7106 15.2978C12.1001 15.7055 12.3157 16.2552 12.31 16.826V16.826Z"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M22.2014 16.826C22.1778 17.9963 21.2378 18.9278 20.0966 18.9118C18.9554 18.8957 18.0407 17.9382 18.0484 16.7676C18.0561 15.5971 18.9833 14.6522 20.1246 14.652C20.6811 14.6578 21.2126 14.8901 21.602 15.2978C21.9915 15.7055 22.2071 16.2552 22.2014 16.826V16.826Z"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M17.8032 17.576C18.2174 17.576 18.5532 17.2402 18.5532 16.826C18.5532 16.4118 18.2174 16.076 17.8032 16.076V17.576ZM12.31 16.076C11.8958 16.076 11.56 16.4118 11.56 16.826C11.56 17.2402 11.8958 17.576 12.31 17.576V16.076ZM17.0571 16.826C17.0571 17.2402 17.3928 17.576 17.8071 17.576C18.2213 17.576 18.5571 17.2402 18.5571 16.826H17.0571ZM18.5571 11.559C18.5571 11.1448 18.2213 10.809 17.8071 10.809C17.3928 10.809 17.0571 11.1448 17.0571 11.559H18.5571ZM17.8071 16.076C17.3928 16.076 17.0571 16.4118 17.0571 16.826C17.0571 17.2402 17.3928 17.576 17.8071 17.576V16.076ZM18.0518 17.576C18.466 17.576 18.8018 17.2402 18.8018 16.826C18.8018 16.4118 18.466 16.076 18.0518 16.076V17.576ZM22.189 16.0762C21.7749 16.0852 21.4465 16.4281 21.4555 16.8423C21.4644 17.2564 21.8074 17.5848 22.2215 17.5758L22.189 16.0762ZM24.4 14.485L25.1499 14.4718C25.1492 14.4331 25.1455 14.3946 25.1389 14.3565L24.4 14.485ZM24.63 11.4305C24.559 11.0224 24.1706 10.7491 23.7625 10.8201C23.3544 10.8911 23.0812 11.2794 23.1521 11.6875L24.63 11.4305ZM17.8031 6.127C17.3889 6.127 17.0531 6.46279 17.0531 6.877C17.0531 7.29121 17.3889 7.627 17.8031 7.627V6.127ZM21.2849 6.877L21.2849 7.62702L21.2897 7.62698L21.2849 6.877ZM22.8737 7.56387L22.327 8.07731L22.327 8.07731L22.8737 7.56387ZM23.4835 9.218L22.7342 9.18603C22.7319 9.23979 22.7354 9.29363 22.7446 9.34663L23.4835 9.218ZM23.1522 11.6876C23.2232 12.0957 23.6116 12.3689 24.0197 12.2979C24.4278 12.2268 24.701 11.8384 24.6299 11.4304L23.1522 11.6876ZM18.5531 6.877C18.5531 6.46279 18.2174 6.127 17.8031 6.127C17.3889 6.127 17.0531 6.46279 17.0531 6.877H18.5531ZM17.0531 11.559C17.0531 11.9732 17.3889 12.309 17.8031 12.309C18.2174 12.309 18.5531 11.9732 18.5531 11.559H17.0531ZM17.0531 6.877C17.0531 7.29121 17.3889 7.627 17.8031 7.627C18.2174 7.627 18.5531 7.29121 18.5531 6.877H17.0531ZM17.8031 6.077L17.0531 6.0722V6.077H17.8031ZM16.7657 5L16.77 4.25H16.7657V5ZM7.42037 5L7.42037 4.24999L7.41679 4.25001L7.42037 5ZM6.68411 5.31693L6.14467 4.79587L6.14467 4.79587L6.68411 5.31693ZM6.382 6.075L7.13201 6.075L7.13199 6.07158L6.382 6.075ZM6.382 15.75L7.132 15.7534V15.75H6.382ZM6.68411 16.5081L6.14467 17.0291L6.14467 17.0291L6.68411 16.5081ZM7.42037 16.825L7.41679 17.575H7.42037V16.825ZM8.1526 17.575C8.56681 17.575 8.9026 17.2392 8.9026 16.825C8.9026 16.4108 8.56681 16.075 8.1526 16.075V17.575ZM17.8051 10.808C17.3909 10.808 17.0551 11.1438 17.0551 11.558C17.0551 11.9722 17.3909 12.308 17.8051 12.308V10.808ZM23.893 12.308C24.3072 12.308 24.643 11.9722 24.643 11.558C24.643 11.1438 24.3072 10.808 23.893 10.808V12.308ZM1 6.25C0.585786 6.25 0.25 6.58579 0.25 7C0.25 7.41421 0.585786 7.75 1 7.75V6.25ZM4.05175 7.75C4.46596 7.75 4.80175 7.41421 4.80175 7C4.80175 6.58579 4.46596 6.25 4.05175 6.25V7.75ZM1.975 9.25C1.56079 9.25 1.225 9.58579 1.225 10C1.225 10.4142 1.56079 10.75 1.975 10.75V9.25ZM3.925 10.75C4.33921 10.75 4.675 10.4142 4.675 10C4.675 9.58579 4.33921 9.25 3.925 9.25V10.75ZM2.56975 12.25C2.15554 12.25 1.81975 12.5858 1.81975 13C1.81975 13.4142 2.15554 13.75 2.56975 13.75V12.25ZM3.925 13.75C4.33921 13.75 4.675 13.4142 4.675 13C4.675 12.5858 4.33921 12.25 3.925 12.25V13.75ZM17.8032 16.076H12.31V17.576H17.8032V16.076ZM18.5571 16.826V11.559H17.0571V16.826H18.5571ZM17.8071 17.576H18.0518V16.076H17.8071V17.576ZM22.2215 17.5758C23.8876 17.5397 25.1791 16.1341 25.1499 14.4718L23.6501 14.4982C23.6655 15.3704 22.9939 16.0587 22.189 16.0762L22.2215 17.5758ZM25.1389 14.3565L24.63 11.4305L23.1521 11.6875L23.6611 14.6135L25.1389 14.3565ZM17.8031 7.627H21.2849V6.127H17.8031V7.627ZM21.2897 7.62698C21.6768 7.62448 22.0522 7.7847 22.327 8.07731L23.4204 7.05042C22.8641 6.4581 22.0909 6.12177 21.28 6.12702L21.2897 7.62698ZM22.327 8.07731C22.6025 8.37065 22.7519 8.7712 22.7342 9.18603L24.2328 9.24997C24.2675 8.43728 23.976 7.642 23.4204 7.05042L22.327 8.07731ZM22.7446 9.34663L23.1522 11.6876L24.6299 11.4304L24.2224 9.08937L22.7446 9.34663ZM17.0531 6.877V11.559H18.5531V6.877H17.0531ZM18.5531 6.877V6.077H17.0531V6.877H18.5531ZM18.5531 6.0818C18.5562 5.60485 18.3745 5.14259 18.0422 4.79768L16.9619 5.83829C17.0188 5.8974 17.0537 5.98123 17.0532 6.0722L18.5531 6.0818ZM18.0422 4.79768C17.7094 4.45212 17.2522 4.25277 16.77 4.25001L16.7615 5.74999C16.8331 5.7504 16.9056 5.77984 16.9619 5.83829L18.0422 4.79768ZM16.7657 4.25H7.42037V5.75H16.7657V4.25ZM7.41679 4.25001C6.93498 4.25231 6.4778 4.45098 6.14467 4.79587L7.22355 5.83799C7.27989 5.77967 7.3524 5.75033 7.42396 5.74999L7.41679 4.25001ZM6.14467 4.79587C5.81216 5.1401 5.62983 5.60177 5.63201 6.07843L7.13199 6.07158C7.13158 5.98066 7.16659 5.89696 7.22355 5.83799L6.14467 4.79587ZM5.632 6.075V15.75H7.132V6.075H5.632ZM5.63201 15.7466C5.62983 16.2232 5.81216 16.6849 6.14467 17.0291L7.22355 15.987C7.16659 15.928 7.13158 15.8443 7.13199 15.7534L5.63201 15.7466ZM6.14467 17.0291C6.4778 17.374 6.93498 17.5727 7.41679 17.575L7.42396 16.075C7.3524 16.0747 7.27988 16.0453 7.22355 15.987L6.14467 17.0291ZM7.42037 17.575H8.1526V16.075H7.42037V17.575ZM17.8051 12.308H23.893V10.808H17.8051V12.308ZM1 7.75H4.05175V6.25H1V7.75ZM1.975 10.75H3.925V9.25H1.975V10.75ZM2.56975 13.75H3.925V12.25H2.56975V13.75Z"
                                                    fill="currentColor" />
                                            </svg>
                                        @endif
                                    </div>
                                    <div>
                                        <h2 class="text-info">
                                            {{ $orderData->status === 'Order Placed' ? 'Placed' : $orderData->status }}
                                        </h2>
                                        <small
                                            class="text-muted">{{ $orderData->status_date ? $orderData->status_date->format('M j, Y') : '' }}</small>
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
                                    <div class="border rounded p-3 bg-soft-primary me-3">

                                        @if($orderData->payment_method === 'GCash')
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                    viewBox="0 0 192 192" fill="none">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="12"
                                                        d="M84 96h36c0 19.882-16.118 36-36 36s-36-16.118-36-36 16.118-36 36-36c9.941 0 18.941 4.03 25.456 10.544" />
                                                    <path fill="currentColor"
                                                        d="M145.315 66.564a6 6 0 0 0-10.815 5.2l10.815-5.2ZM134.5 120.235a6 6 0 0 0 10.815 5.201l-10.815-5.201Zm-16.26-68.552a6 6 0 1 0 7.344-9.49l-7.344 9.49Zm7.344 98.124a6 6 0 0 0-7.344-9.49l7.344 9.49ZM84 152c-30.928 0-56-25.072-56-56H16c0 37.555 30.445 68 68 68v-12ZM28 96c0-30.928 25.072-56 56-56V28c-37.555 0-68 30.445-68 68h12Zm106.5-24.235C138.023 79.09 140 87.306 140 96h12c0-10.532-2.399-20.522-6.685-29.436l-10.815 5.2ZM140 96c0 8.694-1.977 16.909-5.5 24.235l10.815 5.201C149.601 116.522 152 106.532 152 96h-12ZM84 40c12.903 0 24.772 4.357 34.24 11.683l7.344-9.49A67.733 67.733 0 0 0 84 28v12Zm34.24 100.317C108.772 147.643 96.903 152 84 152v12a67.733 67.733 0 0 0 41.584-14.193l-7.344-9.49Z" />
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="12"
                                                        d="M161.549 58.776C166.965 70.04 170 82.666 170 96c0 13.334-3.035 25.96-8.451 37.223" />
                                                </svg>
                                            </div>
                                            <div>
                                                <h2 class="text-primary mb-0">GCash</h2>
                                        @elseif($orderData->payment_method === 'Credit Card')
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M6 15H8M3 11H21M3 8H21M12 15H16M6.2 19H17.8C18.9201 19 19.4802 19 19.908 18.782C20.2843 18.5903 20.5903 18.2843 20.782 17.908C21 17.4802 21 16.9201 21 15.8V8.2C21 7.0799 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V15.8C3 16.9201 3 17.4802 3.21799 17.908C3.40973 18.2843 3.71569 18.5903 4.09202 18.782C4.51984 19 5.07989 19 6.2 19Z"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <div>
                                                <h2 class="text-primary mb-0">Credit Card</h2>
                                        @elseif($orderData->payment_method === 'Cash on Delivery')
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="32"
                                                    height="32" viewBox="0 0 30 30">
                                                    <path
                                                        d="M5.5 5c-.655 0-.66 1.01 0 1h22c.286 0 .5.214.5.5v13c0 .66 1 .66 1 0v-13c0-.822-.678-1.5-1.5-1.5h-22zm-2 2c-.654 0-.654 1 0 1h22c.286 0 .5.214.5.5v13c0 .665 1.01.66 1 0v-13c0-.822-.678-1.5-1.5-1.5h-22zm-2 2C.678 9 0 9.678 0 10.5v12c0 .822.678 1.5 1.5 1.5h22c.822 0 1.5-.678 1.5-1.5v-12c0-.822-.678-1.5-1.5-1.5h-22zm0 1h22c.286 0 .5.214.5.5v12c0 .286-.214.5-.5.5h-22c-.286 0-.5-.214-.5-.5v-12c0-.286.214-.5.5-.5zm1 1c-.276 0-.5.224-.5.5v2c0 .672 1 .656 1 0V12h1.5c.672 0 .656-1 0-1h-2zm10 0C9.468 11 7 13.468 7 16.5S9.468 22 12.5 22s5.5-2.468 5.5-5.5-2.468-5.5-5.5-5.5zm8 0c-.656 0-.672 1 0 1H22v1.5c0 .656 1 .672 1 0v-2c0-.276-.224-.5-.5-.5h-2zm-8 1c2.49 0 4.5 2.01 4.5 4.5S14.99 21 12.5 21 8 18.99 8 16.5s2.01-4.5 4.5-4.5zm0 1c-.277 0-.5.223-.5.5v.594c-.578.21-1 .76-1 1.406 0 .82.68 1.5 1.5 1.5.28 0 .5.212.5.5 0 .288-.22.5-.5.5h-1c-.338-.005-.5.248-.5.5s.162.505.5.5h.5v.5c0 .277.223.5.5.5s.5-.223.5-.5v-.594c.578-.21 1-.76 1-1.406 0-.82-.68-1.5-1.5-1.5-.28 0-.5-.212-.5-.5 0-.288.22-.5.5-.5h1c.338.005.5-.248.5-.5s-.162-.505-.5-.5H13v-.5c0-.277-.223-.5-.5-.5zm-10 6.002c-.25-.002-.5.162-.5.498v2c0 .276.224.5.5.5h2c.656 0 .672-1 0-1H3v-1.5c0-.328-.25-.496-.5-.498zm20 0c-.25.002-.5.17-.5.498V21h-1.5c-.672 0-.656 1 0 1h2c.276 0 .5-.224.5-.5v-2c0-.336-.25-.5-.5-.498z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <h2 class="text-primary mb-0">COD</h2>
                                        @endif
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
                                            <h2 class="counter">₱{{ $orderData->subtotal}}</h2>
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
                                            <h2 class="counter">₱{{ $orderData->shipping_fee }}</h2>
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
                    @if(!empty($orderData->actions))
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row g-2">
                                            @foreach($orderData->actions as $action)
                                                <div class="{{ count($orderData->actions) === 1 ? 'col-12' : 'col-6' }}">
                                                    <a href="{{ $action['action'] }}" class="btn {{ $action['class'] }} w-100">
                                                        {{ $action['label'] }}
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
                @if ($orderData->shipping)
                    <div class="col-lg-6">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white d-flex align-items-center py-3"
                                style="border-bottom: 2px dashed #fff;">
                                <i class="bi bi-envelope-fill me-2 fs-5"></i>
                                <strong class="fs-6">Shipping Address</strong>
                            </div>
                            <div class="card-body position-relative p-4">
                                <div class="border p-3 rounded bg-light position-relative"
                                    style="border-left: 5px solid #0d6efd;">
                                    <div class="mb-2">
                                        <h5 class="mb-0">
                                            <i class="bi bi-person-fill me-2"></i>{{ $orderData->shipping['name'] }}
                                            <small class="text-muted">({{ $orderData->shipping['phone'] }})</small>
                                        </h5>
                                    </div>

                                    <div class="mb-2">
                                        <i class="bi bi-geo-alt-fill me-2"></i>
                                        {{ $orderData->shipping['address1'] }}<br>
                                        {{ $orderData->shipping['address2'] }}
                                    </div>

                                    <div class="text-end">
                                        <span class="badge bg-secondary">
                                            <i class="bi bi-house-door-fill me-1"></i>
                                            {{ ucfirst($orderData->shipping['type']) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-header bg-dark text-white d-flex align-items-center py-3">
                            <i class="bi bi-list-ul me-2 fs-5"></i>
                            <strong class="fs-6">Ordered Items</strong>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light text-center">
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Item Name</th>
                                        <th scope="col">Unit Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orderData->items as $item)
                                        <tr class="text-center">
                                            <td>
                                                <img src="{{ asset($item['image'] ?? 'images/default.png') }}"
                                                    alt="{{ $item['product_name'] }}" class="img-fluid rounded"
                                                    style="width: 60px; height: auto;">
                                            </td>
                                            <td class="text-start">
                                                <span class="fw-semibold">{{ $item['product_name'] }}</span><br>
                                                <small class="text-muted">Product ID: {{ $item['product_id'] }}</small>
                                            </td>
                                            <td>₱{{ number_format($item['unit_price'], 2) }}</td>
                                            <td>{{ $item['quantity'] }}</td>
                                            <td class="fw-bold">₱{{ number_format($item['subtotal'], 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    </div>
</x-app-layout>