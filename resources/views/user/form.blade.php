@extends('layouts.new')
@section('title','Konsultan IT & Digital Marketing Bandung')
<meta name="description" content="Website Pribadi Muhamad Ihsan Firdaus, seorang Konsultan IT dan Digital Marketing berpengalaman sejak tahun 2007"> 
@section('content')
<div class="home-intro">
    <div class="container">
        <div class="intro-flex">
            <div class="slider">
                <div class="swiper-ccontainer swiper-1">
                    <div class="swiper-wrapper">
                        @foreach($article as $data)
                        <div class="swiper-slide">
                            <div class="box-post">
                                <div class="label-tag">Article</div>
                                <h3 class="post-title">
                                    <a href="{{ url('user/article/'.$data->id) }}">{{ $data->title }}</a>
                                </h3>
                                <a href="{{ url('user/article/'.$data->id) }}" class="btn btn-text">Learn More</a>
                            </div>
                        </div>
                        @endforeach
                        @foreach($event as $field)
                        <div class="swiper-slide">
                            <div class="box-post">
                                <div class="label-tag">Event</div>
                                <h3 class="post-title">
                                    <a href="{{ url('user/event/'.$field->id) }}">{{ $field->title }}</a>
                                </h3>
                                <a href="{{ url('user/event/'.$field->id) }}" class="btn btn-text">Learn More</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next sbn">
                        <i class="ti-angle-right"></i>
                    </div>
                    <div class="swiper-button-prev sbp">
                        <i class="ti-angle-left"></i>
                    </div>
                </div>
            </div>
            @if(Session::has('email'))
            <div class="download-form">
                <div class="title-heading text-left">
                    <h3><span>Hello! {{ session('name') }}</span></h3>
                </div>
                <p style="margin-top: -40px">Selamat datang di Ihsan firdaus App</p>
                <a href="{{ url('user/logout') }}" class="btn btn-primary">Akhiri Sesi</a>
            </div>
            @endif
            @if(!Session::has('email'))
            <div class="download-form">
                <div class="title-heading text-left">
                    <h3><span>Sign Up for Download</span></h3>
                </div>
                <form class="needs-validation" novalidate="" action="{{ url('user/form_save') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name" class="important">Name</label>
                                <input id="name" class="form-control" required="" type="text" autocomplete="off" name="name">

                                <div class="invalid-feedback">Nama wajib untuk diisi</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email" class="important">Email</label>
                                <input id="email" class="form-control" required="" type="email" autocomplete="off" name="email">
                                <div class="invalid-feedback">Email wajib untuk diisi</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="phone" class="important">Phone</label>
                                <input id="phone" class="form-control" required="" type="number" autocomplete="off" name="phone">
                                <div class="invalid-feedback">Phone wajib untuk diisi</div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button class="btn btn-primary" type="submit">Sign In</button>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="col-md-12 text-center">
                            @if(session('info'))
                            <div class="alert alert-info">
                                {{ session('info') }}
                            </div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
            @endif
        </div>
    </div>
</div>
@stop