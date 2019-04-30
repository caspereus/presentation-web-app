
@extends('layouts.new')

@section('title','Event')

@section('content')
	<div class="news">
		<div class="container cj">
			<div class="title-heading text-center">
				<h1><span>News & Information</span></h1>
			</div>
			<div class="list-news">
				<div class="row">
					@foreach($data as $event)
						<div class="col-sm-12 col-md-6 col-lg-6">
							<div class="item-news">
								<div class="box-img">
									<a href="{{ url('user/event/'.$event['id']) }}">
										<div class="thumbnail-img">
											<img src="{{ asset('images/'.$event['cover_image']) }}">
										</div>
									</a>
								</div>
								<div class="box-post">
									<h3 class="post-title">
										<a href="{{ url('user/event/'.$event['id']) }}">{{ $event['title'] }}</a>
									</h3>
									<p>{{ $event->created_at }}</p>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@stop