@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Dashboard</h4>
                        <p class="card-subtitle">The following is the data of the presentation application</p>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card card-info">
                                    <div class="card-body text-center">
                                        <h1 style="font-size: 50px;color: white; margin-top: 10px">{{ $event }}</h1>
                                        <p class="text-white">Event</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-info">
                                    <div class="card-body text-center">
                                        <h1 style="font-size: 50px;color: white; margin-top: 10px">{{ $visitor }}</h1>
                                        <p class="text-white">Visitors</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-info">
                                    <div class="card-body text-center">
                                        <h1 style="font-size: 50px;color: white; margin-top: 10px">{{ $article }}</h1>
                                        <p class="text-white">Article</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
