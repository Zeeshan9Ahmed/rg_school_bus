<!DOCTYPE html>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RG School Bus Forgot Password</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/stellarnav.min.css') }}">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
</head>

<body>
    <div class="main_body">
        <div class="loader"></div>
        <!-- <div class="loader"></div> -->
        <section class="school_sec">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="banner_log">
                            <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <form id="forgot_password_form">
                            @csrf
                            <div class="form_main">
                                <div class="main_heading text-center">
                                    <h3>Forgot Password </h3>
                                    <p>Enter your email to reset your password</p>
                                </div>
                                <div class="form-group">
                                    <i class="fas fa-envelope"></i>
                                    <input type="email" required="" placeholder="Email" required name="email" id="email">
                                </div>
                                <div class="form-group">
                                    <input type="submit" id="forgot_password" value="Reset Password">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <input type="hidden" id="baseUrl" value="{{ url('/') }}" />

    </div>
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.20/sweetalert2.all.js" integrity="sha512-+yJxhQWH+qSVlY7fP/2RpnH+LBpzYjKfVUX79A1TlhMTxHXbVZ/AI2xNDTFRYjJlibQpn/Ezcw/4VrtURPV8PQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- notification modal  on header-->






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

        $('#calendar').datepicker({
            inline: true,
            firstDay: 1,
            showOtherMonths: true,
            dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
        });

        $(document).ready(function() {
            
            $('#forgot_password_form').submit(function(event) {
                // Prevent the default button click behavior
                event.preventDefault();
                var email = $("#email").val();
                if (!email) {
                    toast("Email field can not be empty", 'error', 'error');
                    return;
                }



                $.ajax({
                    type: 'POST',
                    url: baseUrl + '/forgot-password',
                    data: new FormData(this),
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        console.log(response, 're')
                        // return;

                        if (response.status > 0) {
                            localStorage.setItem('email', response.data.email)
                            localStorage.setItem('type', response.data.type)
                            toast('OTP has been Sent on your Email Address', 'success', 'success');
                            setTimeout(function() {
                                window.location.href = response.redirect_url;
                                // location.reload();
                            }, 2000);
                        } else {
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
    @include('sweetalert::alert')
</body>

</html>