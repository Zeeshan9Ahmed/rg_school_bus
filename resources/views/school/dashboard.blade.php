@extends('school.master')
@section('title')
<title>RG School Bus Dashboard</title>
@stop
@section('content')
              <div class="dash_tab ">
                <div class="row">
                  <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                    <div class="total_parent" >
                      <div class="row ">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                          <div class="total_icon_div" >
                            <div class="row">
                              <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                <div class="total_text">
                                  <p>Total Parent</p>
                                  <span>150</span>
                                </div>
                              </div>
                              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="total_icon">
                                  <a href="javascript:void(0)"><i class="fa-solid fa-users"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                          <div class="total_icon_div" >
                            <div class="row">
                              <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                <div class="total_text">
                                  <p>Total Students</p>
                                  <span>350</span>
                                </div>
                              </div>
                              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="total_icon">
                                  <a href="javascript:void(0)"><i class="fas fa-user-graduate"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                          <div class="total_icon_div" >
                            <div class="row">
                              <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                <div class="total_text">
                                  <p>Total Drivers</p>
                                  <span>20</span>
                                </div>
                              </div>
                              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="total_icon">
                                  <a href="javascript:void(0)"><img src="{{asset('assets/images/driver.png')}}"  class="dr img-fluid"></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="dt_main">
                      <div class="sticky">
                        <div class="row ">
                          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="status">
                              <h3 class="h3"> Daily Status</h3>
                            </div>
                          </div>
                          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="status_date text-right">
                              <input type="date" value="apr-10-2023"  data-date="" data-date-format=" MMMM DD YYYY" >                              
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="dash_table dt">
                      <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <div class="jhon_div">
                            <h4><small class="green "></small>John Driver- <span> Active</span></h4>
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <div class="cret_div">
                            <a class="" data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa-solid fa-caret-down"></i>
                            </a>
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <div class="collapse" id="collapseExample1">
                            <div class="drive_list">
                              <ul>
                                <li>Child Name <span>En Route to School</span></li>
                                <li>Child Name <span>En Route to School</span></li>
                                <li>Child Name <span>En Route to School</span></li>
                                <li>Child Name <span>En Route to School</span></li>
                                <li>Child Name <span>En Route to School</span></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <div class="jhon_div">
                            <h4><small class="green reed"></small>John Driver- <span>Not Active</span></h4>
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <div class="coll_btn ">
                            <a class="" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModalToggle"> 
                            Assign Driver
                            </a>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <div class="jhon_div">
                            <h4><small class="green "></small>John Driver- <span> Active</span></h4>
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <div class="cret_div">
                            <a class="" data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa-solid fa-caret-down"></i>
                            </a>
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <div class="collapse" id="collapseExample2">
                            <div class="drive_list">
                              <ul>
                                <li>Child Name <span>En Route to School</span></li>
                                <li>Child Name <span>En Route to School</span></li>
                                <li>Child Name <span>En Route to School</span></li>
                                <li>Child Name <span>En Route to School</span></li>
                                <li>Child Name <span>En Route to School</span></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <div class="jhon_div">
                            <h4><small class="green reed"></small>John Driver- <span>Not Active</span></h4>
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <div class="coll_btn ">
                            <a class="" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModalToggle"> 
                            Assign Driver
                            </a>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <div class="jhon_div">
                            <h4><small class="green "></small>John Driver- <span> Active</span></h4>
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <div class="cret_div">
                            <a class="" data-bs-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa-solid fa-caret-down"></i>
                            </a>
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <div class="collapse" id="collapseExample3">
                            <div class="drive_list">
                              <ul>
                                <li>Child Name <span>En Route to School</span></li>
                                <li>Child Name <span>En Route to School</span></li>
                                <li>Child Name <span>En Route to School</span></li>
                                <li>Child Name <span>En Route to School</span></li>
                                <li>Child Name <span>En Route to School</span></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <div class="jhon_div">
                            <h4><small class="green "></small>John Driver- <span> Active</span></h4>
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <div class="cret_div">
                            <a class="" data-bs-toggle="collapse" href="#collapseExample5" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa-solid fa-caret-down"></i>
                            </a>
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <div class="collapse" id="collapseExample5">
                            <div class="drive_list">
                              <ul>
                                <li>Child Name <span>En Route to School</span></li>
                                <li>Child Name <span>En Route to School</span></li>
                                <li>Child Name <span>En Route to School</span></li>
                                <li>Child Name <span>En Route to School</span></li>
                                <li>Child Name <span>En Route to School</span></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <div class="jhon_div">
                            <h4><small class="green "></small>John Driver- <span> Active</span></h4>
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <div class="cret_div">
                            <a class="" data-bs-toggle="collapse" href="#collapseExample6" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa-solid fa-caret-down"></i>
                            </a>
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <div class="collapse" id="collapseExample6">
                            <div class="drive_list">
                              <ul>
                                <li>Child Name <span>En Route to School</span></li>
                                <li>Child Name <span>En Route to School</span></li>
                                <li>Child Name <span>En Route to School</span></li>
                                <li>Child Name <span>En Route to School</span></li>
                                <li>Child Name <span>En Route to School</span></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <div class="annoucment_div">
                      <h4>Announcement</h4>
                      <div class="scroll_ann">
                        <div class="ann_div">
                          <h5>ABC School Announcement</h5>
                          <p>Lorem ipsum dolor sit amet, consectetur adip iscing elit. Nam nec nunc vel lorem.</p>
                        </div>
                        <div class="ann_div">
                          <h5>ABC School Announcement</h5>
                          <p>Lorem ipsum dolor sit amet, consectetur adip iscing elit. Nam nec nunc vel lorem.</p>
                        </div>
                        <div class="ann_div">
                          <h5>ABC School Announcement</h5>
                          <p>Lorem ipsum dolor sit amet, consectetur adip iscing elit. Nam nec nunc vel lorem.</p>
                        </div>
                        <div class="ann_div">
                          <h5>ABC School Announcement</h5>
                          <p>Lorem ipsum dolor sit amet, consectetur adip iscing elit. Nam nec nunc vel lorem.</p>
                        </div>
                        <div class="ann_div">
                          <h5>ABC School Announcement</h5>
                          <p>Lorem ipsum dolor sit amet, consectetur adip iscing elit. Nam nec nunc vel lorem.</p>
                        </div>
                        <div class="ann_div">
                          <h5>ABC School Announcement</h5>
                          <p>Lorem ipsum dolor sit amet, consectetur adip iscing elit. Nam nec nunc vel lorem.</p>
                        </div>
                        <div class="ann_div">
                          <h5>ABC School Announcement</h5>
                          <p>Lorem ipsum dolor sit amet, consectetur adip iscing elit. Nam nec nunc vel lorem.</p>
                        </div>
                        <div class="ann_div">
                          <h5>ABC School Announcement</h5>
                          <p>Lorem ipsum dolor sit amet, consectetur adip iscing elit. Nam nec nunc vel lorem.</p>
                        </div>
                      </div>
                      <div class="annouce_btn">
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal133" > Add New Announcement</a>
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
@stop