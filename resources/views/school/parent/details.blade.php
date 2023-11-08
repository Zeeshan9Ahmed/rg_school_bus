@extends('school.master')
@section('title')
<title>RG School Bus Parent Details</title>
@stop

@section('header-script')

@stop
@section('content')
<div class="dash_tab ">
  <div class="dash_tab_2 req p_detail">
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="parent">
          <h4>Parents Details</h4>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="parent">
          <?php

          $img = $parent->avatar ?? 'demo-profile.png';

          ?>
          <h4><img src="{{asset('upload/profile/'.$img)}}" alt=""> {{ $parent->first_name }} {{$parent->last_name}} </h4>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <!-- <div class="togal_btn ">
                      <p>Status: In-Active <input type="checkbox"></p>
                    </div> -->
      </div>
    </div>
    <hr>
    <div class="parents_requaste">
      <div class="row">

        @forelse($parent->childs as $child)
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
          <div class="req_box">
            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pd0">
                <div class="child_text">
                  <?php
                  // dd($child->avatar??"12");
                  $img = $child->avatar ?? 'demo-profile.png';
                  ?>
                  <h4><img src="{{asset('upload/profile/'.$img)}}" class="img-circle" alt=""> {{$child->first_name}} {{$child->last_name}}<a href="javascript:void(0)" data-child="{{$child}}" class="edit-child"><i class="fa-solid fa-pen-to-square"></i></a></h4>
                  <span>Gender: {{$child->gender}}</span>
                  <span>Age: {{$child->total_years}} Year</span>
                  <?php


                  ?>
                  <span>Driver: {{$child?->driver?->first_name}} {{$child?->driver?->last_name}}</span>
                </div>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pd0">
                <div class="child_text class_text">
                  <span>Class : {{$child->class}}</span>
                  <span>Roll No: {{$child->roll_number}}</span>
                  <span>School: {{auth()->user()->first_name}}</span>
                  <span>Shift Time  
                   {{ Carbon\Carbon::createFromFormat('H:i', $child->shift_start_time)->format('h:i A') }} 
                   to
                   {{ Carbon\Carbon::createFromFormat('H:i', $child->shift_end_time)->format('h:i A') }} 

                  </span>
                </div>
              </div>
              <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="atten"><a href="javascript:void(0)" data-bs-target="#calendarexampleModalToggle222" data-bs-toggle="modal">Attendance Record</a></div>
                                  </div> -->
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
</section>

<!-- edit childs detail modal  -->
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
            <form action="#" id="update-child2" method="POST">
              <div class="form-group">
                <input type="text" placeholder="First Name" name="first_name" id="first_name">
              </div>
              <div class="form-group">
                <input type="text" placeholder="Last Name" name="last_name" id="last_name">
              </div>
              <div class="form-group input-container">
                <input type="text" class="custom-placeholder" placeholder="th" name="class" id="class">

              </div>
              <div class="form-group">
                <input type="text" placeholder="Roll No" name="roll_number" id="roll_number">
              </div>
              <div class="form-group">
                <input type="date" placeholder="Age" name="age" id="age">
              </div>
              <div class="form-group">
                <input type="time" class="form-control" placeholder="Shift Start Time" name="shift_start_time" id="shift_start_time">
              </div> </br>
              <div class="form-group">
                <input type="time" class="form-control" placeholder="Shift End Time" name="shift_end_time" id="shift_end_time">
              </div></br>
              <div class="form-group">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 centerCol" id="driver-list">
                  <select name="driver_id" id="driver_id">
                    <option value="" disabled>--Select Driver -- </option>
                    @foreach($drivers as $driver)
                    <option value="{{$driver->id}}">{{$driver->first_name}} {{$driver->last_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="justify-content-center req" align="center">
                  <input type="hidden" name="child_id" id="child_id" value="">
                  <button type="button" id="update_child" class="btn btn_green justify-content-center">Update Child Profile</button>
                  <!-- <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal3" data-bs-dismiss="modal" class="btn btn_green">Update Child Profile </a> -->
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- success_modal -->
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
                <a href="javascript:void(0)" class="green" data-bs-dismiss="modal"> Continue</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- parent_detail -->
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

    $(document).on('click', '#update_child', function() {
      // alert('ddd')

      var first_name = $("#first_name").val();
      var last_name = $("#last_name").val();
      var child_class = $("#class").val();
      var roll_number = $("#roll_number").val();
      var age = $("#age").val();
      var shift_start_time = $("#shift_start_time").val();
      var shift_end_time = $("#shift_end_time").val();
      var child_id = $("#child_id").val();
      var driver_id = $('#driver_id').find(":selected").val();
      // console.log(baseUrl,'driver_di')
      // var driver_id = $('#driver_id option[value="' + child.driver_id + '"]').attr("selected", "selected");

      if (!first_name) {
        showToast('First Name filed is required.', 'error')
        return;
      }
      if (!last_name) {
        showToast('Last Name filed is required.', 'error')
        return;
      }

      if (!child_class) {
        showToast('Class filed is required.', 'error')
        return;
      }
      if (!roll_number) {
        showToast('Roll Number filed is required.', 'error')
        return;
      }

      if (!age) {
        showToast('Age filed is required.', 'error')
        return;
      }

      if (!shift_start_time) {
        showToast('Shift start time filed is required.', 'error')
        return;
      }

      if (!shift_end_time) {
        showToast('Shift end time filed is required.', 'error')
        return;
      }

      if (!driver_id) {
        showToast('Please select a driver.', 'error')
        return;
      }
      // return;
      $.ajax({
        url: `${baseUrl}/update-child`,
        type: 'POST',
        data: {
          child_id,
          first_name,
          last_name,
          child_class,
          age,
          roll_number,
          shift_start_time,
          shift_end_time,
          driver_id
        },
        success: function(response) {

          console.log(response)
          if (response.status == 0) {
            showToast(response.message, 'error');
            return;
          }

          showToast(response.message, 'success');
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

    $('form[id="update-child"]').validate({
      rules: {
        ChildName: {
          required: true,
        },
        Class: {
          required: true,
        },
        RollNumber: {
          required: true,
        }
      },
      messages: {
        first_name: {
          required: "<span style='color:red'>This field is required</span>",
        },
        last_name: {
          required: "<span style='color:red'>This field is required</span>",
        },
        class: {
          required: "<span style='color:red'>This field is required</span>",
        }
      },
      submitHandler: function(form) {
        let ChildName = $("#ChildName").val();
        let Class = $("#Class").val();
        let RollNumber = $("#RollNumber").val();
        let Age = $("#Age").val();
        let ShiftStartTime = $("#ShiftStartTime").val();
        let ShiftEndTime = $("#ShiftEndTime").val();
        let DriverID = $("#DriverID").val();
        let ChildID = $("#ChildID").val();
        if (DriverID == '') {
          swal("Driver", 'Please select driver', "error");
          return false;
        }

      }
    });
  });
</script>
@stop