@extends('school.master')
@section('title')
<title>RG School Bus Route List</title>
@stop
@section('content')
            <div class="dt_main mp">
              <div class="dash_tab_2 dash_tab_4">
                <div class="main_map"> 
                  <div class="sticky">
                    <div class="row align-items-center">
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="parent">
                          <h4>Students Management</h4>
                        </div>
                      </div>                          
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="search_filter">
                              <div class="fill_div">
                                <input type="text" placeholder="Drivers">
                                <input type="text" placeholder="Students">
                                <a href="view_requaste.php" class="btn btn_green" data-bs-target="#exampleModalToggle22" data-bs-toggle="modal"> Locate</a>
                              </div> 
                   
                        </div>
                      </div>
                    </div>
                  </div>
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13026962.780839564!2d-106.25398202729606!3d37.142929584374194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2ssg!4v1684516104939!5m2!1sen!2ssg" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<div class="dash_modal">
  <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModal4Label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <div class="row">
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
              <h5 class="modal-title" id="exampleModal4Label">Notification</h5>
            </div>
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
              <!-- <button type="" e="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
              <div class="togal_btn ">
                <p>Only show unread <input type="checkbox"></p>
              </div>
            </div>
          </div>
        </div>
        <div class="dash_body">
          <div class="modal-body">
            <p>Today</p>
            <div class="dash_text">
              <h4>Lorem ipsum dolor sit amet</h4>
              <span>02:15AM</span>
              <p>Lorem ipsum dolor sit amet, consectetur adip iscing elit, sed do eiusmod tempor incididunt ut.</p>
            </div>
            <div class="dash_text">
              <h4>Lorem ipsum dolor sit amet</h4>
              <span>02:15AM</span>
              <p>Lorem ipsum dolor sit amet, consectetur adip iscing elit, sed do eiusmod tempor incididunt ut.</p>
            </div>
            <div class="dash_text">
              <h4>Lorem ipsum dolor sit amet</h4>
              <span>02:15AM</span>
              <p>Lorem ipsum dolor sit amet, consectetur adip iscing elit, sed do eiusmod tempor incididunt ut.</p>
            </div>
            <div class="dash_text">
              <h4>Lorem ipsum dolor sit amet</h4>
              <span>02:15AM</span>
              <p>Lorem ipsum dolor sit amet, consectetur adip iscing elit, sed do eiusmod tempor incididunt ut.</p>
            </div>
            <div class="dash_text">
              <h4>Lorem ipsum dolor sit amet</h4>
              <span>02:15AM</span>
              <p>Lorem ipsum dolor sit amet, consectetur adip iscing elit, sed do eiusmod tempor incididunt ut.</p>
            </div>
            <div class="dash_text">
              <h4>Lorem ipsum dolor sit amet</h4>
              <span>02:15AM</span>
              <p>Lorem ipsum dolor sit amet, consectetur adip iscing elit, sed do eiusmod tempor incididunt ut.</p>
            </div>
            <div class="dash_text">
              <h4>Lorem ipsum dolor sit amet</h4>
              <span>02:15AM</span>
              <p>Lorem ipsum dolor sit amet, consectetur adip iscing elit, sed do eiusmod tempor incididunt ut.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Button trigger modal -->
