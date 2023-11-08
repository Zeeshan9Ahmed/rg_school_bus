<!DOCTYPE html>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RG School Bus Create-School</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/stellarnav.min.css')}}" >
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" >
    <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet" >
  </head>
  <body>
    <div class="main_body">
    <!-- <div class="loader"></div> -->
    <section class="school_sec profile_page">
      <div class="container">
        <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="banner_log">
            <img src="{{asset('assets/images/logo.png')}}" class="img-fluid">
            </div>  
          </div>      
          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="form_main">
              <div class="main_heading text-center">
                <h3>Complete Profile</h3>
                <p>Please complete your profile</p>
              </div>
                  <div class='file'>
                    <label for='input-file'>
                      <i class="fa-solid fa-camera"></i>
                    </label>
                    <input id='input-file' type='file' />
                  </div>
                  <div class="form-group">
                    <input type="text" required="" placeholder="School Name"> 
                  </div>               
                  <div class="form-group">
                    <input type="text" required="" placeholder="Address"> 
                  </div>                 
                  <div class="form-group">
                    <input type="number" required="" placeholder="Phone Number"> 
                  </div>            
                  <div class="form-group">
                    <a href="javascript:void(0)"  data-bs-toggle="modal" data-bs-target="#exampleModal3"><input type="submit" value="Submit"></a>
                  </div>     
            </div>  
          </div>
        </div>
      </div>
    </section>  
  </div>
    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
    
     <!-- notification modal  on header-->
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
    <!-- Assign Children to Another Driver-->
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
                  <div><a href="javascript:void(0)" data-bs-target="#exampleModalToggleLabel22" data-bs-toggle="modal" data-bs-dismiss="modal" class="btn btn_green">Assign To </a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- sucsesfull modal -->
    <div class="success_modal reset_password">
      <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModal3Label" aria-hidden="true">
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
                     <a href="dasboard_1.php" class="green"> Continue</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- add new anocucemnt  -->
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
    <!-- select driver  modal -->
    <div class="select_driver_modal">
      <div class="success_modal assign">
        <div class="modal fade" id="exampleModalToggleLabel22" aria-hidden="true" aria-labelledby="exampleModalToggleLabel22" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel22">Select Driver</h5>
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
                      <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal3" data-bs-dismiss="modal" class="btn btn_green">Submit </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- add new driver  -->
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
    <!-- sucsecful modal for index page -->
    <div class="success_modal accept">
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"> Successful</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <p>I agree with the following</p>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                  <div class="ss_form">
                     <div class="custom_cehck">
                       <label class="containerd">Privacy Policy
                        <input type="checkbox" >
                        <span class="checkmark"></span>
                      </label>
                     </div>
                     <a href="index.php"> Decline</a>
                  </div>  
                </div>               
                 <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                  <div class="ss_form">
                     <div class="custom_cehck">
                       <label class="containerd">Terms & Conditions
                        <input type="checkbox" >
                        <span class="checkmark"></span>
                      </label>
                     </div>
                     <a href="complete_profile.php" class="green"> Accept</a>
                  </div> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- sucsecful modal for index page -->
    <div class="success_modal reset_password">
      <div class="modal fade" id="indexampleModal3" tabindex="-1" aria-labelledby="exampleModal3Label" aria-hidden="true">
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
    <!-- edit child detail modal  -->
    <div class="parent_detail success_modal">
      <div class="modal fade" id="childexampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel22" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalToggleLabel22">Edit Child Details</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                  <div class="form-group">
                    <input type="text" placeholder="Child Name">
                  </div>
                  <div class="form-group">
                    <input type="text" placeholder="Class">
                  </div>
                  <div class="form-group">
                    <input type="text" placeholder="Roll No">
                  </div>
                  <div class="form-group">
                    <input type="text" placeholder="Age">
                  </div>                  
                  <div class="form-group">
                    <input type="text" placeholder="Shif Time">
                  </div>
                  <div class="form-group">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 centerCol">
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
                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal3" data-bs-dismiss="modal" class="btn btn_green">Update Profile </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- calendar modal  -->
    <div class="calendar_modal">
      <div class="modal fade" id="calendarexampleModalToggle222" aria-hidden="true" aria-labelledby="exampleModalToggleLabel22" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalToggleLabel22">Attendance Record</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div id="calender_main">
                <div id="calendar"></div>
               </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
        $('#calendar').datepicker({
          inline:true,
          firstDay: 1,                   
          showOtherMonths:true,
          dayNamesMin:['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
        });
    </script> 
    @include('sweetalert::alert')
  </body>
</html>
