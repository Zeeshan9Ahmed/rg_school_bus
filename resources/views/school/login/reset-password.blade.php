<!DOCTYPE html>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RG School Bus Reset Password</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('assets/css/stellarnav.min.css')}}">
  <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet">
</head>

<body>
  <div class="main_body">
    <div class="loader"></div>
    <!-- <div class="loader"></div> -->
    <section class="school_sec reset_pass">
      <div class="container">
        <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="banner_log">
              <img src="{{asset('assets/images/logo.png')}}" class="img-fluid">
            </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <form>
              @csrf
              <div class="form_main">
                <div class="main_heading text-center">
                  <h3>Reset Your Password</h3>
                  <p>Enter your new password to access your account</p>
                </div>
                <div class="form-group">
                  <i class="fas fa-lock"></i>
                  <label class="inp">New Password</label>
                  <input type="password" name="new_password" id="new_password" placeholder="***********" required>
                </div>
                <div class="form-group">
                  <i class="fas fa-lock"></i>
                  <label class="inp">Confirm New Password</label>
                  <input type="password" name="current_password" id="current_password" placeholder="***********" required>
                </div>
                <div class="form-group">
                  <input type="submit" id="change_password" value="Reset Password">
                  <!-- <a href="reset_password.php"  data-bs-toggle="modal" data-bs-target="#exampleModal2"><input type="submit" value="Reset Password"></a> -->
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Button trigger modal -->
    <div class="success_modal reset_password">
      <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModal2Label"> Successful</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="icon_box"><a href="javascript:void(0)"><i class="fa-solid fa-check"></i></a></div>
                  <p>You have successfully reset your password</p>
                  <div class="ss_form">
                    <a href="complete_profile.php" class="green"> Continue</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery-ui.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.20/sweetalert2.all.js" integrity="sha512-+yJxhQWH+qSVlY7fP/2RpnH+LBpzYjKfVUX79A1TlhMTxHXbVZ/AI2xNDTFRYjJlibQpn/Ezcw/4VrtURPV8PQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


  <script>
    $(document).ready(function() {
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

      function isStrongPassword(password) {
        var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])(?=.{8,})/;
        return regex.test(password);

      }
      $("#change_password").click(function(event) {
        event.preventDefault();

        let new_password = $('#new_password').val();
        let current_password = $('#current_password').val();
        if (!new_password) {
          toast('New Password Field is required', 'success', 'error');

          return;

        } else if (!isStrongPassword(new_password)) {
          toast('Password should be of 8 characters long (should contain uppercase, lowercase, number and special character).', 'success', 'error');

          return;
        }
        if (!current_password) {
          toast('Confirm Password field is required.', 'success', 'error');

          return;

        } else if (new_password !== current_password) {
          toast('New Password and Confirm Password must be same.', 'success', 'error');

          return;
        }

        let email = localStorage.getItem('email');
        let reference_code = localStorage.getItem('reference_code');
        // console.log(reference_code,email)
        $.ajax({

          url: "{{url('school/change-password')}}",
          type: "POST",
          data: {
            new_password,
            email,
            reference_code,
            "_token": "{{ csrf_token() }}",
          },
          success: function(data) {
           
            if (data.status > 0) {
              localStorage.removeItem("email");
              localStorage.removeItem("type");
              localStorage.removeItem("reference_code");
              toast(data.message, 'success', 'success');
              setTimeout(function() {
                window.location.href = data.redirect_url;
                // location.reload();
              }, 2000);
            } else {
              toast(data.message, 'success', 'error');
            }
            
          },
          error: function(xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            toast(err.message, 'success', 'error');

          }
        });
      });

    })
  </script>
  @include('sweetalert::alert')
</body>

</html>