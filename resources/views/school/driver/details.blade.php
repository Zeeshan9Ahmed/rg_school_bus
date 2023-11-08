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
          <h4>Drivers Details</h4>
        </div>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <div class="stud_form ddt">
          <form action="javascript::void(0)" id="update-driver-process" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <?php
                $img = 'demo-profile.png';
                ?>
                <img src="{{asset('upload/profile/'. $img )}}" class="img-fluid" alt="">
                <div class="form-group">
                  <input type="text" placeholder="First Name" id="first_name" name="first_name" value="{{$driver->first_name}}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                  <input type="text" placeholder="Last Name" id="last_name" name="last_name" value="{{$driver->last_name}}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                  <input type="email" placeholder="Email" disabled id="email" name="email" value="{{$driver->email}}" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                  <input type="text" placeholder="Phone Number" id="phone" name="phone" value="{{$driver->phone}}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                  <input type="text" placeholder="License No" id="driving_license" name="driving_license" value="{{$driver->driving_license}}">
                </div>
              </div>

            </div>
            <!-- <div class="row">
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
                         </div> -->
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                  <input type="hidden" name="driver_id" id="driver_id" value="{{$driver->id}}">
                  <a href="javascript:void(0)"> <input type="submit" id="update_driver" value="Save Changes"></a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <div class="drive_sec">
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pd0 ">
              <div class="parent">
                <h4>Assigned Children</h4>
              </div>
            </div>
            {{-- <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pd0 ">
                          <div class="dr">  <a href="javascript:void(0)" class="btn btn_green" id="assigned-child-to-another-driver">Assign To Another Driver</a></div>
                        </div> --}}
          </div>
          <div class="parents_requaste miche">
            <div class="row">
              @forelse($driver->driver_childs as $child)
              <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="req_box">
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <div class="">
                        <?php
                        $img = 'demo-profile.png';
                        ?>
                        <h3><img src="{{asset('upload/profile/'. $img )}}" class="img-fluid" alt=""> {{$child->parent->first_name . ' '. $child->parent->last_name}}</h3>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pd0 ">
                      <div class="child_text">
                        <?php
                        $img = 'demo-profile.png';
                        ?>
                        <h4><img src="{{asset('upload/profile/'. $img )}}" class="img-circle" alt="">{{$child->first_name.' '.$child->last_name}} <a href="javascript:void(0)"></a></h4>
                        <span>Gender: {{$child->gender}}</span>
                        <span>Age: {{$child->total_years}} Year</span>
                      </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pd0 ">
                      <div class="child_text class_text">
                        <span>Class {{$child->class}}</span>
                        <span>Roll No {{$child->roll_number}}</span>
                        <span>{{ auth()->user()->first_name}}</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @empty
              @endforelse

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

<!-- Modal -->
@stop

@section('footer-script')
<script>
  $(document).on('click', '#update_driver', function() {

    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var phone = $("#phone").val();
    var driving_license = $("#driving_license").val();
    var driver_id = $('#driver_id').val();

    if (!first_name) {
      showToast('First Name filed is required.', 'error')
      return;
    }
    if (!last_name) {
      showToast('Last Name filed is required.', 'error')
      return;
    }

    if (!phone) {
      showToast('Phone Number filed is required.', 'error')
      return;
    }
    if (!driving_license) {
      showToast('Driving License filed is required.', 'error')
      return;
    }


    $.ajax({
      url: `${baseUrl}/update-driver-profile`,
      type: 'POST',
      data: {
        driver_id,
        first_name,
        last_name,
        phone,
        driving_license,

      },
      success: function(response) {

        console.log(response)
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
</script>
@stop