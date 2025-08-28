<x-app-layout :assets="$assets ?? []">
   <div class="row">
      <div class="col-md-12 col-lg-12">
         <div class="row row-cols-1">
            <div class="d-slider1 overflow-hidden ">
               <ul class="swiper-wrapper list-inline m-0 p-0 mb-2">
                  <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700">
                     <div class="card-body">
                        <div class="progress-widget">
                           <div id="circle-progress-01"
                              class="circle-progress-01 circle-progress circle-progress-primary text-center"
                              data-min-value="0" data-max-value="100" data-value="100" data-type="percent">
                              <svg xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24"
                                 fill="none" class="card-slie-arrow">
                                 <path
                                    d="M2 14C2 10.2288 2 8.34315 3.17157 7.17157C4.34315 6 6.22876 6 10 6H14C17.7712 6 19.6569 6 20.8284 7.17157C22 8.34315 22 10.2288 22 14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14Z"
                                    stroke="currentColor" stroke-width="1.5" />
                                 <path opacity="0.5"
                                    d="M16 6C16 4.11438 16 3.17157 15.4142 2.58579C14.8284 2 13.8856 2 12 2C10.1144 2 9.17157 2 8.58579 2.58579C8 3.17157 8 4.11438 8 6"
                                    stroke="currentColor" stroke-width="1.5" />
                                 <path opacity="0.5"
                                    d="M12 17.3333C13.1046 17.3333 14 16.5871 14 15.6667C14 14.7462 13.1046 14 12 14C10.8954 14 10 13.2538 10 12.3333C10 11.4129 10.8954 10.6667 12 10.6667M12 17.3333C10.8954 17.3333 10 16.5871 10 15.6667M12 17.3333V18M12 10V10.6667M12 10.6667C13.1046 10.6667 14 11.4129 14 12.3333"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                              </svg>
                           </div>
                           <div class="progress-detail">
                              <p class="mb-2">Total Sales</p>
                              <h4 class="counter" style="visibility: visible;">₱{{ number_format($subtotal, 2) }}</h4>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
                     <div class="card-body">
                        <div class="progress-widget">
                           <div id="circle-progress-02"
                              class="circle-progress-01 circle-progress circle-progress-info text-center"
                              data-min-value="0" data-max-value="100" data-value="80" data-type="percent">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="24px" height="24px"
                                 viewBox="0 0 32 32" class="card-slie-arrow ">
                                 <path
                                    d="M31,7H1A1,1,0,0,0,0,8V24a1,1,0,0,0,1,1H31a1,1,0,0,0,1-1V8A1,1,0,0,0,31,7ZM25.09,23H6.91A6,6,0,0,0,2,18.09V13.91A6,6,0,0,0,6.91,9H25.09A6,6,0,0,0,30,13.91v4.18A6,6,0,0,0,25.09,23ZM30,11.86A4,4,0,0,1,27.14,9H30ZM4.86,9A4,4,0,0,1,2,11.86V9ZM2,20.14A4,4,0,0,1,4.86,23H2ZM27.14,23A4,4,0,0,1,30,20.14V23Z" />
                                 <path
                                    d="M7.51.71a1,1,0,0,0-.76-.1,1,1,0,0,0-.61.46l-2,3.43a1,1,0,0,0,1.74,1L7.38,2.94l5.07,2.93a1,1,0,0,0,1-1.74Z" />
                                 <path
                                    d="M24.49,31.29a1,1,0,0,0,.5.14.78.78,0,0,0,.26,0,1,1,0,0,0,.61-.46l2-3.43a1,1,0,1,0-1.74-1l-1.48,2.56-5.07-2.93a1,1,0,0,0-1,1.74Z" />
                                 <path d="M16,10a6,6,0,1,0,6,6A6,6,0,0,0,16,10Zm0,10a4,4,0,1,1,4-4A4,4,0,0,1,16,20Z" />
                              </svg>
                           </div>
                           <div class="progress-detail">
                              <p class="mb-2">Total Profit</p>
                              <h4 class="counter" style="visibility: visible;">₱{{ number_format($profit, 2) }}</h4>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="900">
                     <div class="card-body">
                        <div class="progress-widget">
                           <div id="circle-progress-03"
                              class="circle-progress-01 circle-progress circle-progress-primary text-center"
                              data-min-value="0" data-max-value="100" data-value="70" data-type="percent">
                              <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                 class="card-slie-arrow">
                                 <path d="M7.37121 10.2017V17.0618" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                 <path d="M12.0382 6.91919V17.0619" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                 <path d="M16.6285 13.8269V17.0619" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M16.6857 2H7.31429C4.04762 2 2 4.31208 2 7.58516V16.4148C2 19.6879 4.0381 22 7.31429 22H16.6857C19.9619 22 22 19.6879 22 16.4148V7.58516C22 4.31208 19.9619 2 16.6857 2Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                              </svg>
                           </div>
                           <div class="progress-detail">
                              <p class="mb-2">Total Cost</p>
                              <h4 class="counter" style="visibility: visible;">₱{{ number_format($cost, 2) }}</h4>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1000">
                     <div class="card-body">
                        <div class="progress-widget">
                           <div id="circle-progress-04"
                              class="circle-progress-01 circle-progress circle-progress-info text-center"
                              data-min-value="0" data-max-value="100" data-value="60" data-type="percent">
                              <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                 class="card-slie-arrow">
                                 <path d="M17.8877 10.8967C19.2827 10.7007 20.3567 9.50473 20.3597 8.05573C20.3597 
                                6.62773 19.3187 5.44373 17.9537 5.21973" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                 <path
                                    d="M19.7285 14.2505C21.0795 14.4525 22.0225 14.9255 22.0225 15.9005C22.0225 16.5715 21.5785 17.0075 20.8605 17.2815"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11.8867 14.6638C8.67273 14.6638 5.92773 15.1508 5.92773 17.0958C5.92773 19.0398 8.65573 19.5408 11.8867 19.5408C15.1007 19.5408 17.8447 19.0588 17.8447 17.1128C17.8447 15.1668 15.1177 14.6638 11.8867 14.6638Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11.8869 11.888C13.9959 11.888 15.7059 10.179 15.7059 8.069C15.7059 5.96 13.9959 4.25 11.8869 4.25C9.7779 4.25 8.0679 5.96 8.0679 8.069C8.0599 10.171 9.7569 11.881 11.8589 11.888H11.8869Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                 <path
                                    d="M5.88509 10.8967C4.48909 10.7007 3.41609 9.50473 3.41309 8.05573C3.41309 6.62773 4.45409 5.44373 5.81909 5.21973"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                 <path
                                    d="M4.044 14.2505C2.693 14.4525 1.75 14.9255 1.75 15.9005C1.75 16.5715 2.194 17.0075 2.912 17.2815"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                              </svg>
                           </div>
                           <div class="progress-detail">
                              <p class="mb-2">Users</p>
                              <h4 class="counter">{{ $userCount }}</h4>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1100">
                     <div class="card-body">
                        <div class="progress-widget">
                           <div id="circle-progress-05"
                              class="circle-progress-01 circle-progress circle-progress-primary text-center"
                              data-min-value="0" data-max-value="100" data-value="50" data-type="percent">
                              <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                 class="card-slie-arrow">
                                 <path
                                    d="M15.7729 9.30504V6.27304C15.7729 4.18904 14.0839 2.50004 12.0009 2.50004C9.91694 2.49104 8.21994 4.17204 8.21094 6.25604V6.27304V9.30504"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M16.7422 21.0004H7.25778C4.90569 21.0004 3 19.0954 3 16.7454V11.2294C3 8.87937 4.90569 6.97437 7.25778 6.97437H16.7422C19.0943 6.97437 21 8.87937 21 11.2294V16.7454C21 19.0954 19.0943 21.0004 16.7422 21.0004Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                              </svg>
                           </div>
                           <div class="progress-detail">
                              <p class="mb-2">Products</p>
                              <h4 class="counter">{{$productCount}}</h4>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1200">
                     <div class="card-body">
                        <div class="progress-widget">
                           <div id="circle-progress-06"
                              class="circle-progress-01 circle-progress circle-progress-info text-center"
                              data-min-value="0" data-max-value="100" data-value="40" data-type="percent">
                              <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                 class="card-slie-arrow">
                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M14.7379 2.76175H8.08493C6.00493 2.75375 4.29993 4.41175 4.25093 6.49075V17.2037C4.20493 19.3167 5.87993 21.0677 7.99293 21.1147C8.02393 21.1147 8.05393 21.1157 8.08493 21.1147H16.0739C18.1679 21.0297 19.8179 19.2997 19.8029 17.2037V8.03775L14.7379 2.76175Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                 <path d="M14.4751 2.75V5.659C14.4751 7.079 15.6231 8.23 17.0431 8.234H19.7981"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                 <path d="M14.2882 15.3584H8.88818" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                 <path d="M12.2432 11.606H8.88721" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                              </svg>
                           </div>
                           <div class="progress-detail">
                              <p class="mb-2">Orders</p>
                              <h4 class="counter">{{$orderCount}}</h4>
                           </div>
                        </div>
                     </div>
                  </li>
                  <!-- <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1300">
                     <div class="card-body">
                        <div class="progress-widget">
                           <div id="circle-progress-07" class="circle-progress-01 circle-progress circle-progress-primary text-center" data-min-value="0" data-max-value="100" data-value="30" data-type="percent">
                              <svg class="card-slie-arrow " width="24" viewBox="0 0 24 24">
                                 <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                              </svg>
                           </div>
                           <div class="progress-detail">
                              <p  class="mb-2">Members</p>
                              <h4 class="counter">11.2M</h4>
                           </div>
                        </div>
                     </div>
                  </li> -->
               </ul>
               <div class="swiper-button swiper-button-next"></div>
               <div class="swiper-button swiper-button-prev"></div>
            </div>
         </div>
      </div>
      <div class="col-md-12 col-lg-8">
         <div class="row">
            <div class="col-md-12">
               <div class="card" data-aos="fade-up" data-aos-delay="800">
                  <div class="card-header d-flex justify-content-between flex-wrap">
                     <div class="header-title">
                        <h4 class="card-title">₱{{ number_format($subtotal, 2) }}</h4>
                        <p class="mb-0">Gross Sales</p>
                     </div>
                     <div class="d-flex align-items-center align-self-center">
                        <div class="d-flex align-items-center text-primary">
                           <svg xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24" fill="currentColor">
                              <g id="Solid dot2">
                                 <circle id="Ellipse 65" cx="12" cy="12" r="8" fill="currentColor"></circle>
                              </g>
                           </svg>
                           <div class="ms-2">
                              <span class="text-secondary">Sales</span>
                           </div>
                        </div>
                        <div class="d-flex align-items-center ms-3 text-info">
                           <svg xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24" fill="currentColor">
                              <g id="Solid dot3">
                                 <circle id="Ellipse 66" cx="12" cy="12" r="8" fill="currentColor"></circle>
                              </g>
                           </svg>
                           <div class="ms-2">
                              <span class="text-secondary">Cost</span>
                           </div>
                        </div>
                     </div>
                     {{-- <div class="dropdown">
                        <a href="#" class="text-secondary dropdown-toggle" id="dropdownMenuButton2"
                           data-bs-toggle="dropdown" aria-expanded="false">
                           This Week
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton2">
                           <li><a class="dropdown-item" href="#">This Week</a></li>
                           <li><a class="dropdown-item" href="#">This Month</a></li>
                           <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                     </div> --}}
                  </div>
                  <div class="card-body">
                     <div id="d-main" class="d-main"></div>
                  </div>
               </div>
            </div>
            {{-- <div class="col-md-12 col-lg-6">
               <div class="card" data-aos="fade-up" data-aos-delay="1000">
                  <div class="card-header d-flex justify-content-between flex-wrap">
                     <div class="header-title">
                        <h4 class="card-title">Earnings</h4>
                     </div>
                     <div class="dropdown">
                        <a href="#" class="text-secondary dropdown-toggle" id="dropdownMenuButton1"
                           data-bs-toggle="dropdown" aria-expanded="false">
                           This Week
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                           <li><a class="dropdown-item" href="#">This Week</a></li>
                           <li><a class="dropdown-item" href="#">This Month</a></li>
                           <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="d-flex align-items-center justify-content-between">
                        <div id="myChart" class="col-md-8 col-lg-8 myChart"></div>
                        <div class="d-grid gap col-md-4 col-lg-4">
                           <div class="d-flex align-items-start">
                              <svg class="mt-2" xmlns="http://www.w3.org/2000/svg" width="14" viewBox="0 0 24 24"
                                 fill="#3a57e8">
                                 <g id="Solid dot">
                                    <circle id="Ellipse 67" cx="12" cy="12" r="8" fill="#3a57e8"></circle>
                                 </g>
                              </svg>
                              <div class="ms-3">
                                 <span class="text-secondary">Fashion</span>
                                 <h6>251K</h6>
                              </div>
                           </div>
                           <div class="d-flex align-items-start">
                              <svg class="mt-2" xmlns="http://www.w3.org/2000/svg" width="14" viewBox="0 0 24 24"
                                 fill="#4bc7d2">
                                 <g id="Solid dot1">
                                    <circle id="Ellipse 68" cx="12" cy="12" r="8" fill="#4bc7d2"></circle>
                                 </g>
                              </svg>
                              <div class="ms-3">
                                 <span class="text-secondary">Accessories</span>
                                 <h6>176K</h6>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div> --}}
            {{-- <div class="col-md-12 col-lg-6">
               <div class="card" data-aos="fade-up" data-aos-delay="1200">
                  <div class="card-header d-flex justify-content-between flex-wrap">
                     <div class="header-title">
                        <h4 class="card-title">Conversions</h4>
                     </div>
                     <div class="dropdown">
                        <a href="#" class="text-secondary dropdown-toggle" id="dropdownMenuButton3"
                           data-bs-toggle="dropdown" aria-expanded="false">
                           This Week
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton3">
                           <li><a class="dropdown-item" href="#">This Week</a></li>
                           <li><a class="dropdown-item" href="#">This Month</a></li>
                           <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="card-body">
                     <div id="d-activity" class="d-activity"></div>
                  </div>
               </div>
            </div> --}}
            <div class="col-md-12 col-lg-12">
               <div class="card overflow-hidden" data-aos="fade-up" data-aos-delay="400">
                  <div class="card-header d-flex justify-content-between flex-wrap">
                     <div class="header-title">
                        <h4 class="card-title mb-2">Recent Orders</h4>
                        <p class="mb-0">
                           <svg class="me-2" width="24" height="24" viewBox="0 0 24 24">
                              <path fill="#3a57e8" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" />
                           </svg>
                           New Recent Orders
                        </p>
                     </div>
                     <div class="dropdown">
                        <span class="dropdown-toggle" id="dropdownMenuButton7" data-bs-toggle="dropdown"
                           aria-expanded="false" role="button">
                        </span>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton7">
                           <a class="dropdown-item " href="javascript:void(0);">Action</a>
                           <a class="dropdown-item " href="javascript:void(0);">Another action</a>
                           <a class="dropdown-item " href="javascript:void(0);">Something else here</a>
                        </div>
                     </div>
                  </div>
                  <div class="card-body p-0">
                     <div class="table-responsive mt-4">
                        <table id="basic-table" class="table table-striped mb-0" role="grid">
                           <thead>
                              <tr>
                                 <th>CUSTOMER</th>
                                 <th>DATE ORDERED</th>
                                 <th>ORDER</th>
                                 <th>COMPLETION</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($recentOrders as $order)
                                 @php
                                    $statusProgress = match ($order->status) {
                                       'Cancelled' => 0,
                                       'Order Placed' => 20,
                                       'To Ship' => 40,
                                       'To Receive' => 70,
                                       'Completed' => 100,
                                       default => 0,
                                    };

                                    $progressColor = match ($order->status) {
                                       'Cancelled' => 'bg-danger',
                                       'Completed' => 'bg-success',
                                       default => 'bg-primary',
                                    };
                                  @endphp

                                 <tr>
                                    <td>
                                       <div class="d-flex align-items-center">
                                          <img class="bg-soft-primary rounded img-fluid avatar-40 me-3"
                                             src="{{ asset('images/shapes/01.png') }}" alt="profile">
                                          <h6>{{ $order->user->name }}</h6>
                                       </div>
                                    </td>
                                    <td>{{ $order->order_date->format('F d, Y') }}</td>
                                    <td>₱{{ number_format($order->total, 2) }}</td>
                                    <td>
                                       <div class="d-flex align-items-center mb-2">
                                          <h6>{{ $statusProgress }}%</h6>
                                       </div>
                                       <div class="progress bg-soft-primary shadow-none w-100" style="height: 4px">
                                          <div class="progress-bar {{ $progressColor }}" role="progressbar"
                                             style="width: {{ $statusProgress }}%" aria-valuenow="{{ $statusProgress }}"
                                             aria-valuemin="0" aria-valuemax="100">
                                          </div>
                                       </div>
                                    </td>
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
      <div class="col-md-12 col-lg-4">
         <div class="row">
            {{-- <div class="col-md-6 col-lg-12">
               <div class="card credit-card-widget" data-aos="fade-up" data-aos-delay="900">
                  <div class="card-header pb-4 border-0">
                     <div class="p-4 primary-gradient-card rounded border border-white">
                        <div class="d-flex justify-content-between align-items-center">
                           <div>
                              <h5 class="font-weight-bold">VISA </h5>
                              <P class="mb-0">PREMIUM ACCOUNT</P>
                           </div>
                           <div class="master-card-content">
                              <svg class="master-card-1" width="60" height="60" viewBox="0 0 24 24">
                                 <path fill="#ffffff"
                                    d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
                              </svg>
                              <svg class="master-card-2" width="60" height="60" viewBox="0 0 24 24">
                                 <path fill="#ffffff"
                                    d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
                              </svg>
                           </div>
                        </div>
                        <div class="my-4">
                           <div class="card-number">
                              <span class="fs-5 me-2">5789</span>
                              <span class="fs-5 me-2">****</span>
                              <span class="fs-5 me-2">****</span>
                              <span class="fs-5">2847</span>
                           </div>
                        </div>
                        <div class="d-flex align-items-center mb-2 justify-content-between">
                           <p class="mb-0">Card holder</p>
                           <p class="mb-0">Expire Date</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                           <h6>Mike Smith</h6>
                           <h6 class="ms-5">06/11</h6>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="d-flex align-itmes-center flex-wrap  mb-4">
                        <div class="d-flex align-itmes-center me-0 me-md-4">
                           <div>
                              <div class="p-3 mb-2 rounded bg-soft-primary">
                                 <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                       d="M16.9303 7C16.9621 6.92913 16.977 6.85189 16.9739 6.77432H17C16.8882 4.10591 14.6849 2 12.0049 2C9.325 2 7.12172 4.10591 7.00989 6.77432C6.9967 6.84898 6.9967 6.92535 7.00989 7H6.93171C5.65022 7 4.28034 7.84597 3.88264 10.1201L3.1049 16.3147C2.46858 20.8629 4.81062 22 7.86853 22H16.1585C19.2075 22 21.4789 20.3535 20.9133 16.3147L20.1444 10.1201C19.676 7.90964 18.3503 7 17.0865 7H16.9303ZM15.4932 7C15.4654 6.92794 15.4506 6.85153 15.4497 6.77432C15.4497 4.85682 13.8899 3.30238 11.9657 3.30238C10.0416 3.30238 8.48184 4.85682 8.48184 6.77432C8.49502 6.84898 8.49502 6.92535 8.48184 7H15.4932ZM9.097 12.1486C8.60889 12.1486 8.21321 11.7413 8.21321 11.2389C8.21321 10.7366 8.60889 10.3293 9.097 10.3293C9.5851 10.3293 9.98079 10.7366 9.98079 11.2389C9.98079 11.7413 9.5851 12.1486 9.097 12.1486ZM14.002 11.2389C14.002 11.7413 14.3977 12.1486 14.8858 12.1486C15.3739 12.1486 15.7696 11.7413 15.7696 11.2389C15.7696 10.7366 15.3739 10.3293 14.8858 10.3293C14.3977 10.3293 14.002 10.7366 14.002 11.2389Z"
                                       fill="currentColor"></path>
                                 </svg>
                              </div>
                           </div>
                           <div class="ms-3">
                              <h5>1153</h5>
                              <small class="mb-0">Products</small>
                           </div>
                        </div>
                        <div class="d-flex align-itmes-center">
                           <div>
                              <div class="p-3 mb-2 rounded bg-soft-info">
                                 <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                       d="M14.1213 11.2331H16.8891C17.3088 11.2331 17.6386 10.8861 17.6386 10.4677C17.6386 10.0391 17.3088 9.70236 16.8891 9.70236H14.1213C13.7016 9.70236 13.3719 10.0391 13.3719 10.4677C13.3719 10.8861 13.7016 11.2331 14.1213 11.2331ZM20.1766 5.92749C20.7861 5.92749 21.1858 6.1418 21.5855 6.61123C21.9852 7.08067 22.0551 7.7542 21.9652 8.36549L21.0159 15.06C20.8361 16.3469 19.7569 17.2949 18.4879 17.2949H7.58639C6.25742 17.2949 5.15828 16.255 5.04837 14.908L4.12908 3.7834L2.62026 3.51807C2.22057 3.44664 1.94079 3.04864 2.01073 2.64043C2.08068 2.22305 2.47038 1.94649 2.88006 2.00874L5.2632 2.3751C5.60293 2.43735 5.85274 2.72207 5.88272 3.06905L6.07257 5.35499C6.10254 5.68257 6.36234 5.92749 6.68209 5.92749H20.1766ZM7.42631 18.9079C6.58697 18.9079 5.9075 19.6018 5.9075 20.459C5.9075 21.3061 6.58697 22 7.42631 22C8.25567 22 8.93514 21.3061 8.93514 20.459C8.93514 19.6018 8.25567 18.9079 7.42631 18.9079ZM18.6676 18.9079C17.8282 18.9079 17.1487 19.6018 17.1487 20.459C17.1487 21.3061 17.8282 22 18.6676 22C19.4969 22 20.1764 21.3061 20.1764 20.459C20.1764 19.6018 19.4969 18.9079 18.6676 18.9079Z"
                                       fill="currentColor"></path>
                                 </svg>
                              </div>
                           </div>
                           <div class="ms-3">
                              <h5>81K</h5>
                              <small class="mb-0">Order Served</small>
                           </div>
                        </div>
                     </div>
                     <div class="mb-4">
                        <div class="d-flex justify-content-between flex-wrap">
                           <h2 class="mb-2">$405,012,300</h2>
                           <div>
                              <span class="badge bg-success rounded-pill">YoY 24%</span>
                           </div>
                        </div>
                        <p class="text-info">Life time sales</p>
                     </div>
                     <div class="d-grid grid-cols-2 gap">
                        <button class="btn btn-primary text-uppercase p-2">SUMMARY</button>
                        <button class="btn btn-info text-uppercase p-2">ANALYTICS</button>
                     </div>
                  </div>
               </div>
               <div class="card" data-aos="fade-up" data-aos-delay="300">
                  <div class="card-body d-flex justify-content-around text-center">
                     <div>
                        <h2 class="mb-2">750<small>K</small></h2>
                        <p class="mb-0 text-secondary">Website Visitors</p>
                     </div>
                     <hr class="hr-vertial">
                     <div>
                        <h2 class="mb-2">7,500</h2>
                        <p class="mb-0 text-secondary">New Customers</p>
                     </div>
                  </div>
               </div>
            </div> --}}
            <div class="col-md-12 col-lg-12">
               <div class="card" data-aos="fade-up" data-aos-delay="400">
                  <div class="card-header d-flex justify-content-between flex-wrap">
                     <div class="header-title">
                        <h4 class="card-title mb-2">Activity overview</h4>
                        <p class="mb-0">
                           <svg class="me-2" width="24" height="24" viewBox="0 0 24 24">
                              <path fill="#17904b"
                                 d="M13,20H11V8L5.5,13.5L4.08,12.08L12,4.16L19.92,12.08L18.5,13.5L13,8V20Z" />
                           </svg>
                           {{ $orderCount }} total orders
                        </p>
                     </div>
                  </div>
                  <div class="card-body">
                     @forelse($recentOrders as $order)
                        <div class="d-flex profile-media align-items-top mb-2">
                           <div class="profile-dots-pills border-primary mt-1"></div>
                           <div class="ms-4">
                              <h6 class="mb-1">
                                 Order #{{ $order->id }} - ₱{{ number_format($order->total, 2) }}
                              </h6>
                              <span class="mb-0">
                                 {{ $order->user ? $order->user->name : 'Guest' }} ·
                                 {{ \Carbon\Carbon::parse($order->order_date)->format('d M Y h:i A') }}
                              </span>
                           </div>
                        </div>
                     @empty
                        <p class="text-muted">No recent orders available.</p>
                     @endforelse
                  </div>
               </div>
            </div>

         </div>
      </div>
   </div>

   <script>
      window.__DASHBOARD_CHART__ = {
         months: @json($months),
         sales: @json($monthlySales),
         costs: @json($monthlyCosts)
      };
   </script>
</x-app-layout>