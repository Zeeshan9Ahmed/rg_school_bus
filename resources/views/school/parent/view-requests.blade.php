@extends('school.master')
@section('title')
<title>RG School Bus Parent Requests</title>
@stop
@section('content')
<div class="dash_tab">
  <div class="dash_tab_2 req ">
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="parent">
          <h4>Parents Requests</h4>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
      </div>
    </div>
    <hr>
    <div class="parents_requaste v">
      <div class="row">
        @forelse($students as $student)
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
          <div class="req_box">

            <div class="row">
              <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <div class="">
                  <?php
                  $img = 'demo-profile.png';
                  ?>
                  <h3><img src="{{asset('upload/profile/'.$img)}}" class="img-fluid" alt=""> {{$student?->parent?->first_name.' '.$student?->parent?->last_name}}</h3>
                </div>
              </div>
              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="cross">
                  <ul>
                    <li><a href="javascript:void(0)" data-id="{{$student->id}}" parent_id="{{$student?->parent?->id}}" class="disaaproved-request"><i class="fa-solid fa-x"></i></a></li>
                    <li><a href="javascript:void(0)" data-id="{{$student->id}}" parent_id="{{$student?->parent?->id}}" class="approved-request"><i class="fa-solid fa-check"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="child_text">
                  <?php

                  $img = 'demo-profile.png';
                  ?>
                  <h4><img src="{{asset('upload/profile/'.$img)}}" class="img-fluid" alt=""> {{$student->first_name}} {{$student->last_name}}</h4>
                  <span>Gender: {{$student->gender}}</span>
                  <span>Age: {{$student->dob}} Year</span>
                </div>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="child_text class_text">
                  <span>Class {{$student->class}}</span>
                  <span>Roll No {{$student->roll_number}}</span>

                  <span>{{ auth()->user()->first_name}}</span>
                </div>
              </div>
            </div>

          </div>
        </div>
        @empty

        <h4 class="text-danger text-center">No Request Found</h4>
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
</div>

<!-- Modal -->
@stop
@section('footer-script')
<script>
  $(document).on('click', '.disaaproved-request', function() {
    var child_id = $(this).data("id");
    var parent_id = $(this).attr('parent_id');

    swal({
        title: "Are you sure?",
        text: "You want to cancel request!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Yes, I am sure!',
        cancelButtonText: "No, cancel it!",
        closeOnConfirm: false,
        closeOnCancel: true
      },
      function(isConfirm) {

        if (isConfirm) {
          $.ajax({
            url: "{{route('disapprove-request')}}",
            type: 'POST',
            data: {
              child_id,
              parent_id
            },
            success: function(response) {
              swal("Request!", response.msg, "success");
              setTimeout(function() {
                location.reload();
              }, 2000);

            },
            error: function(jqXHR, textStatus, errorThrown) {
              swal("Error", "Something went wrong :)", "error");
            }
          });
        }
      });
  });

  $(document).on('click', '.approved-request', function() {
    var ChildID = $(this).data("id");
    var parent_id = $(this).attr('parent_id');
    //  console.log($(this).attr('parent_id'))
    //  return;
    swal({
        title: "Are you sure?",
        text: "You want to approved request!",
        type: "success",
        showCancelButton: true,
        confirmButtonColor: '#6610f2',
        confirmButtonText: 'Yes, I am sure!',
        cancelButtonText: "No, cancel it!",
        closeOnConfirm: false,
        closeOnCancel: true
      },
      function(isConfirm) {

        if (isConfirm) {
          $.ajax({
            url: "{{route('drivers')}}",
            type: 'POST',
            data: {
              ChildID
            },
            success: function(response) {
              // console.log(response,'res')
              let d = response.data;
              $("#drivers-list-div-id").empty();
              var divsToAppend = '<select name="DriverID" id="DriverID">';
              divsToAppend += '<option value="">please select driver</option>';
              d.forEach(function(item) {
                divsToAppend += '<option value="' + item.id + '">' + item.first_name + ' ' + item.last_name + '</option>';
              });
              divsToAppend += '</select>';
              $("#drivers-list-div-id").html(divsToAppend);
              $('#u-id').val(ChildID);
              $('#parent_id').val(parent_id);
              swal.close();
              $("#view-driver-modal").modal('show');
            },
            error: function(jqXHR, textStatus, errorThrown) {
              swal("Error", "Something went wrong :)", "error");
            }
          });
        }
      });
  });

  $(document).on('click', '.assigned-driver', function() {
    var child_id = $('#u-id').val();
    var driver_id = $('#DriverID').val();
    var parent_id = $('#parent_id').val();
    if (driver_id == '') {
      swal("Driver", 'Please select driver', "error");
      return false;
    }
    $.ajax({
      url: "{{route('approve-request')}}",
      type: 'POST',
      data: {
        child_id,
        driver_id,
        parent_id
      },
      success: function(response) {

        $("#view-driver-modal").modal('hide');
        swal("Request!", response.msg, "success");
        setTimeout(function() {
          location.reload();
        }, 2000);
      },
      error: function(jqXHR, textStatus, errorThrown) {
        swal("Error", "Something went wrong :)", "error");
      }
    });
  });
</script>
@stop