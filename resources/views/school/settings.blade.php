@extends('school.master')
@section('title')
<title>RG School Bus Settings</title>
@stop
@section('content')
                <div class="dash_tab">
                            <div class="dash_tab_2 dash_tab_5">
                        <div class="row align-items-center">
                          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="parent">
                              <h4>Settings</h4>
                            </div>
                          </div>                          
                          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <div class="profile_left_tabs">
                              <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                  <a class="nav-link active" id="nav-home-tabpro" data-bs-toggle="tab" data-bs-target="#nav-homepro" type="button" role="tab" aria-controls="nav-homepro" aria-selected="true"><i class="fa-solid fa-user"></i>  Profile Setting</a>
                                  <a class="nav-link" id="nav-profile-tabpro" data-bs-toggle="tab" data-bs-target="#nav-profilepro" type="button" role="tab" aria-controls="nav-profilepro" aria-selected="false"><i class="fa-solid fa-lock"></i> Change Password</a>
                                  <a class="nav-link" id="nav-contact-tabpro" data-bs-toggle="tab" data-bs-target="#nav-contactpro" type="button" role="tab" aria-controls="nav-contactpro" aria-selected="false"><i class="fa-solid fa-shield-halved"></i> Privacy Policy</a>                
                                  <a class="nav-link" id="nav-contact-tabpro2" data-bs-toggle="tab" data-bs-target="#nav-contactpro2" type="button" role="tab" aria-controls="nav-contactpro2" aria-selected="false"><i class="fa-regular fa-file-lines"></i> Term & Condition</a>
                                </div>
                              </nav>
                            </div>  
                          </div>
                          <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                            <div class="profile_right_tabs">
                              <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-homepro" role="tabpanel" aria-labelledby="nav-home-tabpro">
                                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                     <div class="stud_form">
                                         <div class="row">
                                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <h4>Profile Settings</h4>
                                              <img src="{{asset('assets/images/boy.png')}}" class="img-fluid" alt="">
                                             <div class="form-group">
                                               <input type="text" placeholder="School Name" name="first_name" id="first_name" value="{{auth()->user()->first_name}}">
                                             </div>
                                           </div>
                                         </div>                               
                                         <div class="row">
                                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                             <div class="form-group">
                                               <input type="text" placeholder="Address" name="address" id="address" value="{{auth()->user()->address}}">
                                             </div>
                                           </div>
                                         </div>                               
                                         <div class="row">
                                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                             <div class="form-group">
                                               <input type="text" placeholder="Email Address" name="email" id="email" disabled value="{{auth()->user()->email}}">
                                             </div>
                                           </div>                                 
                                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                             <div class="form-group">
                                               <input type="text" placeholder="Phone Number" id="phone" name="phone" value="{{auth()->user()->phone}}">
                                             </div>
                                           </div>
                                         </div> 
                                         <div class="row">
                                           <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                             <div class="form-group">
                                               <h5>Push Notification</h5>
                                             </div>
                                           </div>                                 
                                           <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                             <div class="form-group">
                                               <div class="togal_btn ">
                                                <p><input type="checkbox" id="push_notification" name="push_notification" {{ auth()->user()->push_notification == 1 ?"checked":""  }} ></p>
                                              </div>
                                             </div>
                                           </div>
                                         </div>
                                         <div class="row">
                                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                             <div class="form-group">
                                               <input type="submit" id="edit_profile" value="Save"></a>
                                             </div>
                                           </div>
                                         </div> 
                                     </div>
                                  </div>
                                </div>
                                <div class="tab-pane fade" id="nav-profilepro" role="tabpanel" aria-labelledby="nav-profile-tabpro">
                                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                     <div class="stud_form change">
                                         <div class="row">
                                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <h4>Change Password</h4>
                                             <div class="form-group">
                                               <input type="text" placeholder="Existing Password">
                                             </div>
                                           </div>
                                         </div>                               
                                         <div class="row">
                                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                             <div class="form-group">
                                               <input type="text" placeholder="New Password">
                                             </div>
                                           </div>
                                         </div>                               
                                         <div class="row">
                                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                             <div class="form-group">
                                               <input type="text" placeholder="Confirm New Password">
                                             </div>
                                           </div>                                 
                                         </div> 
                                         <div class="row">
                                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                             <div class="form-group">
                                               <input type="submit" value="Save"></a>
                                             </div>
                                           </div>
                                         </div> 
                                     </div>
                                  </div>
                                </div>
                                <div class="tab-pane fade" id="nav-contactpro" role="tabpanel" aria-labelledby="nav-contact-tabpro">
                                  <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                      <div class="terms_text">
                                         <h4>Privacy Policy</h4>
                                          <p>
                                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae aliquam leo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam porta vestibulum risus vitae lobortis. Proin molestie aliquet magna vitae lacinia. Etiam venenatis ante porttitor ex dictum pulvinar. Pellentesque iaculis dui ante, vel hendrerit justo commodo id. Suspendisse potenti.</p>
                                          <p>Nunc in mauris non mauris blandit consectetur eu nec nisl. Nunc posuere, risus id ullamcorper vulputate, arcu ligula pharetra dolor, quis accumsan eros nisi sit amet nisi. Pellentesque maximus ante cursus justo vulputate, id lacinia metus pellentesque. Etiam ut consectetur diam. Vivamus eleifend odio sit amet augue efficitur, id iaculis diam cursus. Vestibulum scelerisque dolor eget auctor pellentesque. Integer ultrices purus eu pretium sagittis. Praesent purus nulla, egestas eget elit tincidunt, blandit dapibus ligula. Mauris auctor porta felis eu volutpat. Donec lectus ante, lobortis sed feugiat et, luctus in elit. Aenean volutpat nisl eget porttitor pharetra. Quisque euismod orci in tortor consectetur volutpat. Praesent lobortis egestas ante a convallis.
                                          </p>
                                          <p>Fusce volutpat enim sapien, et efficitur ipsum viverra et. Donec at scelerisque augue, sed aliquam diam. Etiam vehicula eros a est tristique, a rutrum erat ullamcorper. Pellentesque vitae mattis erat, quis tristique leo. Vestibulum dapibus consequat turpis. Proin tempor molestie rutrum. Etiam libero neque, posuere at tincidunt vitae, viverra sit amet magna. Donec nisl mauris, volutpat nec nisl vel, varius elementum ipsum. Integer ut sollicitudin urna, eu aliquet sem.</p>
                                          <p>Cras lorem elit, pellentesque sit amet nisi eu, rhoncus vulputate sapien. Vestibulum sed urna ante. Aenean pharetra eros sit amet velit gravida, at blandit mauris scelerisque. Nunc placerat nec elit et volutpat. Maecenas fermentum luctus leo malesuada tincidunt. Suspendisse faucibus euismod dui in finibus. Cras dolor purus, lacinia quis mauris eu, imperdiet aliquet urna. Nunc dolor massa, pretium id cursus at, mollis sed mauris. In sit amet cursus lorem.</p>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae aliquam leo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam porta vestibulum risus vitae lobortis. Proin molestie aliquet magna vitae lacinia. Etiam venenatis ante porttitor ex dictum pulvinar. Pellentesque iaculis dui ante, vel hendrerit justo commodo id. Suspendisse potenti.</p>
                                          <p>Nunc in mauris non mauris blandit consectetur eu nec nisl. Nunc posuere, risus id ullamcorper vulputate, arcu ligula pharetra dolor, quis accumsan eros nisi sit amet nisi. Pellentesque maximus ante cursus justo vulputate, id lacinia metus pellentesque. Etiam ut consectetur diam. Vivamus eleifend odio sit amet augue efficitur, id iaculis diam cursus. Vestibulum scelerisque dolor eget auctor pellentesque. Integer ultrices purus eu pretium sagittis. Praesent purus nulla, egestas eget elit tincidunt, blandit dapibus ligula. Mauris auctor porta felis eu volutpat. Donec lectus ante, lobortis sed feugiat et, luctus in elit. Aenean volutpat nisl eget porttitor pharetra. Quisque euismod orci in tortor consectetur volutpat. Praesent lobortis egestas ante a convallis.</p>
                                     </div>
                                    </div>
                                  </div>
                                </div>                                
                                <div class="tab-pane fade" id="nav-contactpro2" role="tabpanel" aria-labelledby="nav-contact-tabpro">
                               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                  <div class="terms_text">
                                         <h4>Terms & Conditions</h4>
                                          <p>
                                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae aliquam leo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam porta vestibulum risus vitae lobortis. Proin molestie aliquet magna vitae lacinia. Etiam venenatis ante porttitor ex dictum pulvinar. Pellentesque iaculis dui ante, vel hendrerit justo commodo id. Suspendisse potenti.</p>
                                          <p>Nunc in mauris non mauris blandit consectetur eu nec nisl. Nunc posuere, risus id ullamcorper vulputate, arcu ligula pharetra dolor, quis accumsan eros nisi sit amet nisi. Pellentesque maximus ante cursus justo vulputate, id lacinia metus pellentesque. Etiam ut consectetur diam. Vivamus eleifend odio sit amet augue efficitur, id iaculis diam cursus. Vestibulum scelerisque dolor eget auctor pellentesque. Integer ultrices purus eu pretium sagittis. Praesent purus nulla, egestas eget elit tincidunt, blandit dapibus ligula. Mauris auctor porta felis eu volutpat. Donec lectus ante, lobortis sed feugiat et, luctus in elit. Aenean volutpat nisl eget porttitor pharetra. Quisque euismod orci in tortor consectetur volutpat. Praesent lobortis egestas ante a convallis.
                                          </p>
                                          <p>Fusce volutpat enim sapien, et efficitur ipsum viverra et. Donec at scelerisque augue, sed aliquam diam. Etiam vehicula eros a est tristique, a rutrum erat ullamcorper. Pellentesque vitae mattis erat, quis tristique leo. Vestibulum dapibus consequat turpis. Proin tempor molestie rutrum. Etiam libero neque, posuere at tincidunt vitae, viverra sit amet magna. Donec nisl mauris, volutpat nec nisl vel, varius elementum ipsum. Integer ut sollicitudin urna, eu aliquet sem.</p>
                                          <p>Cras lorem elit, pellentesque sit amet nisi eu, rhoncus vulputate sapien. Vestibulum sed urna ante. Aenean pharetra eros sit amet velit gravida, at blandit mauris scelerisque. Nunc placerat nec elit et volutpat. Maecenas fermentum luctus leo malesuada tincidunt. Suspendisse faucibus euismod dui in finibus. Cras dolor purus, lacinia quis mauris eu, imperdiet aliquet urna. Nunc dolor massa, pretium id cursus at, mollis sed mauris. In sit amet cursus lorem.</p>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae aliquam leo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam porta vestibulum risus vitae lobortis. Proin molestie aliquet magna vitae lacinia. Etiam venenatis ante porttitor ex dictum pulvinar. Pellentesque iaculis dui ante, vel hendrerit justo commodo id. Suspendisse potenti.</p>
                                          <p>Nunc in mauris non mauris blandit consectetur eu nec nisl. Nunc posuere, risus id ullamcorper vulputate, arcu ligula pharetra dolor, quis accumsan eros nisi sit amet nisi. Pellentesque maximus ante cursus justo vulputate, id lacinia metus pellentesque. Etiam ut consectetur diam. Vivamus eleifend odio sit amet augue efficitur, id iaculis diam cursus. Vestibulum scelerisque dolor eget auctor pellentesque. Integer ultrices purus eu pretium sagittis. Praesent purus nulla, egestas eget elit tincidunt, blandit dapibus ligula. Mauris auctor porta felis eu volutpat. Donec lectus ante, lobortis sed feugiat et, luctus in elit. Aenean volutpat nisl eget porttitor pharetra. Quisque euismod orci in tortor consectetur volutpat. Praesent lobortis egestas ante a convallis.</p>
                                </div>
                                </div>

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- Modal -->
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
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
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
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
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
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
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
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
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
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
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
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
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
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
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
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
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
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
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
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
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
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
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
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
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
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
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
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
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
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
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
      <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalToggleLabel2">Select Driver</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 centerCol">
                  <div class="form-group">
                    <select name="" id="">
                      <option value="">Select Driver</option>
                      <option value="">Select Driver</option>
                      <option value="">Select Driver</option>
                      <option value="">Select Driver</option>
                      <option value="">Select Driver</option>
                      <option value="">Select Driver</option>
                    </select>
                  </div>
                  <div class="text-center req">
                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal13" data-bs-dismiss="modal" class="btn btn_green">Submit </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- sucsefull modal  -->
    <div class="success_modal reset_password">
      <div class="modal fade" id="exampleModal13" tabindex="-1" aria-labelledby="exampleModal3Label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModal3Label"> Successful</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="icon_box"><a href="javascript:void(0)"><i class="fa-solid fa-check"></i></a></div>
                  <p>You have successfully reset your password</p>
                  <div class="ss_form">
                    <a href="javascript:void(0)" class="green" data-bs-dismiss="modal" > Continue</a>                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="success_modal reset_password">
      <div class="modal fade" id="exampleModal133" tabindex="-1" aria-labelledby="exampleModal3Label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModal3Label"> Add New Announcement</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="add_new">
                    <div class="form-group">
                      <input type="text" placeholder="Announcement Title">
                      <textarea name="" id="" placeholder="description"></textarea>
                      <a href="javascript:void(0)" class="green" data-bs-target="#exampleModal13" data-bs-toggle="modal" data-bs-dismiss="modal" > <input type="submit" value="Submit"></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="parent_detail success_modal">
      <div class="modal fade" id="exampleModalToggle22" aria-hidden="true" aria-labelledby="exampleModalToggleLabel222" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalToggleLabel222">Add New Driver</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                  <div class="form-group">
                    <input type="text" placeholder="Driver Name">
                  </div>
                  <div class="form-group">
                    <input type="text" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <input type="text" placeholder="Phone">
                  </div>
                  <div class="form-group">
                    <input type="text" placeholder="Bus Registration No">
                  </div>                  
                  <div class="form-group">
                    <input type="text" placeholder="Seating Capicity">
                  </div>
                  <div class="form-group">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 centerCol">
                  <div class="text-center req">
                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal13" data-bs-dismiss="modal" class="btn btn_green">Update Profile </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@stop

