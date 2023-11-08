@extends('school.master')
@section('title')
<title>RG School Bus Parent Details</title>
@stop
@section('content')
                <div class="dash_tab">
                      <div class="dash_tab_2 dash_tab_4">
                        <div class="row align-items-center">
                          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="parent">
                              <h4>Students Details</h4>
                            </div>
                          </div>                          
                        </div>
                        <hr>
                       <div class="row">
                         <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                           <div class="stud_form">
                               <div class="row">
                                 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <img src="{{asset('assets/images/girl.png')}}"  class="img-fluid" alt="">
                                   <div class="form-group">
                                     <input type="text" placeholder="First Name" value="{{$student->first_name}}">
                                   </div>
                                 </div>
                               </div>                               
                               <div class="row">
                                 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                   <div class="form-group">
                                     <input type="text" placeholder="Last Name" value="{{$student->last_name}}">
                                   </div>
                                 </div>
                               </div>                               
                               <div class="row">
                                 <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                   <div class="form-group">
                                     <input type="text" placeholder="Class" value="{{$student->class}}">
                                   </div>
                                 </div>                                 
                                 <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                   <div class="form-group">
                                     <input type="text" placeholder="Roll No" value="{{$student->roll_number}}">
                                   </div>
                                 </div>
                               </div>
                               <div class="row">
                                 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                   <div class="form-group wh">
                                     <select name="" id="">
                                       <option value=""> Select Driver</option>
                                       <option value=""> Select Driver</option>
                                       <option value=""> Select Driver</option>
                                       <option value=""> Select Driver</option>
                                     </select>
                                   </div>
                                 </div>
                               </div> 
                               <div class="row">
                                 <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                   <div class="form-group">
                                     <h5>Status In-Active</h5>
                                   </div>
                                 </div>                                 
                                 <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                   <div class="form-group">
                                     <div class="togal_btn ">
                                      <p><input type="checkbox"></p>
                                    </div>
                                   </div>
                                 </div>
                               </div>
                               <div class="row">
                                 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                   <div class="form-group">
                                    <a href="javascript:void(0)"  data-bs-toggle="modal" data-bs-target="#exampleModal3">  <input type="submit" value="Save Changes"></a>
                                   </div>
                                 </div>
                               </div> 
                           </div>
                         </div>                        
                          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div id="calender_main">
                              <h2>Attendance Record</h2>
                                <div id="calendar"></div>
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
@stop