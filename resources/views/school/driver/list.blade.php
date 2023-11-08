@extends('school.master')
@section('title')
<title>RG School Bus Driver List</title>
@stop
@section('content')

<div class="dt_main dr">
  <div class="dash_tab_2 drivers">
    <div class="sticky">
      <div class="row align-items-center">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
          <div class="parent">
            <h4>Drivers Management</h4>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
          <div class="search_filter">
            <div class="row align-items-center">
              <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
               {{--  <div class="fill_div">
                  <a href="javascript:void(0)"><img src="{{asset('assets/images/fil.png')}}" class="img-fluid" alt=""> </a>
                  <input type="text" placeholder="Search">
                  <button type="button"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div> --}}
              </div>
              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="view">
                  <a href="javascript:void(0)" class="btn btn_green" data-bs-target="#add-driver-modal" data-bs-toggle="modal" id="add-driver-btn"> Add new Driver</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="parent_table table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th class="text-left">Driver Name</th>
            <th class="text-center">Bus No </th>
            <th class="text-center">No of Child</th>
            <!--<th class="text-center">No Of Parents</th>-->
            <!-- <th class="text-center">Seating Capicity</th> -->
            <!-- <th class="text-center">Status</th> -->
            <th class="text-right">Details</th>
          </tr>
        </thead>
        <tbody>
          @forelse($drivers as $driver)
          <?php

          ?>
          <?php
            $img = 'demo-profile.png';
          ?>
          <tr>
            <td><img src="{{asset('upload/profile/'. $img )}}" class="img-fluid" alt=""> <span>{{$driver->first_name.' '.$driver->last_name}}</span></td>
            <td class="text-center">{{$driver->driver_bus->registration_number}}</td>
            <td class="text-center">{{$driver->driver_childs_count}}</td>
            <td class="text-right"><a href="{{url('school/driver', $driver->id)}}">View Details</a></td>
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

<!-- add new driver  -->
<div class="parent_detail success_modal">
  <div class="modal fade" id="add-driver-modal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel222" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered dr">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel222">Add New Driver</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="#" id="add-driver-process" method="POST">
            <div class="row">
              <div class="form-group">
                <input type="text" placeholder="First Name" id="first_name" name="first_name">
              </div>
              <div class="form-group">
                <input type="text" placeholder="Last Name" id="last_name" name="last_name">
              </div>
              <div class="form-group">
                <input type="email" placeholder="Email" id="email" name="email">
              </div>
              <div class="form-group">
                <input type="tel" placeholder="Phone Number" id="phone" name="phone">
              </div>


              <div class="form-group" id="bus-div-id">
                <select name="bus_id" id="bus_id">
                  <option value=""> -- {{$buses->count() == 0 ? "Please Add New bus":"Please Select Bus"}} --</option>
                  @foreach($buses as $bus)
                  <option value="{{$bus->id}}"> Bus {{$bus->registration_number}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 centerCol">
                  <div class="text-center req">
                    <button type="button" id="add_driver" class="btn btn_green justify-content-center" style="margin: 0 auto 10px;float:inherit">Add Driver</button>
                    <!-- <a href="javascript:void(0)" class="btn btn_green">Add Driver</a> -->
                  </div>
                </div>
              </div>
          </form>
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


    $(document).on('click', '#add_driver', function() {

      var first_name = $('#first_name').val();
      var last_name = $('#last_name').val();
      var email = $('#email').val();
      var phone = $('#phone').val();
      var bus_id = $('#bus_id').find(":selected").val();;
      // console.log(bus_id)
      if (!first_name) {
        showToast('First Name filed is required.', 'error')
        return;
      }

      if (!last_name) {
        showToast('Last Name filed is required.', 'error')
        return;
      }

      if (!email) {
        showToast('Email filed is required.', 'error')
        return;
      }

      if (!phone) {
        showToast('Phone Number filed is required.', 'error')
        return;
      }

      if (!bus_id) {
        showToast('Please select a bus.', 'error')
        return;
      }
      // return;
      $.ajax({
        url: `${baseUrl}/driver`,
        type: 'POST',
        data: {
          first_name,
          last_name,
          email,
          phone,
          bus_id,
        },
        success: function(response) {

          console.log(response, 'resp')
          if (response.status == 0) {
            showToast(response.message, 'error');
            return;
          }
          showToast(response.message, 'success');
          setTimeout(function() {
            location.reload();
          }, 2000);

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