@section('footer-script')


<script>
  $(document).ready(() => {



    // Get the input element


    $(document).on('click', '.edit-child', function() {
      var child = JSON.parse($(this).attr("data-child"));
      
      $("#first_name").val(child.first_name);
      $("#last_name").val(child.last_name);
      $("#class").val(child.class);
      $("#roll_number").val(child.roll_number);
      $("#age").val(convertToYYYYMMDD(child.dob));
      $("#shift_start_time").val(child.shift_start_time);
      $("#shift_end_time").val(child.shift_end_time);
      $("#child_id").val(child.id);
      $('#driver_id option[value="' + child.driver_id + '"]').attr("selected", "selected");

      $("#childexampleModalToggle2").modal('show');

    });

    function convertToYYYYMMDD(dateString) {
      // Split the date components using the '/' delimiter
      const dateComponents = dateString.split('/');

      // Rearrange the date components in the 'YYYY-MM-DD' format
      const yyyyMMddDate = `${dateComponents[2]}-${dateComponents[0].padStart(2, '0')}-${dateComponents[1].padStart(2, '0')}`;

      return yyyyMMddDate;
    }

    $(document).on('click', '#edit_profile', function() {
      // alert('ddd')
      // return;

      var first_name = $("#first_name").val();
      var address = $("#address").val();
      var phone = $("#phone").val();
      var push_notification = $('#push_notification').prop('checked')?1:0;
      console.log(push_notification,'push_notification')
      // return;
      // console.log(baseUrl,'driver_di')
      // var driver_id = $('#driver_id option[value="' + child.driver_id + '"]').attr("selected", "selected");

      if (!first_name) {
        showToast('School Name filed is required.', 'error')
        return;
      }
      if (!address) {
        showToast('Address filed is required.', 'error')
        return;
      }

      if (!phone) {
        showToast('Phone Number filed is required.', 'error')
        return;
      }
      
      // return;
      $.ajax({
        url: `${baseUrl}/update-profile`,
        type: 'POST',
        data: {
          first_name,
          address,
          phone,
          push_notification,
        },
        success: function(response) {

          if (response.status == 0) {
            showToast(response.message, 'error');
            return;
          }

          showToast(response.message, 'success');
          return;
          setTimeout(function() {
            location.reload();
          }, 2000);
          return;
         
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus)
          return;
          swal("Child", "Something Went Wrong", "error");
        }
      });

    });

    
  });
</script>
@stop