<div class="success_modal assign">
  <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel">Assign Children to Another Driver</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="child_box all">
                <ul>
                  <li>
                    <label class="containerd"> Slect All
                    <input type="checkbox" >
                    <span class="checkmark"></span>
                    </label>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
              <div class="child_box">
                <ul>
                  <li><img src="{{asset('assets/images/ch.jpg')}}" class="img-fluid" alt=""></li>
                  <li>Child Name</li>
                  <li>
                    <label class="containerd">
                    <input type="checkbox" >
                    <span class="checkmark"></span>
                    </label>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
              <div class="child_box">
                <ul>
                  <li><img src="{{asset('assets/images/ch.jpg')}}" class="img-fluid" alt=""></li>
                  <li>Child Name</li>
                  <li>
                    <label class="containerd">
                    <input type="checkbox" >
                    <span class="checkmark"></span>
                    </label>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
              <div class="child_box">
                <ul>
                  <li><img src="{{asset('assets/images/ch.jpg')}}" class="img-fluid" alt=""></li>
                  <li>Child Name</li>
                  <li>
                    <label class="containerd">
                    <input type="checkbox" >
                    <span class="checkmark"></span>
                    </label>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
              <div class="child_box">
                <ul>
                  <li><img src="{{asset('assets/images/ch.jpg')}}" class="img-fluid" alt=""></li>
                  <li>Child Name</li>
                  <li>
                    <label class="containerd">
                    <input type="checkbox" >
                    <span class="checkmark"></span>
                    </label>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
              <div class="child_box">
                <ul>
                  <li><img src="{{asset('assets/images/ch.jpg')}}" class="img-fluid" alt=""></li>
                  <li>Child Name</li>
                  <li>
                    <label class="containerd">
                    <input type="checkbox" >
                    <span class="checkmark"></span>
                    </label>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
              <div class="child_box">
                <ul>
                  <li><img src="{{asset('assets/images/ch.jpg')}}" class="img-fluid" alt=""></li>
                  <li>Child Name</li>
                  <li>
                    <label class="containerd">
                    <input type="checkbox" >
                    <span class="checkmark"></span>
                    </label>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
              <div class="child_box">
                <ul>
                  <li><img src="{{asset('assets/images/ch.jpg')}}" class="img-fluid" alt=""></li>
                  <li>Child Name</li>
                  <li>
                    <label class="containerd">
                    <input type="checkbox" >
                    <span class="checkmark"></span>
                    </label>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
              <div class="child_box">
                <ul>
                  <li><img src="{{asset('assets/images/ch.jpg')}}" class="img-fluid" alt=""></li>
                  <li>Child Name</li>
                  <li>
                    <label class="containerd">
                    <input type="checkbox" >
                    <span class="checkmark"></span>
                    </label>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
              <div class="child_box">
                <ul>
                  <li><img src="{{asset('assets/images/ch.jpg')}}" class="img-fluid" alt=""></li>
                  <li>Child Name</li>
                  <li>
                    <label class="containerd">
                    <input type="checkbox" >
                    <span class="checkmark"></span>
                    </label>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
              <div class="child_box">
                <ul>
                  <li><img src="{{asset('assets/images/ch.jpg')}}" class="img-fluid" alt=""></li>
                  <li>Child Name</li>
                  <li>
                    <label class="containerd">
                    <input type="checkbox" >
                    <span class="checkmark"></span>
                    </label>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
              <div class="child_box">
                <ul>
                  <li><img src="{{asset('assets/images/ch.jpg')}}" class="img-fluid" alt=""></li>
                  <li>Child Name</li>
                  <li>
                    <label class="containerd">
                    <input type="checkbox" >
                    <span class="checkmark"></span>
                    </label>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
              <div class="child_box">
                <ul>
                  <li><img src="{{asset('assets/images/ch.jpg')}}" class="img-fluid" alt=""></li>
                  <li>Child Name</li>
                  <li>
                    <label class="containerd">
                    <input type="checkbox" >
                    <span class="checkmark"></span>
                    </label>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
              <div class="child_box">
                <ul>
                  <li><img src="{{asset('assets/images/ch.jpg')}}" class="img-fluid" alt=""></li>
                  <li>Child Name</li>
                  <li>
                    <label class="containerd">
                    <input type="checkbox" >
                    <span class="checkmark"></span>
                    </label>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
              <div class="child_box">
                <ul>
                  <li><img src="{{asset('assets/images/ch.jpg')}}" class="img-fluid" alt=""></li>
                  <li>Child Name</li>
                  <li>
                    <label class="containerd">
                    <input type="checkbox" >
                    <span class="checkmark"></span>
                    </label>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
              <div class="child_box">
                <ul>
                  <li><img src="{{asset('assets/images/ch.jpg')}}" class="img-fluid" alt=""></li>
                  <li>Child Name</li>
                  <li>
                    <label class="containerd">
                    <input type="checkbox" >
                    <span class="checkmark"></span>
                    </label>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 centerCol">
              <div><a href="javascript:void(0)" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal" class="btn btn_green">Assign To </a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- slect modal  -->
@stop