<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>@yield('title')</title>
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/colors/blue.css"') }}"  id="theme rel="stylesheet">
    <link href="{{ asset('assets/plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/dropify/dist/css/dropify.min.css') }}">
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <link href="{{ asset('assets/plugins/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
    <style>
        .jq-icon-info{
            background-color: #fc4b6c !important;
            color: #fff !important;
            border-color: transparent !important;
        }
        .topbar{
            background: #1e88e5 !important;
        }
        .dropify-wrapper{
            text-align: center !important;
        }

        .topbar .navbar-light .navbar-nav .nav-item > a.nav-link
        {
            color: #fff !important;
        }

        .logo{
            color: white;
            margin-top: 15px;
            font-size: 25px;
        }

        .logo span{
            font-weight: bold;
            font-style: italic;
        }


    </style>
</head>

<body class="fix-header fix-sidebar card-no-border">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand nav-link" href="{{ url('/home') }}">
                        <p class="logo"><span>Presentasi</span></p>
                    </a>
                </div>
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->email }}</a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-text">
                                                <h4>{{ Auth::user()->name }}</h4>
                                                <p class="text-muted"></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#" data-toggle="modal" data-target="#myModal"><i class="ti-settings"></i> Ubah Password </a></li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout</a>
                                    </li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <br><br>
                        <li class="nav-small-cap">MENU</li>
                        <li>
                            <a href="{{ url('home') }}" class="waves-effect waves-dark"  aria-expanded="false">
                                <i class="mdi mdi-home"></i><span class="hide-menu">Dashboard </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('category') }}" class="waves-effect waves-dark"  aria-expanded="false">
                                <i class="mdi mdi-widgets"></i><span class="hide-menu">Category </span>
                            </a>
                        </li>
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Presentator </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ url('presentator') }}">Data Presentator</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Visitors </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ url('visitors') }}">Data Visitors</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Event </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ url('event/add') }}">Add Event</a></li>
                                <li><a href="{{ url('event') }}">Data Event</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-book-multiple"></i><span class="hide-menu">Article </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ url('article/add') }}">Add Article</a></li>
                                <li><a href="{{ url('article') }}">Data Article</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-image"></i><span class="hide-menu">Gallery </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ url('gallery/add') }}">Add Gallery</a></li>
                                <li><a href="{{ url('gallery') }}">Data Gallery</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-video"></i><span class="hide-menu">Video </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ url('video/add') }}">Add Video</a></li>
                                <li><a href="{{ url('video') }}">Data Video</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="page-wrapper">
            <br>
            <div class="container-fluid" id="app">
                <div class="row">
                    @yield('content')
                    @include('component.alert')
                </div>
            </div>
            <footer class="footer">
                © Papertay 2018
            </footer>
        </div>
    </div>
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Ubah Password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form action="{{ url('/ubahPassword') }}" method="post" id="form-pas">
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="tokens">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Password Lama</label>
                            <input type="password" class="form-control" name="pw_lama" id="oldpw">
                        </div>
                        <div class="form-group">
                            <label for="">Password Baru</label>
                            <input type="password" class="form-control" name="pw_baru" id="valpwbaru">
                        </div>
                        <div class="form-group">
                            <label for="">Konfirmasu Password Baru</label>
                            <input type="password" class="form-control" name="kon_pw_baru" id="valkonfirmasi">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info waves-effect">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/plugins/popper/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/js/waves.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/styleswitcher/jQuery.style.switcher.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="{{ asset('assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/js/validation.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/dropify/dist/js/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/toast-master/js/jquery.toast.js') }}"></script>
    <script src="{{ asset('assets/js/toastr.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/jquery.flot.js')}}"></script>
    <script src="{{ asset('assets/plugins/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{ asset('assets/js/flot-data.js')}}"></script>
    <script src="{{ asset('assets/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('#example23').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });

            // Daterange picker
            $('.input-daterange-datepicker').daterangepicker({
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-danger',
                cancelClass: 'btn-inverse'
            });

            $(".select2").select2();
            $('.dropify').dropify();

            $('#form-pas').submit(function(e)
            {
                e.preventDefault();
                if ($('#valpwbaru').val() == $('#valkonfirmasi').val()) {
                    if ($('#oldpw').val() != $('#valpwbaru').val()) {
                        $.ajax({
                            url: $(this).attr('action'),
                            type:'POST',
                            data:$(this).serialize(),
                            success:function(data){
                                if (data == "ok") {
                                    swal("Berhasil","Password Telah diganti","success");
                                    $('#oldpw').val('');
                                    $('#valpwbaru').val('');
                                    $('#valkonfirmasi').val('');
                                    $('#myModal').modal('hide');
                                }else{
                                    swal("Password Lama Salah!");
                                }
                            }
                        });
                    }else{
                        swal("Perhatian","Password lama dan baru tidak boleh sama!","warning");    
                    }
                }else{
                    swal("Perhatian","Password Konfirmasi tidak sesuai","warning");
                }
            })
        });
    </script>
</body>

</html>