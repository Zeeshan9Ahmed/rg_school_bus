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
                            if(!empty($record->ProfilePicture)){
                                $img = $record->ProfilePicture;
                            }else{
                              $img = 'demo-profile.png';
                            }
                            ?>
                              <img src="{{asset('upload/profile/'. $img )}}"  class="img-fluid" alt="">
                             <div class="form-group">
                                <input type="text" placeholder="First Name" id="FirstName" name="FirstName" value="{{$record->FirstName}}">
                             </div>
                           </div>
                         </div> 
                         <div class="row">
                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                             <div class="form-group">
                                <input type="text" placeholder="Last Name" id="LastName" name="LastName" value="{{$record->LastName}}">
                             </div>
                           </div>
                         </div>     
                          <div class="row">
                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                             <div class="form-group">
                               <input type="email" placeholder="Email" id="Email" name="Email" value="{{$record->Email}}" readonly>
                             </div>
                           </div>
                         </div> 
                         <div class="row">
                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                             <div class="form-group">
                               <input type="text" placeholder="Phone Number" id="PhoneNumber" name="PhoneNumber" value="{{$record->PhoneNumber}}">
                             </div>
                           </div>
                         </div>                               
                         <div class="row">
                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                             <div class="form-group">
                               <input type="text" placeholder="License No" id="DrivingLicense" name="DrivingLicense" value="{{$record->DrivingLicense}}">
                             </div>
                           </div>                                 
                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                             <div class="form-group">
                               <input type="text" placeholder="Seating Capicity" id="SeatingCapacity" name="SeatingCapacity" value="{{$record->SeatingCapacity}}">
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
                                 <input type="hidden" name="driver-id" id="driver-id" value="{{$record->UserID}}">
                              <a href="javascript:void(0)">  <input type="submit" value="Save Changes"></a>
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
                          <div class="parent"><h4>Assigned Children</h4></div>
                        </div>                             
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pd0 ">
                          <div class="dr">  <a href="javascript:void(0)" class="btn btn_green" id="assigned-child-to-another-driver">Assign To Another Driver</a></div>
                        </div>
                      </div>
                      <div class="parents_requaste miche">
                        <div class="row">
                        @forelse($records as $record)
                          <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="req_box">
                              <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                  <div class=""> 
                                    <?php
                                    if($record->parent->ProfilePicture){
                                        $img = $record->parent->ProfilePicture;
                                    }else{
                                      $img = 'demo-profile.png';
                                    }
                                    ?>
                                    <h3><img src="{{asset('upload/profile/'. $img )}}" class="img-fluid" alt=""> {{$record->parent->FirstName.' '.$record->parent->LastName}}</h3>
                                  </div>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pd0 ">
                                  <div class="child_text">
                                    <?php
                                    if($record->ProfilePicture){
                                        $img = $record->ProfilePicture;
                                    }else{
                                      $img = 'demo-profile.png';
                                    }
                                    ?>
                                    <h4><img src="{{asset('upload/profile/'. $img )}}" class="img-circle" alt=""> {{$record->ChildName}} <a href="javascript:void(0)"></a></h4>
                                    <span>Gender: {{$record->Gender}}</span>
                                    <span>Age: {{$record->Age}} Year</span>
                                  </div>  
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pd0 ">
                                  <div class="child_text class_text">
                                    <span>Class {{$record->Class}}</span>
                                    <span>Roll No {{$record->RollNumber}}</span>
                                    <span>{{$record->school->SchoolName}}</span>
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
$('form[id="update-driver-process"]').validate({
      rules: {
        FirstName: {
              required: true,
        },
        DrivingLicense: {
            required: true,
        }
      },
      messages: {
        FirstName: {
            required: "<span style='color:red'>This field is required</span>",
        },
        DrivingLicense: {
            required: "<span style='color:red'>This field is required</span>",
        }
      },
      submitHandler: function(form) {
        form.submit();
        var form = $(this);
        var data = new FormData(document.getElementById("update-driver-process"));
        data.append('FirstName', $("#FirstName").val());
        data.append('LastName', $("#LastName").val());
        data.append('PhoneNumber', $("#PhoneNumber").val());
        data.append('SeatingCapacity', $("#SeatingCapacity").val());
        data.append('DrivingLicense', $("#DrivingLicense").val());
        data.append('DriverID', $("#driver-id").val());
        // if ($('#update-driver-process input[type=file]').get(0).files.length >= 0) {
        //     data.append('ProfilePicture', $('input[type=file]')[0].files[0]);
        // }
        $.ajax({
          url: "{{route('update-driver-process')}}",
          type: 'POST',
          data: data,
          cache: false,
          processData: false,
          contentType: false,
          success: function(response) {
            swal("Driver",response.msg, "success");
            setTimeout(function() {
            location.reload();
          }, 2000);
          },
          error: function(jqXHR, textStatus, errorThrown) {
            swal("Driver",'something went wrong', "error");
          }
        });
      }
  });
  $(document).on('click', '#assigned-child-to-another-driver', function() {
     var ChildID = $(this).data("id");
     swal({
            title: "Are you sure?",
            text: "You want to assigned child to another driver !",
            type: "success",
            showCancelButton: true,
            confirmButtonColor: '#6610f2',
            confirmButtonText: 'Yes, I am sure!',
            cancelButtonText: "No, cancel it!",
            closeOnConfirm: false,
            closeOnCancel: true
         },
        function(isConfirm){

          if (isConfirm){
            $.ajax({
              url: "{{route('get-drivers-list')}}",
              type: 'POST',
              data: {ChildID},
              success: function(response) {
                let d = response.records;
                let OldDriverID = $("#driver-id").val();
                $("#drivers-list-div-id").empty();
                var divsToAppend = '<select name="DriverID" id="DriverID">';
                divsToAppend += '<option value="">please select driver</option>';
                d.forEach(function(item) {
                  if(OldDriverID !=item.UserID)
                  {
                    divsToAppend += '<option value="'+item.UserID +'">'+item.FirstName+' '+item.LastName+'</option>';
                  }
                });
                divsToAppend += '</select>';
                $("#drivers-list-div-id").html(divsToAppend);
                $('#u-id').val(ChildID);
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
     var OldDriverID = $("#driver-id").val();
     var NewDriverID = $('#DriverID').val();
     if(DriverID == ''){
       swal("Driver",'Please select driver', "error");
       return false;
     }
      $.ajax({
        url: "{{route('assigned-child-to-another-driver')}}",
        type: 'POST',
        data: {OldDriverID,NewDriverID},
        success: function(response) {
          $("#view-driver-modal").modal('hide');
          swal("Request!",response.msg, "success");
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