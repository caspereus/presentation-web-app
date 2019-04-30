<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>NAMU</title>
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/colors/blue.css') }}" id="theme" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
</head>

<style> 
        h1{
            margin-top: 80px;
            font-family: 'Righteous', cursive;
            font-size: 70px;
            margin-bottom: 35px;
        }
</style>

<body>
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
        
    <section id="wrapper" class="login-register login-sidebar"  
    style="background: rgb(30, 136, 229);">

    
    <div class="container">
        <br>
        <br>
        <div class="row">
            <div class="col-sm-6 offset-3">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center">Presentasi</h1>
                        <p class="text-muted text-center">Ciptakan presentasi yang menakjubkan</p>
                        <form action="{{ route('login') }}" method="post">
                            @csrf {{ csrf_field() }}
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" autofocus placeholder="Masukan email disini..." value="{{ old('email') }}" name="email" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-info" type="submit">Login Sekarang!</button>
                            </div>
                        </form>
                        @if($errors->any())
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger"><b>{{ $error }}</b></div>
                        @endforeach
                        @endif
                            </div>
                </div>
            </div>
        </div>
    </div>

        
    </section>
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/popper/popper.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js')}}"></script>
    <script src="{{ asset('assets/js/waves.js')}}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js')}}"></script>
    <script src="{{ asset('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{ asset('assets/js/custom.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
</body>
</html>