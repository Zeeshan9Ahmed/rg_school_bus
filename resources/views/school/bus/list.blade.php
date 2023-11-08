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
            <h4>Buses Management</h4>
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
                  <a href="javascript:void(0)" class="btn btn_green" data-bs-target="#add-bus-modal" data-bs-toggle="modal" id="add-driver-btn"> Add new Bus</a>
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
            <th class="text-center">Image</th>
            <th class="text-left">Registration Number</th>
            <th class="text-ceter">Seating Capacity </th>
            <!--<th class="text-center">No Of Parents</th>-->
            <!-- <th class="text-center">Seating Capicity</th> -->
            <!-- <th class="text-center">Status</th> -->

          </tr>
        </thead>
        <tbody>
          @forelse($buses as $bus)
          <?php

          ?>
          <?php

            $img = 'demo-profile.png';

          ?>
          <tr>
            <td><img src="{{$bus->image ? asset($bus->image ) : asset('upload/profile/'. $img )}}" class="img-fluid" alt=""> </td>
            <td class="text-cente">{{$bus->registration_number}}</td>
            <td class="text-cente">{{$bus->seating_capacity}}</td>

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
  <div class="modal fade" id="add-bus-modal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel222" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered dr">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel222">Add New Bus</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form>
            <div class="row">
              <div class="form-group">
                <input type="text" placeholder="Registration Number" id="registration_number" name="registration_number">
              </div>
              <div class="form-group">
                <input type="text" placeholder="Seating Capacity" id="seating_capacity" name="seating_capacity">
              </div>

              <div class="form-group">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 centerCol">
                  <div class="text-center req">
                    <button type="button" class="btn btn_green justify-content-center" id="add_bus" style="margin: 0 auto 10px;float:inherit">Add Bus</button>
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


    $(document).on('click', '#add_bus', function() {
      var registration_number = $('#registration_number').val();
      var seating_capacity = $('#seating_capacity').val();

      if (!registration_number) {
        showToast('Registration Number filed is required.', 'error')
        return;
      }

      if (!seating_capacity) {
        showToast('Seating Capacity filed is required.', 'error')
        return;
      }

      $.ajax({
        url: `${baseUrl}/bus`,
        type: 'POST',
        data: {
          registration_number,
          seating_capacity,
        },
        success: function(response) {

          console.log(response,'resp')
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
