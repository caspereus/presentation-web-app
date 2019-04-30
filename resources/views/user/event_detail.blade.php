@extends('layouts.new')

@section('title','Article Detail')

@section('content')
	<div class="content-detail">
		<div class="container article">
			<div class="title-heading text-center">
				<h1><span>{{ $data['title'] }}</span></h1>
			</div>
			<div class="box-img">
				<img src="{{ asset('images/'.$data['cover_image']) }}">
			</div>
			<div class="box-entry">
				<article>
                    <p>{!! nl2br ($data['description']) !!}</p>
                    <p>{{ $data->created_at->diffForHumans() }}</p>
                </article>
                @if(session('email'))
                <a href="{{ url('user/event/download/'.$data['id']) }}" class="btn btn-info">Download Attached File</a>
                @else
                <a href="{{ url('user') }}" class="btn btn-primary">Login to download attached file</a>
				@endif
			</div>
		</div>
		<div class="container article">
			<div class="box-btn text-center">
				<a href="{{ url('user/event/') }}" class="btn btn-primary">
					Browse Event
				</a>
			</div>
		</div>
	</div>
@stop