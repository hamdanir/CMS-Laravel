
<!doctype html>

<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" href="app.css"> -->
    <!-- Bootstrap CSS -->
    <script src="{{asset('JS/cryptojs-aes-format.js')}}"></script>
    <script src="{{asset('JS/cryptojs-aes.min.js')}}"></script>
    <title> Login </title>
    <link rel="icon" type="image/png" href="{{asset('pages/login/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('pages/login/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('pages/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('pages/login/vendor/animate/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('pages/login/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('pages/login/css/main.css')}}">
    <style>
        .field-icon {
        float: right;
        margin-right: 10px;
        margin-top: -30px;
        position: relative;
        z-index: 2;
        cursor: pointer;
    }
    </style>
</head>
<body class="login-page">
    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{asset('pages/login/images/img-01.png')}}" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="{{ url('/login-proses') }}" method="post" id="form">
                    @csrf
					<span class="login100-form-title">
						Member Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input type="email" name="email" class="input100" id="email" placeholder="cth : mail@mail.com" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<div class="form-group">
                            <input class="input100" type="password" id="password" name="password" placeholder="Enter password" required>
                            <span toggle="#password" class="fa fa-lg fa-eye field-icon toggle-password"></span>
                            <span id="error-message" class="validation-error-label" style="margin-top:10px;"></span>
                        </div>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>

					<div class="text-center p-t-136">
						{{-- <a class="txt2" href="#">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a> --}}
					</div>
				</form>
			</div>
		</div>
	</div>

</body>

<!--===============================================================================================-->	
<script src="{{asset('pages/login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('pages/login/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('pages/login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('pages/login/vendor/tilt/tilt.jquery.min.js')}}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{asset('pages/login/js/main.js')}}"></script>
<script type="text/javascript">
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            // $(this).remove();
        });
    }, 5000);
    $('#email').blur(function() {
        var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        if (testEmail.test(this.value)) {
            $('#error-message').css("display", "none");
        }
        else {
            $('#error-message').html('<h6 class="text-danger"> Format Email Tidak Sesuai! </h6>');
            $('#error-message').css("display", "block");
            $('#error-message').css("color", "red");
        }
    });
    // $("#formlogin").click(function(e) {
    //     var email = CryptoJSAesJson.encrypt($("#email").val(), '+H1yGCRVl1E63rJ7T3zH/98a0dYaVKcu6PIH65vZjrQ=');
    //     var password = CryptoJSAesJson.encrypt($("#password").val(),
    //         '+H1yGCRVl1E63rJ7T3zH/98a0dYaVKcu6PIH65vZjrQ=');
    //     console.log(email);
    //     console.log(password);
    //     $("#email").val(email.toString());
    //     $("#password").val(password.toString());

    // })
</script>

<script type="text/javascript">
    $(".toggle-password").on("click", function(e) {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });



    $("#form").on("submit", function(e) {
        e.preventDefault();
        var self = $(this);

        
        var email = CryptoJSAesJson.encrypt($("#email").val(), '+H1yGCRVl1E63rJ7T3zH/98a0dYaVKcu6PIH65vZjrQ=');
        var password = CryptoJSAesJson.encrypt($("#password").val(),
        '+H1yGCRVl1E63rJ7T3zH/98a0dYaVKcu6PIH65vZjrQ=');
        $("#email").val(email.toString());
        $("#password").val(password.toString());
        $("#form").off("submit");
        $("#email").attr("type","password");
        self.submit();
    });


    // function lupaPassword() {
    //         const el = document.createElement('div')
    //         el.innerHTML = "<a href='/h4l4m4nl0g1nR4m4Y4n4'>Kembali ke Login</a>"
    //         var url = "http://127.0.0.1:8000/forgot-password";

    //         Swal.fire({
    //                 title: `Lupa Password`,
    //                 content: el,
    //                 text: "Silahkan Masukan Email Anda, Password akan dikirim melalui email",
    //                 input: 'email',
    //                 showCancelButton: true,
    //                 showConfirmButton: true,
    //                 closeOnConfirm: true,
    //                 confirmButtonText: 'Reset',
    //                 cancelButtonText: "Batal",
    //                 inputPlaceholder: "Masukkan Email Anda",
    //             }).then((willSend) => {
    //                 if (willSend.isConfirmed) {
    //                     window.location = url;
    //                 }
    //             });
    //     }
</script>

</html>
