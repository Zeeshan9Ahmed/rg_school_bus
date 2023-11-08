<div class="main_body">
  <section class="dashboar_sec">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2  noRight">
          <div class="side_bar">
            <a href="{{route('dashboard')}}"><img src="{{asset('assets/images/logo.png')}}" class="img-fluid" alt=""></a>
              <div class="dash_nav">
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a class="nav-link {{ (request()->is('school/dashboard')) ? 'active' : '' }}" href="{{route('dashboard')}}"><i class="fas fa-home-lg-alt"></i> Dashboard</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ (request()->is('school/parent-list')) ? 'active' : '' }}" href="{{route('parent-list')}}"><i class="fas fa-users"></i> Parents</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ (request()->is('school/student-list')) ? 'active' : '' }}" href="{{route('student-list')}}"><i class="fas fa-user-graduate"></i> Students</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ (request()->is('school/drivers')) ? 'active' : '' }}" href="{{url('school/drivers')}}"><i class="fas fa-user-nurse"></i> Drivers</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link {{ (request()->is('school/buses')) ? 'active' : '' }}" href="{{url('school/buses')}}"><i class="fas fa-user-nurse"></i> Buses</a>
                  </li>

                  {{-- <li class="nav-item">
                    <a class="nav-link {{ (request()->is('school/route-map')) ? 'active' : '' }}" href="{{route('route-map')}}"><i class="fas fa-route"></i> Routes </a>
                  </li> --}}
                  <li class="nav-item">
                    <a class="nav-link {{ (request()->is('school/messages')) ? 'active' : '' }}" href="{{route('messages')}}"><i class="fas fa-comment"></i> Group Messages</a>
                  </li>
                </ul>
              </div>
           </div>
        </div>

<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 noLeft">
            <div class="right_dash">
              <div class="top_bar">
                <div class="row">
                  <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                    <div class="dash">
                      <a href="javascript:void(0)"><i class="fa-sharp fa-solid fa-bars"></i> Dashboard</a>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                    <div class="dash_menu">
                      <div class="stellarnav main_menu">
                        <ul>
                          <a href="#" class="close-menu full"><span class="icon-close"></span></a>
                          <li class="menu-links">
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal4"><span>2</span><i class="fas fa-bell"></i></a>
                          </li>
                          <li class="menu-links ">
                            <a href="javascript:void(0)"><img src="{{asset('assets/images/di.png')}}" class="img-fluid" alt="">{{ auth()->user()->first_name}}</a>
                            <ul>
                              <li>
                                <a href="javascript:void(0)">
                                  <img src="{{asset('assets/images/di.png')}}" class="img-fluid" alt=""> {{auth()->user()->first_name}}
                                  <p>{{auth()->user()->email}}</p>
                                </a>
                              </li>
                              <li><a href="{{route('settings')}}"><i class="fas fa-cog"></i> Setting</a></li>
                              <li><a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                            </ul>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
