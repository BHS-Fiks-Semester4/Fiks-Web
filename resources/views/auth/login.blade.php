
@extends('auth.copyright')
<link href="{{ asset('assets/css/login2.css') }}" rel="stylesheet">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akhwat Computer| Sign In</title>
    
    <style>

        .notification-container {
            position: absolute;
            top: 1px; 
            left: 50%;
            transform: translateX(-50%);
        }

        .notification {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .error {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }

        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .popup p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
           
            <img src="{{ asset('assets/img/logo.png') }}" alt="Example" class="logosize">
        </div>

        <div class="login-form-container">
            <form action="{{ route('authenticate') }}" method="post" class="login-form"  onsubmit="return showPopup()">
               @csrf
                <input type="text"  class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan Email">
                    @if ($errors->has('email'))
                      <span class="text-danger">{{ $errors->first('email') }}</span>
                     @endif
                <div class="form-group">
                    <input type="password" name="password" id="password" placeholder="Masukan Kata Sandi">
                </div>
                    <div class="btn">
                        <button class="login" type="submit" name="signin">Masuk</button>
                    </div>
                    <div class="lupa">
                        <a class="lupasandi" href="forgot_password.php">Lupa kata sandi?</a>
                    </div>
                    <div class="garis">
                        <a class="garis"></a>
                    </div>
                    <div class="register">
                       <h4 class="reg">Belom Punya Akun ? <a class="register" href="daftar">Daftar Sekarang !</a></h4> 
                    </div>
               
            </form>
        </div>
    </div>
    </div>

    <div class="popup" id="popup">
        <p>Login Gagal. Periksa NISP/NIP Dan Password Anda.</p>
        <button onclick="hidePopup()">Tutup</button>
    </div>

    <script>
   <?php
if (isset($_SESSION['loginError'])) {
    echo "document.getElementById('popup').style.display = 'block';";
    unset($_SESSION['loginError']);
} else {
    echo "document.getElementById('popup').style.display = 'none';";
}
?>

    function hidePopup() {
        document.getElementById('popup').style.display = 'none';
    }
</script>

</body>
</html>
