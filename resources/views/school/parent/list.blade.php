@extends('school.master')
@section('title')
<title>RG School Bus Parent List</title>
@stop
@section('content')
                <div class="dt_main pr">
                  <div class="dash_tab_2 parents">
                    <div class="sticky">
                      <div class="row align-items-center">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <div class="parent">
                            <h4>Parents Management</h4>
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <div class="search_filter">
                            <div class="row align-items-center">
                              <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                {{-- <div class="fill_div">
                                  <a href="javascript:void(0)"><img src="{{asset('assets/images/fil.png')}}" class="img-fluid" alt=""> </a>
                                  <input type="text" placeholder="Search">

                                </div> --}}
                              </div>
                              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="view">
                                  <a href="{{url('school/parent-requests')}}" class="btn btn_green"> View Requests</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="parent_table table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 700px">
                      <table class="table table-striped mb-0">
                        <thead class=" data-sticky-header">
                          <tr>
                            <th class="text-left">Parents Name</th>
                            <th class="text-center">Parent Email</th>
                            <th class="text-center">No of Child</th>
                            <!--<th class="text-center">Driver Name</th>-->
                            <th class="text-center">Status</th>
                            <th class="text-right">Details</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse($parents as $parent)

                            <tr>
                                <td><img src="{{asset('upload/profile/demo-profile.png' )}}" class="img-fluid" alt=""> <span>{{$parent->first_name}} {{$parent->last_name}}</span></td>
                                <td class="text-center">{{$parent->email}} </td>
                                <td class="text-center">{{$parent->childs_count}} </td>
                                <td class="text-center">Active</td>
                                <td class="text-right"><a href="{{url('school/parent-detail',$parent->id)}}">View Details</a></td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="5"> Records not found</td>
                            </tr>
                            @endforelse
                        </tbody>
                      </table>
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
    <div class="modal-dialog modal-dialog-centered dr">
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
