@if( auth()->check() )

  <h2>{{ Auth::user()->email }}</h2>
     <li class="nav-item">
         <a class="nav-link font-weight-bold" href="#">Hi {{ auth()->user()->name }}</a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="{{ Route('login.logout') }}">Log Out</a>
     </li>
  @else
     <li class="nav-item">
         <a class="nav-link" href="/login/show">Log In</a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="/register/show">Register</a>
     </li>
  @endif
