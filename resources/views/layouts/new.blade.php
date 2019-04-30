<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Muhamad Ihsan Firdaus - @yield('title')</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="images/favicon.ico"/>
        
        <!-- Fonts --> 
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700" rel="stylesheet"> 

        <!-- Css Global -->
        <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/fontawesome-all.css') }}">
        
        <!-- Css Additional -->
        <link rel="stylesheet" href="{{ asset('frontend/css/swiper.min.css') }}">
        
        
        <script src="{{ asset('frontend/js/jquery.min.js')}} "></script>
        
        <!-- jQuery Additional-->
        <script src="{{ asset('frontend/js/swiper.min.js')}} "></script>
        <script src="{{ asset('frontend/js/scrollreveal.min.js')}} "></script>
        
        <!-- jQuery Global-->
        <script src="{{ asset('frontend/js/bootstrap.min.js')}} "></script>
        <script src="{{ asset('frontend/js/fill.box.js')}} "></script>
        <script src="{{ asset('frontend/js/main.js')}} "></script>
        
    </head>
    <body>
        <div id="page">
            <header>
                @include('component.header')
            </header>
            <main>
                @yield('content')
            </main>
            <footer>
                @php
                    $data = App\Presentator::latest()->first();
                @endphp
                <div class="footer">
                    <div class="container">
                        <div class="footer-flex">
                                <div class="copyright-footer">
                                    2018, Ihsan Firdaus. All Rights Reserved.
                                </div>
                                <div class="social-footer">
                                    <ul>
                                        <li>
                                            <a href="{{ $data->tweeter }}">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $data->facebook }}">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $data->instagram }}">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $data->google }}">
                                                <i class="fab fa-google-plus-g"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <script>
            //SLIDER HOME
            var swiper = new Swiper('.swiper-1', {
                pagination: '.swiper-pagination',
                paginationClickable: true, 
                paginationClickable: true,
                effect: 'fade',
                /*loop: true,*/
                spaceBetween: 0,
                autoplay: 10000,
                nextButton: '.swiper-1 .sbn',
                prevButton: '.swiper-1 .sbp',
                 breakpoints: {
                     991.98: {
                      effect: 'slide',
                    }
                 }
                
            });
        
            //VALIDATION FORM
            (function() {
              'use strict';
              window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                  form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                      event.preventDefault();
                      event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                  }, false);
                });
              }, false);
            })();
                        
        </script>
    </body>
</html>
