<!DOCTYPE html>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RG School Bus Verify OTP</title>
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
    <!-- <div class="loader"></div> -->
    <section class="school_sec verify">
      <div class="container">
        <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="banner_log">
              <img src="{{asset('assets/images/logo.png')}}" class="img-fluid">
            </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="form_main ver">
              <div class="main_heading text-center">
                <h3>Verification </h3>
                <p>We have sent you an email containing 6 digits verification code. Please enter the code to verify your identity.</p>
              </div>
              <form id="verify_otp_form">
                @csrf
                <div class="form-group">
                  <ul>
                    <li><input type="password" placeholder="" maxlength="1" name="otp_digit_1" id="otp_digit_1" required /></li>
                    <li><input type="password" placeholder="" maxlength="1" name="otp_digit_2" id="otp_digit_2" required /></li>
                    <li><input type="password" placeholder="" maxlength="1" name="otp_digit_3" id="otp_digit_3" required /></li>
                    <li><input type="password" placeholder="" maxlength="1" name="otp_digit_4" id="otp_digit_4" required /></li>
                    <li><input type="password" placeholder="" maxlength="1" name="otp_digit_5" id="otp_digit_5" required /></li>
                    <li><input type="password" placeholder="" maxlength="1" name="otp_digit_6" id="otp_digit_6" required /></li>
                  </ul>
                </div>
                <div class="form-group">
                  <input type="submit" id="verify_otp" value="Verify">
                </div>
              </form>
              <!-- <div class="digital_clock">
                <div id='digital-clock'>
                  <span id='hour'></span>
                  <span class='red-dot'>:</span>
                  <span id='min'></span>
                  <span class='red-dot'>:</span>
                  <span id='second'></span>
                  <span>Sec</span>
                </div>
              </div> -->
              <!-- <div class="clock_text"> 
                <p>Didn't receive the code? <a href="javascript:void(0)">Resend Code</a> </p>
              </div>     -->
            </div>
          </div>
        </div>
      </div>
      <input type="hidden" id="baseUrl" value="{{ url('/') }}" />

    </section>
  </div>
  <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery-ui.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.20/sweetalert2.all.js" integrity="sha512-+yJxhQWH+qSVlY7fP/2RpnH+LBpzYjKfVUX79A1TlhMTxHXbVZ/AI2xNDTFRYjJlibQpn/Ezcw/4VrtURPV8PQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>












  <script>
    var baseUrl = $('#baseUrl').val() + '/school';

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

    $(document).ready(function() {
      $("#verify_otp").click(function(event) {
        event.preventDefault();

        // return;

        var otp_form = $('#verify_otp_form').serializeArray();
        // console.log(otp_form,'1')
        // return;

        for (i = 1; i <= 6; i++) {

          if (otp_form[i].value == '') {
            toast("The OTP field can't be empty", 'error', 'error');

            // not(" The OTP field can't be empty", 'error')
            return;
          }
        }

        // return;
        otp_form.push({
          name: "email",
          value: localStorage.getItem('email')
        });
        otp_form.push({
          name: "type",
          value: localStorage.getItem('type')
        });


        $.ajax({

          url: "{{url('school/otp-verify')}}",
          type: "POST",
          data: otp_form,
          success: function(data) {
            // console.log(data, 'data')
            // return;
            if (data.status > 0) {
              localStorage.setItem('reference_code', data.data.reference_code)
              toast('OTP verified successfully.', 'success', 'success');
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

    });
  </script>
  @include('sweetalert::alert')
</body>

</html>