<!DOCTYPE html>
<!doctype html>
<html lang="en">
<?php

use \RealRashid\SweetAlert\Facades\Alert; ?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RG School Bus Login</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('assets/css/stellarnav.min.css')}}">
  <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
</head>

<body>
  <div class="main_body">
    <div class="loader"></div>
    <section class="school_sec">
      <div class="container">
        <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="banner_log">
              <img src="{{asset('assets/images/logo.png')}}" class="img-fluid">
            </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            @php if(isset($_COOKIE['Email']) && isset($_COOKIE['Password']))
            {
            $Email = $_COOKIE['Email'];
            $Password = $_COOKIE['Password'];
            $is_remember = "checked='checked'";
            }
            else{
            $Email ='';
            $Password = '';
            $is_remember = "";
            }
            @endphp
            <form id="login" method="POST">
              @csrf
              <div class="form_main">
                <div class="main_heading text-center">
                  <h3>Hello! Welcome Back </h3>
                  <p>Please login to continue</p>
                </div>
                <div class="form-group">
                  <i class="fas fa-envelope"></i>
                  <!-- <label>Email</label> -->
                  <input type="email" id="email" name="email" placeholder="Enter Your Email" value="{{$Email}}">
                </div>
                <div class="form-group">
                  <i class="fas fa-lock"></i>
                  <!-- <label>Password</label> -->
                  <input type="password" id="password" name="password" placeholder="Enter Your Password" value="{{$Password}}">
                </div>
                <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <div class="custom_cehck">
                      <label class="containerd"> Remember me
                        <input type="checkbox" checked="checked" name="rememberme" {{$is_remember}}>
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <a href="{{route('forgot-password')}}" class="fp"> Forgot Password?</a>
                  </div>
                </div>
                <div class="form-group">
                  <a href="javascript:void(0)"><input type="submit" value="Login"></a>
                  <!-- <a href="javascript:void(0)"  data-bs-toggle="modal" data-bs-target="#exampleModal"><input type="submit" value="Login"></a> -->
                </div>

              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <input type="hidden" id="baseUrl" value="{{ url('/') }}" />
  </div>
  <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery-ui.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.20/sweetalert2.all.js" integrity="sha512-+yJxhQWH+qSVlY7fP/2RpnH+LBpzYjKfVUX79A1TlhMTxHXbVZ/AI2xNDTFRYjJlibQpn/Ezcw/4VrtURPV8PQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>





  <script>
    $(document).ready(function() {
      var baseUrl = $('#baseUrl').val() + '/school';
      console.log(baseUrl, 'baseUlr')

      function toast(message, type = 'error', icon, timer = '2500', position = 'top-end') {

        const Toast = Swal.mixin({
          toast: true,
          position: position,
          showConfirmButton: false,
          timer: timer,
          icon: icon,
          width: '32em'
        })

        Toast.fire({
          type: type,
          title: message
        });
      }


      $("#login").on('submit', function(e) {
        e.preventDefault();

        var email = $("#email").val();
        var password = $("#password").val();

        if (!email) {
          toast("Email field can not be empty", 'error', 'error');
          return;
        }
        if (!password) {
          toast("Password field can not be empty", 'error', 'error');
          return;
        }


        $.ajax({
          type: 'POST',
          url: baseUrl + '/login-process',
          data: new FormData(this),
          dataType: 'json',
          contentType: false,
          cache: false,
          processData: false,
          success: function(response) {
            // console.log(response,'re')
            if (response.status > 0 ) {
              window.location.href = response.data.url;

            }else {

              toast(response.message, 'success', 'error');
            }
            
          },
          error: function(xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            toast(err.message, 'success', 'error');
            
          }
        });

      });

    });
  </script>

</body>

</html>