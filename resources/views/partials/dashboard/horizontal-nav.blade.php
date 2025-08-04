<nav id="navbar_main" class="mobile-offcanvas nav navbar navbar-expand-xl hover-nav horizontal-nav mx-md-auto">
   <div class="container-fluid">
      <div class="offcanvas-header">
         <div class="navbar-brand">
            <h4 class="logo-title">{{env('APP_NAME')}}</h4>
         </div>
         <button class="btn-close float-end"></button>
      </div>
      <ul class="navbar-nav">
         <li class="nav-item"><a class="nav-link active" href="{{route('menu-style.horizontal')}}"> Horizontal </a></li>
         <li class="nav-item"><a class="nav-link" href="{{route('menu-style.dualhorizontal')}}"> Dual Horizontal </a></li>
         <li class="nav-item"><a class="nav-link" href="{{route('menu-style.dualcompact')}}"><span class="item-name">Dual Compact</span></a></li>
         <li class="nav-item"><a class="nav-link" href="{{route('menu-style.boxed')}}"> Boxed Horizontal </a></li>
         <li class="nav-item"><a class="nav-link" href="{{route('menu-style.boxedfancy')}}"> Boxed Fancy</a></li>

      </ul>
   </div> <!-- container-fluid.// -->
</nav>
